<?php
/*
**	Front end functions and shortcodes will be here
*/

/*
**	Shortcode function of the Rockthemes Form Builder. Displays the form according to the form id
**
**	@param	:	$atts shortcode attributes
**	@return	:	Returns the form in HTML
**
*/
if(!function_exists('rockthemes_fb_display_shortcode')):
	function rockthemes_fb_display_shortcode($atts){
		extract( shortcode_atts( array(
				'id'	=>	'',
		), $atts ) );
		
		$return_empty	=	'<p>You do not have a Rock Builder Form with this shortcode : <strong>[rockthemes_fb id="'.esc_attr($id).'"]</strong></p>';
		
		if('' === $id) {
			echo $return_empty;
			return;
		}
				
		$main_settings = get_option('rockthemes_fb_settings');


		if(isset($main_settings['enqueue_lib_url']) && $main_settings['enqueue_lib_url'] !== ''){
			wp_enqueue_style('rocthemes-fb-fonticon', esc_url($main_settings['enqueue_lib_url']), '', '', 'all' );
		}
		if(count($main_settings) < 1){
			$main_settings = array(
				'enqueue_lib_url'		=>	'',
				
				'check_mark_icon'		=>	'fa fa-check',
				'error_icon'			=>	'fa fa-times',
				
				'sender_select'			=>	'wordpress',
				'sender_name'			=>	'',
			);
			update_option('rockthemes_fb_settings', $main_settings);	
		}
		
		$GLOBALS['rockthemes_fb_nonce'] = wp_create_nonce('rockthemes_fb_nonce');

				
		$return	=	rockthemes_fb_display_form($atts);
		if($return){
			
			add_action('wp_footer', 'rockthemes_fb_frontend_scripts');
			
			//rockthemes_fb_frontend_scripts();
			
			//if(ROCKTHEMES_THEME_ACTIVE){
				return $return;	
			//}else{
				//echo $return;
			//}
			
		}else{
			echo $return_empty;
		}
		return;
	}
endif;

add_shortcode('rockthemes_fb','rockthemes_fb_display_shortcode');


/*
**	For making changes easily in the columns classes.
**
**	@param	:	$columns (int) Columns number based on 12 columns
**	@return	:	returns the class names without class="". Must be used in 'class=""'
*/
function rockthemes_fb_frontend_columns($columns){
	global $layout_type;

	$return = '';
	
	if('foundation' === $layout_type){
		$return = 'large-'.$columns.' columns ';
	}elseif('bootstrap' === $layout_type){
		$return = 'span'.$columns.' ';
	}else{
		$return = 'large-'.$columns.' columns ';
	}
	
	return $return;
}

function rockthemes_fb_display_form($atts){
	global $layout_type;
	extract( shortcode_atts( array(
			'id'	=>	'',
	), $atts ) );
	
	$db_name = 'rockthemes_fb_'.intval($id);
	$saved_settings = get_option($db_name,true);
	$main_settings = get_option('rockthemes_fb_settings', array());
	
	if(!$saved_settings || !isset($saved_settings['grids'])) return;
	
	$layout_type = 'foundation'; //	TO DO : bootstrap
	
	$modals_html = '';
		
	$browser_details = get_browser_details();
	
	$supported_class = 'checkbox-supported';
	
	if(strpos($browser_details['name'],'xplorer')){
		$supported_class = '';
	}
	
	$rockthemes_active_class = (ROCKTHEMES_THEME_ACTIVE) ? 'rockthemes-active' : '';
	
	$loaded_html = '<form enctype="multipart/form-data" id="rockthemes-fb-'.esc_attr($id).'" class="rockthemes-form-builder '.$supported_class.' '.$rockthemes_active_class.'" data-form-ref="'.esc_attr($id).'">';
	
	
	foreach($saved_settings['grids'] as $grids){
			
		$loaded_html .= $layout_type === 'foundation' ? '<div class="row">' : '<div class="row-fluid">';
						
		$count_columns = 0;
				
		foreach($grids['columns'] as $columns){
			
			$loaded_html .= '<div class="'.esc_attr(rockthemes_fb_frontend_columns($grids['columns_class'])).'">';
			
			if(is_array($columns)):
			foreach($columns as $elem){

				$elem_func = 'rockthemes_fb_make_'.sanitize_text_field($elem['type']);
				
				//Missing Uploader element function fix
				if(function_exists($elem_func)){
					$loaded_html .= $elem_func($elem);
				}
				
			}
			endif;
			
			$loaded_html .= '</div>';//columns
				
			$count_columns += (int) $grids['columns_class'];
			
		}
		
		//Complete columns to 12 if no element included in columns
		while($count_columns < 12){
			$loaded_html .= '<div class="'.esc_attr(rockthemes_fb_frontend_columns($grids['columns_class'])).'">';
			$loaded_html .= '</div>';//rockthemes_fb_grid
			$count_columns += (int) $grids['columns_class'];
		}
		
		$loaded_html .= '</div>';//row or row-fluid (Foundation or Bootstrap)
		
	}
		
	//Check if reCaptcha is activated
	if(isset($saved_settings['captcha_activated']) && $saved_settings['captcha_activated'] === 'true'){
		if(!isset($GLOBALS['rockthemes_fb_include_recaptcha'])){
			$GLOBALS['rockthemes_fb_include_recaptcha'] = true;
			include(RFB_DIR.'libs/'.'recaptchalib.php');
		}
		$recaptcha_public_key = $saved_settings['recaptcha_public_key'];
		
		$loaded_html .= '
			<script type="text/javascript">
				var RecaptchaOptions = {
					theme : "clean"
				 };
			</script>
		';
		
		$loaded_html .= recaptcha_get_html($recaptcha_public_key);
		$loaded_html .= '<div class="clear"></div><br/>';
	}
	
	$loaded_html .= '<br/>';
	
	
	$button_class_filter = apply_filters('rock_form_builder_button_class', '');
	if(!empty($button_class_filter) && $button_class_filter !== '' && (empty($saved_settings['button_class_holder']) || !isset($saved_settings['button_class_holder']) || $saved_settings['button_class_holder'] === '')){
		$saved_settings['button_class_holder'] = $button_class_filter;
	}	
	
	//Send Button
	$loaded_html .= '<div class="rockthemes-fb-send '.(!empty($saved_settings['button_class_holder']) ? esc_attr($saved_settings['button_class_holder']) : 'button button-rounded button-primary').'">'.esc_html($saved_settings['send_button_text']).' <i class="sending"></i></div>';
	
	/*
	if(ROCKTHEMES_THEME_ACTIVE){
		$loaded_html .= '<div class="rockthemes-fb-send '.(!empty($saved_settings['button_class_holder']) ? $saved_settings['button_class_holder'] : 'button button-rounded button-primary').'">'.$saved_settings['send_button_text'].' <i class="sending"></i></div>';
	}else{
		$loaded_html .= '<div class="rockthemes-fb-send">'.$saved_settings['send_button_text'].' <i class="sending"></i></div>';
	}
	*/
	
	$loaded_html .= '<span class="sending-result"></span>';
	
	$loaded_html .= '</form>';//rockthemes-form-builder
	
	return $loaded_html;
}



/*
**	Rock Form Builder Sciprts
**
*/
function rockthemes_fb_frontend_scripts(){
	//Enqueue jQuery if not enqueued before
	wp_enqueue_script('jquery');
	
	
	wp_enqueue_script('json2');
	wp_enqueue_style( 'rock-form-builder-style', RFB_URI.'/css/rock-form-builder-style.css', '', '', 'all' );


	$main_settings = get_option('rockthemes_fb_settings');
	
	if($main_settings && !empty($main_settings)){
		$custom_style = '
			.rockthemes-form-builder input, 
			.rockthemes-form-builder input:not([type="submit"]), 
			.rockthemes-form-builder select, 
			.rockthemes-form-builder textarea{
				background:'.esc_attr($main_settings['if_bg_color']).';
				color:'.esc_attr($main_settings['if_f_color']).';
			}
			.rockthemes-form-builder input:focus, 
			.rockthemes-form-builder input:not([type="submit"]):focus, 
			.rockthemes-form-builder textarea:focus{
				background:'.esc_attr($main_settings['if_bg_hover_color']).';
				color:'.esc_attr($main_settings['if_f_hover_color']).';
			}
			
		';
		
		$if_input_list = array(
			'.rockthemes-form-builder input',
			'.rockthemes-form-builder input:not([type="submit"])',
			'.rockthemes-form-builder select',
			'.rockthemes-form-builder textarea'
		);
		$if_input_hover_list = array(
			'.rockthemes-form-builder input:focus',
			'.rockthemes-form-builder input:not([type="submit"]):focus',
			'.rockthemes-form-builder textarea:focus'
		);
		
		//Input fields placeholder colors
		foreach($if_input_list as $ifd){
			$custom_style .= '
				'.$ifd.'::-webkit-input-placeholder {
					color:'.esc_attr($main_settings['if_f_color']).';
				}
				'.$ifd.':-moz-placeholder { 
					color:'.esc_attr($main_settings['if_f_color']).';
					opacity:  1;
				}
				'.$ifd.'::-moz-placeholder {
					color:'.esc_attr($main_settings['if_f_color']).';
					opacity:  1;
				}
				'.$ifd.':-ms-input-placeholder {
					color:'.esc_attr($main_settings['if_f_color']).';
				}
			';	
		}
		
		//Input fields placeholder colors
		foreach($if_input_hover_list as $ifd){
			$custom_style .= '
				'.$ifd.'::-webkit-input-placeholder { 
					color:'.esc_attr($main_settings['if_f_hover_color']).';
				}
				'.$ifd.':-moz-placeholder { 
					color:'.esc_attr($main_settings['if_f_hover_color']).';
					opacity:  1;
				}
				'.$ifd.'::-moz-placeholder {
					color:'.esc_attr($main_settings['if_f_hover_color']).';
					opacity:  1;
				}
				'.$ifd.':-ms-input-placeholder { 
					color:'.esc_attr($main_settings['if_f_hover_color']).';
				}
			';	
		}
		
		wp_add_inline_style('rock-form-builder-style', $custom_style);
	}

	
	if(!isset($GLOBALS['rockthemes_fb_frontend_js'])):
		$GLOBALS['rockthemes_fb_frontend_js'] = true;
?>
<script type="text/javascript">
jQuery(document).ready(function(){
		
	var admin_ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
	
	form_process(admin_ajax_url);
	
	var language = "<?php echo get_bloginfo("language"); ?>";
	var translated_days_and_months = <?php 
		$days = array();
		$timestamp = strtotime('next Sunday');
		for($i = 0; $i < 7; $i++) {
			$days[] = ucfirst(date_i18n('l', $timestamp));
			$timestamp = strtotime('+1 day', $timestamp);
		}
		$daysShort = array();
		$timestamp = strtotime('next Sunday');
		for($i=1; $i<8; $i++){
			$daysShort[] = ucfirst(date_i18n('D', $timestamp));
			$timestamp = strtotime('+1 day', $timestamp);
		}
		$daysMin = array();
		$timestamp = strtotime('next Sunday');
		for($i=1; $i<8; $i++){
			$daysMin[] = substr(ucfirst(ucfirst(date_i18n('D', $timestamp))),0,2);
			$timestamp = strtotime('+1 day', $timestamp);
		}
		$months = array();
		for($i=1; $i<13; $i++){
			$months[] = ucfirst(date_i18n('F' ,strtotime(date('Y').'-'.$i.'-'.date('d'))));	
		}
		$monthsShort = array();
		for($i=1; $i<13; $i++){
			$monthsShort[] = ucfirst(date_i18n('M' ,strtotime(date('Y').'-'.$i.'-'.date('d'))));	
		}
		
		$translated_names = array(
			'days'			=>	$days,
			'daysShort'		=>	$daysShort,
			'daysMin'		=>	$daysMin,
			'months'		=>	$months,
			'monthsShort'	=>	$monthsShort,
		);
		echo json_encode($translated_names);
	?>;
	
	
	if(jQuery.isFunction(jQuery.fn.fdatepicker)){
		jQuery.fn.fdatepicker.dates[language] = translated_days_and_months;
		
		var rfb_icons = {
			rfb_close_icon:"<?php echo esc_attr(apply_filters('rock_form_builder_date_icon_close', 'fa-times')); ?>",
			rfb_next_icon:"<?php echo esc_attr(apply_filters('rock_form_builder_date_icon_next', 'fa-chevron-right')); ?>",
			rfb_back_icon:"<?php echo esc_attr(apply_filters('rock_form_builder_date_icon_back', 'fa-chevron-left')); ?>"
		};
		
		jQuery.fn.fdatepicker.DPGlobal.headTemplate = '<thead>'+
							'<tr>'+
								'<th class="prev"><i class="'+rfb_icons.rfb_back_icon+'"/></th>'+
								'<th colspan="5" class="date-switch"></th>'+
								'<th class="next"><i class="'+rfb_icons.rfb_next_icon+'"/></th>'+
							'</tr>'+
						'</thead>';
						
		jQuery.fn.fdatepicker.DPGlobal.contTemplate = '<tbody><tr><td colspan="7"></td></tr></tbody>',
		jQuery.fn.fdatepicker.DPGlobal.footTemplate = '<tfoot><tr><th colspan="7" class="today"></th></tr></tfoot>'

		jQuery.fn.fdatepicker.DPGlobal.template = '<div class="datepicker">'+
								
								'<div class="datepicker-days">'+
									'<table class=" table-condensed">'+
										jQuery.fn.fdatepicker.DPGlobal.headTemplate+
										'<tbody></tbody>'+
										jQuery.fn.fdatepicker.DPGlobal.footTemplate+
									'</table>'+
								'</div>'+
								'<div class="datepicker-months">'+
									'<table class="table-condensed">'+
										jQuery.fn.fdatepicker.DPGlobal.headTemplate+
										jQuery.fn.fdatepicker.DPGlobal.contTemplate+
										jQuery.fn.fdatepicker.DPGlobal.footTemplate+
									'</table>'+
								'</div>'+
								'<div class="datepicker-years">'+
									'<table class="table-condensed">'+
										jQuery.fn.fdatepicker.DPGlobal.headTemplate+
										jQuery.fn.fdatepicker.DPGlobal.contTemplate+
										jQuery.fn.fdatepicker.DPGlobal.footTemplate+
									'</table>'+
								'</div>'+
								'<a class="escape_button_style button datepicker-close small alert right" style="width:auto;"><i class="'+rfb_icons.rfb_close_icon+'"></i></a>'+
							'</div>';

		
		//Datepickers starter
		jQuery(".rockthemes-fb-datepicker").fdatepicker({language:language});
	}

	
	//Input fields focus/blur events
	jQuery(document).find(".rockthemes-fb-element.input-element").each(
		function(){
			jQuery(this).live("focus", function() {
				//if ( jQuery(this).val() == jQuery(this).attr("title") ) jQuery(this).val("");
				if(jQuery(this).hasClass("password-area")) jQuery(this).attr("type","password");
				jQuery(this).addClass("box-shadow-dark");
			});
			
			jQuery(this).live("blur", function() {
				if ( jQuery(this).val() == "" ){
					//jQuery(this).val(jQuery(this).attr("title"));
					if(jQuery(this).hasClass("password-area") && jQuery(this).attr("type") === "password") jQuery(this).attr("type","text");
				}
				jQuery(this).removeClass("box-shadow-dark");
			});
		}
	);
	
	
	
});

function form_process(ajax_url){
	//Checkbox Radio Button Effects
	if(jQuery(".rockthemes-form-builder").hasClass("checkbox-supported")){
		jQuery('input[type="radio"]').parent().find("label").css({"position":"relative","top":"-5px"});
		jQuery('input[type="radio"]').wrap('<div class="radio-btn"><i></i></div>');
		jQuery(".radio-btn").on('click touchend', function () {
			var _this = jQuery(this),
				block = _this.parent().parent();
			block.find('input:radio').attr('checked', false);
			block.find(".radio-btn").removeClass('checkedRadio');
			_this.addClass('checkedRadio');
			_this.find('input:radio').attr('checked', true);
		});
		jQuery('input[type="checkbox"]').parent().find("label").css({"position":"relative","top":"-5px"});
		jQuery('input[type="checkbox"]').wrap('<div class="check-box"><i></i></div>');
		jQuery.fn.toggleCheckbox = function () {
			this.attr('checked', !this.attr('checked'));
		}
		jQuery('.check-box').on('click touchend', function () {
			jQuery(this).find(':checkbox').toggleCheckbox();
			jQuery(this).toggleClass('checkedBox');
		});
	}
	
	//Only allow numeric entries for number area text fields
	jQuery(".number-area").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
	

	
	//Close the error message box on the front end
	jQuery(document).on("click", ".rockthemes-fb-error-details .close", function(){
		var that = jQuery(this).parent();
		jQuery(this).parent().slideUp(function(){
			that.remove();
		});
	});

	var sending_icon = "<?php  if(isset($main_settings['sending_icon'])){echo esc_attr($main_settings['sending_icon']);} ?>";
	
	//Send Button
	jQuery(document).on("click", ".rockthemes-fb-send", function(e){
		e.preventDefault();
		
		var form	= 	jQuery(this).parent();
		var id		=	jQuery(this).parent().attr("data-form-ref");
		
		//Check if we have a Rockthemes Wordpress Theme activated
		if(form.hasClass("rockthemes-active")){
			jQuery(this).find(".sending").addClass(sending_icon);
		}
		
		//console.log('SENDING');
		rockthemes_fb_send_from(form,id);
	});
	
	function rockthemes_fb_send_from(form,id){
		var data						=	new Object();
		data.entries					=	new Array();
		data.id							=	id;

		if(form.find("#recaptcha_challenge_field").length){
			data.recaptcha_challenge_field	=	form.find("#recaptcha_challenge_field").val();
			data.recaptcha_response_field	=	form.find("#recaptcha_response_field").val();
		}
		
		//Remove required and email warnings for empty fields
		form.find(".rockthemes-fb-required").removeClass("rockthemes-fb-required");
		form.find(".rockthemes-fb-email").removeClass("rockthemes-fb-email");
		
		if(jQuery(".rockthemes-fb-error-details").length) jQuery(".rockthemes-fb-error-details").remove();

		
		form.find(".rockthemes-fb-element").each(function(index){
			var element = new Object();
			switch(jQuery(this).attr("data-element-type")){
				case "text_field":
				element.value = jQuery(this).val();
				if(element.value === jQuery(this).attr("title")){
					element.value = "";	
				}
				break;
				
				case "text_area":
				element.value = jQuery(this).val().replace(/\n/gi,'<br />');
				if(element.value === jQuery(this).attr("title")){
					element.value = "";	
				}
				break;	
				
				case "checkbox":
				element.value = jQuery(this).attr("title");
				if(!jQuery(this).is(":checked")){
					element.value = '<span style="text-decoration: line-through;">'+jQuery(this).attr("title")+'</span>';	
				}
				break;	
				
				case "select":
				element.value = jQuery(this).find(":selected").val();
				break;
				
				case "radio_button":
				element.value = jQuery(this).find(":checked").val();
				if(typeof element.value === "undefined"){
					element.value = "";	
				}
				break;
				
				case "datepicker":
				element.value = jQuery(this).val();
				break;


			}
			
			element.id = jQuery(this).attr("id");
			element.title = jQuery(this).attr("title");
			element.type = jQuery(this).attr("data-element-type");
			
			data.entries.push(element);
		});
		


		jQuery.post(ajax_url, {"data":JSON.stringify(data), _ajax_nonce:"<?php echo esc_js($GLOBALS['rockthemes_fb_nonce']); ?>", "action":"rockthemes_fb_form_validation"}, function(data){
			email_sent_callback_function(data,id);
		});
	}
	
	function email_sent_callback_function(data,id){

			//data = {task:'clear', success:'email sent', url:'http://192.168.1.41/wordpress_3_6/wp-content/themes/quasartheme/images/demo/quasar-logo.png'};
			//Check if there are any errors
			if(data.errors){
				
				var i = 0;
				
				var error_message_before = '<div class="rockthemes-fb-error-details">';
				
				var error_message = '';
				
				//Add "rockthemes-fb-required" class to all required empty fields
				if(data.errors['required_fields']){
					error_message += '<div class="error-title">'+data.errors['error_messages']['required_error_message']+' </div>';
					
					var required_fields = data.errors['required_fields'];
					var total_required_fields = required_fields.length;
					for(i = 0; i < required_fields.length; i++){
						jQuery("#rockthemes-fb-"+id+" #"+required_fields[i]).addClass("rockthemes-fb-required");
						var req_title = jQuery("#rockthemes-fb-"+id+" #"+required_fields[i]).attr("title");

						if(req_title.charAt(req_title.length - 1) == ':'){
							req_title = req_title.substring(0, (req_title.length - 1 - 1));	
						}
						error_message += req_title;
						if(i+1 < total_required_fields){
							error_message += ', ';	
						}
					}
					
					error_message += '<br/><br/>';
				}
				
				//Add "rockthemes-fb-email" class to all empty email fields
				if(data.errors['email_fields']){
					error_message += '<div class="error-title">'+data.errors['error_messages']['email_invalid_message']+' </div>';
					
					var email_fields = data.errors['email_fields'];
					var total_email_fields = email_fields.length;
					for(i = 0; i < email_fields.length; i++){
						jQuery("#rockthemes-fb-"+id+" #"+email_fields[i]).addClass("rockthemes-fb-email");
						var email_title = jQuery("#rockthemes-fb-"+id+" #"+email_fields[i]).attr("title");
						if(email_title.charAt(email_title.length - 1) == ':'){
							email_title = email_title.substring(0, (email_title.length - 1 - 1));		
						}
						error_message += email_title;
						if(i+1 < total_email_fields){
							error_message += ', ';	
						}
					}
					
					error_message += '<br/>';
				}
				
				if(data.errors['security']){
					var security_errors = data.errors['security'];
					for(i = 0; i < security_errors.length; i++){

					}
				}
				
				if(data.errors['recaptcha']){
					error_message += '<div class="error-title">'+data.errors['error_messages']['captcha_invalid_message']+'</div><br/>';
									
					Recaptcha.reload();//rockthemes-fb-captcha
				}
				
				error_message_after = '<div class="close">×</div>';
				error_message_after += '</div>';
				
				if(error_message !== ''){
					error_message = error_message_before+error_message+error_message_after;
					jQuery("#rockthemes-fb-"+id).prepend(error_message);
					jQuery(".rockthemes-fb-error-details").slideDown();
					jQuery('html, body').animate({scrollTop:parseInt(jQuery(".rockthemes-fb-error-details").offset().top) - 180},380);
				}
				
				if(data.errors['server']){
					jQuery("#rockthemes-fb-"+id).find(".sending-result").html(data.errors['server']);
				}
				
			}else if(data.task){
				/*
				**	There are after email sent tasks. Complete them.
				**	@since	:	1.0.5
				*/
				switch(data.task){
					case 'clear':
					rockthemes_fb_empty_form_fields(id);
					break;
					
					case 'redirect':
					window.location = data.url;
					break;
					
					case 'download':
					window.location.assign(data.url);
					break;
					
					case 'download_clear':
					jQuery('.rockthemes-fb-element').val('');
					window.location.assign(data.url);
					break;
										
					default:
					//Do nothing
					break;
				}
				
				jQuery("#rockthemes-fb-"+id).find(".sending-result").html(data.success);
			}else{
				jQuery("#rockthemes-fb-"+id).find(".sending-result").html(data.success);
			}
			
			//Remove sending action from the button
			if(jQuery("#rockthemes-fb-"+id).find(".sending").hasClass(sending_icon)){
				jQuery("#rockthemes-fb-"+id).find(".sending").removeClass(sending_icon);
			}
	}
}

function rockthemes_fb_empty_form_fields(id){
	var form = jQuery('#rockthemes-fb-'+id);
	if(!form.length) return;
	
	//Text field, Text Areas
	form.find('.rockthemes-fb-element:not(.checkbox-element):not(.radio-element):not(.select-element)').val('');
	
	//Empty Checkbox
	form.find('.check-box').each(function(){
		jQuery(this).find(':checkbox').attr('checked',false);
		jQuery(this).removeClass('checkedBox');
	});
	
	//Empty Radio Buttons
	jQuery(".radio-btn").each(function () {
		var _this = jQuery(this),
		block = _this.parent().parent();
		block.find('input:radio').attr('checked', false);
		block.find(".radio-btn").removeClass('checkedRadio');
	});

	
	//Empty Select elements
	form.find('select').each(function(){
		jQuery(this).find(':selected').attr('selected', false);
	});
}


</script>
<?php
	endif;
}


/*
**	Form Validation
**
**
**
*/

function rockthemes_fb_form_validation(){
	if(!isset($_REQUEST['_ajax_nonce']) ||
		empty($_REQUEST['_ajax_nonce']) || 
		!wp_verify_nonce($_REQUEST['_ajax_nonce'], 'rockthemes_fb_nonce') ||
		!check_ajax_referer('rockthemes_fb_nonce')) {
		
		$errors['security'][] = 'Invalid Nonce';
		wp_send_json(array('errors' => $errors));
		return;
		exit;	
	}
	
	$errors = array();

	//Security Errors will directly return without processing further codes.
	if(!isset($_POST['data']) || empty($_POST['data'])) {
		$errors['security'][] = 'Empty Data';
		wp_send_json(array('errors' => $errors));
		return;
		exit;	
	}
	//Declare $data variable
	$data = json_decode(stripslashes($_POST['data']),true);

	if(!isset($data['entries']) || !isset($data['id'])){
		$errors['security'][] = 'Empty Data';
		wp_send_json(array('errors' => $errors));
		return;
		exit;	
	}
	//HTML tag security
	for($i = 0; $i < count($data['entries']); $i++){
		//$data['entries'][$i]['value'] = mysql_real_escape_string(wp_filter_nohtml_kses($data['entries'][$i]['value']));
	}
			
	$entries	=	$data['entries'];
	$id			=	intval($data['id']);
	
	$db_name	=	'rockthemes_fb_'.$id;
	
	$form_database_data	=	get_option($db_name,true);
		
	$data['main_email_address']				=	$form_database_data['main_email_address'];
	$data['email_title']					=	$form_database_data['email_title'];
	$data['activate_auto_reply']			=	$form_database_data['activate_auto_reply'];
	$data['email_sent_message']				=	$form_database_data['email_sent_message'];
	$data['email_sending_error_message']	=	$form_database_data['email_sending_error_message'];
	$data['after_sent_select']				=	isset($form_database_data['after_sent_select']) ? $form_database_data['after_sent_select'] : '';
	$data['after_sent_url']					=	isset($form_database_data['after_sent_url']) ? $form_database_data['after_sent_url'] : '';	
	$data['after_sent_download_url']		=	isset($form_database_data['after_sent_download_url']) ? $form_database_data['after_sent_download_url'] : '';
	
	
	if(empty($form_database_data)){
		$errors['security'][]	=	'Not found in the database';
		wp_send_json(array('errors' => $errors));
		return;
		exit;
	}

	//Check if recaptcha activated
	if(isset($form_database_data['captcha_activated']) && $form_database_data['captcha_activated'] === 'true'){

		include(RFB_DIR.'libs/'.'recaptchalib.php');
		$public_key			=	$form_database_data['recaptcha_public_key'];
		$private_key		=	$form_database_data['recaptcha_private_key'];
		$captcha_challenge	=	$data['recaptcha_challenge_field'];
		$captcha_response	=	$data['recaptcha_response_field'];
		$recaptcha_respond	=	recaptcha_check_answer($private_key, $_SERVER["REMOTE_ADDR"],$captcha_challenge, $captcha_response);
		
		if($recaptcha_respond->is_valid){
			//continue
		}else{
			$errors['recaptcha'][]	=	'reCAPTCHA DOES NOT MATCH';
			$errors['error_messages']['captcha_invalid_message']	=	$form_database_data['captcha_invalid_message'];
			wp_send_json(array('errors' => $errors));
			return;
			exit;
		}
	}

	
	$required_fields	=	isset($form_database_data['required']) ? $form_database_data['required'] : array();
	$email_fields		=	isset($form_database_data['email']) ? $form_database_data['email'] : array();
	
	
	//Check if all required fields has been filled
	foreach($required_fields as $required){
		$found = false;
		foreach($entries as $entry){
			if($entry['id'] === $required){
				if($entry['value'] !== ''){
					if($entry['type'] === 'text_field' || $entry['type'] === 'text_area'){
						if($entry['value'] !== $entry['title']){
							$found = true;
							break;
						}
					}elseif($entry['type'] === 'checkbox'){
						if(stripslashes($entry['value']) == stripslashes($entry['title'])){
							$found = true;
							break;	
						}
						//wp_send_json(($required['element_title']));
						//if($entry['value'] 
					}else{
						$found = true;
						break;
					}
				}
			}
			
		}
		
		if(!$found){
			$errors['error_messages']['required_error_message']	=	$form_database_data['required_error_message'];
			$errors['required_fields'][] = $required;	
		}
	}
	
	foreach($email_fields as $email){
		$found = false;
		foreach($entries as $entry){
			if($entry['id'] === $email && filter_var($entry['value'], FILTER_VALIDATE_EMAIL) &&  $entry['value'] !== '' && $entry['value'] !== $entry['title'] ){
				$data['sender_email']	=	$entry['value'];
				$data['reply_content']	=	$form_database_data['rockthemes_fb_tinymce_content'];
				$found = true;
				break;	
			}
		}
		
		if(!$found){
			$errors['error_messages']['email_invalid_message']	=	$form_database_data['email_invalid_message'];
			$errors['email_fields'][] = $email;	
		}
	}

	$attachments = array();
	//Upload if there are any files
	/*
	if(!empty($_FILES['file'])){
		$upload_dir = wp_upload_dir();
		foreach ($_FILES as $file) { 
			$name = $file["name"];  
			$attachments[] = $upload_dir['path'].'/'.date('YmdHms').'_' . $file['name'];
			move_uploaded_file( $file["tmp_name"], $upload_dir['path'].'/' . date('YmdHms').'_'.$file['name']);  
		}  
	}
	*/
	//There are something missing. Return back this data to handle these missing fields
	if(!empty($errors)){
		wp_send_json(array('errors' => $errors));
		return;
		exit;
	}
	return rockthemes_fb_send_email($data,$attachments);
	exit;
}
add_action('wp_ajax_rockthemes_fb_form_validation', 'rockthemes_fb_form_validation');
add_action('wp_ajax_nopriv_rockthemes_fb_form_validation', 'rockthemes_fb_form_validation');

/*
**	Send email form to the email
**
**	@param	:	$data Data object with ['entries'] and ['id']
**	@return	:	Echo the result of the form
*/
function rfb_wp_sender_name($name) {
	$main_settings = get_option('rockthemes_fb_settings');
	return $main_settings['sender_name'];
}
/*
function rfb_wp_sender_mail($mail) {
	$sender = get_option('admin_email');
	return 'xanderrock@yahoo.com';
	if(isset($sender)){
		return (string)$sender;	
	}else{
		return $mail;
	}
}
*/
function rockthemes_fb_send_email($data,$attachments=array()){
	if(empty($data)){
		//Never trust user entry
		$errors['security'][] = 'Empty Data';
		wp_send_json(array('errors' => $errors));
	}
	
	$main_settings = get_option('rockthemes_fb_settings');

	$to	=	sanitize_email($data['main_email_address']);
	
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	
	// Additional headers
	if(isset($data['sender_email']) && !empty($data['sender_email'])){
		$headers .= 'Reply-To: <'.sanitize_email($data['sender_email']).'>'."\r\n";	
	}



	if(isset($main_settings['sender_select']) && $main_settings['sender_select'] !== 'wordpress'
		&& isset($main_settings['sender_name']) && $main_settings['sender_name'] !== ''){
		
		add_filter('wp_mail_from_name','rfb_wp_sender_name');
		//add_filter('wp_mail_from','rfb_wp_sender_mail');
		
	}else{
		$headers .= 'From: '.$to.'' . "\r\n";
	}

	

	
	$body = '';
	
	$email_title = isset($data['email_title']) ? $data['email_title'] : 'A new email';

	$body	.=	rockthemes_fb_form_layout_html_table($data);
	
	
	
	if(!empty($attachments)){
		$mail_callback = wp_mail($to, $email_title, $body, $headers, $attachments);
		foreach($attachments as $file){
			unlink($file);	
		}
	}else{
		$mail_callback = wp_mail($to, $email_title, $body, $headers);
	}

	//TO DO	:	last attribute is the attachment attribute.		
	if($mail_callback) {
		
		/*
		**	Auto Reply Mail 
		**	We do not spread this to another function for security. If we got here so far, that means our data is secur.
		**	And now we can send email to the user
		**
		*/
		
		if(isset($data['sender_email']) && !empty($data['sender_email']) &&
			isset($data['reply_content']) && !empty($data['reply_content']) &&
			isset($data['activate_auto_reply']) && $data['activate_auto_reply'] === 'true'){
			//	$ar referes to Auto Reply
			$ar_to	=	$data['sender_email'];
			
			$ar_headers  = 'MIME-Version: 1.0' . "\r\n";
			$ar_headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			
			// Additional headers
			$ar_headers .= 'From: '.sanitize_email($data['main_email_address']).'' . "\r\n";
					
			$ar_body	=	(stripslashes($data['reply_content']));
						
			$mail_callback = wp_mail($ar_to, $email_title, $ar_body, $ar_headers);
		}
		
		
		$success = $data['email_sent_message'];
		//if(ROCKTHEMES_THEME_ACTIVE){
			$success = '<i class="'.(isset($main_settings['check_mark_icon']) ? sanitize_html_class($main_settings['check_mark_icon']) : '').'"></i> '.esc_html($success);	
		//}
		
		if(isset($data['after_sent_select'])){
			$after_send_array = array(
				'task' => sanitize_text_field($data['after_sent_select']),
				'success' => $success,
			);
			
			if($data['after_sent_select'] === 'redirect'){
				$after_send_array['url'] = esc_url($data['after_sent_url']);
			}elseif($data['after_sent_select'] === ''){
				$after_send_array['url'] = esc_url($data['after_sent_download_url']);
			}

			wp_send_json($after_send_array);
		}else{
			die($success);
		}
	} else {
		$send_error_message =	$data['email_sending_error_message'];
		//if(ROCKTHEMES_THEME_ACTIVE){
			$send_error_message =	'<i class="'.(isset($main_settings['error_icon']) ? sanitize_html_class($main_settings['error_icon']) : '').'"></i> '.esc_html($data['email_sending_error_message']);
		//}
		$errors['server'][]	=	$send_error_message;
		wp_send_json(array('errors' => $errors));
		return;
		exit;
	}

}



function rockthemes_fb_form_layout_html_table($data){
	if(empty($data)){
		//Never trust user entry
		$errors['security'][] = 'Empty Data';
		wp_send_json(array('errors' => $errors));
	}
	
	$db_name	=	'rockthemes_fb_'.intval($data['id']);
	$entries	=	$data['entries'];
	
	$saved_settings = get_option($db_name,true);
	
	$return = '<div style="width:80%; margin-top:0px; margin-bottom:0px; margin-left:auto; margin-right:auto;">';
		
	foreach($saved_settings['grids'] as $grids){
		
		$return .= '<table border="0" cellpadding="10" width="100%" style="border:none">';
			
		$return .= '<tr>';
						
		foreach($grids['columns'] as $columns){
			
			$return .= '<td style="border:1px dashed #ccc; width:'.(100 / (12/((int)$grids['columns_class']))).'%">';
			
			if(is_array($columns)):
				$count_elems = 0;
				$total_elems = count($columns);
				foreach($columns as $elem){
					
					$found = false;
										
					$return .= '<strong>'.esc_html(stripslashes($elem['element_title'])).'</strong><br/>';
					
					foreach($entries as $entry){
						if($entry['id'] === $elem['id']){
							$return .= sanitize_text_field($entry['value']);
						}
					}
					
					$count_elems++;
					
					if($count_elems < $total_elems){
						$return .= '<br/><br/>';	
					}
					
				}
			endif;
			
			$return .= '</td>';//columns
							
		}
		
		
		$return .= '</tr>';//tr
			
		$return .= '</table>';//table
		
	}
	
	$return .= '</div>';//main canvas style
		
	return $return;
}



/*
**	All Front End elements. If any of this functions will be missing, functions will not allow that element to be added
**
**	@Related	:	"rockthemes_fb_get_elements_list" function in "rock-form-builder-functions.php" file
*/

function rockthemes_fb_make_text_area($args = array()){
		
	extract($args);
	
	$return = '';
	
	$required_symbol = (isset($is_required) && $is_required === 'true') ? '* ' : '';

		
	$return .= '<div class="rockthemes_fb_element_container">';//'<h3>'.$label.'</h3>';
	
		$return .= '<textarea data-element-type="text_area" class="rockthemes-fb-element input-element" title="'.$required_symbol.esc_attr(stripslashes($element_title)).'" id="'.esc_attr($id).'" placeholder="'.$required_symbol.esc_attr(stripslashes($element_title)).'"></textarea>';
	
	$return .= '</div>';//close rockthemes_fb_element_container
		
	return $return;
}


function rockthemes_fb_make_text_field($args = array()){
		
	extract($args);
		
	$password_class = $is_mail === 'password-area' ? 'password-area' : '';
	
	$numeric_class	=	$is_mail === 'number-area' ? 'number-area' : '';
	
	$required_symbol = (isset($is_required) && $is_required === 'true') ? '* ' : '';
			
	$return = '';
		
	$return .= '<div class="rockthemes_fb_element_container">';//'<h3>'.$label.'</h3>';
	
		$return .= '<input type="text" data-element-type="text_field" class="rockthemes-fb-element input-element '.$password_class.' '.$numeric_class.'" title="'.$required_symbol.esc_attr(stripslashes($element_title)).'" id="'.esc_attr($id).'" placeholder="'.$required_symbol.esc_attr(stripslashes($element_title)).'" />';
	
	$return .= '</div>';//close rockthemes_fb_element_container
		
	return $return;
}

function rockthemes_fb_make_checkbox($args = array()){
	
	extract($args);
	
	$required_symbol = (isset($is_required) && $is_required === 'true') ? '* ' : '';
	
	$return = '';
		
	$return .= '<div class="rockthemes_fb_element_container">';
	
		$return .= '<p><input autocomplete="off" name="'.esc_attr($id).'" id="'.esc_attr($id).'" type="checkbox" title="'.esc_attr(stripslashes($element_title)).'" data-element-type="checkbox" class="rockthemes-fb-element input-element checkbox-element" name="'.esc_attr(stripslashes($element_title)).'" value="true"/>';
		$return .= ' <label for="'.$id.'">'.$required_symbol.' '.esc_html(stripslashes($element_title)).'</label>';
		$return .= '</p>';
		
	$return .= '</div>';//close rockthemes_fb_element_container
		
	return $return;
		
	return $return;
}

function rockthemes_fb_make_select($args = array()){
		
	extract($args);
	
	$required_symbol = (isset($is_required) && $is_required === 'true') ? '* ' : '';

	$return = '';
			
	$return .= '<div class="rockthemes_fb_element_container">';
	
		$return .= '<p><select autocomplete="off" name="'.esc_attr($id).'" id="'.esc_attr($id).'" data-element-type="select" title="'.$required_symbol.esc_attr(stripslashes($element_title)).'" class="rockthemes-fb-element select-element" >';

			if($define_select === 'new-define'){
				$return .= '<option value="">'.$required_symbol.esc_html(stripslashes($element_title)).'</option>';
				foreach($select_elements as $option){
					$return .= '<option value="'.$option.'">'.$option.'</option>';	
				}
			}else{
				$function_name = 'rockthemes_fb_predefined_'.$define_select;
				if(function_exists($function_name)){
					$return .= $function_name($required_symbol.esc_attr(stripslashes($element_title)));
				}
			}
		
		$return .= '</select></p>';
		
	$return .= '</div>';

		
	return $return;
}

function rockthemes_fb_make_radio_button($args = array()){	
	extract($args);
	
	$required_symbol = (isset($is_required) && $is_required === 'true') ? '* ' : '';

	$return = '';
	
	if(!count($radio_elements)) return $return;
			
	$return .= '<div class="rockthemes_fb_element_container">';
	
		$return .= '<div name="'.esc_attr($id).'" id="'.esc_attr($id).'" data-element-type="radio_button" title="'.$required_symbol.esc_attr(stripslashes($element_title)).'" class="rockthemes-fb-element radio-element" >';
		
		if($required_symbol.esc_attr(stripslashes($element_title)) !== ''){
			$return .= '<strong class="rockthemes-fb-field-header-title">'.$required_symbol.esc_html(stripslashes($element_title)).'</strong>';
		}
		
			foreach($radio_elements as $option){
				$return .= '<p class="'.($is_horizontal === 'true' ? 'radio-button-horizontal' : '').'"><input autocomplete="off" type="radio" name="name-'.esc_attr($id).'" value="'.esc_attr($option).'" />';	
				$return .= ' <label for="'.$id.'">'.esc_html(stripslashes($option)).'</label>';
				$return .= '</p>';
			}
			
			if($is_horizontal === 'true'){
				$return .= '<div class="clear"></div>';	
			}
			
		$return .= '</div>';
		
	$return .= '</div>';

		
	return $return;
}


function rockthemes_fb_make_datepicker($atts = array()){
	
	//Enqueue required libraries
	wp_enqueue_style( 'foundation-datepicker-css', RFB_URI.'/css/foundation-datepicker.css', '', '', 'all' );
	wp_enqueue_script('foundation-datepicker', RFB_URI.'/js/foundation-datepicker.js','jquery', array('jquery'));
		
	$element_title		=	'Title';
	
	extract($atts);
		
	$required_symbol = (isset($is_required) && $is_required === 'true') ? '* ' : '';

	$return		=	'';
	
	$return .= '<div class="rockthemes_fb_element_container">';
	
		$return .= '<input autocomplete="off" type="text" name="'.esc_attr($id).'" id="'.esc_attr($id).'" title="'.$required_symbol.esc_attr(stripslashes($element_title)).'" placeholder="'.$required_symbol.esc_attr(stripslashes($element_title)).'" data-element-type="datepicker" class="rockthemes-fb-element input-element rockthemes-fb-datepicker" />';
	
	$return	.= '</div>';
	
	return $return;
}






function rockthemes_fb_make_field_header_text($atts = array()){
	
	$element_title = 'Title';
	
	extract($atts);
	
	$return		=	'';
	
	$return		.=	'<div class="rockthemes-fb-field-header-title">'.esc_html(stripslashes($element_title)).'</div>';
	
	return $return;
}

?>
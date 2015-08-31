<?php

/*
**	General Settings 
**
**	This function will display the UI of the general settings 
**
**	@since	:	1.0.5
**	@return	:	Returns the Settings UI 
**
*/
function rockthemes_fb_general_settings_ui(){
	
	//load wordpress's new colorpicker
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script('wp-color-picker');

	
	$return = '<div class="rockthemes-fb-main-container">
		<h1>Rock Form Builder General Settings</h1>
		<hr/>
		<br/>
	';
	
	$default = array(
		'enqueue_lib_url'		=>	'',
		
		'check_mark_icon'		=>	apply_filters('rock_form_builder_icon_check','fa fa-check'),
		'error_icon'			=>	apply_filters('rock_form_builder_icon_error','fa fa-times'),
		'sending_icon'			=>	apply_filters('rock_form_builder_icon_sending','fa fa-refresh fa-spin'),
		
		'sender_select'			=>	'wordpress',
		'sender_name'			=>	'',
		
		'if_bg_color'			=>	'#ffffff',
		'if_bg_hover_color'		=>	'#f9f9f9',
		'if_f_color'			=>	'#c5cdd1',
		'if_f_hover_color'		=>	'#c5cdd1',
	);
	
	
	$settings = get_option('rockthemes_fb_settings', array());
		
	if(empty($settings)){
		update_option('rockthemes_fb_settings', $default);	
	}

	$settings = array_merge($default, $settings);
	
	extract($settings);
	
	$settings = '
		<p><strong>Check Mark Icon :</strong></p>
		<input type="text" autocomplete="off" name="check_mark_icon" class="check_mark_icon" value="'.$check_mark_icon.'" />
		<br/><br/>
		
		<p><strong>Error Icon :</strong></p>
		<input type="text" autocomplete="off" name="error_icon" class="error_icon" value="'.$error_icon.'" />
		<br/><br/>
		
		<p><strong>Sending Icon :</strong></p>
		<input type="text" autocomplete="off" name="sending_icon" class="sending_icon" value="'.$sending_icon.'" />
		<br/><br/>
				
		<p><strong>Enqueue Font Library (Only enter font library if your theme does not enqueue any font library for icons) :</strong></p>
		<input type="text" autocomplete="off" name="enqueue_lib_url" class="enqueue_lib_url" value="'.$enqueue_lib_url.'" />
		<br/><br/>
		
		<p><strong>Input Field Background Color :</strong></p>
		<input autocomplete="off" type="text" id="if_bg_color" value="'.$if_bg_color.'" class="if_bg_color rfb_color" data-default-color="'.$if_bg_color.'" />
		<br/><br/>
		
		<p><strong>Input Field Background Hover/Focus Color :</strong></p>
		<input autocomplete="off" type="text" id="if_bg_hover_color" value="'.$if_bg_hover_color.'" class="if_bg_hover_color rfb_color" data-default-color="'.$if_bg_hover_color.'" />
		<br/><br/>
		
		<p><strong>Input Field Font Color :</strong></p>
		<input autocomplete="off" type="text" id="if_f_color" value="'.$if_f_color.'" class="if_f_color rfb_color" data-default-color="'.$if_f_color.'" />
		<br/><br/>
		
		<p><strong>Input Field Font Hover/Focus Color :</strong></p>
		<input autocomplete="off" type="text" id="if_f_hover_color" value="'.$if_f_hover_color.'" class="if_f_hover_color rfb_color" data-default-color="'.$if_f_hover_color.'" />
		<br/><br/>
		
		<p><strong>Who Will Be Sender? :</strong></p>
		<select type="text" autocomplete="off" name="sender_select" class="sender_select" >
			<option value="wordpress" '.($sender_select === 'wordpress' ? 'selected="selected"' : '').'>Wordpress</option>
			<option value="different" '.($sender_select === 'different' ? 'selected="selected"' : '').'>Different Sender</option>
		</select><br/>
		<p>Sender Name :</p>
		<input type="text" autocomplete="off" name="sender_name" class="sender_name" value="'.$sender_name.'" />
		<p>Changing the sender from Wordpress to something else may cause you to receive some email into your junk folder. 
		Moreover if your email service will filter/ban that sender you will not be able to receive emails. We strongly advise to
		leaving sender as Wordpres. But if you want to change it, you can use choose "Different Sender"</p>
		<br/><br/>
		
		
	';
	
	$return .= '
		<div class="row-fluid">
			<div class="span6">
				'.$settings.'
			</div>
			<div class="span6">
			
			</div>
		</div>
	';
	
	$return .= '
		<div class="rockthemes_fb_save_setting btn btn-success">Save Changes <i class="rockthemes-fb-save-icon"></i></div>
	';


	$return .= '</div>';
	
	echo $return;
	
	rockthemes_fb_general_settings_js();
}



function rockthemes_fb_save_general_settings(){
	if(!is_admin()) die;
	$data = $_POST['data'];

	$update = update_option('rockthemes_fb_settings', $data);
	if($update){
		die('success');
	}else{
		die('error');	
	}
}
add_action('wp_ajax_rockthemes_fb_save_general_settings', 'rockthemes_fb_save_general_settings');





function rockthemes_fb_general_settings_js(){
	
?>
<script type="text/javascript">

jQuery(document).ready(function(){
	
	//Enable Colorpicker
	jQuery('.rfb_color').each(function(){
		jQuery(this).wpColorPicker();
	});
	
	jQuery(document).on("click",".rockthemes_fb_save_setting", function(){
		
		
		var that = jQuery(this);
		var button_content = that.html();
		that.html(button_content+' <i class="fa fa-refresh fa-spin"></i>');	
		var main = that.parents('.rockthemes-fb-main-container');	
		
		var data = {
			check_mark_icon:main.find('.check_mark_icon').val(),
			error_icon:main.find('.error_icon').val(),
			sending_icon:main.find('.sending_icon').val(),
			enqueue_lib_url:main.find('.enqueue_lib_url').val(),
			sender_select:main.find('.sender_select').find(':selected').val(),
			sender_name:main.find('.sender_name').val(),
			if_bg_color:main.find('.if_bg_color').val(),
			if_bg_hover_color:main.find('.if_bg_hover_color').val(),
			if_f_color:main.find('.if_f_color').val(),
			if_f_hover_color:main.find('.if_f_hover_color').val()
		};

		jQuery.post(ajaxurl, {data:data, action:"rockthemes_fb_save_general_settings"}, function(data){

			if(that.find(".fa-refresh").length) that.find(".fa-refresh").remove();
			
			if(data == 'success'){
				//var newLink = "?page=rock_form_builder";
				//var siteLocation = document.location.toString().substr(0,document.location.toString().lastIndexOf("?"))
				//document.location = siteLocation+newLink;
			}
		});
	});
});

</script>

<?php
}


?>
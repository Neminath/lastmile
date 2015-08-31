<?php
/*
*/


/*
**	Generates a select drop down with element types
**
**	@return	:	Returns a select element with configured values
*/

function rockthemes_fb_get_elements_list(){
	
	/*
	TextField
	TextArea
	Select
	Checkbox
	Radio Button
	*/
	
	$defined_elems	=	array(
		'text_field'		=>	'Text Field',
		'text_area'			=>	'Text Area',
		'select'			=>	'Select',
		'checkbox'			=>	'Checkbox',
		'radio_button'		=>	'Radio Button',
		'datepicker'		=>	'Datepicker',
		'field_header_text'	=>	'Field Header Text',
	);
	
	$elements_html = '';

	//Element prefix	:	rockthemes_fb_elem_
	$prefix = 'rockthemes_fb_make_';
	foreach($defined_elems as $defined_key => $defined_value){
		if(function_exists($prefix.$defined_key)){
			$elements_html .= '<option value="'.$defined_key.'">'.$defined_value.'</option>';
		}
	}

	$elements_html = apply_filters('rockthemes_fb_elements', $elements_html);

	$return = '<select class="select-element">';
	
	$return .= $elements_html;
	
	$return .= '</select>';
	
	return $return;
	
}


/*
**	Generates a select drop down with grids
**
**	@return	:	Returns a select element with configured values
*/

function rockthemes_fb_get_grid_list(){
	
	/*
	TextField
	TextArea
	Select
	Checkbox
	Radio Button
	*/
	
	$defined_grids	=	array(
		'12'		=>	'1 Block',
		'6'			=>	'2 Blocks',
		'4'			=>	'3 Blocks',
	);
	
	$grid_html = '';
	
	foreach($defined_grids as $defined_key => $defined_value){
		$grid_html .= '<option value="'.$defined_key.'">'.$defined_value.'</option>';
	}

	$grid_html = apply_filters('rockthemes_fb_elements', $grid_html);

	$return = '<select class="select-grid">';
	
	$return .= $grid_html;
	
	$return .= '</select>';
	
	return $return;
}

/*
**	Make grid functions will generate the grid according to the layout model
**
**	@return	:	Returns the grid elements
*/
function rockthemes_fb_make_grid($args=array(),$is_admin=false){
	
	extract($args);
	
	$framework 				=	true === $is_admin ? 'bootstrap' : 'foundation';
	
	$admin_columns_class	=	true === $is_admin ? 'rockthemes_fb_grid' : '';
	
	$row 					=	'foundation' === $framework ? 'row' : 'row-fluid';
	$columns_class			=	'foundation' === $framework ? 'large-'.sanitize_html_class($columns).' columns '.sanitize_html_class($admin_columns_class) : 'span'.sanitize_html_class($columns).' '.$admin_columns_class;
	
	$element_container_before	=	'<ul class="form-elements-container">';
	$element_container_after	=	'</ul>';
	
	
	$return = '';
	
	
	if((int) $columns === 6){
		$return .= '
			<li class="'.$row.'">
				<div class="'.$columns_class.'" col-ref="'.sanitize_html_class($columns).'">
					'.$element_container_before.'
					'.$element_container_after.'
				</div>
				<div class="'.$columns_class.'" col-ref="'.sanitize_html_class($columns).'">
					'.$element_container_before.'
					'.$element_container_after.'
				</div>
				
				<i class="row-drag-button fa-move"></i>
				<i class="row-remove-button fa fa-times hidden"></i>
			<li>
		';
	}elseif((int) $columns === 4){
		$return .= '
			<li class="'.$row.'">
				<div class="'.$columns_class.'" col-ref="'.sanitize_html_class($columns).'">
					'.$element_container_before.'
					'.$element_container_after.'
				</div>
				<div class="'.$columns_class.'" col-ref="'.sanitize_html_class($columns).'">
					'.$element_container_before.'
					'.$element_container_after.'
				</div>
				<div class="'.$columns_class.'" col-ref="'.sanitize_html_class($columns).'">
					'.$element_container_before.'
					'.$element_container_after.'
				</div>
				
				<i class="row-drag-button fa fa-move"></i>
				<i class="row-remove-button fa fa-times hidden"></i>
			<li>
		';
	}else{
		$return .= '
			<div class="'.$row.'">
				<div class="'.$columns_class.'" col-ref="'.sanitize_html_class($columns).'">
					'.$element_container_before.'
					'.$element_container_after.'
				</div>
				
				<i class="row-drag-button fa fa-move"></i>
				<i class="row-remove-button fa fa-times hidden"></i>
			<li>
		';
	}
	
	return $return;
}

function rockthemes_fb_make_grid_ajax(){
	$data = isset($_POST['data']) ? $_POST['data'] : false;

	if(!$data) return exit;
	
	$args = array(
		'columns'	=>	$data['columns'],
	);
	
	echo rockthemes_fb_make_grid($args,true);
	
	exit;	
}
add_action('wp_ajax_rockthemes_fb_ajax_make_grid','rockthemes_fb_make_grid_ajax');







/*
**	Element Modals Codes
**
*/

function rockthemes_fb_modal_text_field($atts=array()){
	
	$element_title	= 	'Your option name...';
	$is_required	=	'false';
	$is_mail		=	'';
	
	extract($atts);
	
	$modal_content = '
		'.rockthemes_fb_modal_option_title(esc_attr($element_title)).'
		'.rockthemes_fb_modal_option_required($is_required).'
		'.rockthemes_fb_modal_option_is_mail($is_mail).'
	';
	
	$atts['content']		=	$modal_content;
	$atts['id']				=	$atts['id'].'-modal';
	$atts['modal_title']	=	'Text Field';
	
	$return = rockthemes_fb_modal($atts);
	
	return $return;
}
function rockthemes_fb_modal_text_area($atts=array()){
	
	$element_title	= 	'Your option name...';
	$is_required	=	'false';
	$is_mail		=	'';
	
	extract($atts);
	
	$modal_content = '
		'.rockthemes_fb_modal_option_title(esc_attr($element_title)).'
		'.rockthemes_fb_modal_option_required($is_required).'
	';
	
	$atts['content']		=	$modal_content;
	$atts['id']				=	$atts['id'].'-modal';
	$atts['modal_title']	=	'Text Area';
	
	$return = rockthemes_fb_modal($atts);
	
	return $return;
}

function rockthemes_fb_modal_checkbox($atts=array()){
	
	$element_title	= 	'Your option name...';
	$is_required	=	'false';
	
	extract($atts);
	
	$modal_content = '
		'.rockthemes_fb_modal_option_title(esc_attr($element_title)).'
		'.rockthemes_fb_modal_option_required($is_required).'
	';
	
	$atts['content']		=	$modal_content;
	$atts['id']				=	$atts['id'].'-modal';
	$atts['modal_title']	=	'Checkbox';
	
	$return = rockthemes_fb_modal($atts);
	
	return $return;
}

function rockthemes_fb_modal_select($atts=array()){
	
	$element_title	= 	'Your option name...';
	$is_required	=	'false';
	$define_select	=	'new-define';
	
	$predefined_samples	=	'
						<li class="row-fluid">
							<div class="span1 drag-holder">
								<i class="fa fa-move"></i>
							</div>
							<div class="span10">
								<input type="text" class="define_select_new_element" value="Select Option Value.." />
							</div>
							<div class="span1 remove-holder">
								<i class="fa fa-times"></i>
							</div>
						</li>
						<li class="row-fluid">
							<div class="span1 drag-holder">
								<i class="fa fa-move"></i>
							</div>
							<div class="span10">
								<input type="text" class="define_select_new_element" value="Select Option Value.." />
							</div>
							<div class="span1 remove-holder">
								<i class="fa fa-times"></i>
							</div>
						</li>
	';
	
	extract($atts);
		
	if(isset($select_elements) && !empty($select_elements)){
		$predefined_samples = '';
		
		foreach($select_elements as $select){
			$predefined_samples .= '
						<li class="row-fluid">
							<div class="span1 drag-holder">
								<i class="fa fa-move"></i>
							</div>
							<div class="span10">
								<input type="text" class="define_select_new_element" value="'.$select.'" />
							</div>
							<div class="span1 remove-holder">
								<i class="fa fa-times"></i>
							</div>
						</li>
			';
		}
	}
	
	$atts['id']				=	$atts['id'].'-modal';
	$atts['modal_title']	=	'Select';
	
	$modal_content = '
		<div class="row-fluid">
			<div class="span6">
				<select class="define_select" autocomplete="off">
					<option value="new-define" '.($define_select === 'new-define' ? 'selected' : '').'>New Select</option>
					<option value="country_list" '.($define_select === 'country_list' ? 'selected' : '').'>Use Predefined Country List</option>
					<option value="year_list" '.($define_select === 'year_list' ? 'selected' : '').'>Use Predefined Year List</option>
					<option value="month_list" '.($define_select === 'month_list' ? 'selected' : '').'>Use Predefined Month List</option>
					<option value="day_list" '.($define_select === 'day_list' ? 'selected' : '').'>Use Predefined Day List</option>
				</select>
			</div>
			<div class="span6">
				<strong>New Select Element?</strong><br/>
				<p>You can choose new select element to generate a new select element or choose our predefined select lists for your element.</p>
			</div>
		</div>
		<hr />
		<div class="define_select_new row-fluid" '.($define_select !== 'new-define' ? 'style="display:none;"' : '').'>
			<div class="row-fluid">
				<div class="span6">
					<ul class="select_elements">
						'.$predefined_samples.'
					</ul>
					<div class="button button-primary select-element-add-new-option" modal-ref="'.$atts['id'].'">Add New Option</div>
				</div>
				<div class="span6">
					<strong>New Select Element?</strong><br/>
					<p>You can choose new select element to generate a new select element or choose our predefined select lists for your element.</p>
				</div>
			</div>
			<hr />
		</div>
		'.rockthemes_fb_modal_option_title(esc_attr($element_title)).'
		'.rockthemes_fb_modal_option_required($is_required).'
	';
	
	$atts['content']		=	$modal_content;
	
	$return = rockthemes_fb_modal($atts);
	
	return $return;
}

function rockthemes_fb_modal_radio_button($atts=array()){
	
	$element_title	= 	'Your option name...';
	$is_required	=	'false';
	$is_horizontal	=	'true';
	
	$predefined_samples	=	'
						<li class="row-fluid">
							<div class="span1 drag-holder">
								<i class="fa fa-move"></i>
							</div>
							<div class="span10">
								<input type="text" class="define_radio_new_element" value="Radio Option Value.." />
							</div>
							<div class="span1 remove-holder">
								<i class="fa fa-times"></i>
							</div>
						</li>
						<li class="row-fluid">
							<div class="span1 drag-holder">
								<i class="fa fa-move"></i>
							</div>
							<div class="span10">
								<input type="text" class="define_radio_new_element" value="Radio Option Value.." />
							</div>
							<div class="span1 remove-holder">
								<i class="fa fa-times"></i>
							</div>
						</li>
	';
	
	extract($atts);
		
	if(isset($radio_elements) && !empty($radio_elements)){
		$predefined_samples = '';
		
		foreach($radio_elements as $radio){
			$predefined_samples .= '
						<li class="row-fluid">
							<div class="span1 drag-holder">
								<i class="fa fa-move"></i>
							</div>
							<div class="span10">
								<input type="text" class="define_radio_new_element" value="'.$radio.'" />
							</div>
							<div class="span1 remove-holder">
								<i class="fa fa-times"></i>
							</div>
						</li>
			';
		}
	}
	
	$atts['id']				=	$atts['id'].'-modal';
	$atts['modal_title']	=	'Radio';
	
	$modal_content = '
		<div class="row-fluid">
			<div class="span6">
				<ul class="radio_elements">
					'.$predefined_samples.'
				</ul>
				<div class="button button-primary radio-element-add-new-option" modal-ref="'.$atts['id'].'">Add New Option</div>
			</div>
			<div class="span6">
				<strong>Radio Button</strong><br/>
				<p>You can add unlimited radio buttons.</p>
			</div>
		</div>
		<hr />
		'.rockthemes_fb_modal_option_title(esc_attr($element_title)).'
		'.rockthemes_fb_modal_option_required($is_required).'
		<div class="row-fluid">
			<div class="span6">
				<select class="is_horizontal" autocomplete="off">
					<option value="true" '.($is_horizontal === 'true' ? 'selected' : '').'>Horizontal</option>
					<option value="false" '.($is_horizontal === 'false' ? 'selected' : '').'>Vertical</option>
				</select>
			</div>
			<div class="span6">
				<strong>Order Style</strong><br/>
				<p>You can choose to order radio buttons horizontal or veritcal.</p>
			</div>
		</div>
		<hr />
	';
	
	$atts['content']		=	$modal_content;
	
	$return = rockthemes_fb_modal($atts);
	
	return $return;
}
function rockthemes_fb_modal_datepicker($atts=array()){
	
	$element_title	= 	'Your option name...';
	$is_required	=	'false';
	
	extract($atts);
	
	$modal_content = '
		'.rockthemes_fb_modal_option_title(esc_attr($element_title)).'
		'.rockthemes_fb_modal_option_required($is_required).'
	';
	
	$atts['content']		=	$modal_content;
	$atts['id']				=	$atts['id'].'-modal';
	$atts['modal_title']	=	'Datepicker';
	
	$return = rockthemes_fb_modal($atts);
	
	return $return;
}

function rockthemes_fb_modal_field_header_text($atts = array()){
	$element_title	= 	'Your option name...';
	$atts['id']				=	$atts['id'].'-modal';
	$atts['modal_title']	=	'Field Header Text';
	
	extract($atts);
	
	$modal_content	=	'
		'.rockthemes_fb_modal_option_title(esc_attr($element_title)).'
	';
	
	$atts['content']		=	$modal_content;
	
	$return = rockthemes_fb_modal($atts);
	
	return $return;
}








function rockthemes_fb_modal($atts=array()){
	if(empty($atts)) return '';
	extract($atts);
	
	$return = '
	<div id="'.$id.'" class="modal container hide fade" modal-type="'.$type.'" role="dialog">
		<div class="modal-header">
			<div class="close close-grid-modal builder-close"><i class="fa fa-times"></i></div>
			<h3>'.$modal_title.'</h3>
		</div>
		<div class="modal-body" data-saved="false">
			'.$content.'
		</div>
		<div class="modal-footer">
			<div class="btn btn-primary builder-close" ref="'.$id.'">Save changes</div>
		</div>
	</div>';
	
	return $return;
}




/*
**	Global Modal Options
**
**	Some modal options are the same for all modals just like "required" option. These options will be here
*/
function rockthemes_fb_modal_option_required($selected = ''){
	$return = '
		<div class="row-fluid">
			<div class="span6">
				<select class="is_required" autocomplete="off">
					<option value="false" '.($selected === 'false' ? 'selected' : '').'>Not Required</option>
					<option value="true" '.($selected === 'true' ? 'selected' : '').'>Required</option>
				</select>
			</div>
			<div class="span6">
				<strong>Is this option required?</strong><br/>
				<p>You can set an option as required. If you set as required, user have to fill this option</p>
			</div>
		</div>
		<hr />
	';
	
	return $return;
}

function rockthemes_fb_modal_option_is_mail($selected = ''){
/*
**	This function will check if its an email area or number area
**
*/	
	$return = '
		<div class="row-fluid">
			<div class="span6">
				<select class="is_mail" autocomplete="off">
					<option value="" '.($selected === '' ? 'selected' : '').'>Regular Option (No extra validation)</option>
					<option value="email-area" '.($selected === 'email-area' ? 'selected' : '').'>Email Area (Email Validation)</option>
					<option value="number-area" '.($selected === 'number-area' ? 'selected' : '').'>Number Area (Will only accept numeric entry)</option>
					<option value="password-area" '.($selected === 'password-area' ? 'selected' : '').'>Password Area (Will not show the entry)</option>
				</select>
			</div>
			<div class="span6">
				<strong>Option Advanced Validation</strong><br/>
				<p>You can choose advanced validation for email entry, password area and number only area.</p>
			</div>
		</div>
		<hr />
	';	
	
	return $return;
}


function rockthemes_fb_modal_option_title($selected = ''){
/*
**	Most of the modals requires a title field for form element. Thus we use this function for all of them
**
*/
	$return = '
		<div class="row-fluid">
			<div class="span6">
				<input type="text" class="element-title" value="'.stripslashes($selected).'" />
			</div>
			<div class="span6">
				<strong>Your Title/Default Text</strong><br/>
				<p>According to the choice of the form type, this will be showing your field name (i.e. Name, Email)</p>
			</div>
		</div>
		<hr />
	';	
	
	return $return;
}



/*
**
**
*/
function rockthemes_fb_make_admin_element($args=array()){
	extract($args);
	
	$modal = '';
	$function_name = 'rockthemes_fb_modal_'.sanitize_text_field($type);
	if(function_exists($function_name)){
		$modal = $function_name($args);	
	}

	$element = '
		<li id="'.$id.'" element-type="'.sanitize_text_field($type).'" class="rockthemes_fb_element"><i class="drag fa fa-move"></i><span class="type-text-logo">'.esc_html($type).'</span><i class="close fa fa-times"></i></li>
	';
		
	return (array('element' => $element, 'modal' => $modal));
}

function rockthemes_fb_make_admin_element_ajax(){
	$data = isset($_POST['data']) ? $_POST['data'] : false;
	
	if(!$data) return exit;
	
	$args = array(
		'id'	=>	$data['id'],
		'type'	=>	$data['type'],
	);
	
	$return = rockthemes_fb_make_admin_element($args);
	
	echo wp_send_json($return);
	
	exit;	
}
add_action('wp_ajax_rockthemes_fb_ajax_make_admin_element', 'rockthemes_fb_make_admin_element_ajax');




/*
**	Gets the form description and elements columns
**
**
*/
function rockthemes_fb_get_element_columns(){
	global $rockthemes_fb_element_columns;
	$rockthemes_fb_element_columns = 8;
	return 'span'.$rockthemes_fb_element_columns;
}
function rockthemes_fb_get_description_columns(){
	global $rockthemes_fb_element_columns, $rockthemes_fb_description_columns;
	$rockthemes_fb_element_columns = 8;
	$rockthemes_fb_description_columns = 12 - $rockthemes_fb_element_columns;
	return 'span'.$rockthemes_fb_description_columns;
}

/*
**	Get the before and after elements
**
**
*/
function rockthemes_fb_admin_before_element(){
	return '<li class="row-fluid">';	
}
function rockthemes_fb_admin_after_element(){
	return '</li>';	
}



/*
**	Save all of the data
**
*/
function rockthemes_fb_save_data(){
	if(!is_admin()) die;
	
	//Return if no value received
	if(!isset($_POST['data'])) return exit;
	if(!isset($_POST['db_info'])) return exit;
	
	if(!is_admin()) return;
	
	extract($_POST['db_info']);

	$return = '';
	
	$db_name = 'rockthemes_fb_'.intval($form_id);
	
	$return = update_option($db_name, $_POST['data']);
	
	$data = $_POST['data'];
	
	$rockthemes_fb_references = ((get_option('rockthemes_fb_references')));
	foreach($rockthemes_fb_references as $key => $value){
		if((int) $rockthemes_fb_references[$key]['id'] == (int) $data['id']){
			$rockthemes_fb_references[$key]['name'] = 	$data['form_name'];
			$rockthemes_fb_references[$key]['modified'] = date('m/d/Y');
			break;
		}
	}
	update_option('rockthemes_fb_references', ($rockthemes_fb_references));
	
	echo $return;
	
	exit;
}
add_action("wp_ajax_rockthemes_fb_save", "rockthemes_fb_save_data");



if(!function_exists('get_browser_details')):
function get_browser_details() {

	if ( empty( $_SERVER['HTTP_USER_AGENT'] ) )

		return false;



	$key = md5( $_SERVER['HTTP_USER_AGENT'] );



	if ( false === ($response = get_site_transient('browser_' . $key) ) ) {

		global $wp_version;



		$options = array(

			'body'			=> array( 'useragent' => $_SERVER['HTTP_USER_AGENT'] ),

			'user-agent'	=> 'WordPress/' . $wp_version . '; ' . home_url() 

		);



		$response = wp_remote_post( 'http://api.wordpress.org/core/browse-happy/1.0/', $options );



		if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) )

			return false;



		/**

		 * Response should be an array with:

		 *  'name' - string - A user friendly browser name

		 *  'version' - string - The most recent version of the browser

		 *  'current_version' - string - The version of the browser the user is using

		 *  'upgrade' - boolean - Whether the browser needs an upgrade

		 *  'insecure' - boolean - Whether the browser is deemed insecure

		 *  'upgrade_url' - string - The url to visit to upgrade

		 *  'img_src' - string - An image representing the browser

		 *  'img_src_ssl' - string - An image (over SSL) representing the browser

		 */

		$response = unserialize( wp_remote_retrieve_body( $response ) );



		if ( ! $response )

			return false;



		set_site_transient( 'browser_' . $key, $response, 604800 ); // cache for 1 week

	}



	return $response;

}
endif;



/*
**	Enqueue all of the admin files
*/
function rockthemes_fb_enqueue_admin_files(){
	global $pagenow;
	
	//Do not enqueue any files if not in the Rock Form Builder options
	if($pagenow === 'admin.php' && isset($_REQUEST['page']) && 
			($_REQUEST['page'] === 'rock_form_builder' || $_REQUEST['page'] === 'rock_form_builder_i_e' || $_REQUEST['page'] ===  'rock_form_builder_settings')):
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_script('jquery-ui-core');
	
	wp_enqueue_script('jquery-ui-sortable');
				
	wp_enqueue_style( 'bootstrap-css', RFB_URI.'/admin/bootstrap/css/bootstrap.css', '', '', 'all' );
	wp_enqueue_script('bootstrap-min', RFB_URI.'/admin/bootstrap/js/bootstrap.js', array('jquery'), '');

	wp_enqueue_style( 'fontawesome', RFB_URI.'/css/font-awesome.css', '', '', 'all' );

	wp_enqueue_style( 'bootstrap-modal-css', RFB_URI.'/admin/bootstrap-modal-master/css/bootstrap-modal.css', '', '', 'all' );
	
	wp_enqueue_script('bootstrap-modal-master', RFB_URI.'/admin/bootstrap-modal-master/js/bootstrap-modalmanager.js', array('jquery'), '');
	wp_enqueue_script('bootstrap-modal-reg', RFB_URI.'/admin/bootstrap-modal-master/js/bootstrap-modal.js', array('jquery'), '');

	//Form Builder style
	wp_enqueue_style('rock-form-builder-admin-style', RFB_URI.'/admin/css/rockthemes-form-builder-admin-style.css','','','all');
	
	//Form Builder Admin JS
	wp_enqueue_script('rock-form-builder-admin-js', RFB_URI.'/admin/js/rock-form-builder-admin.min.js', array('jquery'), '');
	
	endif;
}

add_action('admin_enqueue_scripts','rockthemes_fb_enqueue_admin_files');

?>
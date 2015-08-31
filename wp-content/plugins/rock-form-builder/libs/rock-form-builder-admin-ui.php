<?php

/*
**	Generates the main admin UI
**
*/
function rockthemes_fb_admin_ui(){	
	global $rockthemes_fb_references, $current_form_id, $formDBName;
	$rockthemes_fb_references = ((get_option('rockthemes_fb_references')));

	$current_form_id = isset($_REQUEST['editFormID']) ? intval($_REQUEST['editFormID']) : false;
	$add_new_form_id = isset($_REQUEST['addFormID']) ? intval($_REQUEST['addFormID']) : false;
	$delete_form_id = isset($_REQUEST['deleteFormID']) ? intval($_REQUEST['deleteFormID']) : false;
	$duplicate_form_id = isset($_REQUEST['duplicateFormID']) ? intval($_REQUEST['duplicateFormID']) : false;
	
	$total_forms = 0;
	
	if($current_form_id !==false || $add_new_form_id !== false || $duplicate_form_id !== false):
		
		if($add_new_form_id !== false || $duplicate_form_id !== false){
			//New Form Object
			$newFormObj = array();
			
			if(!empty($rockthemes_fb_references)){
				//There are older forms exists in the database
				if($duplicate_form_id === false){
					$last = end($rockthemes_fb_references);
					$newFormObj['id'] = intval($last['id'])+1;
					$newFormObj['name'] = 'Rock Form '.$newFormObj['id'];
					$newFormObj['shortcode'] = '[rockthemes_fb id="'.$newFormObj['id'].'"]';
					$newFormObj['created'] = date('m/d/Y');
					$newFormObj['modified'] = date('m/d/Y');
					
					$rockthemes_fb_references[] = $newFormObj;
					update_option('rockthemes_fb_references',($rockthemes_fb_references));
					
					?>
                    <script type="text/javascript">
					//For refreshing the current location after new form
					var newAddress = window.location.toString().replace("addFormID="+<?php echo $add_new_form_id; ?>,
																		"editFormID="+<?php echo $newFormObj['id']; ?>);
					window.history.pushState('Object', 'Rock Form', newAddress);
					</script>
                    <?php
				
				}elseif($duplicate_form_id !== false){
					$last = end($rockthemes_fb_references);
					$newFormObj['id'] = intval($last['id'])+1;
					$newFormObj['name'] = $rockthemes_fb_references[$duplicate_form_id]['name'].' Copy';
					$newFormObj['shortcode'] = '[rockthemes_fb id="'.$newFormObj['id'].'"]';
					$newFormObj['created'] = date('m/d/Y');
					$newFormObj['modified'] = date('m/d/Y');
					
					$rockthemes_fb_references[] = $newFormObj;
					update_option('rockthemes_fb_references',($rockthemes_fb_references));
					
					$duplicate_data = (get_option('rockthemes_fb_'.$duplicate_form_id));
					$duplicate_data['form_name'] = $duplicate_data['form_name'].' Copy';
					$duplicate_data['id'] = $newFormObj['id'];
					$duplicate_data['formDBName'] = 'rockthemes_fb_'.$newFormObj['id'];
					update_option($duplicate_data['formDBName'], ($duplicate_data));
					
					$formDBName = $duplicate_data['formDBName'];
					$current_form_id = $newFormObj['id'];
					
					?>
                    <script type="text/javascript">
					//For refreshing the current location after duplicate
					var newAddress = window.location.toString().replace("duplicateFormID="+<?php echo $duplicate_form_id; ?>,
																		"editFormID="+<?php echo $newFormObj['id']; ?>);
					window.history.pushState('Object', 'Rock Form', newAddress);
					</script>
                    <?php
				}
			}else{
				$rockthemes_fb_references = array();
				$newFormObj['id'] = 0;
				$newFormObj['name'] = 'Rock Form '.$newFormObj['id'];
				$newFormObj['shortcode'] = '[rockthemes_fb id="'.$newFormObj['id'].'"]';
				$newFormObj['created'] = date('m/d/Y');
				$newFormObj['modified'] = date('m/d/Y');
				
				$rockthemes_fb_references[] = $newFormObj;
				update_option('rockthemes_fb_references', ($rockthemes_fb_references));
			}
			
			//This is the main holder for the form
			if($duplicate_form_id === false){
				$formDBName = 'rockthemes_fb_'.$newFormObj['id'];
				$formObject;
				$formObject['form_name'] = 'Rock Form '.$newFormObj['id'];
				$formObject['id'] = $newFormObj['id'];
				$formObject['grids'] = array();
				update_option($formDBName,($formObject));
				
				$current_form_id = $add_new_form_id;
			}
		}
		if($duplicate_form_id === false){
			$formDBName = 'rockthemes_fb_'.$current_form_id;
		}
		//This is the main Form Function
		rockthemes_fb_edit_form_ui();
		
	else:
		//Check if we are here to delete a form
		if($delete_form_id !== false){

			foreach($rockthemes_fb_references as $ref){
				if($ref['id'] == $delete_form_id){
					echo 'id '.$ref['id'].' id '.$delete_form_id;
					unset($rockthemes_fb_references[$delete_form_id]);	
					update_option('rockthemes_fb_references', ($rockthemes_fb_references));
					delete_option('rockthemes_fb_'.$delete_form_id);
					break;
				}
			}
			$rockthemes_fb_references = ((get_option('rockthemes_fb_references')));
			
			?>
            <script type="text/javascript">
			//For refreshing the current location after delete
			var newAddress = window.location.toString().substr(0,window.location.toString().lastIndexOf("rock_form_builder") + 12);
			window.history.pushState('Object', 'Rock Form', newAddress);
			</script>
			<?php
		}

		
		?>
	<h2><img src="<?php echo RFB_URI.'/images/rock-form-builder-logo.png'; ?>"  /></h2>
    <br />
    <div id="rockthemes-fb-list" class="postbox">
    	<h3 class="list-header">
        	<div class="row-fluid">
                <div class="span1">#</div>
                <div class="span3">Name</div>
                <div class="span3">Shortcode</div>
                <div class="span3">Actions</div>
                <div class="span1">Created</div>
                <div class="span1">Modified</div>
                
            </div>
        </h3>
        <?php 
		
		/*Check if there are registered forms*/
		if(!empty($rockthemes_fb_references)){
			foreach($rockthemes_fb_references as $form){
				echo '<div class="list-inside row-fluid">';
					echo '<div class="span1">'.$form['id'].'</div>';
					echo '<div class="span3"><strong>'.$form['name'].'</strong></div>';
					echo '<div class="span3">'.$form['shortcode'].'</div>';
					echo '<div class="span3"><span class="click-to-test-edit"><a href="?page=rock_form_builder&reset=true&duplicateFormID='.$form['id'].'">Duplicate</a></span> | <a href="?page=rock_form_builder&reset=true&editFormID='.$form['id'].'">Edit</a></span> | <span class="click-to-test-edit delete-animation-permanently"><a href="?page=rock_form_builder&reset=true&deleteFormID='.$form['id'].'">Delete</a></span></div>';
					echo '<div class="span1">'.$form['created'].'</div>';
					echo '<div class="span1">'.$form['modified'].'</div>';
				echo '</div>';
				$total_forms = intval($form['id']) + 1;
			}
		}else{
			echo '<div class="list-inside">';
				echo '<div class="">You do not have any forms</div>';
			echo '</div>';
		}
		
		?>
    </div>
    <a href="?page=rock_form_builder&reset=true&addFormID=<?php echo $total_forms; ?>" class="button button-primary"><i class="fa-plus"></i> Add New Form</a>
    
    <script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(document).on("click", "span.delete-animation-permanently", function(e){
			e.preventDefault();
			var delLink = jQuery(this).find("a").attr("href");
			var siteLocation = document.location.toString().substr(0,document.location.toString().lastIndexOf("?"))
			var yes = confirm("Delete this animation permanently?");
			if(yes){
				document.location = siteLocation+delLink;
			}
		});

	});
	</script>
	<?php
	endif;
	return;
}



function rockthemes_fb_edit_form_ui(){
	global $current_form_id, $formDBName;

	$saved_settings = (get_option($formDBName, array()));

	$modals_html = '';
	
	$loaded_html = '';
	
	if(!isset($saved_settings['main_email_address'])){
		$saved_settings['main_email_address'] = get_option('admin_email');	
	}
	
	if(!isset($saved_settings['email_title'])){
		$saved_settings['email_title'] = '';	
	}
	
	if(!isset($saved_settings['send_button_text'])){
		$saved_settings['send_button_text'] = 'Send';	
	}

	if(!isset($saved_settings['recaptcha_public_key'])){
		$saved_settings['recaptcha_public_key'] = '';	
	}
	
	if(!isset($saved_settings['recaptcha_private_key'])){
		$saved_settings['recaptcha_private_key'] = '';	
	}
	
	if(!isset($saved_settings['captcha_activated'])){
		$saved_settings['captcha_activated'] = 'false';	
	}
	
	if(!isset($saved_settings['activate_auto_reply'])){
		$saved_settings['activate_auto_reply'] = 'false';	
	}
	
	if(!isset($saved_settings['rockthemes_fb_tinymce_content'])){
		$saved_settings['rockthemes_fb_tinymce_content'] = '';	
	}
	
	if(!isset($saved_settings['required_error_message'])){
		$saved_settings['required_error_message'] = '';	
	}
	
	if(!isset($saved_settings['email_invalid_message'])){
		$saved_settings['email_invalid_message'] = '';	
	}
	
	if(!isset($saved_settings['captcha_invalid_message'])){
		$saved_settings['captcha_invalid_message'] = '';	
	}
	
	if(!isset($saved_settings['email_sent_message'])){
		$saved_settings['email_sent_message'] = '';	
	}
	
	if(!isset($saved_settings['email_sending_error_message'])){
		$saved_settings['email_sending_error_message'] = '';	
	}

		
	if(isset($saved_settings['grids']) && !empty($saved_settings['grids'])):
	foreach($saved_settings['grids'] as $grids){
		
		$loaded_html .= '<li class="row-fluid">';
						
		$count_columns = 0;
		
		foreach($grids['columns'] as $columns){			
	
				
			$loaded_html .= '<div class="span'.$grids['columns_class'].' rockthemes_fb_grid" col-ref="'.$grids['columns_class'].'">';
			
			$loaded_html .= '<ul class="form-elements-container">';
			
			//If an empty columns used this will pass the element details
			if(is_array($columns)):
			foreach($columns as $elem){
				
				
				$elem_data = rockthemes_fb_make_admin_element($elem);
				$loaded_html .= $elem_data['element'];
					
				//Add element modal to modals
				$modals_html .= $elem_data['modal'];
				
			}
			endif;
						
			$loaded_html .= '</ul>';//form-elements-container
				
			$loaded_html .= '</div>';//rockthemes_fb_grid
				
			$count_columns += (int) $grids['columns_class'];
			
		}
		
		//Complete columns to 12 if no element included in columns
		while($count_columns < 12){
			$loaded_html .= '<div class="span'.$grids['columns_class'].' rockthemes_fb_grid" col-ref="'.$grids['columns_class'].'">';
				$loaded_html .= '<ul class="form-elements-container">';
				$loaded_html .= '</ul>';//form-elements-container
			$loaded_html .= '</div>';//rockthemes_fb_grid
			$count_columns += (int) $grids['columns_class'];
		}
		
		
		$loaded_html .= '<i class="row-drag-button fa fa-move"></i>';
			
		$loaded_html .= '<i class="row-remove-button fa fa-times"></i>';
			
		$loaded_html .= '</li>';//row-fluid
		
	}
	
	endif;
	
	
	$loaded_html_script = '';
	if($loaded_html !== ''){
		//Add sortable script to activate sortable for loaded elements	
		$loaded_html_script = '
			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery( ".form-elements-container" ).sortable({
						handle : "i.drag",
						connectWith : ".form-elements-container",
						helper : function(){
							return "<div class=\"sortable-drag-helper\"><i class=\"fa fa-magnet\"></i></div>";
						},
					}).disableSelection();
					
					jQuery( ".form-preview" ).sortable({
						handle : ".row-drag-button",
					}).disableSelection();
					
					jQuery(".select_elements").sortable({
						handle : ".fa-move",
					});//.disableSelection();
					
					jQuery(".radio_elements").sortable({
						handle : ".fa-move",
					});//.disableSelection();
					
					
				});
			</script>
		';
	}
	
	//Select element for selecting and adding new elements
	$elements = rockthemes_fb_get_elements_list();
	
	$grids = rockthemes_fb_get_grid_list();
	
	echo '<div class="rockthemes-fb-main-container" form-id="'.$current_form_id.'" form-db-name="'.$formDBName.'">';
	
	//Header
	echo '<div class="rockthemes-fb-header">';
	
		echo '<h1>Rock Form Builder</h1>';
		
		echo '<hr />';
		
		echo '<br />';		
		
		echo '<div class="form-header-details row-fluid">';
		
			echo '<div class="span6">';
			
				echo '<h3>General Settings</h3>';
				
				echo '<hr />';
				
				echo '<br/>';
			
				//Form Name for database (Only for backend)
				echo '<strong>Form Name : </strong> <input type="text" class="form_name_holder alignright" value="'.$saved_settings['form_name'].'" />';
			
				echo '<div class="clear"></div>';
			
				//Form Name for database (Only for backend)
				echo '<strong>Email Title : </strong> <input type="text" class="email_title alignright" value="'.$saved_settings['email_title'].'" />';
			
				echo '<div class="clear"></div>';
				//Main email address to send email
				
				echo '<strong>Email Address (To receive emails) : </strong> <input type="text" class="main_email_address alignright" value="'.$saved_settings['main_email_address'].'" />';
				
				echo '<div class="clear"></div>';
				
				//Button Class
				echo '<strong>Button Class (Optional) : </strong> <input type="text" class="button_class_holder alignright" value="'.(isset($saved_settings['button_class_holder']) ? $saved_settings['button_class_holder'] : '').'" />';
				
				echo '<div class="clear"></div>';
				
				echo '<br/><br/>';
				
				
				
				
				echo '<h3>Email Sent Settings</h3>';
				
				echo '<hr />';
				
				echo '<br/>';
				
				//Select a method for after email sent
				echo '<strong>When Email Sent : </strong>
					<select class="after_sent_select alignright" autocomplete="off">
						<option value="" '.(isset($saved_settings['after_sent_select']) && $saved_settings['after_sent_select'] === '' ? 'selected' : '').'>Do Nothing</option>
						<option value="clear" '.(isset($saved_settings['after_sent_select']) && $saved_settings['after_sent_select'] === 'clear' ? 'selected' : '').'>Clear Form</option>
						<option value="redirect" '.(isset($saved_settings['after_sent_select']) && $saved_settings['after_sent_select'] === 'redirect' ? 'selected' : '').'>Redirect To URL</option>
						<option value="download" '.(isset($saved_settings['after_sent_select']) && $saved_settings['after_sent_select'] === 'download' ? 'selected' : '').'>Download File</option>
					</select>
					';
				echo '<div class="clear"></div>';
				//Link To This URL
				echo '<strong>Link To URL : </strong> <input type="text" class="after_sent_url alignright" value="'.((isset($saved_settings['after_sent_url']) && $saved_settings['after_sent_url']) ? $saved_settings['after_sent_url'] : '').'" />';
				echo '<div class="clear"></div>';
				//Download This file
				echo '<strong>Download File : </strong> <input type="text" class="after_sent_download_url alignright" value="'.((isset($saved_settings['after_sent_download_url']) && $saved_settings['after_sent_download_url']) ? $saved_settings['after_sent_download_url'] : '').'" />';
				echo '<div class="clear"></div>';
				
				
				
				echo '<h3>Captcha Settings</h3><hr/><br/>';
				
				//reCAPTCHA activate / deactivate
				echo '<strong>Activate reCAPTCHA : </strong>
					<select class="captcha_activated alignright" autocomplete="off">
						<option value="true" '.($saved_settings['captcha_activated'] === 'true' ? 'selected' : '').'>Activate reCAPTCHA</option>
						<option value="false" '.($saved_settings['captcha_activated'] === 'false' ? 'selected' : '').'>Deactivate reCAPTCHA</option>
					</select>
					';
				echo '<div class="clear"></div>';
				
				//reCAPTCHA public Key
				echo '<strong>reCAPTCHA Public Key : </strong> <input type="text" class="recaptcha_public_key alignright" value="'.$saved_settings['recaptcha_public_key'].'" />';
				
				echo '<div class="clear"></div>';
				
				//reCAPTCHA private Key
				echo '<strong>reCAPTCHA Private Key : </strong> <input type="text" class="recaptcha_private_key alignright" value="'.$saved_settings['recaptcha_private_key'].'" />';
				
				echo '<div class="clear"></div><br/>';
				
				
				echo '<h3>Form Fields Messages</h3>';
				
				echo '<hr/><br/>';
				
				//Text of the send button
				echo '<strong>Send Button Text : </strong> <input type="text" class="send_button_text alignright" value="'.$saved_settings['send_button_text'].'" />';
				
				echo '<div class="clear"></div>';
			
				//Email Sent Message
				echo '<strong>Email Sent Message : </strong> <input type="text" class="email_sent_message alignright" value="'.$saved_settings['email_sent_message'].'" />';
				
				echo '<div class="clear"></div>';
				
				//Email Sending Error Message
				echo '<strong>Email Sending Error : </strong> <input type="text" class="email_sending_error_message alignright" value="'.$saved_settings['email_sending_error_message'].'" />';
				
				echo '<div class="clear"></div>';
			
				//Required Error
				echo '<strong>Required Field Error : </strong> <input type="text" class="required_error_message alignright" value="'.$saved_settings['required_error_message'].'" />';
				
				echo '<div class="clear"></div>';
				
				//Email Invalid Error
				echo '<strong>Email Invalid Error : </strong> <input type="text" class="email_invalid_message alignright" value="'.$saved_settings['email_invalid_message'].'" />';
				
				echo '<div class="clear"></div>';
				
				//Captcha Invalid Error
				echo '<strong>Captcha Invalid Error : </strong> <input type="text" class="captcha_invalid_message alignright" value="'.$saved_settings['captcha_invalid_message'].'" />';
				
				echo '<div class="clear"></div>';
							
			echo '</div>';//span6
			
			echo '<div class="span6">';			
			
				echo '<h3>Auto Reply</h3>';
				
				echo '<hr/><br/>';

				//auto reply activate / deactivate
				echo '<strong>Activate Auto Reply : </strong>
					<select class="activate_auto_reply alignright" autocomplete="off">
						<option value="true" '.($saved_settings['activate_auto_reply'] === 'true' ? 'selected' : '').'>Activate Auto Reply</option>
						<option value="false" '.($saved_settings['activate_auto_reply'] === 'false' ? 'selected' : '').'>Deactivate Auto Reply</option>
					</select>
					';
				echo '<div class="clear"></div><br/>';
				//Main email address to send email
			
				echo '<strong>Auto Reply Message</strong><br/>
					  <p>If you want to send an auto message to your visitor, enter your auto message text here</p>';
					  

				wp_editor( (stripslashes($saved_settings['rockthemes_fb_tinymce_content'])), 'rockthemes_fb_tinymce_content');
			
			echo '</div>';//span6
			
		echo '</div>';
	
	echo '</div>';//rockthemes-fb-header
	
	echo '<br /><hr />';
	
	echo '<h2>Drag and Drop Elements</h2>';
	
	echo '<hr/><br/>';
	/*
		Actions
	*/
	echo '<div class="row-fluid">';
	
		echo '<div class="span6">';
		
			echo '
				<strong>Add a new element to your form</strong><br />
				<p>Choose an element to add it to your form. Then click to "Add New Element" button. Element will be added to your last block</p>
			';
		
			echo '<div class="row-fluid">';
		
				echo '<div class="span6 full-column-elements">';
				
				echo $elements;
				
				echo '</div>';
				
				echo '<div class="span6">';
				
				echo '<div class="add-new-element button button-primary"><i class="fa-plus"></i> Add New Element</div>';
				
				echo '</div>';
			
			echo '</div>';
		
		echo '</div>';//span12

		echo '<div class="span6">';
		
			echo '
				<strong>Choose a grid layout</strong>
				<p>You can design your layout with different columns by choosing a grid layout and then move your elements into the grid.</p>
			';
			
			echo '<div class="row-fluid">';
		
				echo '<div class="span6 full-column-elements">';
			
					echo $grids;
					
				echo '</div>';//span6
				
				echo '<div class="span6">';
			
					echo '<div class="add-new-grid button button-primary"><i class="fa-plus"></i> Add Grid</div>';
					
				echo '</div>';//span6
		
			echo '</div>';//row-fluid
			
		echo '</div>';//span12
	
	echo '</div>';//row-fluid
	

	//Form live preview
	echo '<div class="row-fluid">';
	
		echo '<div class="span2"></div>';
	
		echo '<div class="span8">';
		
			echo '<ul class="form-preview">';
				
				echo $loaded_html;
				
				//All elements will be here
			
			echo '</ul>';//form-preview
		
		echo '</div>';//span8
	
	echo '</div>';//row-fluid
	
	echo '<div class="rockthemes_fb_modal_container">';
	
		echo $modals_html;
	
	echo '</div>';//rockthemes_fb_modal_container
	
	
		echo '<div class="rockthemes_fb_ui_footer">';
		
			echo '<div class="rockthemes_fb_save_form btn btn-success">Save Form <i class="rockthemes-fb-save-icon"></i></div>';
		
		echo '</div>';//rockthemes_fb_ui_footer
	
	echo '</div>';//rockthemes-fb-main-container
	
	//Echo first sortable call for loaded elements
	echo $loaded_html_script;
}



/*
**	Register Rock Form Builder Plugin
**	@return	:	none
*/
function rockthemes_fb_register_options() {
	global $rock_form_builder_options;
	extract($rock_form_builder_options);
	
	/*
	**	Add menu page of the plugin. Register it's admin ui function
	**
	*/
	add_menu_page('Rock Form Builder Options', 'Rock Form Builder', $user_can, 'rock_form_builder', 'rockthemes_fb_admin_ui', RFB_URI.'/images/rock-form-builder-wp-icon.png');

	add_submenu_page( 
			  'rock_form_builder' 
			, 'Settings' 
			, 'Settings'
			, $user_can
			, 'rock_form_builder_settings'
			, 'rockthemes_fb_general_settings_ui'
		);


	add_submenu_page( 
			  'rock_form_builder' 
			, 'Load / Export' 
			, 'Load / Export'
			, $user_can
			, 'rock_form_builder_i_e'
			, 'rockthemes_fb_import_export_ui'
		);
}

add_action('admin_menu', 'rockthemes_fb_register_options');


?>
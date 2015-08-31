<?php

/*
**	Main Import / Export UI 
**
**	This function will display the UI of the main import/export 
**
**	@since	:	1.0
**	@return	:	Returns the Import / Export UI 
**
*/
function rockthemes_fb_import_export_ui(){
	$return = '<div class="rockthemes-fb-main-container">';
	
	//Import Field
	$import = '';
	
	$import .= '
		<div class="main-import-area">
			<h3>Load Data</h3>
			<p>Paste your exported data and then click to "Load" button</p>
			<textarea class="import-area"></textarea>
			<div class="button main_import_button">Load</div>
		</div>
		<br/>
	';
	
	//Export Field
	$export = '
		<div class="main-export-area">
			<h3>Export Data</h3>
			<p>Copy the content of this text area. Save it somewhere to import it later</p>
			<textarea class="export-area">'.rockthemes_fb_get_export_data().'</textarea>
		</div>
	';
	
	$return .= $import;
	
	$return .= '<hr/>';
	
	$return .= $export;
	
	$return .= '</div>';
	
	echo $return;
	
	rockthemes_fb_import_export_js();
}


/*
**	Returns the data of the saved forms.
**
**	@return	:	The data will be json_encoded
*/
function rockthemes_fb_get_export_data(){
	$references	=	get_option('rockthemes_fb_references',false);
	$settings = get_option('rockthemes_fb_settings', array());
	if(!$references) return false;
	
	$datas				=	array();
	
	$database_name		=	'rockthemes_fb_';
	
	
	foreach($references as $ref){
		$datas[] = get_option($database_name.$ref['id'],array());
	}
	
	return json_encode(
				array(
					'references'	=>	$references,
					'settings'		=>	$settings,
					'datas'			=>	$datas
				)
			);
}

function rockthemes_fb_import($data){
		
	$data = json_decode(stripslashes($data),true);
		
	//Import references
	$references_imported = update_option('rockthemes_fb_references', $data['references']);
	
	//Import Settings
	update_option('rockthemes_fb_settings', $data['settings']);
	
	//Import form datas
	foreach($data['datas'] as $form){
		$database_name = 'rockthemes_fb_'.$form['id'];
		update_option($database_name, $form);
	}
	
	echo "success";
}

function rockthemes_fb_import_ajax(){
	if(!is_admin()) die;
	if(!isset($_POST['data']) || empty($_POST['data'])){
		die( 'error');
	}else{
		echo rockthemes_fb_import($_POST['data']);
	}
	
	exit;
}
add_action("wp_ajax_rockthemes_fb_import", "rockthemes_fb_import_ajax");

function rockthemes_fb_import_export_js(){
	
?>
<script type="text/javascript">

jQuery(document).ready(function(){
	jQuery(document).on("click",".main_import_button", function(){
		
		
		var that = jQuery(this);
		var button_content = that.html();
		that.html(button_content+' <i class="fa fa-refresh fa-spin"></i>');		
		
		var data = jQuery(".import-area").val();

		jQuery.post(ajaxurl, {data:data, action:"rockthemes_fb_import"}, function(data){
			if(that.find(".fa-refresh").length) that.find(".fa-refresh").remove();
			
			if(data == 'success'){
				var newLink = "?page=rock_form_builder";
				var siteLocation = document.location.toString().substr(0,document.location.toString().lastIndexOf("?"))
				document.location = siteLocation+newLink;
			}
		});
	});
});

</script>

<?php
}


?>
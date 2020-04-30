<?php

function fali_form_system_theme_settings_alter(&$form, &$form_state) {

	$theme_path = drupal_get_path('theme', 'fali');

	$form['settings'] = array(
		'#type' => 'vertical_tabs',
		'#weight' => 2,
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);

	$form['settings']['general'] = array(
		'#type' => 'fieldset',
		'#title' => t('General Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['general']['tracking_code'] = array(
		'#type' => 'textarea',
		'#title' => t('Tracking Code'),
		'#default_value' => theme_get_setting('tracking_code', 'fali'),
	);
	$form['settings']['general']['custom_css'] = array(
		'#type' => 'textarea',
		'#title' => t('Custom CSS'),
		'#default_value' => theme_get_setting('custom_css', 'fali'),
		'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: "Metrophobic", Arial, serif; font-weight: 400; }'),
	);
	$form['settings']['general']['custom_js'] = array(
		'#type' => 'textarea',
		'#title' => t('Custom JS'),
		'#default_value' => theme_get_setting('custom_js', 'fali'),
		'#description'  => t('<strong>Example:</strong><br/>document.getElementById("demo").innerHTML = "Hello JavaScript!";'),
	);

	$form['settings']['header'] = array(
		'#type' => 'fieldset',
		'#title' => t('Header Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['header']['header_style'] = array(
		'#type' => 'select',
		'#title' => t('Header Style'),
		'#options' => array(
			'1' => t('Header style 1'),
			'2' => t('Header style 2'),
			'3' => t('Header style 3'),
			'4' => t('Header style 4'),
			'5' => t('Header style 5'),
		),
		'#default_value' => theme_get_setting('header_style', 'fali'),
	);
	$form['settings']['header']['header_sticky'] = array(
		'#type' => 'checkbox',
		'#title' => t('Sticky Header'),
		'#default_value' => theme_get_setting('header_sticky', 'fali'),
	);
	$form['settings']['header']['header_socials'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display Socials Block'),
		'#default_value' => theme_get_setting('header_socials', 'fali'),
	);
	$form['settings']['header']['header_search'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display Search Block'),
		'#default_value' => theme_get_setting('header_search', 'fali'),
	);
	$form['settings']['header']['header_banner'] = array(
		'#type' => 'checkbox',
		'#title' => t('Display Banner'),
		'#default_value' => theme_get_setting('header_banner', 'fali'),
	);
	$form['settings']['header']['header_banner_image'] = array(
		'#type' => 'managed_file',
		'#upload_location' => file_default_scheme() . '://fali/config/',
		'#upload_validators' => array(
			'file_validate_extensions' => array('gif png jpg jpeg'),
		),
		'#title' => t('Header Banner Image'),
		'#default_value' => theme_get_setting('header_banner_image', 'fali'),
	);
	$form['settings']['header']['header_multilogo'] = array(
		'#type' => 'checkbox',
		'#title' => t('Enable Multi Logo'),
		'#default_value' => theme_get_setting('header_multilogo', 'fali'),
	);
	$form['settings']['header']['header_logo_images_1'] = array(
		'#type' => 'managed_file',
		'#title' => t('Header Style 1 Logo'),
		'#upload_location' => file_default_scheme() . '://fali/config/',
		'#upload_validators' => array(
			'file_validate_extensions' => array('gif png jpg jpeg'),
		),
		'#default_value' => theme_get_setting('header_logo_images_1', 'fali'),
	);
	$form['settings']['header']['header_logo_images_2'] = array(
		'#type' => 'managed_file',
		'#title' => t('Header Style 2 Logo'),
		'#upload_location' => file_default_scheme() . '://fali/config/',
		'#upload_validators' => array(
			'file_validate_extensions' => array('gif png jpg jpeg'),
		),
		'#default_value' => theme_get_setting('header_logo_images_2', 'fali'),
	);
	$form['settings']['header']['header_logo_images_3'] = array(
		'#type' => 'managed_file',
		'#title' => t('Header Style 3 Logo'),
		'#upload_location' => file_default_scheme() . '://fali/config/',
		'#upload_validators' => array(
			'file_validate_extensions' => array('gif png jpg jpeg'),
		),
		'#default_value' => theme_get_setting('header_logo_images_3', 'fali'),
	);
	$form['settings']['header']['header_logo_images_4'] = array(
		'#type' => 'managed_file',
		'#title' => t('Header Style 4 Logo'),
		'#upload_location' => file_default_scheme() . '://fali/config/',
		'#upload_validators' => array(
			'file_validate_extensions' => array('gif png jpg jpeg'),
		),
		'#default_value' => theme_get_setting('header_logo_images_4', 'fali'),
	);
	$form['settings']['header']['header_logo_images_5'] = array(
		'#type' => 'managed_file',
		'#title' => t('Header Style 5 Logo'),
		'#upload_location' => file_default_scheme() . '://fali/config/',
		'#upload_validators' => array(
			'file_validate_extensions' => array('gif png jpg jpeg'),
		),
		'#default_value' => theme_get_setting('header_logo_images_5', 'fali'),
	);

	$form['settings']['content'] = array(
		'#type' => 'fieldset',
		'#title' => t('Content Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['content']['boxed_container'] = array(
		'#type' => 'checkbox',
		'#title' => t('Boxed Container'),
		'#default_value' => theme_get_setting('boxed_container', 'fali'),
	);
	$form['settings']['content']['boxed_bg_image'] = array(
		'#type' => 'managed_file',
		'#title' => t('Boxed Background Image'),
		'#upload_location' => file_default_scheme() . '://fali/config/',
		'#upload_validators' => array(
			'file_validate_extensions' => array('gif png jpg jpeg'),
		),
		'#default_value' => theme_get_setting('boxed_bg_image', 'fali'),
	);
	$form['settings']['content']['homepage_layout'] = array(
		'#type' => 'select',
		'#title' => t('Homepage Layout Type'),
		'#options' => array(
			'normal' => t('Normal'),
			'masonry' => t('Masonry'),
		),
		'#default_value' => theme_get_setting('homepage_layout', 'fali'),
	);
	$form['settings']['content']['disable_sidebar'] = array(
		'#type' => 'select',
		'#title' => t('Disable Sidebar'),
		'#options' => array(
			'0' => t('No'),
			'1' => t('Yes'),
		),
		'#default_value' => theme_get_setting('disable_sidebar', 'fali'),
	);
	$form['settings']['content']['disable_right_related_box'] = array(
		'#type' => 'select',
		'#title' => t('Disable Right Replate Popup'),
		'#options' => array(
			'0' => t('No'),
			'1' => t('Yes'),
		),
		'#default_value' => theme_get_setting('disable_right_related_box', 'fali'),
	);

	$form['settings']['footer'] = array(
		'#type' => 'fieldset',
		'#title' => t('Footer Settings'),
		'#collapsible' => TRUE,
		'#collapsed' => FALSE,
	);
	$form['settings']['footer']['show_subscribe_form'] = array(
		'#type' => 'select',
		'#title' => t('Show Subscribe Form'),
		'#options' => array(
			'0' => t('No'),
			'1' => t('Yes'),
		),
		'#default_value' => theme_get_setting('show_subscribe_form', 'fali'),
	);
	$form['settings']['footer']['copyright'] = array(
		'#type' => 'textarea',
		'#title' => t('Footer Copyright'),
		'#default_value' => theme_get_setting('copyright', 'fali'),
	);
	
	$form['#submit'][] = 'fali_settings_form_submit';
	$form_state['build_info']['files'][] = $theme_path.'/theme-settings.php';
}


function fali_settings_form_submit(&$form, &$form_state) {
	$listUploadFile = array();
	$listUploadFile['header_banner_image']['parent_fieldset'] = 'settings';
	$listUploadFile['header_banner_image']['sub_fieldset'] = 'header';

	$listUploadFile['header_logo_images_1']['parent_fieldset'] = 'settings';
	$listUploadFile['header_logo_images_1']['sub_fieldset'] = 'header';

	$listUploadFile['header_logo_images_2']['parent_fieldset'] = 'settings';
	$listUploadFile['header_logo_images_2']['sub_fieldset'] = 'header';

	$listUploadFile['header_logo_images_3']['parent_fieldset'] = 'settings';
	$listUploadFile['header_logo_images_3']['sub_fieldset'] = 'header';

	$listUploadFile['header_logo_images_4']['parent_fieldset'] = 'settings';
	$listUploadFile['header_logo_images_4']['sub_fieldset'] = 'header';

	$listUploadFile['header_logo_images_5']['parent_fieldset'] = 'settings';
	$listUploadFile['header_logo_images_5']['sub_fieldset'] = 'header';

	$listUploadFile['boxed_bg_image']['parent_fieldset'] = 'settings';
	$listUploadFile['boxed_bg_image']['sub_fieldset'] = 'content';

	$oldForm = $form_state['complete form'];
	foreach ($listUploadFile as $key => $values) {
		$fileOldId = 0;
		$fileNewId = $form_state['input'][$key]['fid'];

		/* GET OLD FILE ID */
		$parenF = isset($values['parent_fieldset']) ? $values['parent_fieldset'] : '';
		$subF = isset($values['sub_fieldset']) ? $values['sub_fieldset'] : '';
		if($parenF!='' && is_array($oldForm[$parenF])){
			$oldFormData = $oldForm[$parenF];
			if($subF!='' && is_array($oldFormData[$subF])) 
				$oldFormData = $oldFormData[$subF];
			$fileOldData = $oldFormData[$key];
			$fileOldId = $fileOldData['#default_value'];
		}
		
		if($fileOldId==0 && $fileNewId!=0){
			/* IF OLD FILE DOESN'T EXISTS DO THIS */
			/* ADD NEW FILE & SET FILE USAGE */
			$newFile = file_load($fileNewId);
			if(is_object($newFile) && $newFile->status==0){
				$newFile->status = FILE_STATUS_PERMANENT;
				file_save($newFile);
				file_usage_add($newFile, 'fali', 'theme', 1);
			}
		}elseif($fileOldId!=0 && $fileOldId!=$fileNewId){
			/* ADD NEW FILE & SET FILE USAGE */
			if($fileNewId!=0){
				$newFile = file_load($fileNewId);
				if(is_object($newFile) && $newFile->status==0){
					$newFile->status = FILE_STATUS_PERMANENT;
					file_save($newFile);
					file_usage_add($newFile, 'fali', 'theme', 1);
				}
			}
			/* DELETE OLD FILE */
			$oldFile = file_load($fileOldId);
			if(is_object($oldFile) && $oldFile->status!=0){
				file_usage_delete($oldFile, 'fali', 'theme', 1);
				file_delete($oldFile,FALSE);
			}
		}
	}
}

?>
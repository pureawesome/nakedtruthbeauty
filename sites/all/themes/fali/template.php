<?php
global $base_url;

function fali_preprocess_html(&$variables) {
	//-- Google web fonts -->
	drupal_add_css('//fonts.googleapis.com/css?family=Droid+Serif%3A400%2C400italic%2C700%7CPlayfair+Display%3A400%2C400italic%2C700%7CLato%3A400%2C400italic%2C700', array('type' => 'external','media' => 'all'));
}

function fali_form_comment_form_alter(&$form, &$form_state) {
	unset($form['actions']['preview']);
	unset($form['subject']);

	$form['#id'] = 'commentform';

	$form['author']['name']['#title'] = t('Name');
	$form['author']['name']['#required'] = TRUE;

	$form['author']['mail']['#title'] = t('E-mail');
	$form['author']['mail']['#required'] = TRUE;
	$form['author']['mail']['#access'] = TRUE;
	unset($form['author']['mail']['#description']);


	$form['author']['homepage']['#title'] = t('Website');
	$form['author']['homepage']['#access'] = TRUE;

	$form['comment_body']['und'][0]['#required'] = FALSE;
	$form['comment_body']['#after_build'][] = 'fali_customize_comment_form';

	$form['actions']['submit']['#value'] = t('Post Comment');
}

function fali_customize_comment_form(&$form) {
  $form[LANGUAGE_NONE][0]['format']['#access'] = FALSE;
  return $form;
}

function fali_preprocess_page(&$vars) {
	if (isset($vars['node'])) {
		$vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
	}
	//404 page
	$status = drupal_get_http_header("status");
	if($status == "404 Not Found") {
		$vars['theme_hook_suggestions'][] = 'page__404';
	}
}


// Remove superfish css files.
function fali_css_alter(&$css) {
	unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
	unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);

//	unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
}

function fali_form_alter(&$form, &$form_state, $form_id) {
	if($form_id == 'contact_site_form'){
		$form['name']['#required'] = 1;
		$form['name']['#prefix'] = '<div class="group"><div class="grid one-third">'.t('Your Name (required)').'<br /><span class="">';
		$form['name']['#suffix'] = '</span></div>';
		$form['name']['#theme_wrappers'] = array();

		$form['mail']['#required'] = 1;
		$form['mail']['#prefix'] = '<div class="grid one-third">'.t('Your Email (required)').'<br /><span class="">';
		$form['mail']['#suffix'] = '</span></div>';
		$form['mail']['#theme_wrappers'] = array();

		$form['subject']['#required'] = 0;
		$form['subject']['#prefix'] = '<div class="grid one-third last">'.t('Subject').'<br /><span class="">';
		$form['subject']['#suffix'] = '</span></div></div>';
		$form['subject']['#theme_wrappers'] = array();

		$form['message']['#prefix'] = '<div class=""><br />'.t('Your Message').'<br /><span class="">';
		$form['message']['#suffix'] = '</span></div>';
		$form['message']['#theme_wrappers'] = array();

		$form['actions']['#prefix'] = '<br/>';
		$form['actions']['submit']['#value'] = t('Contact Us');

		$form['copy'] = null;
	}
	if ($form_id == 'comment_form') {
		$form['comment_filter']['format'] = array(); // nuke wysiwyg from comments
	}
	if ($form_id == 'search_block_form' || $form_id == 'search_form') {
		if($form_id=='search_form'){
			$form['basic']['keys']['#title_display'] = 'invisible';
			$form['basic']['keys']['#attributes']['placeholder'] = t('Type and Enter to Search');
		}else{
			$form['search_block_form']['#title_display'] = 'invisible';
			$form['search_block_form']['#attributes']['placeholder'] = t('Type and Enter to Search');
		}
	}
	if($form_id == 'simplenews_block_form_9'){
		$form['#attributes']['class'][] = 'sml_subscribe';

		unset($form['mail']['#title']);
		$form['mail']['#attributes']['placeholder'] = t('Your e-mail');
		$form['mail']['#attributes']['class'][] = 'sml_emailinput';

		$form['submit']['#attributes']['class'][] = 'sml_submit';
		$form['submit']['#value'] = t('Submit');
	}

}

function fali_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}

function fali_breadcrumb($variables) {
	$crumbs ='';
	$breadcrumb = $variables['breadcrumb'];
	if (!empty($breadcrumb)) {
		$crumbs .= '';
		foreach($breadcrumb as $value) {

			$crumbs .= $value.'<i class="fa fa-angle-right"></i>';
		}
		$crumbs .= '<span>'.drupal_get_title().'</span>';
		return $crumbs;
	}else{
		return NULL;
	}
}

//custom main menu
function fali_menu_tree__main_menu(array $variables) {
	if (preg_match("/\bexpanded\b/i", $variables['tree'])){
	return '<ul class="menu">' . $variables['tree'] . '</ul>';
	} else {
	return '<ul class="sub-menu">' . $variables['tree'] . '</ul>';
	}
}

/**Override Menu theme */
function fali_links__system_main_menu(array $variables) {
   $html = "<ul class='menu'>";
    foreach ($variables['links'] as $link) {
        $html .= "<li>".l($link['title'], $link['path'], $link)."</li>";
    }
    $html .= "</ul>";
    return $html;
}

function fali_menu_tree__menu_top_menu($variables) {
	$str = '';
	$str .= '<ul id="menuhlng2">';
		$str .= $variables['tree'];
	$str .= '</ul>';

	return $str;
}

function hook_preprocess_page(&$variables) {
	if (arg(0) == 'node' && is_numeric($nid)) {
		if (isset($variables['page']['content']['system_main']['nodes'][$nid])) {
			$variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][$nid];
			if (empty($variables['node_content']['field_show_page_title'])) {
				$variables['node_content']['field_show_page_title'] = NULL;
			}
		}
	}
}

function random_related_node_by_content_type($node,$numberNode=1,$orderby=false){
	$query = "SELECT n.nid title FROM {node} n WHERE n.status = 1 AND n.type = '".$node->type."' AND n.nid <> ".$node->nid;
	if($orderby===true){
		$query .= ' ORDER BY RAND()';
	}elseif(is_array($orderby)){
		foreach($orderby as $key => $value){
			$query .= ' ORDER BY '.$key.' '.$value;
			break;
		}
	}

	$query .= " LIMIT 0,".$numberNode;

	$nids = db_query($query)->fetchCol();
	$nodes = node_load_multiple($nids);
	return $nodes;
}

function random_related_node_by_taxonomy($node,$numberNode=1,$orderby=false){
	$query = "SELECT tid FROM {taxonomy_index} WHERE nid = ".$node->nid;
	$tids = db_query($query)->fetchCol();
	$tidsString = implode(", ",$tids);
	$query = 'SELECT nid FROM {taxonomy_index} WHERE tid IN ('.$tidsString.') AND nid <> '.$node->nid.' GROUP BY nid';

	if($orderby===true){
		$query .= ' ORDER BY RAND()';
	}elseif(is_array($orderby)){
		foreach($orderby as $key => $value){
			$query .= ' ORDER BY '.$key.' '.$value;
			break;
		}
	}

	$query .= " LIMIT 0,".$numberNode;

	$nids = db_query($query)->fetchCol();
	$nodes = node_load_multiple($nids);
	return $nodes;
}

function node_sibling($dir = 'next', $node, $tid = FALSE){
	$orderby = 'ASC';
	$dirType = '>';
	if($dir == 'previous'){
		$dirType = '<';
	$orderby = 'DESC';
	}

	if($tid){
		$query = "SELECT n.nid, n.title FROM {node} n INNER JOIN {term_node} tn ON n.nid=tn.nid WHERE n.nid".$dirType.$node->nid." AND n.type='".$node->type."' AND n.status=1 AND tn.tid=".$tid." ORDER BY n.nid ".$orderby;
		$result = db_query($query);
	}else{
		$query = "SELECT n.nid, n.title FROM {node} n WHERE n.nid".$dirType.$node->nid." AND n.type='".$node->type."' AND n.status=1 ORDER BY n.nid ".$orderby;
		$result = db_query($query);
	}

	// echo $query; die;
	if($row = $result->fetchObject()){
		$resultData['nid'] = $row->nid;
		$resultData['title'] = $row->title;
		return $resultData;
	}else{
		return NULL;
	}
}

<?php
/**
 * Google Custom Search start.php
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 * 
 */

elgg_register_event_handler('init', 'system', 'googlesearch_init');

function googlesearch_init() {
	
	// Register actions
	$action_base = elgg_get_plugins_path() . "googlesearch/actions/googlesearch";
	elgg_register_action('googlesearch/edit', "$action_base/edit.php");
	
	// Page handler
	elgg_register_page_handler('googlesearch','googlesearch_page_handler');
	
	// Profile hook	
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'googlesearch_owner_block_menu');
	
	// add the group pages tool option     
    add_group_tool_option('googlesearch',elgg_echo('groups:enablegooglesearch'),true);

	// add group widget
	elgg_extend_view('groups/tool_latest', 'googlesearch/group_search');
	
	// Register CSS
	$gs_css = elgg_get_simplecache_url('css', 'googlesearch/css');
	elgg_register_css('elgg.googlesearch', $gs_css);
	
	// Register JS
	$gs_js = elgg_get_simplecache_url('js', 'googlesearch/googlesearch');
	elgg_register_js('elgg.googlesearch', $gs_js);
}

/* Google search page handler */
function googlesearch_page_handler($page) {
	elgg_set_context('googlesearch');
	$group = get_entity($page[0]);
	
	if (elgg_instanceof($group, 'group')) {
		elgg_set_page_owner_guid($group->getGUID());
		
		// Breadcrumbs
		elgg_push_breadcrumb(elgg_echo('groups'), 'groups');
		elgg_push_breadcrumb($group->name, $group->getURL());
		
		// Load CSS & JS
		elgg_load_css('elgg.googlesearch');
		elgg_load_js('elgg.googlesearch');
		
		if ($page[1] == 'edit') {
			elgg_push_breadcrumb(elgg_echo('googlesearch:label:customsearch'), 'googlesearch/' . $group->guid);
			elgg_push_breadcrumb(elgg_echo('edit'));
			
			$title = elgg_echo('googlesearch:title:editgooglesearch');
			$content = elgg_view_form('googlesearch/edit', array('name' => 'googlesearch-save-form', 'id' => 'googlesearch_save_form'));
			
			$header = elgg_view_title($title);
		} else {
			elgg_push_breadcrumb(elgg_echo('googlesearch:label:customsearch'));
			
			$title = elgg_echo('googlesearch');
			$header = ' ';
			 
			if ($group->canEdit()) {
				$edit_link = " | <a href='" . elgg_get_site_url() . "googlesearch/{$group->getGUID()}/edit'>" .
				 elgg_echo('googlesearch:label:owneredit') . 
				"</a>";
			}

			$body .= elgg_view('googlesearch/viewsearch');
			
			$popup_label = elgg_echo('googlesearch:label:whatisthis');
			$popup_info = elgg_echo('googlesearch:label:whatisthisinfo');			
			
			$module_title = $title . "<span class='right'><a rel='popup' href='#info'>$popup_label</a><div id='info' class='googlesearch-popup' style='display: none;'>$popup_info</div>$edit_link</span>";
			
			$module_content = elgg_view('googlesearch/viewsearch');
			
			
			$content = elgg_view_module('featured', $module_title, $module_content);		
		}
		
		
		$params = array(
			'header' => $header,
			'filter' => FALSE,
			'content' => $content
		);
		
		$body = elgg_view_layout('content', $params);

		echo elgg_view_page($title, $body);
	} else {
		forward();
	}
}

/**
 * Plugin hook to add polls's to groups profile block
 * 	
 * @param unknown_type $hook
 * @param unknown_type $type
 * @param unknown_type $return
 * @param unknown_type $params
 * @return unknown
 */
function googlesearch_owner_block_menu($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'group') && $params['entity']->googlesearch_enable == 'yes') {
		$url = elgg_get_site_url() . "googlesearch/{$params['entity']->guid}";
		$item = new ElggMenuItem('googlesearch', elgg_echo('googlesearch:group'), $url);
		$return[] = $item;
	} 

	return $return;
}
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
	$action_base = elgg_get_plugin_path() . "googlesearch/actions/googlesearch";
	elgg_register_action('googlesearch/edit', "$action_base/edit.php");
	
	// Page handler
	register_page_handler('googlesearch','googlesearch_page_handler');
	
	// Profile hook	
	elgg_register_plugin_hook_handler('profile_menu', 'profile', 'googlesearch_profile_menu');
	
	// add the group pages tool option     
    add_group_tool_option('googlesearch',elgg_echo('groups:enablegooglesearch'),true);

	// add group widget
	elgg_extend_view('groups/tool_latest', 'googlesearch/group_search');
	
	// Extend CSS
	elgg_extend_view('css/screen','googlesearch/css');
}

/* Google search page handler */
function googlesearch_page_handler($page) {
	set_context('googlesearch');
	$group = get_entity($page[0]);
	
	if (elgg_instanceof($group, 'group')) {
		elgg_set_page_owner_guid($group->getGUID());
		
		if ($page[1] == 'edit') {
			$title = elgg_echo('googlesearch:title:editgooglesearch');
			$content = elgg_view('forms/googlesearch/edit');
		} else {
			$title = elgg_echo('googlesearch');
			$content = elgg_view('googlesearch/viewsearch');
			
			$popup_label = elgg_echo('googlesearch:label:whatisthis');
			$popup_info = elgg_echo('googlesearch:label:whatisthisinfo');

			
			$content .= "<span class='googlesearch-popup googlesearch-popleft'>$popup_label<span>$popup_info</span></span>";
		}
		
		
		$params = array(
			'content' => elgg_view_title($title) . $content
		);
		
		$body = elgg_view_layout('one_column_with_sidebar', $params);

		echo elgg_view_page($title, $body);
	} else {
		forward();
	}
}

/**
 * Plugin hook to add polls's to users profile block
 * 	
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 * @return unknown
 */
function googlesearch_profile_menu($hook, $entity_type, $return_value, $params) {
	// Only display on group owner block if enabled
	if ($params['owner'] instanceof ElggGroup && $params['owner']->googlesearch_enable == 'yes') {
		$return_value[] = array(
			'text' => elgg_echo('googlesearch:label:customsearch'),
			'href' => elgg_get_site_url() . "pg/googlesearch/{$params['owner']->getGUID()}",
		);
	}

	return $return_value;
}
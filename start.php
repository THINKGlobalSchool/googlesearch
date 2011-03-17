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
	elgg_register_action('googlesearch/edit', "$action_base/save.php");
	
	// Page handler
	register_page_handler('googlesearch','googlesearch_page_handler');
	
}

/* Google search page handler */
function googlesearch_page_handler($page) {
	set_context('googlesearch');
	$group = get_entity($page[0]);
	
	if (elgg_instanceof($group, 'group')) {
		
	} else {
		forward();
	}
}
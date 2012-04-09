<?php
/**
 * Google Custom Search edit action
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2012
 * @link http://www.thinkglobalschool.com/
 * 
 */

$group_guid = get_input('googlesearch_group');
$unique_id = get_input('googlesearch_unique_id');
$advanced_code = get_input('googlesearch_escaped_code');
$title = get_input('title');
$description = get_input('description');

$group = get_entity($group_guid);

if (elgg_instanceof($group, 'group') && $group->canEdit()) {
	if ($unique_id || $advanced_code) {
		// Save advanced code if supplied
		$group->google_search_advanced = $advanced_code;
				
		// Save the unique_id
		$group->google_search_unique_id = $unique_id;
		
		// Set title/description
		$group->google_search_title = $title;
		$group->google_search_description = $description;
		
		// Forward on
		system_message(elgg_echo('googlesearch:success:save'));
		forward(elgg_get_site_url() . "googlesearch/{$group->guid}");
	} else {
		register_error(elgg_echo('googlesearch:error:required'));
		forward(elgg_get_site_url() . "googlesearch/{$group->guid}");
	}
} else {
	register_error(elgg_echo('googlesearch:error:invalidgroup'));
	forward(REFERER);
}
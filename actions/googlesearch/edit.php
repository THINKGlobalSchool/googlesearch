<?php
/**
 * Google Custom Search edit action
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 * 
 */

$group_guid = get_input('googlesearch_group');
$code = get_input('googlesearch_escaped_code');

$group = get_entity($group_guid);

if (elgg_instanceof($group, 'group') && $group->canEdit()) {
	if ($code) {
		// Save code
		$group->googlecustomsearch = $code;
		
		// Forward on
		system_message(elgg_echo('googlesearch:success:savecode'));
		forward($group->getURL());
	} else {
		register_error(elgg_echo('googlesearch:error:coderequired'));
		forward(REFERER);
	}
} else {
	register_error(elgg_echo('googlesearch:error:invalidgroup'));
	forward(REFERER);
}
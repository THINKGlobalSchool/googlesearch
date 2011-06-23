<?php
/**
 * Google Custom Search view search
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 * 
 */

$group = elgg_get_page_owner_entity();

// Check for unique id
if ($group->google_search_unique_id || $group->google_search_advanced) {
	// User may have supplied advanced code, so display that
	if ($group->google_search_advanced) {
		$content = urldecode($group->google_search_advanced);
	} else { // Just display the default template with the supplied unique id
		$content = elgg_view('googlesearch/default', array('uid' => $group->google_search_unique_id));
	}
	echo $content;
} else {
	echo "<br />" . elgg_echo('googlesearch:label:nocustom') . "<br />";
}



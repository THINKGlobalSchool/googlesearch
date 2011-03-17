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

$group = elgg_get_page_owner();

// Check for unique id
if ($group->google_search_unique_id) {
	// User may have supplied advanced code, so display that
	if ($group->google_search_advanced) {
		echo urldecode($group->google_search_advanced);
	} else { // Just display the default template with the supplied unique id
		echo elgg_view('googlesearch/default', array('uid' => $group->google_search_unique_id));
	}
} else {
	echo "<br />" . elgg_echo('googlesearch:label:nocustom') . "<br />";
}



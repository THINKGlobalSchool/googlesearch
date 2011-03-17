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

if ($group->googlecustomsearch) {
	echo urldecode($group->googlecustomsearch);
} else {
	echo "<br />" . elgg_echo('googlesearch:label:nocustom');
}



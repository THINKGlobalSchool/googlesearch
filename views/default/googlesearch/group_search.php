<?php
/**
 * Google Custom Search view search
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2012
 * @link http://www.thinkglobalschool.com/
 * 
 * @uses $vars['group'];
 */

$group = elgg_extract('group', $vars);

// Show edit link if we're the group owner (or admin)
if ($group->canEdit()) {
	$edit_link = " | <a href='" . elgg_get_site_url() . "googlesearch/{$group->getGUID()}/edit'>" .
	 elgg_echo('googlesearch:label:owneredit') . 
	"</a>";
}

// Popup label/content
$popup_label = elgg_echo('googlesearch:label:whatisthis');
$popup_info = elgg_echo('googlesearch:label:whatisthisinfo');

// Display title if supplied
$custom_title = $group->google_search_title ? $group->google_search_title : elgg_echo('googlesearch');

// Build module
$module_title = $custom_title . "<span class='googlesearch-small right'><a rel='popup' href='#info'>$popup_label</a><div id='info' class='googlesearch-popup' style='display: none;'>$popup_info</div>$edit_link</span>";
$module_content = elgg_view('googlesearch/viewsearch');

$content = elgg_view_module('featured', $module_title, $module_content, array('class' => 'googlesearch-module'));

// Display description if supplied
if ($group->google_search_description) {
	$desc = elgg_view('output/longtext', array(
		'value' => $group->google_search_description,
	));

	$content .= "<div class='googlesearch-desc'>" . $desc . "</div>";
}

echo $content;
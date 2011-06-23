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

elgg_load_css('elgg.googlesearch');
$group = elgg_get_page_owner_entity();

if ($group->googlesearch_enable != 'yes') {
	return true;
}

$popup_label = elgg_echo('googlesearch:label:whatisthis');
$popup_info = elgg_echo('googlesearch:label:whatisthisinfo');

if ($group->canEdit()) {
	$edit_link = " | <a href='" . elgg_get_site_url() . "googlesearch/{$group->getGUID()}/edit'>" .
	 elgg_echo('googlesearch:label:owneredit') . 
	"</a>";
}

$header = "<span class='groups-widget-viewall'><a rel='popup' href='#info'>$popup_label</a><div id='info' class='googlesearch-popup' style='display: none;'>$popup_info</div>$edit_link</span>";
$header .= '<h3>' . elgg_echo("googlesearch") . '</h3>';

$content = elgg_view('googlesearch/viewsearch');

echo elgg_view_module('info', '', $content, array('header' => $header));

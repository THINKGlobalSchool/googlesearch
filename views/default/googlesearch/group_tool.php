<?php
/**
 * Google Custom Search Group Tool View
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2012
 * @link http://www.thinkglobalschool.com/
 *
 */

// Load CSS & JS
elgg_load_css('elgg.googlesearch');
elgg_load_js('elgg.googlesearch');

$group = elgg_get_page_owner_entity();

$content = "<li>" . elgg_view('googlesearch/group_search', array('group' => $group)) . "</li>";

echo $content;
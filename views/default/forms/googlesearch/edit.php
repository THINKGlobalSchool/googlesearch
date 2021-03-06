<?php
/**
 * Google Custom Search edit form
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 * 
 */

// Get group
$group = elgg_get_page_owner_entity();

// Grab title/description
$title = $group->google_search_title;
$description = $group->google_search_description;

// Inputs/Labels
$id_label = elgg_echo('googlesearch:label:uniqueid');
$id_input = elgg_view('input/text', array(
	'id' => 'googlesearch-unique-id',
	'name' => 'googlesearch_unique_id',
	'value' => $group->google_search_unique_id
));

$save_input = elgg_view('input/submit', array(
	'id' => 'googlesearch-save',
	'name' => 'googlesearch_save',
	'value' => elgg_echo('googlesearch:label:save')
));

$title_input = elgg_view('input/text', array(
	'name' => 'title',
	'value' => $title,
));

$description_input = elgg_view('input/longtext', array(
	'name' => 'description',
	'value' => $description,
));

$group_hidden_input = elgg_view('input/hidden', array(
	'id' => 'googlesearch-group',
	'name' => 'googlesearch_group',
	'value' => $group->getGUID(),
));

// Show advanced module if we have advanced code
if ($group->google_search_advanced) {
	$display = "block";
} else {
	$display = "none";
}

// Set up module labels
$basic_label = elgg_echo('googlesearch:label:basic');
$titledesc_label = elgg_echo('googlesearch:label:titledesc');
$title_label = elgg_echo('title');
$description_label = elgg_echo('description');

// Instructions
$basic_instructions = elgg_echo('googlesearch:label:basicinstructions');

$titledesc_content = <<<HTML
	<div>
		<label>$title_label</label><br />
		$title_input
	</div><br />
	<div>
		<label>$description_label</label><br />
		$description_input
	</div>
HTML;

// Modules
$basic_module = elgg_view_module('info', $basic_label, $basic_instructions);
$titledesc_module = elgg_view_module('info', $titledesc_label, $titledesc_content);

// Form body
$form_body = <<<HTML
		<div>
			$basic_module
			<label>$id_label</label>
			$id_input
		</div>
		<div>
			$titledesc_module
		</div>
		<br />
		$save_input
		$group_hidden_input
HTML;

echo $form_body;
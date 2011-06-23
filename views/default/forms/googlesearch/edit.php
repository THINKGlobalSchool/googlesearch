<?php
/**
 * Google Custom Search edit form
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 * 
 */

$group = elgg_get_page_owner_entity();

$id_label = elgg_echo('googlesearch:label:uniqueid');
$id_input = elgg_view('input/text', array(
	'id' => 'googlesearch-unique-id',
	'name' => 'googlesearch_unique_id',
	'value' => $group->google_search_unique_id
));

$code_label =  elgg_echo('googlesearch:label:code');
$code_input = elgg_view('input/plaintext', array(
	'id' => 'googlesearch-code',
	'name' => 'googlesearch_code',
	'value' => urldecode($group->google_search_advanced)
));

$escaped_code_input = elgg_view('input/hidden', array(
	'id' => 'googlesearch-escaped-code',
	'name' => 'googlesearch_escaped_code',
	'value' => $group->google_search_advanced,
));

$save_input = elgg_view('input/submit', array(
	'id' => 'googlesearch-save',
	'name' => 'googlesearch_save',
	'value' => elgg_echo('googlesearch:label:save')
));



$group_hidden_input = elgg_view('input/hidden', array(
	'id' => 'googlesearch-group',
	'name' => 'googlesearch_group',
	'value' => $group->getGUID(),
));

if ($group->google_search_advanced) {
	$display = "block";
} else {
	$display = "none";
}


$basic_label = elgg_echo('googlesearch:label:basic');
$advanced_label = "<a class='elgg-toggler' href='#advanced-custom'>" . elgg_echo('googlesearch:label:advanced') . "</a>";

$basic_instructions = elgg_echo('googlesearch:label:basicinstructions');
$advanced_instructions = elgg_echo('googlesearch:label:advancedinstructions');

$advanced_content = "<div style='display: $display;' id='advanced-custom'>$advanced_instructions<br /><label>$code_label</label>$code_input</div>";

$basic_module = elgg_view_module('info', $basic_label, $basic_instructions);
$advanced_module = elgg_view_module('info', $advanced_label, $advanced_content);

$form_body = <<<HTML
		<div>
			$basic_module
			<label>$id_label</label>
			$id_input
		</div>
		<div>
			$advanced_module
		</div>
		<br />
		$save_input
		$group_hidden_input
		$escaped_code_input
	</div>
HTML;

echo $form_body;
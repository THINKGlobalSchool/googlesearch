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

$group = elgg_get_page_owner();

$id_label = elgg_echo('googlesearch:label:uniqueid');
$id_input = elgg_view('input/text', array(
	'internalid' => 'googlesearch-unique-id',
	'internalname' => 'googlesearch_unique_id',
	'value' => $group->google_search_unique_id
));

$advanced_label = elgg_echo('googlesearch:label:advanced');

$code_label =  elgg_echo('googlesearch:label:code');
$code_input = elgg_view('input/plaintext', array(
	'internalid' => 'googlesearch-code',
	'internalname' => 'googlesearch_code',
	'value' => urldecode($group->google_search_advanced)
));

$escaped_code_input = elgg_view('input/hidden', array(
	'internalid' => 'googlesearch-escaped-code',
	'internalname' => 'googlesearch_escaped_code',
	'value' => $group->google_search_advanced,
));

$save_input = elgg_view('input/submit', array(
	'internalid' => 'googlesearch-save',
	'internalname' => 'googlesearch_save',
	'value' => elgg_echo('googlesearch:label:save')
));



$group_hidden_input = elgg_view('input/hidden', array(
	'internalid' => 'googlesearch-group',
	'internalname' => 'googlesearch_group',
	'value' => $group->getGUID(),
));

if ($group->google_search_advanced) {
	$display = "block";
} else {
	$display = "none";
}

$basic_instructions = elgg_echo('googlesearch:label:basicinstructions');
$advanced_instructions = elgg_echo('googlesearch:label:advancedinstructions');

$form_body = <<<EOT
	<div style='padding-top: 10px;'>
		<div class='googlesearch-instructions'>
			$basic_instructions
		</div>
		<label>$id_label</label>
		$id_input
		<br /><br />
		<a id='googlesearch-showadvanced' href='#'>$advanced_label</a>
		<br /><br />
		<div style='display: $display;' id='googlesearch-advanced'>
			<div class='googlesearch-instructions'>
				$advanced_instructions
			</div>
			<label>$code_label</label>
			$code_input
			<br /><br />
		</div>
		$save_input
		$group_hidden_input
		$escaped_code_input
	</div>
	<script type='text/javascript'>
		$(document).ready(function() {
			$('#googlesearch-showadvanced').click(function() {
				$('#googlesearch-advanced').toggle('slow');
			});
			
			$('#googlesearch-save-form').submit(function() {
				$('#googlesearch-escaped-code').val(escape($('#googlesearch-code').val())); 
			});
		});
	</script>
EOT;

echo elgg_view('input/form', array(
	'internalid' => 'googlesearch-save-form',
	'internalname' => 'googlesearch_save_form',
	'body' => $form_body,
	'action' => elgg_get_site_url() . 'action/googlesearch/edit'
));
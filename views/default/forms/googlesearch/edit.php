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

$code_label =  elgg_echo('googlesearch:label:code');
$code_input = elgg_view('input/plaintext', array(
	'internalid' => 'googlesearch-code',
	'internalname' => 'googlesearch_code',
	'value' => urldecode($group->googlecustomsearch)
));

$escaped_code_input = elgg_view('input/hidden', array(
	'internalid' => 'googlesearch-escaped-code',
	'internalname' => 'googlesearch_escaped_code',
	'value' => $group->googlecustomsearch,
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


$form_body = <<<EOT
	<div style='padding-top: 10px;'>
		<label>$code_label</label>
		$code_input
		$save_input
		$group_hidden_input
		$escaped_code_input
	</div>
	<script type='text/javascript'>
		$(document).ready(function() {
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
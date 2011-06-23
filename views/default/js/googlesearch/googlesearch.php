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
?>
//<script>
elgg.provide('elgg.googlesearch');

elgg.googlesearch.init = function() {
	$('#googlesearch-save').live('click', function(event) {
		$('#googlesearch-escaped-code').val(escape($('#googlesearch-code').val())); 
	});
}

elgg.register_hook_handler('init', 'system', elgg.googlesearch.init);
//</script>

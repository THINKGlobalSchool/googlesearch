<?php
/**
 * Google Custom Search default template
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 * 
 */

$unique_id = $vars['uid'];

echo <<<HTML
	<script>
		var hide_description = function() {
			if ($('.googlesearch-desc').is(':visible')) {
				$('.googlesearch-desc').hide();
			}
		}

		var loadCallback = function() {
			$('input.gsc-input').keyup(function(e) { if(e.keyCode == 13 || e.which == 13) {  
				hide_description();
			}});

     		$('input.gsc-search-button').on('click', function(e) { 
     			hide_description();
     		});
		}

		window.__gcse = {
			callback: loadCallback,
		};
		(function() {
			var cx = '$unique_id';
			var gcse = document.createElement('script');
			gcse.type = 'text/javascript';
			gcse.async = true;
			gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
				'//www.google.com/cse/cse.js?cx=' + cx;
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(gcse, s);
		})();
	</script>
	<gcse:search></gcse:search>
HTML;
?>
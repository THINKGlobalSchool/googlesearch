<?php
/**
 * Google Custom Search default template
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2012
 * @link http://www.thinkglobalschool.com/
 * 
 * This is the default google custom search embed code, without any theme customizations
 * or preferences changes. This will only display results from the supplied pages
 */

$unique_id = $vars['uid'];

echo <<<EOT
	<div id="cse" style="width: 100%;">Loading</div>
	<script src="https://www.google.com/jsapi" type="text/javascript"></script>
	<script type="text/javascript">
	  google.load('search', '1', {language : 'en'});
	  google.setOnLoadCallback(function() {
	    var customSearchControl = new google.search.CustomSearchControl('$unique_id');
	    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
	    customSearchControl.draw('cse');
	  }, true);
	</script>
	<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />
EOT;
?>
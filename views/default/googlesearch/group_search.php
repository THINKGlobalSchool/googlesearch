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

$group = elgg_get_page_owner();

if ($group->canEdit()) {
	$edit_link = "<a href='" . elgg_get_site_url() . "pg/googlesearch/{$group->getGUID()}/edit'>" .
	 elgg_echo('googlesearch:label:owneredit') . 
	"</a>";
}

?>
<div class="group_tool_widget search">
	<span class='group_widget_link'><?php echo $edit_link; ?></span>
	<h3><?php echo elgg_echo("googlesearch"); ?></h3>
	<?php echo elgg_view('googlesearch/viewsearch'); ?>
</div>
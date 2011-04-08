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

if ($group->googlesearch_enable == 'yes') {
	
	if ($group->canEdit()) {
		$edit_link = " | <a href='" . elgg_get_site_url() . "pg/googlesearch/{$group->getGUID()}/edit'>" .
		 elgg_echo('googlesearch:label:owneredit') . 
		"</a>";
	}

	$popup_label = elgg_echo('googlesearch:label:whatisthis');
	$popup_info = elgg_echo('googlesearch:label:whatisthisinfo');

?>
<div class="group_tool_widget search">
	<span class='group_widget_link'>
		<span class='googlesearch-popup'><?php echo $popup_label; ?><span><?php echo $popup_info; ?></span></span>
		<?php echo $edit_link; ?>
	</span>
	<h3><?php echo elgg_echo("googlesearch"); ?></h3>
	<?php echo elgg_view('googlesearch/viewsearch'); ?>
</div>

<?php
}
?>
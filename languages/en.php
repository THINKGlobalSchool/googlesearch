<?php
/**
 * Google Custom Search english translation
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 * 
 */

$english = array(
	
	// Generic
	'googlesearch' => 'Google Custom Search',
	'groups:enablegooglesearch' => 'Enable google custom search',
	
	// Page titles 
	'googlesearch:title:editgooglesearch' => 'Edit Group Custom Search',

	
	// Menu items


	// Labels 
	'googlesearch:label:customsearch' => 'Custom Search',
	'googlesearch:label:nocustom' => 'This group does not have a Google Custom Search configured.',
	'googlesearch:label:owneredit' => 'Edit Google Custom Search',
	'googlesearch:label:code' => 'Google Search Code',
	'googlesearch:label:save' => 'Save',
	'googlesearch:label:uniqueid' => 'Google Search ID',
	'googlesearch:label:advanced' => 'Advanced',
	'googlesearch:label:whatisthis' => 'What is this?',
	'googlesearch:label:whatisthisinfo' => 'Google custom search allows you to create your own customized search experience. You can include one or more specific websites and customize the look and feel of the search results.<br /> <br />For more information visit the Google Custom Search homepage: <a href="http://www.google.com/cse/">http://www.google.com/cse</a>',
	
	'googlesearch:label:basicinstructions' => '
		<h3>Basic Instructions</h3><br />
		<ul>
			<li>Visit <a href="http://www.google.com/cse/">http://www.google.com/cse/</a> to <b>Create a Custom Search</b> Engine (or manage your existing search engines if you\'ve already created one).</li>
			<li> Once your search engine is created visit the <a href="http://www.google.com/cse/manage/all">custom search management page</a> and click on <b>Control Panel</b> next to the custom search you want to include.</li>
			<li>Look for the <b>Search engine unique ID</b> and enter into the box below</li>
		</ul>',
	
	'googlesearch:label:advancedinstructions' => '
		<h3>Advanced Instructions</h3>
		If you have customized the look and feel or any other preferences for your custom search, you will need to enter the custom search code below<br /><br />
		<ul>
			<li>Visit the <a href="http://www.google.com/cse/manage/all">custom search management page</a> and click on <b>Control Panel</b> next to the custom search you want to include.</li>
			<li>Click on <b>Get code</b> from the menu on the left</li>
			<li>Copy and paste the code supplied into the box below</li>
		</ul>',


	// Messages
	'googlesearch:success:save' => 'Google Custom Search saved successfully',
	'googlesearch:error:invalidgroup' => 'Invalid group',
	'googlesearch:error:required' => 'You need to supply a custom search id or custom search code',
	
	// Other content


);

add_translation('en',$english);

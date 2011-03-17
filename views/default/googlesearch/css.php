<?php
/**
 * Google Custom Search CSS
 * 
 * @package Google Custom Search
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 * 
 */
?>
span.googlesearch-popup {
    position:relative; 
    z-index:24; 
    text-decoration:none;
	cursor: pointer;
	color: #9D1520;
}

span.googlesearch-popup:hover {
	z-index:25; 
	cursor: pointer;
	color: #555555;
}

span.googlesearch-popup span {
	display: none;
}

span.googlesearch-popup:hover span { 
    display: block;
    position: absolute;
	padding: 5px;
	width: 200px;
	height: auto;
    top: -2em; 
	right: 0;
    border: 1px solid #bbb;
    background-color: #fff; 
    text-align: left;
}

span.googlesearch-popleft:hover span {
	right: -10em;
}

.googlesearch-instructions {
	border: 1px solid #bbb;
	background: #eee;
	padding: 10px;
	margin-bottom: 10px;
}

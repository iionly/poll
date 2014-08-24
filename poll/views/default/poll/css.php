<?php
/**
 * Elgg Poll plugin
 * @package Elggpoll
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @Original author John Mellberg
 * website http://www.syslogicinc.com
 * @Modified By Team Webgalli to work with ElggV1.5
 * www.webgalli.com or www.m4medicine.com
 */
?>


.poll_post h3 {
	font-size: 150%;
	margin:0 0 10px 0;
	padding:0;
}
.poll_post h3 a {
	text-decoration: none;
}
.poll_post p {
	margin: 0 0 5px 0;
}
.poll_post .strapline {
	margin: 0 0 0 35px;
	padding:0;
	color: #aaa;
	line-height:1em;
}
.poll_post p.tags {
	background:transparent url(<?php echo elgg_get_site_url(); ?>_graphics/icon_tag.gif) no-repeat scroll left 2px;
	margin:0 0 7px 35px;
	padding:0pt 0pt 0pt 16px;
	min-height:22px;
}
.poll_input-poll-choice {
	width: 90%;
}
.poll_progress_indicator {
	width:200px;
	padding: 5px;
}
.poll_progressBarContainer {
	height:12px;
	width:100%;
	border: 1px #00B0E4 solid;
	padding: 0;
	margin: 0;
}
.poll_progressBarContainer img {
	height: 12px;
	vertical-align: top;
}
.poll_filled-bar {
	background-color: #00B0E4;
	height: 12px;
}
.poll_widget-title {
	margin-bottom: 10px;
}
.poll_group-widget-box {
	border: 1px solid #CCCCCC;
	padding: 5px;
	margin-bottom: 10px;
}

/* ***************************************
   RIVER
*************************************** */

.river_object_poll_create {
	background: url(<?php echo elgg_get_site_url(); ?>mod/poll/graphics/river_icon_poll.gif) no-repeat left -1px;
}
.river_object_poll_update {
	background: url(<?php echo elgg_get_site_url(); ?>mod/poll/graphics/river_icon_poll.gif) no-repeat left -1px;
}
.river_object_poll_comment {
	background: url(<?php echo elgg_get_site_url(); ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_poll_vote {
	background: url(<?php echo elgg_get_site_url(); ?>mod/poll/graphics/river_icon_vote.gif) no-repeat left -1px;
}

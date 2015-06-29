<?php
	/**
	* river_comments
	*
	* @author Pedro Prez
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/

	//Individual river comment view
	$body = elgg_view('river_comments/comment/icon', $vars);
	$body .= elgg_view('river_comments/comment/content', $vars);
	echo elgg_view('river_comments/comment/wrapper', array_merge($vars, array('body' => $body)));
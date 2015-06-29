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

	// Load Elgg engine will not include plugins
	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
	
	$callback = true;
	
	//Add the action
	require_once(dirname(dirname(__FILE__)) . "/actions/river_comments/add.php");
	
	
	
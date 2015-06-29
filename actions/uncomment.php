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
	
	// Ensure we're logged in
	if (!elgg_is_logged_in()) {
		forward();
	}
	
	// Make sure we can get the comment in question
	$annotation_id = (int) get_input('annotation_id');
	if ($comment = get_annotation($annotation_id)) {
	
		$entity = get_entity($comment->entity_guid);
	
		if ($comment->canEdit()) {
			$comment->delete();
			system_message(elgg_echo("generic_comment:deleted"));
			forward($_SERVER['HTTP_REFERER']);
		}
	
	} else {
		$url = "";
	}
	
	register_error(elgg_echo("generic_comment:notdeleted"));
	forward($_SERVER['HTTP_REFERER']);
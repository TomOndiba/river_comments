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

	// Make sure we're logged in; forward to the front page if not
	
	if ($callback && !elgg_is_logged_in()) {
		echo 'loginerror';
		exit;
	}
	
	gatekeeper();
	
	// Get input
	$entity_guid = (int) get_input('guid');
	$comment_text = get_input('river_comment_text');
	
	// make sure comment is not empty
	if (empty($comment_text)) {
		if (!$callback) {
			register_error(elgg_echo("generic_comment:blank"));
			forward($_SERVER['HTTP_REFERER']);
		} else {
			echo "<p class='comment_error'>" . elgg_echo("generic_comment:blank") . "</p>";
			exit;
		}	
	}
	
	// Let's see if we can get an entity with the specified GUID
	$entity = get_entity($entity_guid);
	if (!$entity) {
		if (!$callback) {
			register_error(elgg_echo("generic_comment:notfound"));
			forward($_SERVER['HTTP_REFERER']);
		} else {
			echo "<p class='comment_error'>" . elgg_echo("generic_comment:notfound") . "</p>";
			exit;
		}
	}
	
	$user = elgg_get_logged_in_user_entity();
	
	$annotation = create_annotation($entity->guid, 
									'generic_comment',
									$comment_text, 
									"", 
									$user->guid, 
									$entity->access_id);
	
	if ($entity->owner_guid != $user->guid) {

	notify_user($entity->owner_guid,
				$user->guid,
				elgg_echo('generic_comment:email:subject'),
				elgg_echo('generic_comment:email:body', array(
					$entity->title,
					$user->name,
					$comment_text,
					$entity->getURL(),
					$user->name,
					$user->getURL()
				))
			);
}
	
	// tell user annotation posted
	if (!$annotation) {
		if (!$callback) {
			register_error(elgg_echo("generic_comment:failure"));
			forward($_SERVER['HTTP_REFERER']);
		} else {
			echo "<p class='comment_error'>" . elgg_echo("generic_comment:failure") . "</p>";
			exit;
		}
	}
	
	// notify if poster wasn't owner
	if ($entity->owner_guid != $user->guid) {
				
		notify_user($entity->owner_guid,
					$user->guid,
					elgg_echo('generic_comment:email:subject'),
					sprintf(
						elgg_echo('generic_comment:email:body'),
						$entity->title,
						$user->name,
						$comment_text,
						$entity->getURL(),
						$user->name,
						$user->getURL()
					)
				);
	}
	
	if (!$callback) {
		system_message(elgg_echo("generic_comment:posted"));
	
		// Forward to the entity page
		forward($_SERVER['HTTP_REFERER']);
	} else {
		//Fix for elgg version minor or equal than 1.6.2
		if (get_version() <= 2009072201 && $annotation) {
			
			
			$annotation = elgg_get_annotations(array('guid' => $entity_guid,
                                                
                                                 'annotation_name' => 'generic_comment',
                                                 'annotation_values' => $comment_text,
												 'annotation_owner_guid' => $user->guid));
			
			
			//$annotation = elgg_get_annotations($entity_guid, '','', 'generic_comment', $comment_text, $user->guid, 1);
			if (!empty($annotation)) {
				$annotation = array_shift($annotation);
			}
			$comment = $annotation;
		} else {
			$comment = elgg_get_annotation($annotation);
		}
		if ($comment) {
			$owner = get_user($comment->owner_guid);
			echo elgg_view('river_comments/river_comment', array(
				'owner' => $owner,
				'annotation' => $comment
			));
		}
	}
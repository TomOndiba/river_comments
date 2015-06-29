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
	
	
$item = $vars['item'];
$object = get_entity($item->object_guid);
	if (!$object instanceof ElggEntity) {
		return false;
}
	
set_input('comment_action', true);
?>	
	<!-- separator -->
	<!-- itemtime -->
	<!-- river_actions -->
	<!-- separator -->
<?php	
$site = elgg_get_site_url();
	//Get the comments
	//We count the quantity of people that comment about this object.
	//$comments_count = (int) count_annotations($object->getGUID(), "", "", 'generic_comment');
$comments_count = (int)elgg_get_annotations(array(
            'annotation_names' => 'generic_comment',
            'guid' => $object->getGUID(),
             'count' => true,
          ));			
?>
<div class="comment_box">
<div class="feed_comments">
<?php 
			$comments_offset = 0;
			$comments_limit = $comments_count;
			if ($comments_count > 0) {
				if ($comments_count > 3) {
					
					$comments_offset = $comments_limit-2;
					$comment_reduced = sprintf(elgg_echo('river_comments:viewallcomments'), $comments_count);
					//$link = "{$site}action/river_comments/allcomments?guid={$object->guid}&__elgg_ts={$__elgg_ts}&__elgg_token={$__elgg_token}";
					$link = "{$site}river_comments/allcomments/?guid={$object->guid}";
					//$js_more = "onclick=\"getMoreCommentsViaWidgets(this); return false\"";				
					$comment_reduced = <<<EOT
					<div class="comment_reduced comment_reduced_icon">
						<div class='comment_view_all'>
							<a  href="$link" target="_blank" title="$comment_reduced">
								$comment_reduced
							</a>
						</div>	
					</div>
EOT;
					echo elgg_view('river_comments/comment/wrapper', array(
						'body' => $comment_reduced
					));
				   }
				//$comments = get_annotations($object->getGUID(), "", "", 'generic_comment', "", "", $comments_limit, $comments_offset);
				
				
				$comments = elgg_get_annotations(array('guid' => $object->getGUID(),
                                                
                                                 'annotation_name' => 'generic_comment',
                                                 'limit' => $comments_limit,
												 'offset'=> $comments_offset));
				
				
				
				
				
				foreach($comments as $comment) {
					$owner = get_user($comment->owner_guid);
					echo elgg_view('river_comments/river_comment', array(
						'owner' => $owner,
						'annotation' => $comment
					));
				}
			}
			if (elgg_is_logged_in()) {
?>		
<div class="comment_feed comment_add_box">
<?php
					//Form View header 
					
					echo elgg_view('input/form_header', array(
						'id' => "c_form_{$vars['item']->object_guid}",									  
						'action' =>  "{$site}action/river_comments/add"
					));
					echo elgg_view('input/hidden', array(
						'name' => 'guid',
						'value' => $vars['item']->object_guid,  
					))
?>
<div class="comment_icon">
<?php	

$icon = elgg_view_entity_icon(elgg_get_logged_in_user_entity(), 'tiny');
echo $icon;							
?>
</div>
<?php 
if (elgg_get_context() == 'widgets') {
	elgg_load_js('ui.widgets');
}


?>	
<script type="text/javascript" src="<?php echo elgg_get_site_url(); ?>mod/river_comments/vendors/jquery.elastic/jquery.elastic.js"></script>							
	<textarea id="river_comment_textarea_<?php echo $item->object_guid; ?>" name="river_comment_text" class="mtm elgg-input-plaintext" placeholder="<?php echo elgg_echo('river_comments:writeacomment'); ?>"></textarea>
	<label class="comment_box_submit">
	<input type="submit" name="comment" value="<?php echo elgg_echo('river_comments:comment'); ?>" class="elgg-button elgg-button-submit" />
	</label>
<script>
   $('#river_comment_textarea_<?php echo $item->object_guid; ?>').elastic();
</script>		
</div> <!-- comment_add_box -->
<?php 
}
?>				
</div><!-- feed_comments -->
</div><!-- comment_box -->
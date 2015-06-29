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
	//Content comment view
?>
	<div class="comment_content">
			<div class="comment_text">
            
            <?php
			echo elgg_view("output/url",array(
						'href'	=> "{$vars['owner']->getURL()}",						  
						
						'text' => $vars['owner']->name,
						
						'class' => 'comment_username',
					));
			
				
                
                
                ?>
				<div class="comment_actual_text">
<?php 
					echo $vars['annotation']->value;
?>
				</div><!-- comment_actual_text -->
			</div><!-- comment_text -->
			<div class="comment_actions">
<?php 
				echo elgg_view_friendly_time($vars['annotation']->time_created);

				// if the user looking at the comment can edit, show the delete link
				if ($vars['annotation']->canEdit() || $comment->owner_guid) {
					
					$__elgg_ts = time();
                    $__elgg_token = generate_action_token($__elgg_ts);
?>

		 
<?php
					echo elgg_view("output/url",array(
										  
						'id' => "{$vars['annotation']->id}",
						'text' => elgg_echo('delete'),
						'onclick' => "delComent(this)",
						'class' => "delete_comment",
					));
				} 
				
?>
			</div><!-- comment_actions -->
		</div><!-- comment_content -->

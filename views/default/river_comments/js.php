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

	//River comments js
?>
	<script type="text/javascript">

		function rcPrepareItems() {
            //Add events
			$('.comment_add_box textarea').unbind('click');
			$('.comment_add_box textarea').click(function(){ readyToWrite(this) });
			$('.comment_add_box textarea').unbind('blur');
			$('.comment_add_box textarea').blur(function() { blurTextArea(this) });
			$('.jump_to_comment').unbind('click');
			$('.jump_to_comment').click(function(e){
				e.stopPropagation();
				jumpToComment(this)
				return false;	 
			});
			

				$('.comment_reduced a').unbind('click');
				$('.comment_reduced a').click(function(e){
					e.stopPropagation();
					getMoreComments(this);
					return false;
				})
		
			//The user can post comment via ajax
			$('.comment_box_submit input').unbind('click');
			$('.comment_box_submit input').click(function(e){
				e.stopPropagation();
				postComment(this);
				return false;
			})
			
			//post comment on enter
			$('.comment_add_box textarea').bind("keyup", function(e) {
            var code = e.keyCode || e.which; 
            if (code  == 13) {               
		    e.preventDefault();
	        postComment(this);
            return false;
            }
        });
			
		
		}

		function jumpToComment(oObject) {
			oParent = $(oObject).parents('.river_item');
			oParent.find('.comment_add_box textarea').click().focus();
		}

		function blurTextArea(oObject) {
			oObject = $(oObject);
			if (oObject.val() ==  "") {
				//Close if one textarea is open
				oObjectToClose = $('.comment_add_box textarea.current');
				oObjectToClose.removeClass('current');
				oObjectToClose.parent().find('.comment_icon').hide();
				oObjectToClose.parent().find('.comment_box_submit').hide();
				
				
			}	
		}

		function readyToWrite(oObject) {
			oObject = $(oObject);
		    oObject.val("");
			oObject.addClass('current');
			//Show the user photo
			oObject.parent().find('.comment_icon').show();
			oObject.parent().find('.comment_box_submit').show();
			
			
		}

		function getMoreComments(oObject) {
			oObject = $(oObject);
			oParent = oObject.parent();
			oMaster = oObject.parents('.feed_comments');
			oTextArea = oMaster.find('.comment_add_box textarea');
			oParent.addClass('river_comment_loading');
			//Prepare for delete...when the comments are loaded
			oParent.parent().parent().addClass('to_remove');
			//Delete all the warning
			oMaster.find('.river_error').remove();
			//Get the content via ajax.
			$.get(oObject.attr('href') + '&callback=1', function(data){
			   if(data != 'loginerror' && data.length > 0) {
				   oParent.parents('.feed_comments').prepend(data);
				   oParent.parents('.feed_comments').find('.to_remove').remove();
				} else {
					oTextArea.after("<span class='river_error'><?php echo elgg_echo('river_comments:notloginerror')?></span>");
				} 
			 });
		}

		function getMoreCommentsViaWidgets(oObject){
			rcPrepareItems(); 
			getMoreComments(oObject); 
			return false;
		}
		
         <?php
		 
		 $__elgg_ts = time();
         $__elgg_token = generate_action_token($__elgg_ts);
		 
		 ?>
		 
		 
		 
		  function delComent(item){
		   oObject = item.id;
		   var url = "<?php echo elgg_get_site_url(); ?>action/river_comments/delete";
		   
	       $.ajax({
           type: "GET",
           url: url,
           data: "annotation_id="+oObject+"&__elgg_ts=<?php echo $__elgg_ts; ?>&__elgg_token=<?php echo $__elgg_token; ?>", // serializes the form's elements.
           success: function(data)
           {
               $("#comment_"+oObject).remove(); 
			   elgg.system_message('<?php echo elgg_echo('river_comments:delete')?>');
           }
         });
		}

		 

		function postComment(oObject) {
			oObject = $(oObject);
			oMaster = oObject.parents('.feed_comments');
			oTextArea = oMaster.find('.comment_add_box textarea');
			oHiddenGuid = oMaster.find('input:hidden[name=guid]');
			endpoint = "<?php echo elgg_get_site_url(); ?>mod/river_comments/endpoint/comment.php";
			dataPost = new Object();
			dataPost.river_comment_text = oTextArea.val();
			dataPost.guid = oHiddenGuid.val();
			//Disable the botton
			oTextArea.attr('disabled', 'disabled');
			oObject.attr('disabled', 'disabled');
			//Delete all the warning
			oMaster.find('.river_error').remove();
			$.post(endpoint, dataPost, function(data){
				if (data.length > 0) {
					if(data != 'loginerror') {
						oMaster.find('.comment_add_box').before(data);
					} else {
						oTextArea.after("<span class='river_error'><?php echo elgg_echo('river_comments:notloginerror')?></span>");
						elgg.system_message('<?php echo elgg_echo('river_comments:notloginerror')?>');
					} 
				}
				//Reset the textarea for write comments
				oTextArea.val("");
				oTextArea.attr('placeholder','<?php echo elgg_echo('river_comments:writeacomment'); ?>');
				oObject.removeAttr('disabled');
				oTextArea.removeAttr('disabled');
				elgg.system_message('<?php echo elgg_echo('river_comments:succes')?>');
				
			});
			
	
			
		}
		
		$(document).ready(function(){
		     rcPrepareItems();
		})
	</script>
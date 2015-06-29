<?php
	/**
	* river_comments
	*
	* @author Pedro Prez
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	
	adaptado por mariano tomasini
	*/

	//River comments css
?>
	.comment_box {
		font-size: 0.9em;
		margin-bottom: 8px;
        
	}
    .delete_comment {
    cursor:pointer;
    }
	.comment_add_box {
		overflow: hidden;
		/*margin: 8px 28px;*/
		padding: 3px;
		 height:auto;
	}
	.comment_add_box textarea {
		float: left;
		font-size: 1.0em;
		height:14px;
		margin: 0px;
		width: 100%;
       height:auto;
       border: 1px solid #d2d2d2;
	}
	.comment_add_box textarea.current {
		height: 29px;
		 height:auto;
	}
	.comment_icon {
		float: left;
		margin-right: 4px;
		width: 30px;
	}
	.comment_add_box .comment_icon {
	display: none;
	}
	.comment_box_submit {
		
		float: right;
		margin: 4px 6px 0 0;
		width: auto;
	}
	
	label.comment_box_submit input {
		font-size: 1.0em;
		height: auto;
		margin: 0px;
		padding: 2px;
	}
	
	/*List comments*/
	.comment_box .comment_feed {
		background: #F5F5F5;
		border-bottom:1px solid #DFDFDF;
		clear:left;
		float:none;
		overflow:hidden;
		margin: 2px 0 2px 30px;
		padding: 5px;
		 height:auto;
        
	}
	.comment_content {
		display:table-cell;
		vertical-align:top;
		/* width:300px; */
		width:auto; /* TM */
		
		
	}
	.comment_text {
		padding: 0 5px 0 0;
	}
	.comment_author  {
		font-weight:bold;
	}
	.comment_actual_text {
		/* min-width:450px; */
               /*  width:250px; */
                width:auto;
        
        overflow: hidden;
        word-wrap: break-word;
	}
	.comment_actions  {
		color:#777777;
		padding:2px 0 1px;
	}
	
	.comment_reduced {
		background: #F3F3F3;
		padding: 0 0 0 21px;
	}
	.comment_view_all {
		margin: 0 8px 0 0;
	}
	.comment_reduced_icon {
		background: transparent url(<?php echo elgg_get_site_url();?>mod/river_comments/graphics/river_icon_comment.png) no-repeat;
	}
	.river_comment_loading{
		background: transparent url(<?php echo elgg_get_site_url();?>mod/river_comments/graphics/loading.gif) no-repeat center right;
	}
	.comment_error, .river_error {
		color: red;
	}
	.river_error {
		padding-left:36px;
		display:block;
	}
	/*Support for Widget Activity*/
	.collapsable_box_content .comment_feed {
		margin:2px 15px;
		width:230px;
	}
	.collapsable_box_content .comment_box .comment_feed {
		margin: 0px 30px;
	}
	.collapsable_box_content .comment_add_box textarea {
		width:213px;
         
	}
	.collapsable_box_content .comment_add_box textarea.current {
		width: 179px;
	}
	.collapsable_box_content .comment_box_submit {
		display: block;
	}
	
	/*River*/
	.item_separator {
		clear: both;
		display: block;
		margin: 1px 0px;
		height:3px;
	}
	.river_item_time {
		padding:0 0 0 32px;
	}
	.river_action_links {
		font-size: 90%;
	}	
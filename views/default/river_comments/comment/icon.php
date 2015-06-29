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

	//Icon View
	
	$entity = $vars['entity'];
	
	$icon = elgg_view_entity_icon($vars['owner'], 'tiny');
	
	//$icon = elgg_view_entity_icon("profile/icon",array(
	//	'entity' => $vars['owner'], 
	//	'size' => 'tiny',
	//	'override' => true)
	//);
?>
	<div class="comment_icon">
<?php
		echo $icon;
?>		
	</div><!-- comment_icon -->	
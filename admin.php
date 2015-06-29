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

	// Get the Elgg engine
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	set_context('admin');
	admin_gatekeeper();
	
	$plugin = find_plugin_settings('river_comments');
	$form_body = elgg_view('settings/river_comments/edit', array('entity' => $plugin));
	//$submit_button = elgg_view('input/submit', array('value' => elgg_echo('save')));
	$form_body .= "<p>" . elgg_view('input/hidden', array('internalname' => 'plugin', 'value' => 'river_comments')) . $submit_button . "</p>";
	
	$content = elgg_view('input/form', array('action' => "{$CONFIG->url}action/plugins/settings/save", 'body' => $form_body));
	$content = "<div class='contentWrapper'>$content</div>";
	
	$title = elgg_echo('river_comments:admin');
	$body = elgg_view_layout('two_column_left_sidebar', '', elgg_view_title($title) . $content);
	page_draw($title, $body);
?>
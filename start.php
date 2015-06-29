<?php
	/**
	* river_comments
	*
	* @author Pedro Prez (modificado por mariano tomasini forosdroid.com)
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/



	function river_comments_init() {
		global $CONFIG;


        elgg_register_js('ui.widgets', $CONFIG->wwwroot . "mod/river_comments/js/lib/ui.widgets.js");
		//Page Handler
		elgg_register_page_handler('river_comments','river_comments_page_handler');
		
		//Extend css view
		elgg_extend_view('css/elgg', 'river_comments/css');
		
		//Elastic Plugin
		elgg_extend_view('page/elements/footer', 'river_comments/footer', 400);
		
		//Extend js view on riverdashboard
		elgg_extend_view('page/elements/footer', 'river_comments/js', 450);
		elgg_extend_view('riverdashboard/js', 'river_comments/riverdashboardjs');
		elgg_extend_view('page/elements/comments', 'river_comments/comments');
		//View for river actions
		elgg_extend_view('river/item/actions','river_comments/item_action');
		elgg_extend_view('river/elements/responses', 'river/responses');
		
		//Print the plugin version
		elgg_extend_view('head', 'river_comments/version');
		
		if (elgg_is_admin_logged_in()) {
			elgg_extend_view('page_elements/header_contents', 'river_comments/comments');
		}
 
		//Actions
		$actions_path = elgg_get_plugins_path() . "river_comments/actions/river_comments";
	
	    elgg_register_action("river_comments/add", "$actions_path/add.php");
	    elgg_register_action("river_comments/delete", "$actions_path/delete.php");

	
	}


	function river_comments_page_handler($page) {
		
		switch($page[0]){
			case "allcomments":
				include(dirname(__FILE__) . "/allcomments.php");
				return true;
			default:
				return false;
		}
		
	}

	function river_comments_setup() {
		
		$priority = 600;	
		/*
		 * Out of the box mods
		*/
		if (elgg_get_plugin_setting('show_thewire', 'river_comments') != 'no') {
			elgg_extend_view('river/object/thewire/create', 'river_comments/comments', $priority);
		}
		if (elgg_get_plugin_setting('show_blog', 'river_comments') != 'no') {
			elgg_extend_view('river/object/blog/create', 'river_comments/comments', $priority);
		}
		if (elgg_get_plugin_setting('show_page', 'river_comments') != 'no') {
			elgg_extend_view('river/object/page/create', 'river_comments/comments', $priority);
		}
		if (elgg_get_plugin_setting('show_topic', 'river_comments') != 'no') {
			elgg_extend_view('river/forum/topic/create', 'river_comments/comments', $priority);
		}
		
		/*
		 * Third party mods
		*/
		//Tidypics
		if (elgg_is_active_plugin('tidypics') && elgg_get_plugin_setting('show_tidypics_image', 'river_comments') != 'no') {
			elgg_extend_view('river/object/image/create', 'river_comments/comments', $priority);
		}
	
		if (elgg_is_active_plugin('tidypics') && elgg_get_plugin_setting('show_tidypics_album', 'river_comments') != 'no') {
			elgg_extend_view('river/object/album/create', 'river_comments/comments', $priority);
		}
		//iZap Videos
		if (elgg_is_active_plugin('izap_videos') && elgg_get_plugin_setting('show_izap_videos', 'river_comments') != 'no') {
			elgg_extend_view('river/object/izap_videos/create', 'river_comments/comments', $priority);
		}
		//Event Calendar
		if (elgg_is_active_plugin('event_calendar') && elgg_get_plugin_setting('show_event_calendar', 'river_comments') != 'no') {
			elgg_extend_view('river/object/event_calendar/create', 'river_comments/comments', $priority);
		}
		
	}

	elgg_register_event_handler('init','system','river_comments_init');
	elgg_register_event_handler('pagesetup','system','river_comments_setup');
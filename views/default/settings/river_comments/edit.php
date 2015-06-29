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
	
	
	if (!isset($vars['entity']->enable_ajaxsupport)) {
		$vars['entity']->enable_ajaxsupport = 'yes';
	}
	if (!isset($vars['entity']->show_blog)) {
		$vars['entity']->show_blog = 'yes';
	}
	if (!isset($vars['entity']->show_thewire)) {
		$vars['entity']->show_thewire = 'yes';
	}
	if (!isset($vars['entity']->show_page)) {
		$vars['entity']->show_page = 'yes';
	}
	if (!isset($vars['entity']->show_topic)) {
		$vars['entity']->show_topic = 'yes';
	}
?>	
<p>
	<?php echo elgg_echo('river_comments:enable_ajaxsupport'); ?>
	<select name="params[enable_ajaxsupport]">
		<option value="yes" <?php if ($vars['entity']->enable_ajaxsupport == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->enable_ajaxsupport != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<br />
	<h3><?php echo elgg_echo('river_comments:admin:subtitle') ?></h3>
<br />
<p>
	<?php echo elgg_echo('river_comments:show:thewire'); ?>
	<select name="params[show_thewire]">
		<option value="yes" <?php if ($vars['entity']->show_thewire == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_thewire != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('river_comments:show:blog'); ?>
	<select name="params[show_blog]">
		<option value="yes" <?php if ($vars['entity']->show_blog == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_blog != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('river_comments:show:page'); ?>
	<select name="params[show_page]">
		<option value="yes" <?php if ($vars['entity']->show_page == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_page != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('river_comments:show:topic'); ?>
	<select name="params[show_topic]">
		<option value="yes" <?php if ($vars['entity']->show_topic == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_topic != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php 
	if (elgg_is_active_plugin('tidypics')) {
?>
<p>
	<?php echo elgg_echo('river_comments:show:tidypics_image'); ?>
	<select name="params[show_tidypics_image]">
		<option value="yes" <?php if ($vars['entity']->show_tidypics_image == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_tidypics_image != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('river_comments:show:tidypics_album'); ?>
	<select name="params[show_tidypics_album]">
		<option value="yes" <?php if ($vars['entity']->show_tidypics_album == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_tidypics_album != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php 
	}
?>
<?php 
	if (elgg_is_active_plugin('izap_videos')) {
?>
<p>
	<?php echo elgg_echo('river_comments:show:izap_videos'); ?>
	<select name="params[show_izap_videos]">
		<option value="yes" <?php if ($vars['entity']->show_izap_videos == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_izap_videos != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php 
	}
?>
<?php 
	if (elgg_is_active_plugin('event_calendar')) {
?>
<p>
	<?php echo elgg_echo('river_comments:show:event_calendar'); ?>
	<select name="params[show_event_calendar]">
		<option value="yes" <?php if ($vars['entity']->show_event_calendar == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_event_calendar != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php 
	}

?>
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

	if (isset($vars['internalid'])) {
		$id = $vars['internalid'];
	} else {
		$id = '';
	}
	
	if (isset($vars['name'])) {
		$name = $vars['name'];
	} else {
		$name = '';
	}
	$body = $vars['body'];
	$action = $vars['action'];
	if (isset($vars['enctype'])) {
		$enctype = $vars['enctype'];
	} else {
		$enctype = '';
	}
	if (isset($vars['method'])) {
		$method = $vars['method'];
	} else {
		$method = 'POST';
	}
	
	$method = strtolower($method);
	
	// Generate a security header
	$security_header = "";
	if (!isset($vars['disable_security']) || $vars['disable_security'] != true) {
		$security_header = elgg_view('input/securitytoken');
	}
	?>

	<?php echo $security_header; ?>
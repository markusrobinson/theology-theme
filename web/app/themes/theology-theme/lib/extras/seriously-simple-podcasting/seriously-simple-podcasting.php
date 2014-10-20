<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require_once('seriously-simple-podcasting-functions.php');
require_once('classes/class-seriously-simple-podcasting.php');

global $ss_podcasting;
$ss_podcasting = new SeriouslySimplePodcasting( __FILE__ );

if( is_admin() ) {
	require_once('classes/class-seriously-simple-podcasting-admin.php');
	$ss_podcasting_admin = new SeriouslySimplePodcasting_Admin( __FILE__ );
}

require_once('classes/class-seriously-simple-podcasting-widget.php');

?>
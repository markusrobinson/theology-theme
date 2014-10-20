<?php


require_once(dirname(__FILE__) . '/lib/the-events-calendar.class.php');

TribeEvents::instance();

register_activation_hook( dirname( __FILE__ ) . '/lib/the-events-calendar.class.php', array( 'TribeEvents', 'flushRewriteRules' ) );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
	register_deactivation_hook( __FILE__, array( 'TribeEvents', 'resetActivationMessage' ) );
}

<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);


function metaboxes() {

    $meta_boxes['mighty_metabox_video'] = array(
        'id'         => 'mighty-metabox-video',
        'title'      => __( 'Video Details', 'cmb' ),
        'pages'      => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true,
        'fields'     => array(
            array(
                'name' => __( 'Self Hosted Video URL', 'cmb' ),
                'desc' => __( 'Enter in the URL to the video MP4 or M4V file. (Example: http://domain.com/movie.mp4)', 'cmb' ),
                'id'   => 'video-url',
                'type' => 'text_url',
            ),
            array(
                'name' => __( 'Third Party Video', 'cmb' ),
                'desc' => __( 'Enter a YouTube, Vimeo, etc URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb' ),
                'id'   => 'video-embed',
                'type' => 'oembed',
            ),
        ),
    );



    return $meta_boxes;
}

add_action( 'init', 'metaboxes', 9999 );

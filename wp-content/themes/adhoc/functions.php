<?php 
	add_action('wp_enqueue_scripts', 'init_css_scripts'); 
	function init_css_scripts() {
		 wp_enqueue_style('my-script-slug',  get_stylesheet_directory_uri() . '/style.css');
		 wp_enqueue_script('my-script-slug', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
		 wp_enqueue_script('my-script-slug', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js');
	}

	add_action( 'init', 'create_post_type' );
	function create_post_type() {
	  // register_post_type( 'section',
	  //   array(
	  //     'labels' => array(
	  //       'name' => __( 'Sections' ),
	  //       'singular_name' => __( 'Section' )
	  //     ),
	  //   'public' => true,
	  //   'has_archive' => true,
	  //   )

	    register_post_type( 'adhoc_section',
	    array(
	      'labels' => array(
	        'name' => __( 'Sections' ),
	        'singular_name' => __( 'Section' )
	      ),
	    'taxonomies' => array('category'),
	    'public' => true,
	    'has_archive' => true,
	    )
	  );

	}

	function adhoc_register_theme_menu() {
	    register_nav_menu( 'primary', 'Main Navigation Menu' );
	}
	add_action( 'init', 'adhoc_register_theme_menu' );

	/* Edits to default WP gallery plugin */
	function fix_my_gallery_wpse43558($output, $attr) {
    global $post;

    static $instance = 0;
    $instance++;


    /**
     *  will remove this since we don't want an endless loop going on here
     */
    // Allow plugins/themes to override the default gallery template.
    //$output = apply_filters('post_gallery', '', $attr);

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'full',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        /**
         * this is the css you want to remove
         *  #1 in question
         */
        /*
        $gallery_style = "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;
                width: {$itemwidth}%;
            }
            #{$selector} img {
                border: 2px solid #cfcfcf;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->";
        */
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
       
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    /**
     * this is the extra br you want to remove so we change it to jus closing div tag
     * #3 in question
     */
    /*$output .= "
            <br style='clear: both;' />
        </div>\n";
     */

    $output .= "</div>\n";
    return $output;
}
add_filter("post_gallery", "fix_my_gallery_wpse43558",10,2);

?>
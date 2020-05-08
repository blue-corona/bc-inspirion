<?php
function pm_foundation_styles() {
  wp_enqueue_style( 'foundation-normalize', get_template_directory_uri() . '/css/normalize.min.css' );
  wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css' );
  wp_enqueue_style( 'pm_foundation-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'wordpress-helper', get_template_directory_uri() . '/css/wp.min.css' );
  // wp_enqueue_style( 'gotham-font', '//cloud.typography.com/6307712/773888/css/fonts.css' ); Moved to locally hosted below because cdn is domain locked
  wp_enqueue_style( 'gotham-font', get_template_directory_uri() . '/css/gotham.css' );
  // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,700,700italic|Roboto+Condensed:400,700,700italic,400italic,300italic,300|Lato:300,400,700|Muli:300,400,500,600&display=swap' );
  wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/fonts/icomoon/style.css' );
  wp_enqueue_style( 'font-awesome5', get_template_directory_uri() . '/css/fontawesomepro5.css' );
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '1.0.0', false );
  /* wp_enqueue_script( 'my-jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '1.0.0', true ); */
  wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/js/foundation.min.js', array(), '1.0.0', true );
  wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/vendor/slick/slick.js', array(), '1.0.0', true );
  wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/js/plugins.min.js', array(), '1.0.0', true );
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
  /* wp_enqueue_script( 'foundation-equalizer', get_template_directory_uri() . '/js/foundation/foundation.equalizer.js', array(), '1.0.0', true ); */
}
add_action( 'wp_enqueue_scripts', 'pm_foundation_styles' );

// ACF Options Page
if (function_exists('acf_add_options_page')) {
  acf_add_options_page('Theme Options');
}

function power_link($ID) {
  $link = get_permalink($ID);
  echo $link;
}

add_theme_support('menus');
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1568, 9999 );

// Register a Sidebar
function inspirion_sidebars() {
  $args = array(
    'id'            => 'inspirion_front_page_sidebar',
    'class'         => 'inspirion-front-page-sidebar',
    'name'          => 'Front Page Sidebar',
    'description'   => '',
    'before_widget' => '<ul class="widgets-list"><li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li></ul>',
  );
  register_sidebar( $args );
  $args = array(
    'id'            => 'inspirion_page_sidebar',
    'class'         => 'inspirion-page-sidebar',
    'name'          => 'Page Sidebar',
    'description'   => '',
    'before_widget' => '<ul class="widgets-list"><li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li></ul>',
  );
  register_sidebar( $args );
}
add_action( 'widgets_init', 'inspirion_sidebars' );


/*  Thumbnail upscale http://alxmedia.se/code/2013/10/thumbnail-upscale-correct-crop-in-wordpress/ */
function alx_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    if ( !$crop ) return null; // let the wordpress default function handle this

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'alx_thumbnail_upscale', 10, 6 );

// Register Image Sizes
add_image_size( 'hero', 1920, 200, true );
add_image_size( 'header', 1000, 344, true );

?>
<?php
function new_excerpt_more($more) {
    global $post;
    return '&hellip;';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>
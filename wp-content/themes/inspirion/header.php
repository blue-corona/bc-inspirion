<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title(); ?></title>
  
  <?php wp_head(); ?>
  <?php include('favicon.php'); ?>

<meta name="google-site-verification" content="JA6YVFg_kE9dK4UP8NyaBwYqLiND41YTnhslXqV0Emw" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158380240-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-158380240-1');
gtag('config', 'UA-102975391-1');
</script>
<script type="text/javascript">
var _stk = "c256e7587ed95f2203f9675aa98e61debbf49170";
(function(){
var a=document, b=a.createElement("script"); b.type="text/javascript";
b.async=!0; b.src=('https:'==document.location.protocol ? 'https://' :
'http://') + 'd31y97ze264gaa.cloudfront.net/assets/st/js/st.js';
a=a.getElementsByTagName("script")[0]; a.parentNode.insertBefore(b,a);
})();
</script>  
</head>

<body <?php body_class(); ?>>

<!-- Start off Canvas Opening -->
<div class="off-canvas-wrap" data-offcanvas>
<div class="inner-wrap">
<aside class="right-off-canvas-menu">
  <?php wp_nav_menu(array('container' => false, 'menu' => 'Main', 'menu_id' => 'main', 'items_wrap' => '<nav class="%2$s"><ul>%3$s</ul></nav>')); ?>
</aside>
<!-- End off Canvas Opening -->

<header class="main-header">
  <div class="row">
    <div class="columns">
      <div class="header-flex-container">
        <!-- Logo Image Link -->
        <div class="logo">
          <a href="<?php bloginfo('url'); ?>"><img src="<?php $image = get_field('logo', 'options'); if($image) { echo $image['url']; } ?>" alt="Inspirion Biosciences Logo"> </a>
        </div>

        <!-- Basic Navigation Menu -->
        <?php wp_nav_menu(array('container' => false, 'menu' => 'Main', 'menu_id' => 'main', 'items_wrap' => '<nav class="show-for-large-up %2$s"><ul>%3$s</ul></nav>')); ?>
        <a class="right-off-canvas-toggle hide-for-large-up" href="#" ><i class="fa fa-list-ul"></i> Menu</a>

      </div>
      <?php $callout = get_field('callout_button_text', 'options');
      if($callout) { ?>
        <div class="employment-button hide-for-small-only">
          <a href="<?php the_field('callout_button_url', 'options'); ?>"><?php the_field('callout_button_text', 'options'); ?></a>
        </div>
      <?php } ?>
	      <?php $callout = get_field('callout_button_text', 'options');
      if($callout) {
			$phone_number = get_field('phone_number', 'options');
		  ?>
        <div class="header-number hide-for-small-only">
          <a href="tel:<?php echo $phone_number; ?>"><i class="fas fa5-phone" ></i> <?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); ?></a> 
        </div>
      <?php } ?>


    </div>
  </div>
</header>

<div class="push-down"></div>

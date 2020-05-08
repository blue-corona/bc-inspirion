<footer class="main-footer">
  <div class="row relative" data-equalizer>
    <div class="medium-3 columns" data-equalizer-watch>
   		<div class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php $image = get_field('logo_reversed', 'options'); if($image) { echo $image['url']; } ?>" alt="Inspirion Biosciences Logo"></a></div>
   		<?php $address = get_field('address', 'options'); if($address) {echo $address;} ?>
		 <?php $contact = get_field('contact_info', 'options'); if($contact) {echo $contact;} ?>
		<?php
		if( have_rows('social_icons', 'options') ):
		?><ul class="social"><?php
			while ( have_rows('social_icons', 'options') ) : the_row();
				?><li><a href="<?php the_sub_field('social_link', 'options'); ?>" target="_blank"><i class="fa fa-<?php the_sub_field('social_class_part', 'options'); ?>"></i></a></li><?php
			endwhile;
		?></ul><?php
		endif;
		?>
    </div>
    <div class="medium-5 columns" data-equalizer-watch>
     
      <!--
    	<ul class="contact">
    		<li><a href="mailto:#">name@inspirionbio.com</a><br></li>
    		<li>P: 240.674.5716</li>
    		<li>F: 301.631.8470</li>
    	</ul>
      -->

    	<div class="footer-menu-columns" >
		<?php wp_nav_menu( array('menu' => 'Footer Menu', 'menu_class'      => 'footer-menu' )); ?>
		<?php wp_nav_menu( array('menu' => 'Quick Links', 'menu_class'      => 'footer-links' )); ?>

    </div>
    </div>
    <div class="medium-2 columns text-right small-only-text-left vosb" data-equalizer-watch>
      <img src="<?php bloginfo('template_directory'); ?>/img/vosb.png" alt="Veteran Owned Small Business">
    </div>
    <div class="medium-2 columns text-right small-only-text-left vosb" data-equalizer-watch>
      <img src="<?php bloginfo('template_directory'); ?>/img/100-bulldog.png" alt="100 Bulldog - Proud 2019 Business">
    </div>
  </div>
</footer>
<section class="colophon">
	<div class="row">
    <div class="columns">
		  <ul>
		  <li><i class="far fa5-copyright"></i> <?php echo date('Y');?> <?php bloginfo('title'); ?></li>
		  <li>Web Design by <a href="https://www.bluecorona.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/bc-logo.png"/> blue corona</a></li> 
		  <li> <a href="#" data-reveal-id="disclaimerModal">Disclaimer</a></li>
		  </ul>
    </div>
	</div>
</section>
<!-- Disclaimer Start -->
<div id="disclaimerModal" class="reveal-modal disclaimer-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<div class="modal-content">
  <div id="modalTitle" class="modal-title">Disclaimer</div><a class="close-reveal-modal modal-close" aria-label="Close"></a>
  <?php the_field('disclaimer_information', 'options'); ?>  
</div>
</div>
<!-- Disclaimer End-->
<!-- Close Off Canvas Start -->
<a class="exit-off-canvas"></a>
</div>
</div>
<!-- Close Off Canvas End -->

<?php wp_footer(); ?>
<script>
let $ = jQuery;
$(document).foundation();

<?php if(is_front_page()) { ?>
      $('.hide-slideshow').removeClass('hide-slideshow');
<?php } ?>


$(function(){
  var shrinkHeader = 50;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {

        if ($(window).width() > 1024) {
          $('header').addClass('shrink');
        }

    } else {
      $('header').removeClass('shrink');
    }
  });

  function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
  }
});
</script>
</body>
</html>

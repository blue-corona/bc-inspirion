<div class="large-offset-1 large-4 columns radius sidebar-area" >
<div class="sidebar-area-content">
   <?php if(!get_field('hide_sidebar_form')){ ?>
   <div class="sidebar-form-outer">
   <div class="sidebar-form">
      <div class="sidebar-form-title"><?php the_field('form_heading', 'options'); ?></div>
      <?php echo do_shortcode('[gravityform id="3" title="false" description="false"]'); ?>
   </div>
   </div>
   <?php } ?>
   <?php if(!get_field('hide_sidebar_blog')){ ?>
   <div class="sidebar-blog-outer">
   <div class="sidebar-blog">
      <?php
         $args = array(
            'post_type' => 'post',
         'posts_per_page'=>1
         );
         // The Query
         $the_query = new WP_Query( $args );
         
         // The Loop
         if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
         	
                $the_query->the_post();
         	?>
      <?php $thumbnail_id = get_post_thumbnail_id( $the_query->ID );
         $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>" />
      <div class="sidebarblog-content">
         <div class="sidebarblog-title">Our most recent blog</div>
         <?php the_excerpt(); ?>
         <div class="bottom-card">
            <span class="date"><?php echo get_the_date('d/m/Y'); ?></span>
            <a href="<?php the_permalink(); ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
         </div>
      </div>
      <?php
         }
         } else {
         // no posts found
         }
         /* Restore original Post Data */
         wp_reset_postdata(); ?>
   </div>
   </div>
   <?php } ?>
</div>
</div>
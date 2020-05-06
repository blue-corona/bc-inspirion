<?php get_header(); ?>

	<?php include('inc/hero-image.php'); ?>
	<div class="page-wrap">
		<div class="row">

			<div class="columns <?php if(!get_field('hide_sidebar')) { ?>large-7<?php } else { ?><?php } ?>" >
				<div class="page-content">
					<h1><?php single_post_title(); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					  <div class="row">
						<div class="columns">
						  <div class="post-excerpt">
							<a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
							<p><?php the_excerpt(); ?></p>
						  </div>
						</div>
					  </div>
					<?php endwhile; ?>
					<?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
					<?php endif; ?>
				</div>
			</div>

			<?php if(!get_field('hide_sidebar')){ ?><?php get_sidebar(); ?><?php } ?>

		</div>
	</div>




<?php get_footer(); ?>
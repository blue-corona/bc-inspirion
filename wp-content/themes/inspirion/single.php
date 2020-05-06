<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php include('inc/hero-image.php'); ?>
	<div class="page-wrap">
		<div class="row" >

			<div class="columns <?php if(!get_field('hide_sidebar')) { ?>large-7<?php } else { ?><?php } ?>" >
				<div class="page-content">
					<h1><?php include('inc/title.php'); ?></h1>
					<?php the_content(); ?>
					<div class="post-navigation">
					<?php if (get_previous_post() && get_next_post()) {previous_post_link('&laquo; %link', 'Previous Post'); echo '<span class="seperator">|</span>'; next_post_link('%link &raquo;', 'Next Post');}
					if (get_previous_post() && !get_next_post()) {previous_post_link('&laquo; %link', 'Previous Post');}
					if (!get_previous_post() && get_next_post()) {next_post_link('%link &raquo;', 'Next Post'); } ?>
					</div>
				</div>
			</div>

			<?php if(!get_field('hide_sidebar')){ ?><?php get_sidebar(); ?><?php } ?>

		</div>
	</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
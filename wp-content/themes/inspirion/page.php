<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php include('inc/hero-image.php'); ?>
	<div class="page-wrap">
		<div class="row" >

			<div class="columns <?php if(!get_field('hide_sidebar')) { ?>large-7<?php } else { ?><?php } ?>" >
				<div class="page-content">
					<h1><?php include('inc/title.php'); ?></h1>
					<?php the_content(); ?>
					<?php if(get_field('hidden_content')): ?>
					<div class="hidden-part">
						<div class="hide-content"><?php the_field('hidden_content'); ?></div>
						<a class="learn-btn spage">Read More</a>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<?php if(!get_field('hide_sidebar')){ ?><?php get_sidebar(); ?><?php } ?>

		</div>
	</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
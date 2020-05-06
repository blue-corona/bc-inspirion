<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php 
	$attachment_id = get_field('header_image');
	$size = 'header';
	$icon = false;
	$image = wp_get_attachment_image_src( $attachment_id, $size, $icon); ?>
<section class="hero relative" style="background-image: url('<?php echo $image[0]; ?>');">
	<div class="row collapse">
		<?php if(get_field('header_text')) { ?><div class="slogan"><?php the_field('header_text'); ?></div><?php } ?>
	</div>
</section>

<section class="service-section">
	<div class="row">
	<div class="columns" >
	<div class="service-row" data-equalizer>
<?php 
if( have_rows('home_blocks') ):
?><?php
    while ( have_rows('home_blocks') ) : the_row();
        $block_image = get_sub_field('block_image');
        $block_heading = get_sub_field('block_heading');
        $block_description = get_sub_field('block_description');
        $block_link = get_sub_field('block_link');
		?>
		<div class="service-columns" data-equalizer-watch>
		<div class="service-columns-block" data-equalizer-watch>
		<?php if($block_image): ?>
		<div class="service-img">
			<img src="<?php echo $block_image['url']; ?>" alt="<?php echo $block_image['alt']; ?>"/>
		</div>
		<?php endif; ?>
		<div class="service-content">
		<div class="service-title <?php if(!$block_image): ?>service-title-equal<?php endif; ?>"><?php echo $block_heading; ?></div>
		<p><?php echo $block_description; ?></p>
		<div class="service-btn">
			<?php
			if( $block_link ): 
				$link_url = $block_link['url'] ? $block_link['url'] : '#';
				$link_title = $block_link['title'] ? $block_link['title'] : 'Learn More';
				$link_target = $block_link['target'] ? $block_link['target'] : '_self';
				?>
				<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="button-effect button-mobile"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>
		</div>
		</div>
		</div>
		</div>
		<?php
    endwhile;
?><?php
endif;
?>
	</div>
	</div>
	</div>
</section>
<section class="homepage-form">
	<div class="row">
	<div class="columns" >
		<div class="homepage-form-title"><?php the_field('form_heading'); ?></div>
		<?php echo do_shortcode('[gravityform id="2" title="false" description="false"]'); ?>
	</div>
	</div>
</section>
<section class="row" >
	<div class="columns" >
		<div class="front-page-content">
			<h1>Inspirion Biosciences: The Global Biorisk Management Authority</h1>

			<?php the_content(); ?>
			
			<?php if(get_field('hidden_content')): ?>
			<div class="hidden-part">
				<div class="hide-content"><?php the_field('hidden_content'); ?></div>
				<a class="button-effect button-gray learn-btn homepage-rm">Read More +</a>
			</div>
			<?php endif; ?>

		</div>
	 </div>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>

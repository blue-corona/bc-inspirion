<?php
	$attachment_id = get_field('header_image');
	$size = 'header';
	$icon = false;
	$image = wp_get_attachment_image_src( $attachment_id, $size, $icon); ?>
<?php if(get_field('header_image')) { ?>
<section class="hero relative" style="background-image: url('<?php echo $image[0]; ?>');">
	<div class="row collapse">
		<?php if(get_field('header_text')) { ?><div class="slogan"><?php the_field('header_text'); ?></div><?php } ?>
	</div>
</section>
<?php } 
else
{
	?>
	<section class="hero relative" style="background-image: url('<?php echo site_url(); ?>/wp-content/uploads/2015/09/academic-research-labs.jpg');">
	</section>
	<?php
}
?>
<?php get_header(); ?>

<div class="wrapper">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail" ); ?>
	<?php $image_width = $image_data[1]; ?>
	<?php $image_height = $image_data[2]; ?>
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "CreativeWork",
		"mainEntityOfPage": "<?php the_permalink(); ?>",
		"headline": "<?php the_title(); ?>",
		"alternativeHeadline": "<?php the_title(); ?>",
		"image": {
			"@type": "ImageObject",
			"height": "<?php echo $image_height; ?>",
			"width": "<?php echo $image_width; ?>",
			"url": "<?php the_post_thumbnail_url(); ?>"
		},
		"keywords": "",
		"url": "<?php the_permalink(); ?>",
		"datePublished": "<?php echo get_the_date(); ?>",
		"dateCreated": "<?php echo get_the_date(); ?>",
		"dateModified": "<?php the_modified_date(); ?>",
		"description": "<?php the_excerpt(); ?>",
		"publisher": {
		    "@type": "Organization",
			"logo": {
				"@type": "ImageObject",
				"url": "<?php echo get_site_icon_url(); ?>"
			},
		    "name": "<?php bloginfo('name'); ?>"
		},
		"author": {
			"@type": "Person",
			"name": "<?php the_author_meta('display_name');?>"
		}
	}
	</script>
	<div class="portfolio">
		<div class="imageHolder">
			<a href="<?php the_permalink(); ?>" class="post-thumbnail">
				<?php the_post_thumbnail('portfoliothumb'); ?>
				<h4 class="post-title"><?php the_title(); ?></h4>
			</a>
		</div>
	</div>

	<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer(); ?>
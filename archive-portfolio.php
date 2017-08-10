<?php get_header(); ?>

<div class="wrapper" role="main">

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
	<div <?php post_class('box'); ?>>
		<div class="card">
			<div class="card-image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfoliothumb'); ?></a>
			</div>
			<div class="card-title">
				<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
			<div class="card-content">
				<?php the_excerpt(); ?>
			</div>
			<div class="card-actions">
				<a href="<?php the_permalink(); ?>" class="link-primary">View</a>
			</div>
		</div>
	</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
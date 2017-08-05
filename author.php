<?php get_header(); ?>

	<div class="box">
		<h2><?php the_author_meta('display_name');?></h2>
	</div>
</div>

<div class="wrapper">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail" ); ?>
	<?php $image_width = $image_data[1]; ?>
	<?php $image_height = $image_data[2]; ?>
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "BlogPosting",
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
		"articleBody": "<?php the_excerpt(); ?>",
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
	<div class="box grid">
		<div class="box thumb">
			<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail('blogthumb'); ?></a>
		</div>
		<div class="box content">
			<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="post-meta">
				<span class="meta-icon"><?php echo get_avatar( get_the_author_meta( 'ID' ), 12 ); ?></span><a class="meta-text" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author_meta('display_name');?></a>| <span class="meta-icon fa fa-clock-o" aria-hidden="true"></span><span class="meta-text"><?php the_date('dS F Y'); ?></span>| <span class="meta-icon fa fa-cloud" aria-hidden="true"></span><span class="meta-text"><?php the_category( ', ' ); ?></span>| <span class="meta"><?php echo get_the_tag_list('<span class="meta-icon fa fa-tags" aria-hidden="true"></span><span class="meta-text"> ',', ','</span>'); ?></span>| <span class="meta-icon fa fa-comments-o"></span><span class="meta-text"> <a href="<?php the_permalink(); ?>/#comments"><?php comments_number( '0', '1', '%' ); ?></a></span>
			</div>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="button">Read...</a>
		</div>
	</div>

	<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer(); ?>
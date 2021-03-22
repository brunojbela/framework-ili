<div class="card flex-md-row mb-4 box-shadow h-md-250">
	<div class="card-body d-flex flex-column align-items-start">
		<strong class="d-inline-block mb-2 text-primary"><?php echo get_the_category_list(); ?></strong>
		<h3 class="mb-0">
			<a class="text-dark" href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
		</h3>
		<div class="mb-1 text-muted"><?php odin_posted_on(); ?></div>
		<p class="card-text mb-auto"><?php the_excerpt(); ?></p>
		<a href="<?php echo esc_url(get_permalink()); ?>"><?php _e('Read More'); ?></a>
	</div>
	<?php if (!empty(get_the_post_thumbnail())) { ?>
		<img class="lazy-load card-img-right flex-auto d-none d-md-block"
			 data-src="<?php echo get_the_post_thumbnail_url($post->ID, 'post-thumbnail'); ?>"
			 alt="<?php the_title(); ?>">
	<?php } ?>
</div>

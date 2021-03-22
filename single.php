<?php get_header(); ?>
    <main id="content" class="post" tabindex="-1" role="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
		<div class="container">
			<div class="posts-relacionados">
				<?php posts_realcionados(3, 'col-md-6', $post->ID); ?>
			</div>
		</div>
    </main>
    <!-- #main -->
    <?php
get_footer();
setPostViews(get_the_ID());

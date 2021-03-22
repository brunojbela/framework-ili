<?php get_header(); ?>
    <main id="content" class="busca" tabindex="-1" role="main">
		<div class="container">
			<header class="page-header">
				<h1 class="page-title">
					<?php printf( __( 'Search Results for: %s', 'odin' ), get_search_query() ); ?>
				</h1>
			</header>
		</div>
        <div class="container">
            <div class="row">
                    <?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							echo '<div class="col-md-6">';
								get_template_part('content', 'excerpt');
							echo '</div>';
						endwhile;
						odin_paging_nav();
					else :
						get_template_part( 'content', 'none' );
				endif;
			?>
            </div>
        </div>
    </main>
    <?php
get_footer();

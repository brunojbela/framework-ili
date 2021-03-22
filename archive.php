<?php get_header(); ?>
	<main id="content" class="arquivos" tabindex="-1" role="main">
		<div class="container">
			<header class="page-header">
				<?php
				the_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description('<div class="taxonomy-description">', '</div>');
				?>
			</header>
		</div>
		<div class="container">
			<div class="row">
				<?php if (have_posts()) :
					while (have_posts()) : the_post();
						echo '<div class="col-md-6">';
							get_template_part('content', 'excerpt');
						echo '</div>';
					endwhile;
					odin_paging_nav();
				else :
					get_template_part('content', 'none');
				endif;
				?>
			</div>
		</div>
	</main>
<?php get_footer();

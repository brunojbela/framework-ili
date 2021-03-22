<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<footer id="footer" class="footer" .breadcrumb>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10">&copy;
				<?php echo 'Copyright'; ?>
				<?php echo date('Y'); ?>
				<a href="<?php echo esc_url(home_url()); ?>">
					<?php bloginfo('name'); ?>
				</a> - <a href="<?php echo esc_url(home_url('/?p=5')); ?>">Mapa do site</a>
			</div>
			<figure class="col-xs-12 col-sm-2 mb-0">
				<a href="//agenciaili.com.br/" target="_blank"
				   title="Agência Ili - Marketing Digital: SEO, Links Patrocinados, Facebook Ads e outros"
				   rel="nofollow">
					<small>Designed by</small>
					<img src="<?php echo CONTENT_URI . '/assets/images/logo-agencia-ili.png'; ?>" width="25"
						 alt="Agência Ili - Marketing Digital: SEO, Links Patrocinados, Facebook Ads e outros"
						 title="Agência Ili - Marketing Digital: SEO, Links Patrocinados, Facebook Ads e outros">
				</a>
			</figure>
		</div>
	</div>
</footer>
<!-- #footer -->
<?php wp_footer(); ?>
</body>

</html>

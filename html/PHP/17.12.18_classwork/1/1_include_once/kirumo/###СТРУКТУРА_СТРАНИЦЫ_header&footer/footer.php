<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kirumo
 */
?>

		</div><!-- #content -->
	</div><!-- #page -->

	<?php if ( is_active_sidebar( 'sidebar-footer' ) ) :?>
		<div class="footer-wrap border">
			<?php get_sidebar( 'footer' ); ?>
		</div>
	<?php endif; ?>
	<div class="footer-wrap">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<a href="http://wp-templates.ru/" title="скачать шаблон">шаблоны сайтов</a>, <a href="http://fonstyle.ru/" title="обои для рабочего стола">скачать обои</a>
			</div><!-- .site-info -->
			<nav id="footer-navigation" class="social-menu" role="navigation">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'social',
						'depth'          => 1,
						'walker'         => new Social_Menu_Walker,
					)
				); ?>
			</div>
			</nav>
		</footer><!-- #colophon -->
	</div>
	</div><!-- #page-wrap -->
</div><!-- #page-clip -->

<?php wp_footer(); ?>

</body>
</html>
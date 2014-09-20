<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Clarity
 */
?>
		</div><!-- .site-content-wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info wrap">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'clarity' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'clarity' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'clarity' ), 'Clarity', '<a href="http://fikrirasyid.com" rel="designer">Fikri Rasyid</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

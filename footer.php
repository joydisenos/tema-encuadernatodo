<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sydney
 */
?>
			</div>
		</div>
	</div><!-- #content -->

	

	<?php do_action('sydney_before_footer'); ?>

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php get_sidebar('footer'); ?>
	<?php endif; ?>

    <a class="go-top"><i class="fa fa-angle-up"></i></a>
		
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			
			Corporación Encuadernatodo c.a. Rif J-40534605-1 

			<span class="sep"> | </span>
			
			Todos los derechos reservados

		</div><!-- .site-info -->
	</footer><!-- #colophon -->



	<?php do_action('sydney_after_footer'); ?>

</div><!-- #page -->

<div class="boton-social">
	<p>Síguenos en:</p>
	<div class="social-encuadernatodo">
		<ul>
			<li><a href="https://www.instagram.com/encuadernatodo/"><i class="fa fa-instagram"></i></a></li>
			<li><a href="https://www.facebook.com/encuadernatodoccs/"><i class="fa fa-facebook"></i></a></li>
			<li><a href="https://twitter.com/encuadernatodo"><i class="fa fa-twitter"></i></a></li>
			<li><a href="mailto:encuadernatodo.ccs@gmail.com"><i class="fa fa-envelope-o"></i></a></li>
		</ul>
</div>
</div>

<?php wp_footer(); ?>

</body>
</html>

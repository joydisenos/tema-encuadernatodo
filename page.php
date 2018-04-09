<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Sydney
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-9">
		<main id="main" class="post-wrap" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			<?php if(is_page( 'presupuesto-en-linea' )){  ?>

			<?php 
			global $wpdb;

        $table_name = $wpdb->prefix . "servicios";
        $rows = $wpdb->get_results("SELECT * from $table_name Where activo='on' ");
         ?>

         <div class="tabla-presupuesto">
        	
        	<table class="servicios">
            <thead>
            	<tr>
                <td class="">Servicio</td>
                <td>Cantidad</td>
            </tr>
            </thead>
            <tbody>
              
            <?php foreach ($rows as $row) { ?>
                <tr class="resultados">
                    <td class=""><?php echo $row->nombre; ?></td>
                    <td> <input type="number" class="cantidades" min="0" value="0" name="cantidad"> 
                    <input type="hidden" class="precios" name="precio" value="<?php echo $row->precio; ?>">
                    <!-- <div class="subtotal"></div> -->
                    
              
                    </td>
                </tr>



            <?php } ?>
            </tbody>
            	<tr>
            		<td></td>
            		<td><div id="suma" class="resultado-presupuesto">0</div></td>
            	</tr>
        </table>

        </div>
        
    
			
		<?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

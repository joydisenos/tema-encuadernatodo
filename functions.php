<?php 




function encuadernatodo_theme() {
	
	
	// https://codex.wordpress.org/Function_Reference/wp_enqueue_style
	// wp_enqueue_style( $handle, $src, $deps, $ver, $media )
	wp_enqueue_style('sydney', get_template_directory_uri() .'/style.css');
	
	
	wp_enqueue_script('personalizado', get_stylesheet_directory_uri() .'/js/personalizado.js', array('jquery'),'3.3.1');
	// enqueue de estilos del tema hijo
	// wp_enqueue_style('encuadernatodo', get_stylesheet_directory_uri() .'/style.css', array('sydney'));
	
}
add_action('wp_enqueue_scripts', 'encuadernatodo_theme');


add_action('init',function() {

	include dirname( __FILE__ ) . '/includes/class-menu-presupuesto.php';
	include dirname( __FILE__ ) . '/includes/class-servicio-list-table.php';
	include dirname( __FILE__ ) . '/includes/class-form-handler.php';
	include dirname( __FILE__ ) . '/includes/servicio-functions.php';
	include dirname( __FILE__ ) . '/includes/presupuesto-functions.php';

	new menu_presupuesto();
});

add_action('init',function(){

    global $wpdb;
    
    $table_name = $wpdb->prefix . 'servicios';

    //sql con el statement de la tabla
    $sql = "CREATE TABLE $table_name (
      id int(11) NOT NULL AUTO_INCREMENT,
      nombre varchar(255) DEFAULT NULL,
      precio int(10) DEFAULT NULL,
      activo varchar(255) DEFAULT NULL,
      date varchar(255) DEFAULT NULL,
      UNIQUE KEY id (id)
    );";
 
//upgrade contiene la función dbDelta la cuál revisará si existe la tabla o no
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 
    //creamos la tabla
    dbDelta($sql);
});


add_action( 'widgets_init', function(){
	register_widget( 'presupuesto_encuadernatodo' );
});

class presupuesto_encuadernatodo extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'presupuesto_encuadernatodo',
			'description' => 'Presupuesto para servicios',
		);
		parent::__construct( 'presupuesto_encuadernatodo', 'Presupuesto Encuadernatodo', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget

		global $wpdb;

        $table_name = $wpdb->prefix . "servicios";
        $rows = $wpdb->get_results("SELECT * from $table_name Where activo='on' ");

        ?>
        

        <div class="tabla-presupuesto">
        	
        	<table class="servicios">
            <tr>
                <td class="">Servicio</td>
                <td>Cantidad</td>
            </tr>
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
        
  

   
    <?php
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}

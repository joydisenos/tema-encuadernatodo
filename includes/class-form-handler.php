<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
    }

    /**
     * Handle the servicio new and edit form
     *
     * @return void
     */
    public function handle_form() {
        if ( ! isset( $_POST['submit_servicio'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'servicio-new' ) ) {
            die( __( 'Are you cheating?', 'encuadernatodo' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'encuadernatodo' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=presupuesto' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;

        $nombre = isset( $_POST['nombre'] ) ? sanitize_text_field( $_POST['nombre'] ) : '';
        $precio = isset( $_POST['precio'] ) ? intval( $_POST['precio'] ) : 0;
        $activo = isset( $_POST['activo'] ) ? sanitize_text_field( $_POST['activo'] ) : '';

        // some basic validation
        if ( ! $nombre ) {
            $errors[] = __( 'Error: Nombre del Servicio es requerido', 'encuadernatodo' );
        }

        if ( ! $precio ) {
            $errors[] = __( 'Error: Precio es requerido', 'encuadernatodo' );
        }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'activo' => $activo,
        );

        // New or edit?
        if ( ! $field_id ) {

            $insert_id = encuadernatodo_insert_servicio( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = encuadernatodo_insert_servicio( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
            $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );
        }

        wp_safe_redirect( $redirect_to );
        exit;
    }
}

new Form_Handler();
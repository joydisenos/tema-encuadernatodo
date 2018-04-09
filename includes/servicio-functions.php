<?php

/**
 * Get all servicio
 *
 * @param $args array
 *
 * @return array
 */



function encuadernatodo_get_all_servicio( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'servicio-all';
    $items     = wp_cache_get( $cache_key, 'encuadernatodo' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'servicios ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'encuadernatodo' );
    }

    return $items;
}

/**
 * Fetch all servicio from database
 *
 * @return array
 */
function encuadernatodo_get_servicio_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'servicios' );
}

/**
 * Fetch a single servicio from database
 *
 * @param int   $id
 *
 * @return array
 */
function encuadernatodo_get_servicio( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'servicios WHERE id = %d', $id ) );
}


//adicional

/**
 * Insert a new servicio
 *
 * @param array $args
 */
function encuadernatodo_insert_servicio( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'nombre' => '',
        'precio' => '',
        'activo' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'servicios';

    // some basic validation
    if ( empty( $args['nombre'] ) ) {
        return new WP_Error( 'no-nombre', __( 'Nombre del Servicio no suministrado.', 'encuadernatodo' ) );
    }
    if ( empty( $args['precio'] ) ) {
        return new WP_Error( 'no-precio', __( 'Precio no suministrado.', 'encuadernatodo' ) );
    }

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
    unset( $args['id'] );

    if ( ! $row_id ) {

        $args['date'] = current_time( 'mysql' );

        // insert a new
        if ( $wpdb->insert( $table_name, $args ) ) {
            return $wpdb->insert_id;
        }

    } else {

        // do update method here
        if ( $wpdb->update( $table_name, $args, array( 'id' => $row_id ) ) ) {
            return $row_id;
        }
    }

    return false;
}
<?php 


global $wpdb;
$table_name = $wpdb->prefix . 'servicios';

if ($action='delete'){

        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));

        echo "<h2>Servicio Eliminado</h2>";


    }else{
    	echo "No hay nada que eliminar";
    }
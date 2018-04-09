<?php 

function despues_del_contenido($content){
if (is_page('presupuesto'))
	$content .= 'Tu firma o tu anuncio va aqui';
	return $content;

}
add_filter( "the_content", "despues_del_contenido" );
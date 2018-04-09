 (function($){

$(document).ready(function(){
        

$('.cantidades').change(function(){

  var subtotalPrecio=0;

  var totalPrecio=0;


  $(".resultados").each(function(){
        
	        
	          var subtotalPrecio = parseInt($(this).find('.cantidades').val()) * parseInt($(this).find('.precios').val());

	     
	            /*$(this).find('.subtotal').text(subtotalPrecio);*/

	            totalPrecio += subtotalPrecio;

      	});

 		 $('#suma').text('Total Bs. '+totalPrecio);

	});

 
});
 
 })(jQuery);


function add(valor,valor2){
	
	$.get('add.php',{id_Juguete:valor,action:valor2},function(data){

		window.location='../vista/prueba.php';

	});

}


function add2(valor,valor2){

}
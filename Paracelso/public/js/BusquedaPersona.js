$(document).on("click",".pagination li a",function(e){
	e.preventDefault();
	var url=$(this).attr("href");

	$.ajax({
		type:'GET',
		url:url,
		success: function(data){
			$('#resultadobusqueda').empty().html(data);
		}
	})
});

$('#botonBuscarPersonas').click(function(event)
{
	var ruta="/BuscarPersona";
	var nombre = $('#nombre').val();
	var ap_paterno=$('#ap_paterno').val();
	var ap_materno=$('#ap_materno').val();
	var token = $("input[name=_token]").val();

	if((nombre.length>1 && ap_paterno.length>1)||(nombre.length>1 && ap_materno.length>1)||(ap_paterno.length>1 && ap_materno.length>1))
	{
	$.ajax({
		url:ruta,
		headers:{ 'X-CSRF-TOKEN':token },
		type:'GET',
		datatype:'json',
		data:{nombre:nombre,ap_paterno:ap_paterno,ap_materno:ap_materno},
		success: function(data)
		{
			$('#resultadobusqueda').empty().html(data);
		}
	})
	}
	else
	{
		alert ("Por favor debe ingresar por lo menos dos datos y 2 caracteres para la busqueda");
	}
});

// $('#botonBuscarPersonas').on('click',function(){
// 	$.ajaxSetup({
//   				headers:{
//   							'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
//   						}
// 	});

// 	var nombre = $('#nombre').val();
// 	var ap_paterno=$('#ap_paterno').val();
// 	var ap_materno=$('#ap_materno').val();
// 	var token=$('#token').val();
// 	var codigo=$('#codigo').val();

// 	var tipo_busqueda='/BuscarPersona'; //crea la ruta a la cual manda los datos para la busqueda
	
// 	if((nombre.length>1 && ap_paterno.length>1)||(nombre.length>1 && ap_materno.length>1)||(ap_paterno.length>1 && ap_materno.length>1))
// 	{
// 		// alert({nombre:nombre,ap_paterno:ap_paterno,ap_materno:ap_materno,token:token,codigo:codigo});
// 		$.post(tipo_busqueda,{nombre:nombre,ap_paterno:ap_paterno,ap_materno:ap_materno,token:token,codigo:codigo},function(markup)
// 	 	{
// 	 		$('#resultadobusqueda').html(markup); //sustituye el contenido de #resultadobusqueda
// 	 	} );
// 	}
// 	else
// 	 	{alert ("Por favor debe ingresar por lo menos dos datos y 4 caracteres para la busqueda");}
// });
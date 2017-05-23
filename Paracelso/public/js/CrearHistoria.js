$('#guardarHistoria').on('click',function(e)
{
	//alert('en proceso');
	var id_medico = $('#id_medico').val();
	var grupo_sanguineo = $('#grupo_sanguineo').val();
	var nota = $('#nota').val();		
	var token = $("input[name=_token]").val();
	var url = "{{ route('historia.store') }}"

	var dataString = {id_medico:id_medico, grupo_sanguineo:grupo_sanguineo, nota:nota, token:token};
	
	//alert(url);

	$.ajax({
		url:url,
	  	headers:{'X-CSRF-TOKEN':token},
	  	type:'POST',
	  	datatype:'JSON',
	  	data: dataString,		  		
	  	success:function(data)
	  	{
	  		if(data.success == 'true')
	  		{
	  			alert('Historia se Guardo Correctamente!');
	  			// $('#guardar').addClass('disabledTab');
	  			// $('#Tab2').removeClass('disabledTab');
	  			// $('#Tab3').removeClass('disabledTab');
	  			// $('#Tab4').removeClass('disabledTab');
	  			// $('#Tab5').removeClass('disabledTab');
	  			// $('#Tab6').removeClass('disabledTab');
	  			document.getElementById("id_historia").setAttribute("value",JSON.stringify(data.id));
	  			//alert(data.id);
	  		}
	  	},
	  	error:function(data)
	  	{
			
	  	}
	});
	e.preventDefault();
});
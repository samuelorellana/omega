function mayuscula(campo){
    $(campo).keyup(function() {
                   $(this).val($(this).val().toUpperCase());
    });
}
function alcargar(){
							$('#foto').hover(function(){
														$(this).find('a').fadeIn();
														},
											function(){
														$(this).find('a').fadeOut();
														}
											);
							$('#eligeArchivo').on('click',function(e){
																		e.preventDefault();
																		$('#imagenpersona').click();
																	}
												);

							$('input[type=file]').change(function(){
								var nombre=(this.files[0].name).toString();
								var reader=new FileReader();

								$('#infoArchivo').text('');
								$('#infoArchivo').text(nombre);

								reader.onload=function(e){
									$('#foto img').attr('src',e.target.result);
								}

								reader.readAsDataURL(this.files[0]);
							});
					}
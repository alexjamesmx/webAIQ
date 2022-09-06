$(document).ready(function () {
    //mandar a llamar el id del res definido 1
    $( "#btn-agregar" ).click( function( e ) {
		//$( "#cargando" ).show();

		$.ajax({
			"url"      : appData.base_url + "Menu/agregamenu",
			"type"     : "post",
			"dataType" : "json",
			"data"     : {
				"id_user"    : $( "#id_res" ).val(),
				"nombre" : $( "#nombre" ).val(),
				"precio" : $( "#precio" ).val(),
				"tiempo" : $( "#tiempo" ).val(),
				"tipo"    : $( "#tipo" ).val(),
				"descripcion"      : $( "#descripcion" ).val(),
				"imagen"      : $( "#imagen" ).val()
			}
		})
		.done(() => {
            message("success",'Platillo agregado')
        })
		.fail(() => {
            message("danger",'Error: Hubo un problema con la petición')
        })
	});
})


//enpreparacion

// solo por acetar

$(document).ready(function () {
    get_table1();
})

function get_table1() {

    $.ajax({
        url: appData.base_url + 'Dasboard/enpreparacion',
        dataType: 'json',
        type: 'post',
    })
        .done(function (data) {
            //alert(JSON.stringify(data))
            $('#contidadpreparando').html(data.cantidad);
            if (data.res) {
                $.each(data.pedidos, function (i, p) {
                    id = p.id_pedido
                    $('#table-preparando').append(
                        '<tr>' +

                        '<td id="detallepreparando' + id + '">' +

                        '</td>' +
                        '<td class="text-center mx-2">' +
                        '<p class="text-muted timeres">' +
                        '<span class="badge badge-pill badge-outline-success">05:23</span>' +
                        '</p>' +
                        '</td>' +
                        '<td class="text-center mx-2">' +
                        '<p class="list-item-heading">2022-' + id + '</p>' +
                        '</td>' +
                        '<td class="text-center my-auto">' +
                        '<p>' +
                        '&nbsp; <a href="#" onclick="listo_pedido(' + id + ')" class="btn btn-outline-success restaricon">' +
                        '<i class="iconsminds-chef-hat"></i>Si</a>' +
                        '</p>' +

                        '</td>' +
                        '</tr>'
                    )
                    $.ajax({
                        url: appData.base_url + 'Dasboard/detalle_pedido',
                        dataType: 'json',
                        type: 'post',
                        data: {
                            'id_pedido': id,
                        },
                    })
                        .done(function (response) {
                            //alert(JSON.stringify(response)) 
                            $.each(response.detalle, function (i, d) {

                                if (d.comentario != null) {
                                    $('#detallepreparando' + d.id_pedido).append(
                                        '<p class="ml-3">' +
                                        d.cantidad + ' ----- ' + d.nombre +
                                        '</p>' +
                                        '<span class=" text-muted ml-4">' + d.comentario + '</span>'
                                    )
                                } else {
                                    $('#detallepreparando' + d.id_pedido).append(
                                        '<p class="ml-3">' +
                                        d.cantidad + ' ----- ' + d.nombre + '</p>'
                                    )
                                }

                            })
                        })
                        .fail()
                })
            }
        })
        .fail()

}

function listo_pedido(id_pedido) {
    $.ajax(

        {
            "url": appData.base_url + 'Dasboard/btn_listo',
            "dataType": 'json',
            "type": 'post',
            "data": {
                'id_pedido': id_pedido
            },
            success: function (data) {
                if (data.res) {
                    //alert(data.mes);
                     $('#table-preparando').empty();
                     $('#table-espera').empty();
                     $('#contidadpreparando').empty();
                     setTimeout(function () {
                         get_table1();
                         get_table2();
                     }, 500);
                } else{
                    alert("Error: " + data.mes);
                }

            },
            error: function () {
                alert('Error de Ajax');
            }
        }
    );
}

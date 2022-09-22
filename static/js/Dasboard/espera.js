
$(document).ready(function () {
    get_table2();
})

function get_table2() {

    $.ajax({
        url: appData.base_url + 'Dasboard/espera',
        dataType: 'json',
        type: 'post',
    })
        .done(function (data) {
            //alert(JSON.stringify(data))
            $('#contidadespera').html(data.cantidad);
            if (data.res) {
                $.each(data.pedidos, function (i, p) {
                    id= p.id_pedido
                    id_rep = p.id_repartidor;
                    $('#table-espera').append(
                        '<tr>' +
                            '<td> ' +
                                '<p class="list-item-heading mx-3"> 2022-' + p.id_pedido + ' </p>' +
                            '</td>' +
                            '<td class="text-center mx-2">' +
                                '<p class="text-muted"> $' + p.total + ' </p>' +
                            '</td>' +
                            '<td class="text-center mx-2">' +
                                '<p class="text-muted"> ' + p.metodo + ' </p>' +
                            '</td>' +
                            '<td class="text-center mx-2">' +
                                '<p class="text-muted">' + p.nombre + '</p>' +
                            '</td>' +
                            '<td class="text-center mx-2">' +
                                '<p class="text-muted"> ' + p.nombre_alias + ' </p>' +
                            '</td>' +
                            '<td id="detalleespera' + id + '">' +
                                
                            '</td>' +
                            '<td>' +
                                '<p>' +
                                    '&nbsp; <a href="#" onclick="enviado_pedido(' + id + ')" class="btn btn-outline-success restaricon">' +
                                    '<i class="iconsminds-mail-send"></i> Enviado </a>' +
                                    '&nbsp;' +

                                    '&nbsp; <a href="#" onclick="cancelado_pedido(' + id + ','+ id_rep + ')" class="btn btn-outline-danger restaricon">' +
                                    '<i class="simple-icon-close"></i> Cancelado </a> &nbsp;' +
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
                           $.each(response.detalle, function(i, d){ 

                             if (d.comentario != null) {
                                 $('#detalleespera'+d.id_pedido).append(
                                     '<p class="ml-3">' +
                                     d.cantidad + ' ----- ' + d.nombre +
                                     '</p>' +
                                     '<span class=" text-muted ml-4">' + d.comentario + '</span>'
                                 )
                             } else {
                                 $('#detalleespera'+d.id_pedido).append(
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

function enviado_pedido(id_pedido) {
    //alert("pedido enviado con id: " + id_pedido);
    $.ajax({
        url: appData.base_url + 'Dasboard/btn_enviado',
        dataType: 'json',
        type: 'post',
        data: {
            'id_pedido': id_pedido,
        },
    })
        .done(function (data) {
            //alert(JSON.stringify(data))
            $('#table-espera').empty();
            $('#table-enviados').empty();
            $('#contidadespera').empty();
            setTimeout(function () {
                get_table2();
                get_table3();
                rechazados = 0;
            }, 500);
        })
        .fail()
}

function cancelado_pedido(id_pedido, id_repartidor) {
    //alert("pedido devolucion o cancelado con id: " + id_pedido + id_repartidor);
     $.ajax({
         url: appData.base_url + 'Dasboard/btn_cancelado',
         dataType: 'json',
         type: 'post',
         data: {
             'id_pedido': id_pedido,
             'id_repartidor': id_repartidor
         },
     })
         .done(function (data) {
             //alert(JSON.stringify(data))
             $('#table-espera').empty();
             $('#contidadespera').empty();
             setTimeout(function () {
                 get_table2();
             }, 500);
         })
         .fail()
}


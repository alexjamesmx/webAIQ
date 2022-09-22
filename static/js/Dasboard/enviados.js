
$(document).ready(function () {
    get_table3();
})

function get_table3() {

    $.ajax({
        url: appData.base_url + 'Dasboard/enviado',
        dataType: 'json',
        type: 'post',
    })
        .done(function (data) {
            //alert(JSON.stringify(data))
            $('#contidadenviados').html(data.cantidad);
            if (data.res) {
                $.each(data.pedidos, function (i, p) {
                    id= p.id_pedido
                    id_rep = p.id_repartidor
                    $('#table-enviados').append(
                        '<tr>' +
                            '<td> ' +
                                '<p class="list-item-heading mx-3"> 2022-' + p.id_pedido + ' </p>' +
                            '</td>' +
                            '<td class="text-center mx-2">' +
                                '<p class="text-muted">' + p.nombre + '</p>' +
                            '</td>' +
                            '<td class="text-center mx-2">' +
                                '<p class="text-muted"> $' + p.total + ' </p>' +
                            '</td>' +
                            '<td class="text-center mx-2">' +
                                '<p class="text-muted"> ' + p.metodo + ' </p>' +
                            '</td>' +
                            '<td>' +
                                '<p>' +
                                    '<a href="#" onclick="finalizado_pedido(' + id + ','+ id_rep + ')" class="btn btn-outline-success restaricon">' +
                                    '<i class="iconsminds-financial"></i> Pagado </a>' +
                                    '&nbsp;' +

                                    '&nbsp; <a href="#" onclick="devolucion_pedido(' + id + ','+ id_rep + ')" class="btn btn-outline-danger restaricon">' +
                                    '<i class="simple-icon-close"></i> Devolucion </a> &nbsp;' +
                                '</p>' +
                            '</td>' +
                        '</tr>' 
                    )
                })
            }
        })
        .fail()

}

function finalizado_pedido(id_pedido, id_repartidor) {
    //alert("pedido devolucion o cancelado con id: " + id_pedido + id_repartidor);
     $.ajax({
         url: appData.base_url + 'Dasboard/btn_finalizado',
         dataType: 'json',
         type: 'post',
         data: {
             'id_pedido': id_pedido,
             'id_repartidor': id_repartidor
         },
     })
         .done(function (data) {
             //alert(JSON.stringify(data))
             $('#table-enviados').empty();
             $('#contidadenviados').empty();
             setTimeout(function () {
                 get_table3();
             }, 500);
         })
         .fail()
}

function devolucion_pedido(id_pedido, id_repartidor) {
    //alert("pedido devolucion o cancelado con id: " + id_pedido + id_repartidor);
     $.ajax({
         url: appData.base_url + 'Dasboard/btn_devolucion',
         dataType: 'json',
         type: 'post',
         data: {
             'id_pedido': id_pedido,
             'id_repartidor': id_repartidor
         },
     })
         .done(function (data) {
             //alert(JSON.stringify(data))
             $('#table-enviados').empty();
             $('#contidadenviados').empty();
             setTimeout(function () {
                 get_table3();
             }, 500);
         })
         .fail()
}


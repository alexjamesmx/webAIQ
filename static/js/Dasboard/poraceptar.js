// solo por acetar

$(document).ready(function () {
    get_table();
})

let rechazados = 0;

function get_table() {

    $.ajax({
        url: appData.base_url + 'Dasboard/poraceptar',
        dataType: 'json',
        type: 'post',
    })
        .done(function (data) {
            //alert(JSON.stringify(data))
            if (data.res) {
                $('#contidadporacetpar').html(data.cantidad);

                $.each(data.pedidos, function (i, p) {
                    id = p.id_pedido
                    $('#table-poraceptar').append(
                        '<tr>' +
                        '<td> ' +
                        '<p class="list-item-heading mx-3"> 2022-' + p.id_pedido + ' </p>' +
                        '</td>' +
                        '<td class="text-center mx-3">' +
                        '<p class="text-muted"> ' + p.nombre_alias + ' </p>' +
                        '</td>' +
                        '<td class="text-center mx-3">' +
                        '<p class="text-muted"> $' + p.total + ' </p>' +
                        '</td>' +
                        '<td class="text-center mx-4">' +
                        '<p class="text-muted">' + p.fecha + '</p>' +
                        '</td>' +
                        '<td id="detalleporaceptar' + id + '">' +

                        '</td>' +
                        '<td>' +
                        '<p class="ml-4">' +
                        '&nbsp; <a href="#" onclick="aceptar_pedido(' + p.id_pedido + ')" class="btn btn-outline-success restaricon"><i class="simple-icon-check"></i> Acceptar </a> &nbsp; ' +

                        '&nbsp; <a href="#" onclick="declinar_pedido(' + p.id_pedido + ')" class="btn btn-outline-danger restaricon"><i class="simple-icon-close"></i> Declinar </a> &nbsp;' +
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

                            $.each(response.detalle, function (i, d) {
                                //alert(JSON.stringify(d.id_pedido))

                                if (d.comentario != null) {
                                    $('#detalleporaceptar' + d.id_pedido).append(
                                        '<p class="ml-3">' +
                                        d.cantidad + '-----' + d.nombre +
                                        '</p>' +
                                        '<span class=" text-muted ml-4">' + d.comentario + '</span>'
                                    )
                                } else {
                                    $('#detalleporaceptar' + d.id_pedido).append(
                                        '<p class="ml-3">' +
                                        d.cantidad + '-----' + d.nombre + '</p>'
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

function aceptar_pedido(id_pedido) {

    //alert('Aceptar pedido ' + id_pedido)
    $.ajax({
        url: appData.base_url + 'Dasboard/btn_aceptar',
        dataType: 'json',
        type: 'post',
        data: {
            'id_pedido': id_pedido,
        },
    })
        .done(function (data) {
            //alert(JSON.stringify(data))
            $('#table-poraceptar').empty();
            $('#table-preparando').empty();
            $('#contidadporacetpar').empty();
            setTimeout(function () {
                get_table();
                get_table1();
                rechazados = 0;
            }, 500);
        })
        .fail()
}

function declinar_pedido(id_pedido) {

    //alert('declinar pedido ' + id_pedido)
    $.ajax({
        url: appData.base_url + 'Dasboard/btn_declinar',
        dataType: 'json',
        type: 'post',
        data: {
            'id_pedido': id_pedido,
        },
    })
        .done(function (data) {
            //alert(JSON.stringify(data))
            $('#table-poraceptar').empty();
            $('#contidadporacetpar').empty();
            setTimeout(function () {
                get_table();
                rechazados = ++rechazados;
                console.log(rechazados);
                if (rechazados == 3) {
                    alert('Has declinado 3 pedidos, tu restaurante estara Fuera de Linea');
                    $("#icon-estado").click();
                }
            }, 500);
        })
        .fail()
} 

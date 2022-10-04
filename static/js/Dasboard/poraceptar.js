// solo por acetar
let viejo = 0;
let nuevo = 0;

$(document).ready(function () {
    $.ajax({
        url: appData.base_url + 'Dasboard/poraceptar_cantidad',
        dataType: 'json',
        type: 'post',
    })
        .done(function (data) {
            viejo = data.cantidad; 
            console.log(viejo);
            cantidad(); 
        })
        .fail()
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
                        '<td class="text-center"> ' +
                        '<p class="list-item-heading mx-2"> 2022-' + p.id_pedido + ' </p>' +
                        '</td>' +
                        '<td id="detalleporaceptar' + id + '">' +

                        '</td>' +
                        '<td class="text-center">' +
                        '<p">' +
                        '<a href="#" onclick="aceptar_pedido(' + p.id_pedido + ')" class="btn btn-outline-success mb-1 restaricon">Aceptar</a>' +
                        '</p>' +
                        '<p"> <a href="#" onclick="declinar_pedido(' + p.id_pedido + ')" class="btn btn-outline-danger restaricon">Declinar</a>' +
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
                                        '<p class="ml-4">' +
                                        d.cantidad + ' - ' + d.nombre +
                                        '</p>' +
                                        '<span class=" text-muted ml-4">' + d.comentario + '</span>'
                                    )
                                } else {
                                    $('#detalleporaceptar' + d.id_pedido).append(
                                        '<p class="ml-4">' +
                                        d.cantidad + ' - ' + d.nombre + '</p>'
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
                viejo = --viejo;
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
                viejo = --viejo;
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

function beep(volume){
    return new Promise((resolve, reject) => {
        volume = volume || 100;

        try{
            // You're in charge of providing a valid AudioFile that can be reached by your web app
            let soundSource = "https://www.w3schools.com/html/horse.mp3";
            let sound = new Audio(soundSource);

            // Set volume
            sound.volume = volume / 100;

            sound.onended = () => {
                resolve();
            };

            sound.play();
        }catch(error){
            reject(error);
        }
    });
}

function cantidad() {
    $.ajax({
        url: appData.base_url + 'Dasboard/poraceptar_cantidad',
        dataType: 'json',
        type: 'post',
    })
        .done(function (data) {
            nuevo =  data.cantidad;
            console.log(nuevo);
            if (viejo < nuevo) {
                console.log(viejo);
                beep(100);
                viejo = ++viejo;
                $('#table-poraceptar').empty();
                get_table();

            }

        setTimeout(() => {
            cantidad();
        }, 5000);
        })
        .fail()
}

function refrescar_aceptar() {
    $('#table-poraceptar').empty();
    $('#contidadporacetpar').empty();
    get_table();
}




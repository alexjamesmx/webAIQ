$(document).ready(function () {
    $.ajax({
        url: appData.base_url + 'Adminres/verifica',
        type: "POST",
        dataType: "json",
        data: {
            "id_res": appData.idRes
            },
    }).done(function (response) {  
        console.log(response.status)
        if (response.status == "1") {
            $("#estado-name").html("En Linea")
            $("#estado-name").addClass("text-dark")
            $("#icon-estado").removeClass("sliderdis")
            $("#icon-estado").addClass("slider")
            $("#navadmin").removeClass("bg-warning")
        }
        if (response.status == "0") {
            $("#estado-name").html("Fuera de Linea")
            $("#estado-name").removeClass("text-dark")
            $("#icon-estado").removeClass("slider")
            $("#icon-estado").addClass("sliderdis")
            $("#navadmin").addClass("bg-warning")
        }
    })
    .fail(function () {
        console.log("error")
        })
  })

function estado_res(id_res) {
    $.ajax({
        url: appData.base_url + 'Adminres/cambiarstatus',
        type: 'post',
        dataType: 'json',
        data: {
            "id_res": id_res
        },
      })
        .done(function (obj) {
          if (obj.res) {
            message('success', 'Listo', obj.mes)
            verifica(id_res)
          } else {
            message('danger', 'Error', obj.mes)
          }
        })
    
        .fail(function () {
          alerta('ERROR')
        })
    
}

function verifica(id_res) {
    $.ajax({
        url: appData.base_url + 'Adminres/verifica',
        type: "POST",
        dataType: "json",
        data: {
            "id_res": id_res
            },
    }).done(function (response) {  
        console.log(response.status)
        if (response.status == "1") {
            $("#estado-name").html("En Linea")
            $("#estado-name").addClass("text-dark")
            $("#navadmin").removeClass("bg-warning")
        }
        if (response.status == "0") {
            $("#estado-name").html("Fuera de Linea")
            $("#estado-name").removeClass("text-dark")
            $("#navadmin").addClass("bg-warning")
        }
    })
    .fail(function () {
        console.log("error")
        })

}

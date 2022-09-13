$(document).ready(function () {
  get_menu(1)
})

var id_user = '',
  nombre = '',
  precio = '',
  tiempo = '',
  tipo = '',
  descripcion = ''
imagen = ''

function handleModal(e) {
  //abrimos modal y cargamos las variables paraue se envianpor data
  let id_comida = $(e).data('id')
  let action = $(e).data('action')
  let nombre_edit = $(e).data('nombre')
  let precio_edit = $(e).data('precio')
  let tiempo_edit = $(e).data('tiempo')
  let tipo_edit = $(e).data('tipo')
  let descripcion_edit = $(e).data('descripcion')

  //verificamos la accion y depende cual es entonses

  console.log(action)

  if (action == 'agregar') {

    //si es agregar borramo tolos los campos y colocamos el placeholder   ue es el texto que se ve por defecto y colocamos el onclick="add" para mandar a llamar la funcion de agregar
    resetform()
    $('#nombre').attr('placeholder', 'Ej. Torta')
    $('#precio').attr('placeholder', 'Ej. 13.00')
    $('#tiempo').attr('placeholder', 'Ej. 15:00 (min)')
    $('#descripcion').attr(
      'placeholder',
      'Ej: torta de salchicha con  jitomate, cebolla, mayoneza',
    )
    $('#guardarinfo').attr('onclick', 'add()')
  } else if (action == 'edit') {

    // si es editar colocamos los valores que se pidieron de base de datos y colocamos el onclick="edit" para llamar la funcion de editar y colocamos en disabled el boton en espera de algun cambio en los input
    resetform()
    $('#id_comida').val(id_comida)
    $('#nombre').val(nombre_edit)
    $('#precio').val(precio_edit)
    $('#tiempo').val(tiempo_edit)
    $('#tipo').val(tipo_edit)
    $('#descripcion').val(descripcion_edit)
    $('#guardarinfo').attr('onclick', 'edit()')
    $('#guardarinfo').attr('disabled', 'disabled')
    $('#guardarinfo').attr('data-dismiss', 'modal')

    //si cambia etones actulaizamos pero primero abilitamos el boton

    if (
      $('#nombre').change(function () {
        $('#guardarinfo').removeAttr('disabled')
      })
    );
    if (
      $('#precio').change(function () {
        $('#guardarinfo').removeAttr('disabled')
      })
    );
    if (
      $('#tiempo').change(function () {
        $('#guardarinfo').removeAttr('disabled')
      })
    );
    if (
      $('#tipo').change(function () {
        $('#guardarinfo').removeAttr('disabled')
      })
    );
    if (
      $('#descripcion').change(function () {
        $('#guardarinfo').removeAttr('disabled')
      })
    );
  }
}
function edit() {

  //cargamos valores de base de datos
  id_comida = $('#id_comida').val()
  nombre = $('#nombre').val()
  precio = $('#precio').val()
  tiempo = $('#tiempo').val()
  tipo = $('#tipo').val()
  descripcion = $('#descripcion').val()

  //validacion de campos vacios

  if (nombre == '') {
    $('#nombre').addClass('is-invalid')
  } else {
    $('#nombre').removeClass('is-invalid')
    $('#nombre').addClass('is-valid')
  }
  if (precio == '') {
    $('#precio').addClass('is-invalid')
  } else {
    $('#precio').removeClass('is-invalid')
    $('#precio').addClass('is-valid')
  }
  if (tiempo == '') {
    $('#tiempo').addClass('is-invalid')
  } else {
    $('#tiempo').removeClass('is-invalid')
    $('#tiempo').addClass('is-valid')
  }
  if (tipo == '') {
    $('#tipo').addClass('is-invalid')
  } else {
    $('#tipo').removeClass('is-invalid')
    $('#tipo').addClass('is-valid')
  }
  if (descripcion == '') {
    $('#descripcion').addClass('is-invalid')
  } else {
    $('#descripcion').removeClass('is-invalid')
    $('#descripcion').addClass('is-valid')
  }

  //si todo esta bine entonses

  if (
    nombre != '' &&
    precio != '' &&
    tiempo != '' &&
    tipo != '' &&
    descripcion != ''
  ) {

    //borrar espacios vacios
    nombre.trim()
    precio.trim()
    tiempo.trim()
    descripcion.trim()

    //enviamos por metodo post
    $.ajax({
      url: appData.base_url + 'Menu/edit',
      dataType: 'json',
      type: 'POST',
      data: {
        id_comida: id_comida,
        nombre: nombre,
        precio: precio,
        tiempo: tiempo,
        tipo: tipo,
        descripcion: descripcion,
      },
    })
    //si contesto bine entonses
      .done(() => {
        message("success", "Listo", "se actualizo informacion");
        get_menu(1);
        get_menu(2);
        get_menu(3);
      })
      //alfo fallo el en controlador o en el modelo
      .fail(() => {
        message('danger', 'Error', 'Hubo un problema con la petición')
        console.log('eroorrrrr')
      })
  }
}

function add() {
  //cargamos valores del formulario a las variables
  id_user = $('#id').val()
  $('#nombre').on('input', (e) => {
    nombre = e.target.value
  })
  $('#precio').on('input', (e) => {
    precio = e.target.value
  })

  $('#tiempo').on('input', (e) => {
    tiempo = e.target.value
  })

  $('#tipo').on('input', (e) => {
    tipo = e.target.value
  })

  $('#descripcion').on('input', (e) => {
    descripcion = e.target.value
  })

  //validacion

  if (nombre == '') {
    $('#nombre').addClass('is-invalid')
  } else {
    $('#nombre').removeClass('is-invalid')
    $('#nombre').addClass('is-valid')
  }
  if (precio == '') {
    $('#precio').addClass('is-invalid')
  } else {
    $('#precio').removeClass('is-invalid')
    $('#precio').addClass('is-valid')
  }
  if (tiempo == '') {
    $('#tiempo').addClass('is-invalid')
  } else {
    $('#tiempo').removeClass('is-invalid')
    $('#tiempo').addClass('is-valid')
  }
  if (tipo == '') {
    $('#tipo').addClass('is-invalid')
  } else {
    $('#tipo').removeClass('is-invalid')
    $('#tipo').addClass('is-valid')
  }
  if (descripcion == '') {
    $('#descripcion').addClass('is-invalid')
  } else {
    $('#descripcion').removeClass('is-invalid')
    $('#descripcion').addClass('is-valid')
  }

  //si todo esta bien entonses
  if (
    nombre != '' &&
    precio != '' &&
    tiempo != '' &&
    tipo != '' &&
    descripcion != ''
  ) {

    //borramos espacios
    nombre.trim()
    precio.trim()
    tiempo.trim()
    descripcion.trim()

    //enviamos por metodo post
    $.ajax({
      url: appData.base_url + 'Menu/add',
      dataType: 'json',
      type: 'POST',
      data: {
        id_user: id_user,
        nombre: nombre,
        precio: precio,
        tiempo: tiempo,
        tipo: tipo,
        descripcion: descripcion,
        imagen: imagen,
      },
    })
    //si contesto bine entonses
      .done(() => {
        // message("success", "Listo", "se agrego platillo");
        resetform()
        $('#form-producto').addClass('d-none')
        $('#form-subir-img').removeClass('d-none')
        console.log('listosssss')
      })
      //alfo fallo el en controlador o en el modelo
      .fail(() => {
        message('danger', 'Error', 'Hubo un problema con la petición')
        console.log('eroorrrrr')
      })
  }
}

$('#form-subir-img').on('submit', function (e) {
  $('#form-subir-img').addClass('d-none')
  $('#form-producto').removeClass('d-none')
  message('success', 'Listo', 'se agrego platillo')
  get_menu(1)
  get_menu(2)
  get_menu(3)
  $('.close').click()
})

function resetform() {
  nombre = ''
  precio = ''
  tiempo = ''
  descripcion = ''
  tipo = ''
  $('form select').each(function () {
    this.selectedIndex = 0
  })
  $(
    'form input[type=text] , form input[type=number], form input[type=time], form input[type=file], form textarea ',
  ).each(function () {
    this.value = ''
  })
  $('#nombre').removeClass('is-invalid')
  $('#nombre').removeClass('is-valid')
  $('#precio').removeClass('is-invalid')
  $('#precio').removeClass('is-valid')
  $('#tiempo').removeClass('is-invalid')
  $('#tiempo').removeClass('is-valid')
  $('#tipo').removeClass('is-invalid')
  $('#tipo').removeClass('is-valid')
  $('#descripcion').removeClass('is-invalid')
  $('#descripcion').removeClass('is-valid')
}

function get_menu(tipo) {
  if (tipo == 1) {
    $('#tableCombos').empty()
    $('#combos-log').removeClass('d-none')
    $('#combos').addClass('d-none')

    $.ajax({
      url: appData.base_url + 'Menu/get_menus',
      dataType: 'json',
      type: 'post',
      data: {
        category: tipo,
      },
    })
      .done(function (data) {
        //alert(JSON.stringify(data))
        if (data.res) {
          data.productos.map((element) => {
            $('#tableCombos').append(
              '<tr>' +
                '<th scope="row">' +
                '<img src="' +
                appData.base_url +
                'static/img/' +
                element['imagen'] +
                '" alt="Fat Rascal"' +
                'class="list-thumbnail responsive border-0 card-img-left" />' +
                '</th>' +
                '<td class="align-middle text-center">' +
                '<p class="textabla">' +
                element['nombre'] +
                '</p> </td> ' +
                '<td class="align-middle text-center">' +
                '<p class="textabla">' +
                element['precio'] +
                '</p> </td> ' +
                '<td class="align-middle text-center">' +
                '<p class="textabla"><i class="iconsminds-stopwatch"></i> ' +
                element['tiempo'] +
                ' (min) </p> </td> ' +
                '<td class="align-middle text-center">' +
                '<label class="switch">' +
                '<input type="checkbox" ' +
                'id=" icono-' +
                element['id_comida'] +
                ' " onclick="icono_click(' +
                element['id_comida'] +
                ')" > <span class="slider' +
                (element['status'] == 1 ? ' ' : 'dis') +
                ' round"> ' +
                '</span> </label> ' +
                '</td>' +
                '<td class="align-middle text-right">' +
                '<button type="button" class="btn btn-outline-primary m-1"' +
                'data-toggle="modal" data-target="#exampleModalContent" data-action="edit"' +
                'data-id="' +
                element['id_comida'] +
                '" data-nombre="' +
                element['nombre'] +
                '" data-precio="' +
                element['precio'] +
                '" data-tiempo="' +
                element['tiempo'] +
                '" data-tipo="' +
                element['id_categoria'] +
                '" data-descripcion="' +
                element['descripcion'] +
                '"' +
                'data-whatever="Editar" onclick="return handleModal(this)"><i class="simple-icon-pencil textabla"></i></button> ' +
                '<button type="button" class="btn btn-outline-danger m-1" data-toggle="modal"' +
                'onclick="borra_click(' +
                element['id_comida'] +
                ", '" +
                element['nombre'] +
                '\')"' +
                'data-target=".bd-example-modal-sm">' +
                '<i class="simple-icon-trash textabla"></i></button> </td> </tr> ',
            )
          })
        }
        setTimeout(function () {
          $('#combos-log').addClass('d-none')
          $('#combos').removeClass('d-none')
        }, 500)
      })
      .fail()
  } else if (tipo == 2) {
    $('#platillos-log').removeClass('d-none')
    $('#platillos').addClass('d-none')
    $('#tablePlatillos').empty()

    $.ajax({
      url: appData.base_url + 'Menu/get_menus',
      dataType: 'json',
      type: 'post',
      data: {
        category: tipo,
      },
    })
      .done(function (data) {
        //alert(JSON.stringify(data))
        if (data.res) {
          data.productos.map((element) => {
            $('#tablePlatillos').append(
              '<tr>' +
                '<th scope="row">' +
                '<img src="' +
                appData.base_url +
                'static/img/' +
                element['imagen'] +
                '" alt="Fat Rascal"' +
                'class="list-thumbnail responsive border-0 card-img-left" />' +
                '</th>' +
                '<td class="align-middle text-center">' +
                '<p class="textabla">' +
                element['nombre'] +
                '</p> </td> ' +
                '<td class="align-middle text-center">' +
                '<p class="textabla">' +
                element['precio'] +
                '</p> </td> ' +
                '<td class="align-middle text-center">' +
                '<p class="textabla"><i class="iconsminds-stopwatch"></i> ' +
                element['tiempo'] +
                ' (min) </p> </td> ' +
                '<td class="align-middle text-center">' +
                '<label class="switch">' +
                '<input type="checkbox" ' +
                'id=" icono-' +
                element['id_comida'] +
                ' " onclick="icono_click(' +
                element['id_comida'] +
                ')" > <span class="slider' +
                (element['status'] == 1 ? ' ' : 'dis') +
                ' round"> ' +
                '</span> </label> ' +
                '</td>' +
                '<td class="align-middle text-right">' +
                '<button type="button" class="btn btn-outline-primary m-1"' +
                'data-toggle="modal" data-target="#exampleModalContent" data-action="edit"' +
                'data-id="' +
                element['id_comida'] +
                '" data-nombre="' +
                element['nombre'] +
                '" data-precio="' +
                element['precio'] +
                '" data-tiempo="' +
                element['tiempo'] +
                '" data-tipo="' +
                element['id_categoria'] +
                '" data-descripcion="' +
                element['descripcion'] +
                '"' +
                'data-whatever="Editar" onclick="return handleModal(this)"><i class="simple-icon-pencil textabla"></i></button> ' +
                '<button type="button" class="btn btn-outline-danger m-1" data-toggle="modal"' +
                'onclick="borra_click(' +
                element['id_comida'] +
                ", '" +
                element['nombre'] +
                '\')"' +
                'data-target=".bd-example-modal-sm">' +
                '<i class="simple-icon-trash textabla"></i></button> </td> </tr> ',
            )
          })
        }
        setTimeout(function () {
          $('#platillos-log').addClass('d-none')
          $('#platillos').removeClass('d-none')
        }, 500)
      })
      .fail()
  } else if (tipo == 3) {
    $('#bebidas-log').removeClass('d-none')
    $('#bebidas').addClass('d-none')
    $('#tableBebidas').empty()

    $.ajax({
      url: appData.base_url + 'Menu/get_menus',
      dataType: 'json',
      type: 'post',
      data: {
        category: tipo,
      },
    })
      .done(function (data) {
        //alert(JSON.stringify(data))
        if (data.res) {
          data.productos.map((element) => {
            $('#tableBebidas').append(
              '<tr>' +
                '<th scope="row">' +
                '<img src="' +
                appData.base_url +
                'static/img/' +
                element['imagen'] +
                '" alt="Fat Rascal"' +
                'class="list-thumbnail responsive border-0 card-img-left" />' +
                '</th>' +
                '<td class="align-middle text-center">' +
                '<p class="textabla">' +
                element['nombre'] +
                '</p> </td> ' +
                '<td class="align-middle text-center">' +
                '<p class="textabla">' +
                element['precio'] +
                '</p> </td> ' +
                '<td class="align-middle text-center">' +
                '<p class="textabla"><i class="iconsminds-stopwatch"></i> ' +
                element['tiempo'] +
                ' (min) </p> </td> ' +
                '<td class="align-middle text-center">' +
                '<label class="switch">' +
                '<input type="checkbox" ' +
                'id=" icono-' +
                element['id_comida'] +
                ' " onclick="icono_click(' +
                element['id_comida'] +
                ')" > <span class="slider' +
                (element['status'] == 1 ? ' ' : 'dis') +
                ' round"> ' +
                '</span> </label> ' +
                '</td>' +
                '<td class="align-middle text-right">' +
                '<button type="button" class="btn btn-outline-primary m-1"' +
                'data-toggle="modal" data-target="#exampleModalContent" data-action="edit"' +
                'data-id="' +
                element['id_comida'] +
                '" data-nombre="' +
                element['nombre'] +
                '" data-precio="' +
                element['precio'] +
                '" data-tiempo="' +
                element['tiempo'] +
                '" data-tipo="' +
                element['id_categoria'] +
                '" data-descripcion="' +
                element['descripcion'] +
                '"' +
                'data-whatever="Editar" onclick="return handleModal(this)"><i class="simple-icon-pencil textabla"></i></button> ' +
                '<button type="button" class="btn btn-outline-danger m-1" data-toggle="modal"' +
                'onclick="borra_click(' +
                element['id_comida'] +
                ", '" +
                element['nombre'] +
                '\')"' +
                'data-target=".bd-example-modal-sm">' +
                '<i class="simple-icon-trash textabla"></i></button> </td> </tr> ',
            )
          })
        }
        setTimeout(() => {
          $('#bebidas-log').addClass('d-none')
          $('#bebidas').removeClass('d-none')
        }, 500)
      })
      .fail()
  }
}

function icono_click(id_comida) {
  console.log(id_comida)
  $.ajax({
    url: appData.base_url + 'Menu/cambiarstatus',
    type: 'post',
    dataType: 'json',
    data: {
      idcomida: id_comida,
    },
  })
    .done(function (obj) {
      if (obj.res) {
        message('success', 'Listo', obj.mes)
      } else {
        message('danger', 'Error', obj.mes)
      }
    })

    .fail(function () {
      alerta('ERROR')
    })
}

$('#btn-borrar-confirmar').click(function () {
  var idcomida = $(this).attr('data-idcomida')
  $.ajax({
    url: appData.base_url + 'Menu/del',
    type: 'post',
    dataType: 'json',
    data: {
      id_comida: idcomida,
    },
  })
    .done(function (obj) {
      if (obj.res) {
        message('success', 'Listo', obj.mes)
        get_menu(1)
        get_menu(2)
        get_menu(3)
      } else {
        message('danger', 'Error', obj.mes)
      }
    })
    .fail(function () {
      alert('ERROR')
    })
})

function borra_click(idcomida, nomproducto) {
  $('#modal-nomproducto').html(nomproducto)
  $('#modal-nomproducto-body').html(nomproducto)

  $('#btn-borrar-confirmar').attr('data-idcomida', idcomida)
}

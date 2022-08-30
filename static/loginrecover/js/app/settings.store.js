jQuery(document).ready(function($) {
    enableSwitchStore();
    checkActivePickup();
    $('#check-active-pickup').change(function(event) {
        checkActivePickup(true);
    });
});

function confirmDisabledPickup() {
    Swal.fire({
        title: '¿Deshabilitar Pickup?',
        text : 'La opción "recoger en tienda" dejará de aparecer en la aplicación móvil.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor : '#ff5b69',
        confirmButtonText: 'Deshabilitar Pickup',
        cancelButtonText: 'Cancelar',
        allowOutsideClick : false,
        allowEscapeKey: false,
    }).then((result) => {    
        if (result.isConfirmed) {
            disablePickup();
        }
        else {
            $('#check-active-pickup').bootstrapToggle('on');
        }
    })
}

function checkActivePickup(launchModal = false) {
    if ($('#check-active-pickup').is(':checked')) {
        $('#check-active-pickup-status').html('<i class="fas fa-check-circle text-success"></i>  <span class="text-dark"> Habilitado </span>');
        if (launchModal) {
            enablePickup();
        }
    }

    else {
        $('#check-active-pickup-status').html('<i class="fas fa-times-circle text-danger"></i>  <span class="text-danger"> Deshabilitado </span>');
        if (launchModal) {
            confirmDisabledPickup(true);
        }
    }
}

function  disablePickup() {
    Swal.fire({
        title : 'Deshabilitando Pickup',
        text : 'Por favor espera...',
        allowOutsideClick : false,
        allowEscapeKey: false,
        timer : 2000,
        didOpen : () => {
            Swal.showLoading();
        }
    }).then((result) => {
        Swal.fire({
            title: 'Pickup deshabilitado',
            text : 'El Pickup para la tienda ha sido deshabilitado, a partir de ahora, la única forma de compra para tus clientes es "entrega a domicilio", vuelve a activar el pickup cuando quieras',
            icon : 'success',
            timer: 10000, 
            timerProgressBar: true,
            showConfirmButton : true,
            confirmButtonText: 'Continuar',
            confirmButtonColor : '#ff5b69',
        });
    });
}

function  enablePickup() {
    Swal.fire({
        title : 'Habilitando Pickup',
        text : 'Por favor espera...',
        allowOutsideClick : false,
        allowEscapeKey: false,
        timer : 2000,
        didOpen : () => {
            Swal.showLoading();
        }
    }).then((result) => {
        Swal.fire({
            title: 'Pickup habilitado',
            text : 'El Pickup para la tienda ha sido habilitado, a partir de ahora, tus clientes podrán elegir "entrega a domicilio" y "recoger en tienda"',
            icon : 'success',
            timer: 10000, 
            timerProgressBar: true,
            showConfirmButton : true,
            confirmButtonText: 'Continuar',
            confirmButtonColor : '#ff5b69',
        });
    });
}

function enableSwitchStore() {
    $('#check-active-pickup').bootstrapToggle('enable');
}

function updateTiempoElab(timeElab) {
    $('#tiempo_elab-showtime').text(`${timeElab} minutos`);
}

jQuery(document).ready(function($) {
    showTime();
    $('[data-bs-toggle="tooltip"]').tooltip();
    checkOpenService();
    resizeOrderContainers();
    window.onresize = resizeOrderContainers;


    $('#check-open-service').change(function (e) {
        e.preventDefault();
        checkOpenService();
    });
});

function resizeOrderContainers() {
    const windowHeight =  (Math.floor($(window).height())) - 400;
    $('.autoresize-container').height(windowHeight);
}

function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }

    if(h > 12){
        h = h - 12;
        session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);
}

function checkOpenService() {
    if ($('#check-open-service').is(':checked')) {
        $('#check-open-service-status').html('<i class="fas fa-check-circle text-success"></i>  <span class="text-dark">En línea</span>');
    }

    else {
        $('#check-open-service-status').html('<i class="fas fa-times-circle text-danger"></i>  <span class="text-danger">Desconectado</span>');
    }
}

function logout() {
    Swal.fire({
        title: '¿Realmente deseas salir?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor : '#ff5b69',
        confirmButtonText: 'Si, salir',
        cancelButtonText: 'No, quedarme'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = base_url('login');
        }
    });
}

function openModal(elemId) {    
    $(`#${elemId}`).modal({
        backdrop : 'static',
        keyboard: true,
    });
}

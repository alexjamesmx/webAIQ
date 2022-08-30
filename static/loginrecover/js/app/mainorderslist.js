jQuery(document).ready(function($) {
    // $('#income-orders-modal').on('show.bs.modal', function(event) {
    //     event.preventDefault();
    //     alert('Holap');
    // });
    initTimeLapse(null, 10);
});

function orderToPrepare() {

    Swal.fire({
        title : '¿En cuanto tiempo estará listo?',
        html : '<i class="fas fa-stopwatch fa-4x text-secondary"></i>',
        input: 'range',
        inputLabel: 'Selecciona el tiempo estimado de preparación (minutos)',
        inputAttributes: {
            min: 5,
            max: 120,
            step: 5
        },
        inputValue: 15,
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonColor : '#ff5b69',
        confirmButtonText: `Continuar`,
        cancelButtonText: `Cancelar`,
    });
}

function orderToDeliver() {

    alert('Si el pedido es de delivery, se eleccionará al repartidor\nSi el pedido es pickup, se notificará al cliente por la app y whatsapp');
}

function orderComplete() {

    alert('Se marcará la orden como terminada');
}

function viewOrderDetailM(order) {
    const orderDetailModal = new bootstrap.Modal(document.getElementById('detail-order-modal'), {
        backdrop : 'static',
        keyboard : true, 
        focus : true
    });

    const orderStatus = $(`#order-card-${order}`).attr('data-app-status');

    $('#detail-order-modal-order').text(order);

    if (orderStatus === '3') {
        $('#detail-order-modal-link-to-complete').show(0);
        $('#detail-order-modal-link-to-ship').hide(0);
        $('#detail-order-modal-link-to-prepare').hide(0);
    }

    if (orderStatus === '2') {
        $('#detail-order-modal-link-to-ship').show(0);
        $('#detail-order-modal-link-to-prepare').hide(0);
        $('#detail-order-modal-link-to-complete').hide(0);
        $('#detail-order-modal-shippment-data').append(`
            <div id="detail-order-modal-shippment-data-time" class="d-flex key-feature align-items-center p-3 rounded shadow mt-4">
            <img src="<?=base_url('static/images/icon/clock.svg')?>" class="avatar avatar-ex-sm" alt="" style="max-height: 50px !important;">
            <div class="flex-1 content ms-3">
            <h3 class="title mb-0">Pedido en preparación</h3>
            <h3 class="mb-0 text-secondary"> <span class="order-time-lapse text-primary"> 00:00 </span> minutos restantes </h3>
            </div>
            </div>
            `);
    }

    if (orderStatus === '1') {
        $('#detail-order-modal-shippment-data-time').remove();
        $('#detail-order-modal-link-to-prepare').show(0);
        $('#detail-order-modal-link-to-ship').hide(0);
        $('#detail-order-modal-link-to-complete').hide(0);
    }

    orderDetailModal.show();
}

function initTimeLapse(order, minutes) {
    let seconds = 60;
    minutes = parseInt(minutes) - 1;
    window.setInterval(() => {

        seconds--;
        let viewTime = '';
        if (seconds === -1) {
            seconds = 59;
            minutes --;
        }
        viewTime = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        $('.order-time-lapse').text(viewTime);
    }, 1000);
}

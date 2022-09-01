
function message(type, boldText, text){
    if(!$("#alerta").length){
        $('.message').append(`
        <div id="alerta"class="alert alert-${type}" alert-dismissible fade show mt-3" role="alert"><strong>${boldText}</strong>${text}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`
        );
        setTimeout(() => {
            $('#alerta').alert('close')
        }, 3000);

    }
    

}
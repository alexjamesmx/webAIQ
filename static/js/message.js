$(function(){
    if($(".alerta").length){
        setTimeout(() => {
            $('.alerta').alert('close')
        }, 10000);
    } 
})

function message(type, boldText, text){
    console.log('que')
    if(!$(".alerta").length){
        $('.message').append(`
        <div class="alert alert-${type} alerta alert-dismissible fade show mt-3" role="alert"data-bs-dismiss="alert" aria-label="Close"><strong>${boldText}</strong>${text}</div>`
        );
        setTimeout(() => {
            $('.alerta').alert('close')
        }, 3000);
    }
    

}
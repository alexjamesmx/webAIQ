$(function() {
    $('#message').hide();
  });

  const hanldeLogin = (e) => {
    e.preventDefault();
    const form = new FormData(e.target);
    const email = form.get("email").replace(/\s+/g, '');
    const password = form.get("password").replace(/\s+/g, '');
    $.ajax({
        url: "http://localhost/server/id/webAiq/user/existsUser/",
        dataType: "json",
        type: "post",
        data: {
            email: email,
            password : password,
        },
    })
        .done((result) => {
            console.log('RESULTADO: ',result)
            if (result.res) {
                message("success",'',result.message)

                // window.location.replace(window.location.href+'/home')
            }
            else {
                message("danger",'Error: ',result.message)
            }
        })
        .fail(() => {
            message("danger",'Error: Hubo un problema con la petición')
        });
};





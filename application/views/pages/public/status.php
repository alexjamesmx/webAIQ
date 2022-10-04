<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url() ?>static/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>static/intl-tel-input-17.0.19/build/css/intlTelInput.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>static/intl-tel-input-17.0.19/build/js/intlTelInput.min.js"></script>

</head>

<body>
</body>

</html>
</head>

<body>


    <div class="container-fluid .bg-light.bg-gradient vh-100">


        <div class="position-absolute top-0 start-50 translate-middle-x  mt-5">
            <div class="justify-content-center  d-flex">

                <img src="<?= base_url() ?>static/img/aiq.jpeg" width="25%" height='25%'>
            </div>
        </div>
        <div class="position-absolute top-50 start-50 translate-middle mb-5">

            <h1>Ingresa número de teléfono</h1>
            <form id="login" onsubmit="process(event)">
                <p>Enter your phone number:</p>
                <input id="phone" type="tel" name="phone" />
                <input type="submit" class="btn" value="Verify" />
            </form>
            <div id='parent'>
            </div>
            <div id='alert' class="alert alert-info" style="display: none;"></div>
        </div>

        <script>
            var base_url = "<?= base_url() ?>"
        </script>
        <script src="<?= base_url() ?>static/bootstrap5/js/bootstrap.min.js"></script>
</body>
<script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "us";
                callback(countryCode);
            });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
    });



    function process(event) {
        event.preventDefault();

        const phoneNumber = phoneInput.getNumber();

        async function validatePhone(data) {
            const response = await fetch(base_url + 'repartidores/updateRepartidorActivo', {
                method: 'POST',
                body: JSON.stringify({
                    'telefono': parseInt(phoneNumber)
                })
            })
            return response.json();
        }

        validatePhone(phoneNumber).then((res) => {

            let tmp = document.getElementById('alert')
            tmp.remove();
            const parent = document.getElementById('parent')
            let div = document.createElement('div');
            div.classList.add('alert-info')
            div.classList.add('alert')
            div.style.display = "none"
            div.setAttribute('id', 'alert')

            parent.appendChild(div)
            tmp = document.getElementById('alert')
            tmp.style.opacity = '1';
            tmp.style.display = ''

            if (res.res) {
                tmp.classList.remove('alert-danger')
                tmp.classList.add('alert-info')
                tmp.style.display = "";
                tmp.innerHTML = `<strong>${res.data[0]}</strong>, ahora se encuentra ${res.data[1] == '1' ? 'desactivo' : 'activo'}`;
            } else {
                tmp.classList.remove('alert-info')
                tmp.classList.add('alert-danger')
                tmp.style.display = "";
                tmp.innerHTML = `<strong>${phoneNumber}</strong> no se encuentra registrado en la base de datos`;
            }

            setTimeout(() => {
                fade(tmp)
            }, 3000)
        })

    }

    function fade(element) {
        var op = 1; // initial opacity
        var timer = setInterval(function() {
            if (op <= 0.1) {
                clearInterval(timer);
                element.style.display = 'none';
            }
            element.style.opacity = op;
            element.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op -= op * 0.1;
        }, 50);
    }
</script>

</html>
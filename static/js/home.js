$(function() {
    $('#message').hide();
  });

  



const handleAvatar = ()=> {
    $("#avatar").click();
}  

const handleAvatarValue = (e)=> {
    
    // $.ajax({
    //     url: appData.base_url +  'user/updateAvatar/',
    //     dataType: "json",
    //     type: "post",
    //     data: {
    //         avatar: $('#avatar').val(),
    //         email: appData.user,
    //     },
    // })
    //     .done((result) => {
    //         if (result['res']) {
    //             message("info",'',result.message)
    //         }
    //         else {
    //             message("danger",'Error: ',result.message)
    //         }
    //     })
    //     .fail(() => {
    //         message("danger",'Error: Hubo un problema con la petición')
    //     });
}  


// document.getElementById('avatar').onchange = function (evt) {
//     console.log(evt.target.value);
//     var tgt = evt.target || window.event.srcElement,
//         files = tgt.files;
    
//     // FileReader support
//     if (FileReader && files && files.length) {
//         var fr = new FileReader();
//         fr.onload = function () {
//             document.getElementById('outimage').src = fr.result;
//         }
//         fr.readAsDataURL(files[0]);


 
//     }
    
//     // Not supported
//     else {
//         // fallback -- perhaps submit the input to an iframe and temporarily store
//         // them on the server until the user's session ends.
//     }
// }

$('#avatar').change(function() {
    var preview = document.querySelector('#outimage');
    var file    = document.querySelector('#avatar').files[0];
    var reader  = new FileReader();
  
    reader.onloadend = function () {
      preview.src = reader.result;
        $.ajax({
        url: appData.base_url +  'user/updateAvatar/',
        dataType: "json",
        type: "post",
        data: {
            avatar: base64toBlob(reader.result),
            email: appData.user,
        },
    })
        .done((result) => {
            if (result['res']) {
                message("info",'',result.message)
            }
            else {
                message("danger",'Error: ',result.message)
            }
        })
        .fail(() => {
            message("danger",'Error: Hubo un problema con la petición')
        });
    }
  
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }


  });
  

  function base64toBlob(base64Data, contentType) {
    contentType = contentType || '';
    var sliceSize = 1024;
    var byteCharacters = atob(base64Data);
    var bytesLength = byteCharacters.length;
    var slicesCount = Math.ceil(bytesLength / sliceSize);
    var byteArrays = new Array(slicesCount);

    for (var sliceIndex = 0; sliceIndex < slicesCount; ++sliceIndex) {
        var begin = sliceIndex * sliceSize;
        var end = Math.min(begin + sliceSize, bytesLength);

        var bytes = new Array(end - begin);
        for (var offset = begin, i = 0; offset < end; ++i, ++offset) {
            bytes[i] = byteCharacters[offset].charCodeAt(0);
        }
        byteArrays[sliceIndex] = new Uint8Array(bytes);
    }
    return new Blob(byteArrays, { type: contentType });
}
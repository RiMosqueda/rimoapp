const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));


function conexion_ajax(url, variable, estado) {
    variable || (variable = null);
    estado || (estado = 4);

    var promiseObj = new Promise(function (resolve, reject) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == estado && this.status == 200) {
                if (this.responseText) {
                    resolve(this.responseText);
                } else {
                    resolve(null);
                }
            } else if (this.readyState == estado && this.status == 0) {
                errores('Se perdio la comunicacion con el servidor, o no hay conexion a internet.');
                return false;
            }
        };

        xhttp.open("POST", url, true);
        xhttp.setRequestHeader("Cache-Control", "no-cache");
        try {
            xhttp.send(variable);
        } catch (err) {
            errores('Hubo un error no se pudo conectar con el servidor, Reporte a Sistemas ');
        }
    });
    return promiseObj;
}

function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function errores(msg = 'Ocurrió un error al procesar tu solicitud. Por favor, intenta de nuevo más tarde.') {
    document.getElementById('modal_error_mensaje').innerHTML = msg;
    $('#modal_errores').modal('show');
}
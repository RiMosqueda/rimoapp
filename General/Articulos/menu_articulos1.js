console.log('v1.0.0.0');

async function inicializar() {
    if (document.readyState === "loading") {
        // esperamos a que el documento este ready
        await(async () => {
            return new Promise((resolve) => {
                document.addEventListener("DOMContentLoaded", resolve);
            });
        })();
    }

    cargar_articulos();
}

function cargar_articulos() {
    $('#Cargando').modal('show');
    var formData = new FormData();
    formData.append('funcion', 'cargar_articulos');
    formData.append('buscador', document.getElementById('buscador').value);
    conexion_ajax('menu_articulos0.php', formData).then(function(respuesta){
        if (respuesta == null) {
            return;
        }
        try {
            var obj = JSON.parse(respuesta);
        } catch (e) {
            console.log(respuesta);
            errores();
            return;
        }
        if (obj.ERROR == 'SI') {
            errores(obj.MENSAJE);
            return;
        }

        console.log(obj.data);

        $('#Cargando').modal('hide'); // Cerrar modal
    });
}
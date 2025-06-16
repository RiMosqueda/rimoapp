<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI'];
    die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../index.php">');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Librerias/fontawesome/js/brands.js"></script>
    <script src="/Librerias/fontawesome/js/solid.js"></script>
    <script src="/Librerias/fontawesome/js/fontawesome.js"></script>
    <script src="/Librerias/jquery-3.7.1.min.js"></script>
    <title>¡RIMO!</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php" data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-title="Inicio" id="btn_inicio">
                <img src="/Imagenes/logo.png" alt="RIMO" width="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav"
                aria-controls="menuNav" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/General/Ventas/punto_de_venta1.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-title="Punto de venta">
                            <i class="fa-solid fa-shop"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/General/Ventas/listado_notas_ventas1.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-title="Notas de venta">
                            <i class="fa-solid fa-cash-register"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/General/Articulos/menu_articulos1.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-title="Articulos">
                            <i class="fa-solid fa-bottle-water"></i>
                        </a>
                    </li>
                </ul>
                <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link">
                            <i class="fa-solid fa-user"></i>    
                            Ricardo Mosqueda
                        </a>
                    </li>
                </ul> -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item pe-5">
                        <a href="javascript:void(0)" class="nav-link">
                            <i class="fa-solid fa-user"></i>
                            <?php echo $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Librerias/logout.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-title="Cerrar sesión" id="cerrar_sesion">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal Cargando -->
    <div class="modal fade" id="Cargando" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
        data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center border-0 bg-transparent shadow-none">
                <div class="modal-body">
                    <div class="spinner-border text-primary" role="status" style="width: 4rem; height: 4rem;">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                    <br>
                    <p class="mt-3 text-white fw-bold bg-dark rounded px-3 py-1 d-inline-block">Cargando, por favor
                        espere...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Errores -->
    <div class="modal fade" id="modal_errores" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <div class="modal-body" id="modal_errores_mensaje">
                    Ocurrió un error al procesar tu solicitud. Por favor, intenta de nuevo más tarde.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/General/index.js?v1.0.0.0"></script>

</body>

</html>
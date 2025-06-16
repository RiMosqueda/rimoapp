<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIMO | Iniciar sesion</title>
    <link href="/Librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/Librerias/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/Librerias/fontawesome/js/brands.js"></script>
    <script src="/Librerias/fontawesome/js/solid.js"></script>
    <script src="/Librerias/fontawesome/js/fontawesome.js"></script>
</head>

<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #6a11cb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
</style>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark" style="border-radius: 1rem;">
                        <form class="card-body p-5 text-center" action="" method="post">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <!-- <h2 class="fw-bold mb-2 text-uppercase text-white">RIMO!</h2> -->
                                <img src="/Imagenes/logo.png" alt="rimo logo" width="300">
                                <p class="text-white-50">Por favor ingrese su usuario y contraseña!</p>

                                <div class="form-floating mb-4">
                                    <input type="text" id="user" name="user" class="form-control form-control-lg"
                                        placeholder="Usuario" autocomplete="off">
                                    <label for="user">Usuario</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Email" autocomplete="off">
                                    <label for="password">Contraseña</label>
                                </div>

                                <small class="text-danger" id="msg_error"></small>

                                <input type="submit" name="btn_iniciar_sesion" class="btn btn-outline-light btn-lg px-5"
                                    value="Iniciar sesion">
                            </div>
                            <?php
                            include('Librerias/conexion.php');
                            include('Librerias/validate_user.php');
                            ?>
                        </form>
                    </div>
                </div>
            </div>
    </section>

</body>

</html>
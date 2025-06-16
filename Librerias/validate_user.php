<?php
session_start();

// $_SESSION['intentos'] = 0;

function errores($msg)
{
    echo '<div class="card bg-danger">';
    echo $msg;
    echo '</div>';
    exit();
}

if (!empty($_POST['btn_iniciar_sesion'])) {

    if (!isset($_SESSION['intentos'])) {
        $_SESSION['intentos'] = 0;
    }

    if ($_SESSION['intentos'] == 4) {
        errores('Ha excedido el numero de intentos.');
    }

    if (!isset($_POST)) {
        errores('No es posible acceder a este enlace.');
    }

    $intentos = (int) $_SESSION['intentos'];

    $usuario = trim(mysqli_real_escape_string($con, $_POST['user']));
    $contrasena = trim(mysqli_real_escape_string($con, $_POST['password']));

    if ($usuario == '') {
        errores('El usuario no puede estar vacio');
    }

    if ($contrasena == '') {
        errores('La contraseña no puede estar vacia');
    }

    $sql = "SELECT ID, NOMBRE FROM usuarios WHERE USUARIO = '$usuario' AND CONTRASEÑA = '$contrasena'";
    $consulta = mysqli_query($con, $sql);

    if (mysqli_num_rows($consulta) == 0) {
        $_SESSION['intentos'] = $intentos + 1;
        errores('Las credenciales no coinciden.');
    } else {
        $fila = mysqli_fetch_array($consulta);

        $id_usuario = (int) $fila['ID'];

        $token = 

        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nombre_usuario'] = $fila['NOMBRE'];

        // $sql_token = "UPDATE usuarios SET token = ";

        header("Location: General/index.php");
    }
}
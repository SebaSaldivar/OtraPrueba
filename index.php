<?php require "./inc/session_start.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./inc/head.php"; ?>
</head>
<body>
    <?php
    if(!isset($_GET['vista']) || $_GET['vista']==""){
        $_GET['vista'] = "login";
    }

    if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']!="login" && $_GET['vista']!="404"){
        include "./inc/navbar.php";

        include "./vistas/".$_GET['vista'].".php";

        include "./inc/script.php";
    }else{
        if($_GET['vista']=="login"){
            include "./vistas/login.php";
        }else{
            include "./vistas/404.php";
        }
    }
    ?>

    <?php
    // Datos de conexión a la base de datos
    $host = "blnmwak5uxyrv7of6rgl-mysql.services.clever-cloud.com"; // Si tu base de datos está en un servidor diferente, cambia esto
    $usuario = "uznis9nqzh3vahlc";
    $password = "VFpI7tEAIgyrsG9FAciy";
    $base_de_datos = "blnmwak5uxyrv7of6rgl";

    // Conexión a la base de datos
    $conexion = new mysqli($host, $usuario, $password, $base_de_datos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Ejemplo de inserción de datos
    $MyPassword = "abab2";
    $nombre = "Sebah@aye.com";

    $sql_insert = "INSERT INTO usuarios (usuario_nombre, usuario_pass ) VALUES ('$nombre', '$MyPassword')";

    if ($conexion->query($sql_insert) === TRUE) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . $conexion->error;
    }

    // Ejemplo de recuperación de datos
    $sql_select = "SELECT * FROM usuarios";
    $resultado = $conexion->query($sql_select);

    if ($resultado->num_rows > 0) {
        // Mostrar los datos obtenidos
        while ($fila = $resultado->fetch_assoc()) {
            echo "ID: " . $fila["usuario_ID"] . " - Nombre: " . $fila["usuario_nombre"] ." - Pass: " . $fila["usuario_pass"]. "<br>";
        }
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar conexión
    $conexion->close();
    ?>




</body>
</html>
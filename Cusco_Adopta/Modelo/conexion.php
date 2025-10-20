<?php
$host = "localhost";
$usuario = "root";     // tu usuario de phpMyAdmin
$clave = "";           // tu contraseña (si no tienes, déjala vacía)
$base_datos = "adopta_cusco"; // debe coincidir con el nombre de tu base de datos

$conexion = new mysqli($host, $usuario, $clave, $base_datos);

if ($conexion->connect_error) {
    die("❌ Error al conectar con la base de datos: " . $conexion->connect_error);
} else {
    // echo "✅ Conexión exitosa"; // puedes descomentar esto para probar
}
?>

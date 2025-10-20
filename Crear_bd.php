<?php
// crear_bd.php
// Crea la base de datos y tablas para el proyecto Adopta Cusco

$host = "localhost";
$user = "root";
$pass = "";

// Conexión al servidor MySQL
$conn = new mysqli($host, $user, $pass);

// Verificar conexión
if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE IF NOT EXISTS adopta_cusco CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql) === TRUE) {
    echo "✅ Base de datos 'adopta_cusco' creada correctamente.<br>";
} else {
    echo "❌ Error al crear la base de datos: " . $conn->error . "<br>";
}

// Seleccionar la base
$conn->select_db("adopta_cusco");

// Crear tablas
$tablas = [];

// Tabla animales
$tablas[] = "CREATE TABLE IF NOT EXISTS animales (
    id_animales INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especie ENUM('Perro','Gato','Otro') DEFAULT 'Perro',
    edad INT,
    descripcion TEXT,
    estado ENUM('Disponible','Adoptado','En proceso') DEFAULT 'Disponible',
    imagen VARCHAR(255),
    fecha_ingreso DATE DEFAULT (CURRENT_DATE)
)";

// Tabla adopciones
$tablas[] = "CREATE TABLE IF NOT EXISTS adopciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_animal INT NULL,
    nombre_persona VARCHAR(150) NOT NULL,
    telefono VARCHAR(20),
    correo VARCHAR(150),
    direccion TEXT,
    motivo TEXT,
    fecha_solicitud TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('Pendiente','Aprobada','Rechazada') DEFAULT 'Pendiente',
    FOREIGN KEY (id_animal) REFERENCES animales(id_animales) ON DELETE SET NULL
)";

// Tabla donaciones
$tablas[] = "CREATE TABLE IF NOT EXISTS donaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_donante VARCHAR(150) NOT NULL,
    correo VARCHAR(150),
    monto DECIMAL(10,2),
    mensaje TEXT,
    metodo_pago ENUM('Yape','Plin','Transferencia','Otro') DEFAULT 'Otro',
    fecha_donacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Tabla animales_donados
$tablas[] = "CREATE TABLE IF NOT EXISTS animales_donados (
    id_animales_donados INT AUTO_INCREMENT PRIMARY KEY,
    nombre_animal VARCHAR(100) NOT NULL,
    especie ENUM('Perro','Gato','Otro'),
    edad INT,
    descripcion TEXT,
    imagen VARCHAR(255),
    nombre_duenio VARCHAR(150),
    telefono VARCHAR(20),
    correo VARCHAR(150),
    direccion TEXT,
    fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('Pendiente','Revisado','Publicado') DEFAULT 'Pendiente'
)";

// Ejecutar todas las consultas
foreach ($tablas as $sql) {
    if ($conn->query($sql) === TRUE) {
        echo "✅ Tabla creada correctamente.<br>";
    } else {
        echo "❌ Error al crear tabla: " . $conn->error . "<br>";
    }
}

echo "<br>🎉 Todo listo: base de datos y tablas creadas.";
$conn->close();
?>

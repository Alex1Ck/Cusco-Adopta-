-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2025 a las 00:37:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adopta_cusco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopciones`
--

CREATE TABLE `adopciones` (
  `id` int(11) NOT NULL,
  `id_animal` int(11) DEFAULT NULL,
  `nombre_persona` varchar(150) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` enum('Pendiente','Aprobada','Rechazada') DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `id_animales` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especie` enum('Perro','Gato','Otro') DEFAULT 'Perro',
  `edad` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('Disponible','Adoptado','En proceso') DEFAULT 'Disponible',
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`id_animales`, `nombre`, `especie`, `edad`, `descripcion`, `estado`, `imagen`, `fecha_ingreso`) VALUES
(1, 'Luna', 'Gato', 1, 'Rescatada de un tejado en Llantaytambo, aún se asusta con ruidos fuertes.', 'Disponible', 'gatLuna.jpg', '2025-10-26'),
(2, 'Simon', 'Gato', 3, 'Perdió una pata tras ser atropellado, pero salta y juega como cualquiera.', 'Disponible', 'gatSimon.jpg', '2025-10-26'),
(3, 'Mia', 'Gato', 1, 'Encontrada dentro de una caja en el mercado, necesita mucho calor humano.', 'Disponible', 'gatMia.jpg', '2025-10-26'),
(4, 'Olivia', 'Gato', 4, 'Su familia se mudó y la dejaron. Aún espera que la abracen de nuevo.', 'Disponible', 'gatOlivia.jpg', '2025-10-26'),
(5, 'Thor', 'Gato', 2, 'Fue maltratado por niños, pero ronronea apenas sientes confianza.', 'Disponible', 'gatThor.jpg', '2025-10-26'),
(6, 'Coco', 'Gato', 6, 'Se quedó sin hogar cuando su humano falleció. Busca un nuevo abuelo.', 'Disponible', 'gatCoco.jpg', '2025-10-26'),
(7, 'Kira', 'Gato', 2, 'Escapó de un incendio y sobrevivió 5 días escondida. Es muy cariñosa.', 'Disponible', 'gatKira.jpg', '2025-10-26'),
(8, 'Nube', 'Gato', 1, 'Nació en la calle, le encanta dormir en tu regazo mientras trabajas.', 'Disponible', 'gatNube.jpg', '2025-10-26'),
(9, 'Romeo', 'Gato', 3, 'Le encanta mirar películas contigo. Fue rescatado de un basurero.', 'Disponible', 'gatRomeo.jpg', '2025-10-26'),
(10, 'Cleo', 'Gato', 3, 'Sobrevivió a un envenenamiento masivo. Aún confía en los humanos.', 'Disponible', 'gatCleo.jpg', '2025-10-26'),
(11, 'Zoe', 'Gato', 1, 'Le falta un ojo por infección, pero eso no le impide cazar juguetitos.', 'Disponible', 'gatZoe.jpg', '2025-10-26'),
(12, 'Toby', 'Gato', 4, 'Vivió 3 años atado a una cuerda. Ahora aprende a ser libre.', 'Disponible', 'gatToby.jpg', '2025-10-26'),
(13, 'Arya', 'Gato', 1, 'Encontrada con hipotermia tras una granizada. Le encanta el calor de las cobijas.', 'Disponible', 'gatArya.jpg', '2025-10-26'),
(14, 'Loki', 'Gato', 5, 'Fue usado para cría intensiva. Ahora solo quiere dormir sin miedo.', 'Disponible', 'gatLoki.jpg', '2025-10-26'),
(15, 'Misha', 'Gato', 1, 'Perdió a sus gatitos y busca abrazar a cualquier humano que la mire.', 'Disponible', 'gatMisha.jpg', '2025-10-26'),
(16, 'Zeus', 'Perro', 5, 'Rescatado de una obra en abandono, ahora busca un hogar donde ser el guardián noble que siempre fue.', 'Disponible', 'perZeus.jpg', '2025-10-27'),
(17, 'Coco', 'Perro', 3, 'Perdió a su familia en un incendio, pero aún abre la cola al escuchar \"¡vamos!\", quiere correr de nuevo.', 'Disponible', 'perCoco.jpg', '2025-10-27'),
(18, 'Rex', 'Perro', 1, 'Encontrado en una caja junto al río, duerme abrazado a su peluche; necesita mami o papi humano.', 'Disponible', 'perRex.jpg', '2025-10-27'),
(19, 'Tank', 'Perro', 10, 'Se quedó sin dueño por fallecimiento; aún espera en la puerta. Ideal para casa tranquila y cariñosa.', 'Disponible', 'perTank.jpg', '2025-10-27'),
(20, 'Simba', 'Perro', 4, 'Sacado de peleas clandestinas, ha aprendido a confiar; le encanta jugar con pelotas y olvidar el pasado.', 'Disponible', 'perSimba.jpg', '2025-10-27'),
(21, 'Lola', 'Perro', 6, 'Vivió atada a un árbol 3 años; ahora mueve la cola solo de verte llegar. Busca sofá y manta.', 'Disponible', 'perLola.jpg', '2025-10-27'),
(22, 'Nina', 'Perro', 2, 'Escapó de un criadero intensivo, tiene miedo a la oscuridad, pero ronronea si la acaricias.', 'Disponible', 'perNina.jpg', '2025-10-27'),
(23, 'Bolt', 'Perro', 3, 'Rescatado de la carretera con pata fracturada; ya corre y salta, quiere acompañarte en tus caminatas.', 'Disponible', 'perBolt.jpg', '2025-10-27'),
(24, 'Toto', 'Perro', 1, 'Regalado y devuelto 3 veces por \"travieso\"; en realidad solo quiere jugar y aprender.', 'Disponible', 'perToto.jpg', '2025-10-27'),
(25, 'Hera', 'Perro', 7, 'Dejada en el albergue por \"vieja\"; aún tiene energía para paseos y abrazos infinitos.', 'Disponible', 'perHera.jpg', '2025-10-27'),
(26, 'Spark', 'Perro', 2, 'Encontrada con quemaduras de cigarrillo; aún así lame la mano que la acaricia. Merece amor de verdad.', 'Disponible', 'perSpark.jpg', '2025-10-27'),
(27, 'Tank', 'Perro', 4, 'Perdió un ojo defendiendo a su anterior familia; ahora defiende tu corazón con cola y lengua.', 'Disponible', 'perTank.jpg', '2025-10-27'),
(28, 'Lunita', 'Perro', 5, 'Asustadiza con hombres altos; con mujeres y niños es un osito. Necesita paciencia y dulzura.', 'Disponible', 'perLunita.jpg', '2025-10-27'),
(29, 'León', 'Perro', 3, 'Sacado de un laboratorio clandestino; nunca había visto el sol. Ahora lo busca en cada ventana.', 'Disponible', 'perLeon.jpg', '2025-10-27'),
(30, 'Dana', 'Perro', 1, 'Criada en un balcón minúsculo; aprendió a caminar en tierra al llegar al albergue. Quiere explorar contigo.', 'Disponible', 'perDana.jpg', '2025-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales_donados`
--

CREATE TABLE `animales_donados` (
  `id_animales_donados` int(11) NOT NULL,
  `nombre_animal` varchar(100) NOT NULL,
  `especie` enum('Perro','Gato','Otro') DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre_duenio` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` enum('Pendiente','Revisado','Publicado') DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id` int(11) NOT NULL,
  `nombre_donante` varchar(150) NOT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `metodo_pago` enum('Yape','Plin','Transferencia','Otro') DEFAULT 'Otro',
  `fecha_donacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id_animales`);

--
-- Indices de la tabla `animales_donados`
--
ALTER TABLE `animales_donados`
  ADD PRIMARY KEY (`id_animales_donados`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id_animales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `animales_donados`
--
ALTER TABLE `animales_donados`
  MODIFY `id_animales_donados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD CONSTRAINT `adopciones_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animales` (`id_animales`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

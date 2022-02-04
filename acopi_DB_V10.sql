-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2022 a las 02:49:48
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acopi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Noticias'),
(2, 'Capacitación'),
(3, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_afiliados`
--

CREATE TABLE `empleados_afiliados` (
  `id_empleado_afiliado` int(11) NOT NULL,
  `tipo_doc_empleado_afiliado` text COLLATE utf8_spanish_ci NOT NULL,
  `cc_empleado_afiliado` text COLLATE utf8_spanish_ci NOT NULL,
  `primer_nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `segundo_nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo_empleado_afiliado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_empresa_afiliado` int(11) NOT NULL,
  `nit_empresa_afiliado` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen_cedula` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados_afiliados`
--

INSERT INTO `empleados_afiliados` (`id_empleado_afiliado`, `tipo_doc_empleado_afiliado`, `cc_empleado_afiliado`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cargo_empleado_afiliado`, `fecha_nacimiento`, `id_empresa_afiliado`, `nit_empresa_afiliado`, `imagen_cedula`, `created_at`, `updated_at`) VALUES
(1, 'cedula', '77432043', 'Miguel', 'José', 'Henao', 'Acosta', 'Repartidor', '1981-03-12', 1, '475939293-5', 'vistas/images/afiliados/empleados/documentos/3352371.jpg', '2022-01-18 07:50:32', '2022-01-18 07:50:32'),
(2, 'cedula', '1065843745', 'Sandra', 'Catalina', 'Martinez', 'Gonzalez', 'Recepcionista', '1992-12-12', 3, '5843729343-6', 'vistas/images/afiliados/empleados/documentos/5777857.jpg', '2022-01-18 07:54:36', '2022-01-18 07:54:36'),
(3, 'cedula', '1065851740', 'Martha', NULL, 'Salas', 'Costa', 'Tecnica', '1990-12-12', 1, '475939293-5', 'vistas/images/afiliados/empleados/documentos/2824721.jpg', '2022-01-19 02:19:02', '2022-01-19 02:19:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nit_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` text COLLATE utf8_spanish_ci NOT NULL,
  `cc_rprt_legal` text COLLATE utf8_spanish_ci NOT NULL,
  `num_empleados` int(11) NOT NULL,
  `direccion_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `fax_empresa` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular_empresa` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `id_sector_empresa` int(11) NOT NULL,
  `productos_empresa` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_afiliacion_empresa` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_pagos_atrasados` int(11) DEFAULT NULL,
  `fecha_afiliacion_empresa` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nit_empresa`, `razon_social`, `cc_rprt_legal`, `num_empleados`, `direccion_empresa`, `telefono_empresa`, `fax_empresa`, `celular_empresa`, `email_empresa`, `id_sector_empresa`, `productos_empresa`, `ciudad_empresa`, `estado_afiliacion_empresa`, `numero_pagos_atrasados`, `fecha_afiliacion_empresa`, `created_at`, `updated_at`) VALUES
(1, '475939293-5', 'CompuCell', '1065831073', 8, 'Cra 14 No. 16-35', '5724386', '5724386', '3045395221', 'info@compucell.com', 2, '[\"celulares\",\"computadores\",\"reparaci\\u00f3n de equipos\",\"venta de software\"]', 'VLL', 'activa', 0, '2021-01-01', '2022-01-11 01:43:01', '2022-02-02 07:56:30'),
(2, '574382232-5', 'Variedades Rosita', '1065839234', 8, 'Cra 25 No. 34-45', '5824385', '5824385', '3003428574', 'info@variedadesrosita.com', 2, '[\"collares\",\"hilos\",\"agujas\",\"telas\",\"vestidos\",\"camisas\",\"botones\"]', 'LPZ', 'activa', 2, '2021-01-14', '2022-01-13 23:10:40', '2022-02-02 07:56:30'),
(3, '5843729343-6', 'Comercializadora La Providencia', '1065829462', 40, 'Cra 4A No. 25A-03', '5739483', '4538457', '3205483295', 'comlaprovidencia@hotmail.com', 1, '[\"abonos\",\"verduras\",\"frutas\"]', 'VLL', 'activa', 2, '2021-01-03', '2022-01-16 02:01:37', '2022-02-02 07:56:31'),
(5, '483459210-4', 'Piñatería Mi fiestecita', '49213754', 7, 'Cra 9A No. 16A-34', '5723293', '5723293', '3013284356', 'info@mifiestecita.com', 2, '[\"pi\\u00f1atas\",\"recordatorios\",\"globos\",\"decoraci\\u00f3n\"]', 'VLL', 'activa', 2, '2021-01-12', '2022-01-26 06:56:07', '2022-02-02 07:56:31'),
(6, '568430438-2', 'Boutique París', '1065723941', 5, 'Calle 18 No. 12-32', '5823495', '5823495', '3005494396', 'info@boutiqueparis.com', 2, '[\"ropa de damas\",\"vestidos de noche\",\"vestidos de novia\",\"lencer\\u00eda\",\"zapatos\",\"sandalias\"]', 'AGC', 'nueva', 0, '2021-12-12', '2022-01-26 06:59:39', '2022-01-29 18:09:13'),
(7, '659430459-3', 'Ferretería Las Casas', '1001234758', 12, 'Cra 35 No. 23-01', '5723485', '5723485', '3003425483', 'info@ferrelascasas.com', 2, '[\"ladrillos\",\"varillas\",\"cemetos\",\"pintura\",\"grevilla\",\"herramientas de construccion\"]', 'LPZ', 'nueva', 0, '2022-01-24', '2022-01-26 07:07:44', '2022-01-29 18:09:13'),
(8, '342948548-4', 'Textiles Libra-Yardas', '77345213', 20, 'Calle 11 No. 9A-01', '5726593', '5726593', '3045862395', 'info@librayardas.com', 3, '[\"telas\"]', 'VLL', 'nueva', 0, '2022-01-24', '2022-01-26 07:12:01', '2022-01-29 18:09:13'),
(9, '485328438-9', 'Restaurante Seoul', '1001438437', 10, 'Cra 18D No. 21-35', '5823245', '5823245', '3045868305', 'info@restauranteseoul.com', 2, '[\"comida coreana\",\"bebidas\"]', 'VLL', 'activa', 2, '2021-10-22', '2022-01-26 07:15:51', '2022-02-02 07:56:31'),
(10, '595324850-4', 'Droguería La Bendición', '65327430', 4, 'Cra 23 No. 23-23', '5823256', '5823256', '3164394395', 'info@labencion.com', 2, '[\"medicamentos\",\"productos para el cuidado personal\",\"tapabocas\"]', 'CDZ', 'activa', 1, '2021-01-12', '2022-01-26 07:28:13', '2022-02-02 07:56:31'),
(11, '548438329-4', 'Gimnasio Mundo del Fitness', '1065856913', 5, 'Cra 40 No. 8D-34', '5724395', '5724395', '3173283493', 'info@mundodelfitness.com', 2, '[\"proteinas\",\"alquiler de maquinas de musculacion\",\"entremamiento personalizado\"]', 'VLL', 'activa', 1, '2019-03-12', '2022-01-26 07:39:05', '2022-02-02 07:56:31'),
(12, '548329453-4', 'RestoBar La esquina rosa', '49328431', 7, 'Diagona 23 No. 17-44', '5833285', '5833285', '3145485295', 'info@laesquinarosa.com', 2, '[\"cervezas\",\"comidas rapidas\",\"cenas\"]', 'VLL', 'activa', 1, '2021-01-20', '2022-01-26 07:46:16', '2022-02-02 07:56:31'),
(13, '657394758-3', 'Opticas Lunnettes', '77345723', 12, 'Cra 15 No. 13-34', '5823285', '5823285', '3208459345', 'info@opticaslunnettes', 2, '[\"gafas\",\"consulta de optometria\"]', 'VLL', 'activa', 1, '2021-01-25', '2022-01-26 07:52:09', '2022-02-02 07:56:31'),
(14, '584439329-5', 'Electrodomesticos Nuevo Milenio', '77213845', 6, 'Cra 8A No. 16A-12', '5723232', '5723232', '3045863850', 'info@electronuevomilenio.com', 2, '[\"electrodomesticos\",\"televisores\",\"computadores\",\"celulares\"]', 'VLL', 'activa', 1, '2021-01-20', '2022-01-26 07:55:59', '2022-02-02 07:56:31'),
(15, '475954021-5', 'Motos La 12', '49548329', 8, 'Calle 12 No. 11-23', '5823487', '5823487', '3008793254', 'info@motosdoce.com', 2, '[\"motos\",\"repuestos de motos\"]', 'VLL', 'activa', 1, '2021-01-20', '2022-01-26 07:58:22', '2022-02-02 07:56:32'),
(16, '453854394-6', 'Floristería las Margaritas', '1065832953', 5, 'Cra 13 No. 24-45', '5739548', '5739548', '3194384395', 'info@lasmargaritas.com', 2, '[\"flores\",\"adornos florales\",\" decoraciones\"]', 'LPZ', 'nueva', 0, '2022-01-25', '2022-01-29 07:16:11', '2022-01-29 18:09:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevistas`
--

CREATE TABLE `entrevistas` (
  `id` int(11) NOT NULL,
  `titulo_entrevista` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_entrevista` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `video_entrevista` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrevistas`
--

INSERT INTO `entrevistas` (`id`, `titulo_entrevista`, `descripcion_entrevista`, `video_entrevista`, `created_at`, `updated_at`) VALUES
(1, 'REACTIVACIÓN DE ACOPI CESAR', 'Comienza la transformación en de los microempresarios en el departamento del Cesar. ', 'https://www.youtube.com/embed/qJ7Kpfm6DXM', NULL, NULL),
(2, 'PARQUE INDUSTRIAL DE VALLEDUPAR', 'Entrevista realizada a su administradora, en que la se cuenta parte de su historia, los servicios que ofrece y responde a unas cuantas preguntas especificas.', 'https://www.youtube.com/embed/TYvtmPZ6YS8', '2022-01-01 21:06:11', '2022-01-02 01:40:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interesados`
--

CREATE TABLE `interesados` (
  `id` int(11) NOT NULL,
  `nombre_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `empresa_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `email_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `interesados`
--

INSERT INTO `interesados` (`id`, `nombre_interesado`, `empresa_interesado`, `email_interesado`, `telefono_interesado`, `estado_interesado`, `created_at`, `updated_at`) VALUES
(1, 'Andrés Soto', 'CompuCell', 'andres@gmail.com', '5724597', 'no contactado', NULL, NULL),
(3, 'Mario Gomez', 'CompuCell', 'mario@outlook.com', '5768345', 'no contactado', NULL, NULL),
(4, 'Miguel Torres', 'La Casa Blanca', 'mtorres@gmail.com', '5467324', 'contactado', NULL, '2022-01-08 04:06:54'),
(5, 'Magalis Herrera', 'Decoraciones Maga', 'mherrera@gmail.com', '5757832', 'contactado', NULL, '2022-01-08 04:01:48'),
(6, 'Edmundo Alvarez', 'Asadero Pollo Norte', 'ealvarez@gmail.com', '5723456', 'contactado', NULL, '2022-01-08 04:08:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios_departamento`
--

CREATE TABLE `municipios_departamento` (
  `id` int(11) NOT NULL,
  `abreviatura` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipios_departamento`
--

INSERT INTO `municipios_departamento` (`id`, `abreviatura`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'VLL', 'Valledupar', NULL, NULL),
(2, 'ZRVLL', 'Zona rural de Valledupar', NULL, NULL),
(3, 'AGC', 'Aguachica', NULL, NULL),
(4, 'CDZ', 'Agustín Codazzi', NULL, '2022-02-03 04:58:42'),
(5, 'AST', 'Astrea', '2022-02-03 03:48:17', '2022-02-03 03:48:17'),
(6, 'BCR', 'Becerril', '2022-02-03 07:15:02', '2022-02-03 07:15:02'),
(7, 'BSC', 'Bosconia', '2022-02-03 07:15:40', '2022-02-03 07:15:40'),
(8, 'CHM', 'Chimichagua', '2022-02-03 07:16:13', '2022-02-03 07:16:13'),
(9, 'CHR', 'Chiriguaná', '2022-02-03 07:16:31', '2022-02-03 07:16:31'),
(10, 'CRM', 'Curumaní', '2022-02-03 07:16:57', '2022-02-03 07:16:57'),
(11, 'ECP', 'El Copey', '2022-02-03 07:17:22', '2022-02-03 07:17:22'),
(12, 'EPS', 'El Paso', '2022-02-03 07:17:44', '2022-02-03 07:17:44'),
(13, 'GMR', 'Gamarra', '2022-02-03 07:18:17', '2022-02-03 07:18:17'),
(14, 'GNZ', 'González', '2022-02-03 07:18:37', '2022-02-03 07:18:37'),
(15, 'LGL', 'La Gloria', '2022-02-03 07:18:57', '2022-02-03 07:18:57'),
(16, 'LJI', 'La Jagua de Ibirico', '2022-02-03 07:19:50', '2022-02-03 07:19:50'),
(17, 'LPZ', 'La Paz', '2022-02-03 07:20:17', '2022-02-03 07:20:17'),
(18, 'MNR', 'Manaure', '2022-02-03 07:20:36', '2022-02-03 07:20:36'),
(19, 'PLT', 'Pailitas', '2022-02-03 07:20:54', '2022-02-03 07:20:54'),
(20, 'PLY', 'Pelaya', '2022-02-03 07:21:26', '2022-02-03 07:21:26'),
(21, 'PBB', 'Pueblo Bello', '2022-02-03 07:22:23', '2022-02-03 07:22:23'),
(22, 'RDO', 'Río de Oro', '2022-02-03 07:22:57', '2022-02-03 07:22:57'),
(23, 'SNA', 'San Alberto', '2022-02-03 07:23:24', '2022-02-03 07:23:24'),
(24, 'SND', 'San Diego', '2022-02-03 07:23:52', '2022-02-03 07:23:52'),
(25, 'SNM', 'San Martín', '2022-02-03 07:24:14', '2022-02-03 07:24:14'),
(26, 'TML', 'Tamalameque', '2022-02-03 07:24:41', '2022-02-03 07:24:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `portada_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `p_claves_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `vistas_noticia` int(11) DEFAULT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_noticia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `categoria`, `portada_noticia`, `titulo`, `descripcion_noticia`, `p_claves_noticia`, `ruta_noticia`, `contenido_noticia`, `vistas_noticia`, `destacado`, `fecha_noticia`, `created_at`, `updated_at`) VALUES
(1, 2, 'vistas/images/noticias/1.jpeg', '66° CONGRESO NACIONAL: EMPRESAS PARA EL DESARROLLO SOCIAL 70 AÑOS DE ACOPI: LA MIPYME, DINAMIZADORA SOCIAL Y ECONÓMICA DE COLOMBIA', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'congreso-70-acopi', '                ', NULL, 0, '2021-12-05 20:05:03', NULL, NULL),
(2, 1, 'vistas/images/noticias/2.jpeg', 'Reactivación de empresa', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-2', ' ', NULL, 0, '2021-12-05 20:06:12', NULL, NULL),
(3, 1, 'vistas/images/noticias/3.jpg', 'Aprobación de creditos', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-3', ' ', NULL, 0, '2021-12-05 20:07:02', NULL, NULL),
(4, 3, 'vistas/images/noticias/4.jpg', 'ACOPI Cesar celebra el festival vallenato 2021 ', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-4', ' ', NULL, 0, '2021-12-05 20:07:10', NULL, NULL),
(5, 2, 'vistas/images/noticias/5.jpg', 'Congreso regional de microempresarios en Barranquilla - Colombia', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-5', ' ', NULL, 0, '2021-12-05 20:07:20', NULL, NULL),
(6, 3, 'vistas/images/noticias/6.jpg', 'Feria de gastronomía local organizada por la Alcaldía de Valledupar', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-6', ' ', NULL, 0, '2021-12-05 20:07:34', NULL, NULL),
(7, 1, 'vistas/images/noticias/7.jpg', 'Ponte al día con la cuota de sostenimiento', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-7', ' ', NULL, 0, '2021-12-05 20:08:01', NULL, NULL),
(8, 1, 'vistas/images/noticias/8.jpg', 'Rendición de cuentas - ACOPI Nacional', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-8', ' ', NULL, 1, '2021-12-05 20:08:18', NULL, NULL),
(9, 1, 'vistas/images/noticias/9.jpg', 'Subsidios Post cuarentena obligatoria, otorgados por el gobierno nacional', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-9', ' ', NULL, 0, '2021-12-05 20:08:30', NULL, NULL),
(10, 3, 'vistas/images/noticias/10.jpg', 'Cuenta la historia de tu emprendimiento en nuestro canal de Youtube', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-10', ' ', NULL, 0, '2021-12-05 20:08:46', NULL, NULL),
(11, 1, 'vistas/images/noticias/1.jpeg', 'El desempleo en el Cesar dismuniye un 5,8%', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-11', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 1, '2021-12-05 20:09:06', NULL, NULL),
(12, 2, 'vistas/images/noticias/2.jpeg', 'Congreso Local en Valledupar', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-12', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 1, '2021-12-05 20:09:32', NULL, NULL),
(13, 2, 'vistas/images/noticias/3.jpg', '66° CONGRESO NACIONAL: EMPRESAS PARA EL DESARROLLO SOCIAL 70 AÑOS\n                                DE ACOPI: LA MIPYME, DINAMIZADORA SOCIAL Y ECONÓMICA DE COLOMBIA', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-13', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:10:08', NULL, NULL),
(14, 2, 'vistas/images/noticias/4.jpg', '66° CONGRESO NACIONAL: EMPRESAS PARA EL DESARROLLO SOCIAL 70 AÑOS\n                                DE ACOPI: LA MIPYME, DINAMIZADORA SOCIAL Y ECONÓMICA DE COLOMBIA', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-14', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:10:42', NULL, NULL),
(15, 1, 'vistas/images/noticias/5.jpg', 'Reactivación de empresa', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-15', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:11:00', NULL, NULL),
(16, 1, 'vistas/images/noticias/6.jpg', 'Aprobación de creditos', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-16', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:11:28', NULL, NULL);
INSERT INTO `noticias` (`id`, `categoria`, `portada_noticia`, `titulo`, `descripcion_noticia`, `p_claves_noticia`, `ruta_noticia`, `contenido_noticia`, `vistas_noticia`, `destacado`, `fecha_noticia`, `created_at`, `updated_at`) VALUES
(17, 3, 'vistas/images/noticias/7.jpg', 'ACOPI Cesar celebra el festival vallenato 2022', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[\"acopi\", \"congreso\", \"microempresarios\", \"agremiacion\"]', 'noticia-17', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2022-01-20 20:48:30', NULL, NULL),
(18, 2, 'vistas/images/noticias/8.jpg', 'Congreso regional de microempresarios en Barranquilla - Colombia', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-18', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:12:33', NULL, NULL),
(19, 3, 'vistas/images/noticias/9.jpg', 'Feria de gastronomía local organizada por la Alcaldía de Valledupar', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-19', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:12:49', NULL, NULL),
(20, 1, 'vistas/images/noticias/10.jpg', 'Ponte al día con la cuota de sostenimiento', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-20', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:13:04', NULL, NULL),
(21, 1, 'vistas/images/noticias/portada/99238.jpg', 'Aumento en el PIB Nacional', 'El producto interno bruto (PIB) es el valor de mercado de todos los bienes y servicios finales producidos usando los factores de producción disponibles dentro de un país en un periodo determinado.', '[\"acopi\",\"PIB\"]', 'aumento-en-el-pib', '<span style=\"font-family: Arial; font-size: 1em; color: rgb(51, 51, 51);\">Cuando se usan los precios actuales (precios corrientes) para calcularlo se habla de PIB nominal, y al usar los precios de un año base (precios constantes) se conoce como PIB real. Este último es una mejor medida de la actividad económica de un país al medir exclusivamente el cambio en la producción de bienes y servicios en la economía (cantidades), dejando de lado el efecto de las variaciones de los precios.</span><div class=\"field field-name-field-definicion-experta field-type-text-with-summary field-label-hidden field-wrapper\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, sans-serif;\"><p style=\"margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 1rem; line-height: 1.6; text-rendering: optimizelegibility;\"><span style=\"font-family: Arial;\">El</span><span style=\"font-family: Arial;\">&nbsp;</span><strong style=\"font-weight: bold; line-height: inherit;\"><span style=\"font-family: Arial;\">PIB</span></strong><span style=\"font-family: Arial;\">&nbsp;</span><span style=\"font-family: Arial;\">visto desde el enfoque de la</span><span style=\"font-family: Arial;\">&nbsp;</span><strong style=\"font-weight: bold; line-height: inherit;\"><span style=\"font-family: Arial;\">producción</span></strong><span style=\"font-family: Arial;\">, es posible desagregarlo por</span><span style=\"font-family: Arial;\">&nbsp;</span><strong style=\"font-weight: bold; line-height: inherit;\"><span style=\"font-family: Arial;\">ramas de actividad económica</span></strong><span style=\"font-family: Arial;\">&nbsp;</span><span style=\"font-family: Arial;\">para analizar sus desempeños o aportes al crecimiento económico del país.</span></p></div>', NULL, 0, '2021-12-05 02:20:34', '2021-12-05 07:20:34', '2021-12-05 07:20:34'),
(22, 1, 'vistas/images/noticias/portada/78484.jpg', 'Aumento en el PIB Nacional', 'El producto interno bruto (PIB) es el valor de mercado de todos los bienes y servicios finales producidos usando los factores de producción disponibles dentro de un país en un periodo determinado.', '[\"acopi\",\"PIB\"]', 'pib-crece', '<div class=\"body field\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, sans-serif;\"><p style=\"margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 1em; line-height: 1.6; text-rendering: optimizelegibility;\">Cuando se usan los precios actuales (precios corrientes) para calcularlo se habla de PIB nominal, y al usar los precios de un año base (precios constantes) se conoce como PIB real. Este último es una mejor medida de la actividad económica de un país al medir exclusivamente el cambio en la producción de bienes y servicios en la economía (cantidades), dejando de lado el efecto de las variaciones de los precios.</p></div><div class=\"field field-name-field-definicion-experta field-type-text-with-summary field-label-hidden field-wrapper\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, sans-serif;\"><p style=\"margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 1rem; line-height: 1.6; text-rendering: optimizelegibility;\">El&nbsp;<strong style=\"font-weight: bold; line-height: inherit;\">PIB</strong>&nbsp;visto desde el enfoque de la&nbsp;<strong style=\"font-weight: bold; line-height: inherit;\">producción</strong>, es posible desagregarlo por&nbsp;<strong style=\"font-weight: bold; line-height: inherit;\">ramas de actividad económica</strong>&nbsp;para analizar sus desempeños o aportes al crecimiento económico del país.</p></div>', NULL, 0, '2021-12-05 02:22:25', '2021-12-05 07:22:24', '2021-12-05 07:22:24'),
(23, 1, 'vistas/images/noticias/portada/96097.jpg', '¿Que es ACOPI?', 'Información de ACOPI', '[\"acopi\",\"colombia\",\"historia\",\"significado\"]', 'quienes-somos', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 23px; line-height: 30px; text-align: justify;\"><img src=\"http://localhost/acopi/administrador/public../vistas/images/temp/c91591a8d461c2869b9f535ded3e213e.png\" style=\"width: 25%; float: right;\" class=\"note-float-right\"><span style=\"font-family: Arial;\">ACOPI es una entidad sin ánimo de lucro,una Federación Nacional de la MIPYME, Fundada el 27 de agosto de 1951,como resultado de la Fusión de entidades a fines del orden regional que existían en ese momento en cuatro de las más importantes ciudades del país.</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 23px; line-height: 30px; text-align: justify;\"><span style=\"font-family: Arial;\">Como ente autónomo se creó ACOPI Regional Centro Occidente el 04 de septiembre de 2003,haciendo parte de la Federación Nacional Asociación Colombiana de las Micro, Pequeñas y Medianas Empresas;la regional comprende los Departamentos de Quindío, Chocó, y Risaralda.</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 23px; line-height: 30px; text-align: justify;\"><span style=\"font-family: Arial;\">La experiencia acumulada por ACOPI Centro Occidente en el fortalecimiento y promoción de las MiPymes a través de desarrollo de diferentes estrategias innovadoras, que impactan el crecimiento empresarial en la región, favoreciendo la empleabilidad, la internacionalización de productos y servicios, el desarrollo del capital humano, la innovación social y la cultura de Asociatividad, son la mejor carta de presentación de nuestra organización.</span></p>', NULL, 0, '2021-12-05 02:37:36', '2021-12-05 07:37:36', '2021-12-05 07:37:36'),
(24, 2, 'vistas/images/noticias/portada/96548.jpg', 'Las mejores microempresas de Colombia', 'Top de las mejores microempresas de Colombia', '[\"cesar\",\"microempresas\",\"acopi\",\"colombia\",\"pymes\",\"valledupar\"]', 'top-microempresas-valledupar', '<p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\"><img src=\"http://localhost/acopi/administrador/public/vistas/images/noticias/contenido/8b0d268963dd0cfb808aac48a549829f.png\" style=\"width: 25%; float: right;\" class=\"note-float-right\">Debido a la necesidad de utilizar el teléfono celular para realizar múltiples actividades, cada vez son más las personas que usan este aparato móvil mientras está cargando su batería, lo cual puede generar efectos negativos.</p><p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\">Según el portal especializado Betech, cuando se conecta el equipo al enchufe, la batería empieza a cargarse y por tanto aumenta la temperatura. Al usarlo, lo que sucede es que realmente no se carga el dispositivo ya que esa batería se la está consumiendo, derivando en una carga más lenta y perjudicial.</p><p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\">Expertos indican que es necesario evitar ver videos, jugar videojuegos, descargas archivos, hablar por video con alguien, porque se estará usando funciones que exigen mucho a la batería y al propio procesador, lo que hará que se dispare la temperatura del teléfono.</p><p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\">Aunque hay otras actividades de menor impacto, también debería evitarse durante el periodo de carga contestar un par de mensajes o hablar con alguien.</p><p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\">Por último, recomiendan no cargar el celular al 100 % ni cargarlo durante toda la noche y, sobre todo, usar cargadores correspondientes y oficiales para su aparato.</p>', NULL, 0, '2021-12-30 17:18:08', '2021-12-06 02:15:30', '2021-12-30 22:18:08'),
(25, 2, 'vistas/images/noticias/portada/61273.jpg', 'Bienvenidos a nuestra agremiación', 'Información acerca del evento de iniciación', '[\"acopi\",\"cesar\",\"inicio\",\"bienvenida\"]', 'evento-de-iniciacion', '<div>Este jueves 2 y el viernes 3 de diciembre la empresa de energía eléctrica Afinia adelantará el plan de mejoras y adecuaciones eléctricas para optimizar progresivamente su servicio en Valledupar y en municipios del Cesar.</div><div><br></div><div style=\"text-align: justify; \"><img src=\"http://localhost/acopi/administrador/public/vistas/images/noticias/contenido/a0f3601dc682036423013a5d965db9aa.jpg\" style=\"width: 25%; float: right;\" class=\"note-float-right\">En ese sentido, en el municipio de San Diego, el personal capacitado de Afinia instalará estructuras, redes y elementos de protección, los cuales harán parte del nuevo circuito San Diego 2. La actividad se llevará a cabo desde las 7:30 a.m. hasta las 4:30 p.m., y durante su desarrollo será suspendido el servicio de energía en el municipio y sectores aledaños.</div><div style=\"text-align: justify; \"><br></div><div style=\"text-align: justify;\">Del mismo modo, en Valledupar la empresa realizará trabajos en el circuito Valledupar 4 desde las 5:30 a.m. hasta las 7:30 a.m., durante la jornada habrá suspensión en el fluido eléctrico en los barrios: 9 de Abril, Las Acacias, Altos de La Nevada, Bello Horizonte, Campo Romero, El Limonar, Futuro de Los Niños, Urbanización Ciudad Tayrona, Villa Algenia, Villa Andrés, Villa Consuelo, Los Guasimales, Brisas de La Popa, Francisco Javier, Altos de Pimienta, Urbanización Bella Vista, Urbanización Ana María y el Conjunto Cerrado Alta Vista.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify; \">Asimismo, el viernes 3 de diciembre no habrá servicio de energía desde las 7:45 a.m. hasta las 4:30 de la tarde para los habitantes del barrio San Fernando de Valledupar, en el sector comprendido entre las carreras 6 y 6B, desde la calle 45 hasta la calle 47, ya que en el marco de la construcción del nuevo circuito Salguero 5 en Valledupar instalarán nuevos postes y redes.</div>', NULL, 0, '2021-12-07 22:29:23', '2021-12-08 03:29:23', '2021-12-08 03:29:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_web`
--

CREATE TABLE `pagina_web` (
  `id` int(11) NOT NULL,
  `dominio` text NOT NULL,
  `servidor` text NOT NULL,
  `titulo_pestana` text NOT NULL,
  `titulo_pagina` text NOT NULL,
  `logo_navegacion` text NOT NULL,
  `logo_pestana` text NOT NULL,
  `titulo_navegacion` text NOT NULL,
  `descripcion` text NOT NULL,
  `palabras_claves` text NOT NULL,
  `carrusel` text NOT NULL,
  `proyectos` text NOT NULL,
  `noticias_intro` text NOT NULL,
  `aliados` text NOT NULL,
  `videos` text NOT NULL,
  `productos` text NOT NULL,
  `redes_sociales` text NOT NULL,
  `contacto` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagina_web`
--

INSERT INTO `pagina_web` (`id`, `dominio`, `servidor`, `titulo_pestana`, `titulo_pagina`, `logo_navegacion`, `logo_pestana`, `titulo_navegacion`, `descripcion`, `palabras_claves`, `carrusel`, `proyectos`, `noticias_intro`, `aliados`, `videos`, `productos`, `redes_sociales`, `contacto`, `updated_at`) VALUES
(1, 'http://localhost/acopi/', 'http://localhost/acopi/administrador/public/', 'ACOPI - Cesar', 'ACOPI - Cesar', 'vistas/images/pagina_web/8804.png', 'vistas/images/pagina_web/7536.png', 'ACOPI - CESAR', 'Página oficial de la asociación de las medianas y pequeñas industrias del Cesar, aquí encontrarás toda la información de nuestra agremiación.', '[\"acopi\",\"cesar\",\"acopicesar\",\"valledupar\",\"agremiacion\",\"agremiados\",\"microempresarios\",\"pymes\",\"colombia\",\"citas\"]', '[{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"¡LLEGA EL 2022 Y ES MOMENTO DE PONERTE AL DÍA!\",\n	\"texto\": \"Comienza la transformación de los microempresarios en el departamento del Cesar.<b>¡Reactivate de inmediato!</b>\",\n	\"boton-1\": \"vistas/images/pagina_web/carrusel/6153.png\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2\": \"\",\n	\"url-boton-2\": \"https://www.google.com.co/\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/quinta.jpg\"\n},{\n	\"categoria\": \"Capacitación\",\n	\"titulo\": \"¡Ya comienza el festival! y es hora de planear.\",\n	\"texto\": \"Capacitación sobre como aprovechar la afluencia masiva de turistas (sector hotelero) y como incrementar las ventas (sector comercial). Dictado por la Doctora Alexandra Márquez.\",\n	\"boton-1\": \"vistas/images/pagina_web/carrusel/1450.png\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2\": \"vistas/images/pagina_web/carrusel/6082.png\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"vistas/images/pagina_web/carrusel/2423.jpg\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/9693.jpg\"\n},{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"Descarga la App de la DIAN en Android o iPhone\",\n	\"texto\": \"Invitamos a todos nuestro agremiados a descargar la aplicación de la DIAN en todos sus dispositivos moviles y así matenerse actualizados de todas las novedades tributarias del momento.\",\n	\"boton-1\": \"vistas/images/pagina_web/carrusel/1947.png\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2\": \"vistas/images/pagina_web/carrusel/4590.png\",\n	\"url-boton-2\": \"https://www.google.com/\",\n	\"foto-delante\": \"vistas/images/pagina_web/carrusel/2703.png\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/7085.jpg\"\n},{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"¡EMPIEZA EL AÑO 2022!\",\n	\"texto\": \"Este año tus ingresos crecerán.\",\n	\"boton-1\": \"vistas/images/pagina_web/carrusel/27088.png\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2\": \"vistas/images/pagina_web/carrusel/98408.png\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/31551.jpg\"\n},{\n	\"categoria\": \"Capacitación\",\n	\"titulo\": \"¿CÓMO TENER UN PÁGINA WEB?\",\n	\"texto\": \"Capacitación sobre como poner acceder a la sistematización de procesos empresariales.\",\n	\"boton-1\": \"vistas/images/pagina_web/carrusel/80489.png\",\n	\"url-boton-1\": \"\",\n	\"boton-2\": \"vistas/images/pagina_web/carrusel/68333.png\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"vistas/images/pagina_web/carrusel/89315.png\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/31967.jpg\"\n},{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"AUMENTO EN EL PIB NACIONAL\",\n	\"texto\": \"Al final del 2021 se registró un alza del 10% en el PIB del país.\",\n	\"boton-1\": \"vistas/images/pagina_web/carrusel/93388.png\",\n	\"url-boton-1\": \"\",\n	\"boton-2\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/64137.png\"\n},{\n	\"categoria\": \"Otros\",\n	\"titulo\": \"PRUEBA VENDER EN LINEA\",\n	\"texto\": \"A través de las ventas en línea y promoción de productos por medio de las redes sociales puedes atraer nuevos clientes.\",\n	\"boton-1\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2\": \"vistas/images/pagina_web/carrusel/72023.png\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/97296.jpg\"\n},{\n	\"categoria\": \"undefined\",\n	\"titulo\": \"undefined\",\n	\"texto\": \"undefined\",\n	\"boton-1\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/77108.jpg\"\n},{\n	\"categoria\": \"undefined\",\n	\"titulo\": \"undefined\",\n	\"texto\": \"undefined\",\n	\"boton-1\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/19974.jpg\"\n},{\n	\"categoria\": \"Capacitación\",\n	\"titulo\": \"Capacitación en herramientas de excel\",\n	\"texto\": \"Capacitación en base de datos con excel\",\n	\"boton-1\": \"vistas/images/pagina_web/carrusel/72816.png\",\n	\"url-boton-1\": \"https://www.google.com/?gws_rd=ssl\",\n	\"boton-2\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/17587.jpg\"\n}]', '[{\"imagen\": \"images/proyectos/agromercado.png\", \"fecha_dia\": \"14\", \"fecha_mes\": \"Abril\", \"categoria\": \"Sector Agroindustríal\", \"nombre\": \"AgroMercado\", \"info\": \"Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.\"\r\n},{\"imagen\": \"images/proyectos/textiles.png\", \"fecha_dia\": \"15\", \"fecha_mes\": \"Abril\", \"categoria\": \"Sector Comercial\", \"nombre\": \"La Tercera Transformación\", \"info\": \"Proyecto que consiste en la evaluación para la aprobación de creditos, dandole la oportunidad a los microempresarios de crecer y superar la reciente crisis economica. En colaboración con Bancoldex.\"},{\"imagen\": \"images/proyectos/taxes.png\", \"fecha_dia\": \"16\", \"fecha_mes\": \"Abril\", \"categoria\": \"Comunidad en general\", \"nombre\": \"Taxes al día\", \"info\": \"Consiste en asegurarse que todos los microempresarios estén al tanto de cuales son sus compromisos tributarios.\" }]\r\n', 'En esta sesión encontraras las  noticias más recientes de nuestra agremiación, solo cliquea sobre el recuadro para ver más.', '[{\n	\"nombre\": \"Universidad Popular del Cesar\", \n	\"logo\": \"vistas/images/pagina_web/aliados/4547.png\", \n	\"link\": \"http://www.unicesar.edu.co\"\n},{\n	\"nombre\": \"Universidad de Santander UDES\", \n	\"logo\": \"vistas/images/pagina_web/aliados/aliados-udes.png\", \n	\"link\": \"http://www.unicesar.edu.co\"\n},{\n	\"nombre\": \"Fundación Universitaria del Área Andina\", \n	\"logo\": \"vistas/images/pagina_web/aliados/8706.png\", \n	\"link\": \"http://www.unicesar.edu.co\"\n},{\n	\"nombre\": \"Servicio Nacional de Aprendizaje\", \n	\"logo\": \"vistas/images/pagina_web/aliados/aliados-sena.png\", \n	\"link\": \"http://www.unicesar.edu.co\"\n},{\n	\"nombre\": \"Gobernación del Cesar\", \n	\"logo\": \"vistas/images/pagina_web/aliados/2788.png\", \n	\"link\": \"http://www.unicesar.edu.co\"\n}]', '[\"https://www.youtube.com/embed/qJ7Kpfm6DXM\", \"https://www.youtube.com/embed/TYvtmPZ6YS8\", \"https://www.youtube.com/embed/jEVKFNZU4EI\"]', '[{\n	\"num\": \"01.\", \n	\"nombre\": \"Representación y liderazgo gremial.\", \n	\"descripcion\": \"Defendemos los intereses del sector ante las entidades gubernamentales y no gubernamentales, nacionales y/o extranjeras.\"\n},{\n	\"num\": \"02.\", \n	\"nombre\": \"Convenios de cooperación interinstitucional.\", \n	\"descripcion\": \"Suscritos con diversas entidades para desarrollar programas que contribuyan al fomentos de la pequeña y mediana empresa.\"\n},{\n	\"num\": \"03.\", \n	\"nombre\": \"Alianzas estrategicas.\", \n	\"descripcion\": \"Promovemos la asociación entre empresas afines para propocionar la transferencia de bienes y servicios buscando la ampliacion de sus mercados y la disminución de sus costos.\"\n},{\n	\"num\": \"04.\", \n	\"nombre\": \"Capacitación.\", \n	\"descripcion\": \"Programamos conferencias, talleres, cursos y seminarios especializados en diversas áreas administrativas y técnicas, orientadas a resolver las necesidades de capacitación del sector industrial, con tarifas especiales para afiliados.\"\n},{\n	\"num\": \"05.\", \n	\"nombre\": \"Asesorías.\", \n	\"descripcion\": \"Nuestros afiliados pueden obtener asesorías en las siguientes áreas:\"\n},{\n	\"num\": \"06.\", \n	\"nombre\": \"Información y divulgación.\", \n	\"descripcion\": \"Es nuestro interes mantener una cordial y permanente comunicación con nuestro gremio que nos permite hacerle llegar información especializada del sector y conocer sus inquietudes y necesidades.\"\n},{\n	\"num\": \"07.\", \n	\"nombre\": \"Eventos especiales.\", \n	\"descripcion\": \"Con el propósito de promocionar e integrar a nuestro afiliados, buscando ampliar sus horizontes, organizamos y apoyamos la realización de encuentros empresariales, muestras y ferias como Expocesar, Con la participación de entidades como PROEXPORT organizamos misiones a otros países con la intención de establecer contactos para importación y Exportación.\"\n},{\n	\"num\": \"08.\", \n	\"nombre\": \"Eventos institucionales.\", \n	\"descripcion\": \"Asamblea General de Afiliados, Convención Nacional, Congreso Nacional.\"\n},{\n	\"num\": \"09.\", \n	\"nombre\": \"Practicas empresariales.\", \n	\"descripcion\": \"Mediante Convenios con las universidades, estamos en la posibilidad de facilitar a nuestros afiliados practicantes calificados que les apoyen en la implantación de procesos hacia una mayor productividad, para lo cual se ha conformado un COMITÉ INTERDISCIPLINARIO.\"\n},{\n	\"num\": \"10.\", \n	\"nombre\": \"Fortalecimiento y desarrollo Sectorial.\", \n	\"descripcion\": \"A traves de los programas de desarrollo sectorial PRODES, se implementan actividades asociativas, orientadas al mejoramiento de la gestión y competividad con el objetivo final incorporar a las PYMES de la región en la corriente de los negocios internacionales.\"\n},{\n	\"num\": \"11.\", \n	\"nombre\": \"Centros de conciliación y arbitraje.\", \n	\"descripcion\": \"Al servicio de nuestros afiliados para disminuir conflictos por la via de la conciliación.\"\n}]', '[{\"nombre\":\"facebook\",\"logo\":\"fab fa-facebook-f\",\"link\":\"https://www.facebook.com\"},{\"nombre\":\"linkeln\",\"logo\":\"fab fa-linkedin-in\",\"link\":\"https://www.linkeln.com\"},{\"nombre\":\"twitter\",\"logo\":\"fab fa-twitter\",\"link\":\"https://www.twitter.com\"},{\"nombre\":\" tiktok\",\"logo\":\"fab fa-tiktok\",\"link\":\"https://www.tiktok.com\"},{\"nombre\":\" youtube\",\"logo\":\"fab fa-youtube\",\"link\":\"https://www.youtube.com\"},{\"nombre\":\" pinterest\",\"logo\":\"fab fa-pinterest-p\",\"link\":\"https://www.pinterest.com\"}]', '[\"Calle 15 # 4-33, oficina 401.\",\"574 9216\",\"+57 315 651 6647\",\"acopicesar07@hotmail.com\"]', '2022-01-23 20:56:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(20) NOT NULL,
  `codigo_recibo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `valor_deuda` int(20) NOT NULL,
  `valor_mes` int(20) NOT NULL,
  `valor_recibo` int(20) NOT NULL,
  `mes_recibo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_limite` date NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_reporta` int(11) DEFAULT NULL,
  `fecha_reporte` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `codigo_recibo`, `id_empresa`, `valor_deuda`, `valor_mes`, `valor_recibo`, `mes_recibo`, `fecha_limite`, `estado`, `id_reporta`, `fecha_reporte`, `created_at`, `updated_at`) VALUES
(1931, NULL, 1, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', NULL, NULL, '2022-02-02 01:38:45', '2022-02-02 07:30:12'),
(1932, NULL, 2, 0, 80000, 80000, 'febrero', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:38:45', '2022-02-02 01:40:20'),
(1933, NULL, 3, 0, 80000, 80000, 'febrero', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:38:45', '2022-02-02 01:40:20'),
(1934, NULL, 5, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-03 01:45:50', '2022-02-02 01:38:46', '2022-02-03 01:45:50'),
(1935, NULL, 9, 0, 80000, 35000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-03 01:43:31', '2022-02-02 01:38:46', '2022-02-03 01:43:31'),
(1936, NULL, 10, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 01:38:46', '2022-02-03 01:42:07'),
(1937, NULL, 11, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:39:28', '2022-02-02 01:38:46', '2022-02-02 01:39:28'),
(1938, NULL, 12, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:39:06', '2022-02-02 01:38:46', '2022-02-02 01:39:06'),
(1939, NULL, 13, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:39:02', '2022-02-02 01:38:46', '2022-02-02 01:39:02'),
(1940, NULL, 14, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:38:58', '2022-02-02 01:38:46', '2022-02-02 01:38:58'),
(1941, NULL, 15, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 01:38:46', '2022-02-02 07:56:39'),
(1942, NULL, 1, 80000, 80000, 160000, 'febrero', '2022-02-11', 'negoceado', NULL, NULL, '2022-02-02 01:40:20', '2022-02-02 07:30:12'),
(1943, NULL, 2, 80000, 80000, 160000, 'febrero', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:40:20', '2022-02-02 01:41:50'),
(1944, NULL, 3, 80000, 80000, 160000, 'febrero', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:40:20', '2022-02-02 01:41:50'),
(1945, NULL, 5, 80000, 80000, 160000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-03 01:45:50', '2022-02-02 01:40:20', '2022-02-03 01:45:50'),
(1946, NULL, 9, 35000, 80000, 56000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-03 01:43:31', '2022-02-02 01:40:21', '2022-02-03 01:43:31'),
(1947, NULL, 10, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 01:40:21', '2022-02-03 01:42:07'),
(1948, NULL, 11, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:40:53', '2022-02-02 01:40:21', '2022-02-02 01:40:53'),
(1949, NULL, 12, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:40:47', '2022-02-02 01:40:21', '2022-02-02 01:40:47'),
(1950, NULL, 13, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:40:43', '2022-02-02 01:40:21', '2022-02-02 01:40:43'),
(1951, NULL, 14, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:40:38', '2022-02-02 01:40:21', '2022-02-02 01:40:38'),
(1952, NULL, 15, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 01:40:21', '2022-02-02 07:56:39'),
(1953, NULL, 1, 160000, 80000, 240000, 'febrero', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:41:50', '2022-02-02 07:30:12'),
(1954, NULL, 2, 160000, 80000, 240000, 'febrero', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:41:50', '2022-02-02 07:17:17'),
(1955, NULL, 3, 160000, 80000, 240000, 'febrero', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:41:50', '2022-02-02 07:09:30'),
(1956, NULL, 5, 160000, 80000, 240000, 'febrero', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:41:51', '2022-02-02 07:05:37'),
(1957, NULL, 9, 56000, 80000, 102000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:36', '2022-02-02 01:41:51', '2022-02-02 06:57:32'),
(1958, NULL, 10, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 01:41:51', '2022-02-03 01:42:07'),
(1959, NULL, 11, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:16', '2022-02-02 01:41:51', '2022-02-02 01:42:16'),
(1960, NULL, 12, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:11', '2022-02-02 01:41:51', '2022-02-02 01:42:11'),
(1961, NULL, 13, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:07', '2022-02-02 01:41:51', '2022-02-02 01:42:07'),
(1962, NULL, 14, 0, 80000, 80000, 'febrero', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:04', '2022-02-02 01:41:51', '2022-02-02 01:42:04'),
(1963, NULL, 15, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 01:41:52', '2022-02-02 07:56:39'),
(1964, NULL, 10, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 01:43:12', '2022-02-03 01:42:07'),
(1965, NULL, 11, 0, 80000, 80000, 'febrero', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:43:12', '2022-02-02 07:56:31'),
(1966, NULL, 12, 0, 80000, 80000, 'febrero', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:43:12', '2022-02-02 07:56:31'),
(1967, NULL, 13, 0, 80000, 80000, 'febrero', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:43:12', '2022-02-02 07:56:31'),
(1968, NULL, 14, 0, 80000, 80000, 'febrero', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:43:12', '2022-02-02 07:56:31'),
(1969, NULL, 15, 0, 80000, 80000, 'febrero', '2022-02-11', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 01:43:13', '2022-02-02 07:56:39'),
(1970, NULL, 1, 0, 80000, 80000, 'febrero', '2022-02-12', 'no pago', NULL, NULL, '2022-02-02 07:56:30', '2022-02-02 07:56:30'),
(1971, NULL, 2, 0, 80000, 80000, 'febrero', '2022-02-12', 'no pago', NULL, NULL, '2022-02-02 07:56:30', '2022-02-02 07:56:30'),
(1972, NULL, 3, 0, 80000, 80000, 'febrero', '2022-02-12', 'no pago', NULL, NULL, '2022-02-02 07:56:31', '2022-02-02 07:56:31'),
(1973, NULL, 5, 0, 80000, 80000, 'febrero', '2022-02-12', 'pagado', 1, '2022-02-03 01:45:50', '2022-02-02 07:56:31', '2022-02-03 01:45:50'),
(1974, NULL, 9, 0, 80000, 80000, 'febrero', '2022-02-12', 'pagado', 1, '2022-02-03 01:43:31', '2022-02-02 07:56:31', '2022-02-03 01:43:31'),
(1975, NULL, 10, 80000, 80000, 160000, 'febrero', '2022-02-12', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 07:56:31', '2022-02-03 01:42:07'),
(1976, NULL, 11, 80000, 80000, 160000, 'febrero', '2022-02-12', 'pagado', 1, '2022-02-03 01:41:02', '2022-02-02 07:56:31', '2022-02-03 01:41:02'),
(1977, NULL, 12, 80000, 80000, 160000, 'febrero', '2022-02-12', 'pagado', 1, '2022-02-03 01:40:00', '2022-02-02 07:56:31', '2022-02-03 01:40:00'),
(1978, NULL, 13, 80000, 80000, 160000, 'febrero', '2022-02-12', 'pagado', 1, '2022-02-02 07:58:50', '2022-02-02 07:56:31', '2022-02-02 07:58:50'),
(1979, NULL, 14, 80000, 80000, 160000, 'febrero', '2022-02-12', 'pagado', 1, '2022-02-02 07:58:43', '2022-02-02 07:56:32', '2022-02-02 07:58:43'),
(1980, NULL, 15, 80000, 80000, 160000, 'febrero', '2022-02-12', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 07:56:32', '2022-02-02 07:56:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_generados`
--

CREATE TABLE `pagos_generados` (
  `id` int(11) NOT NULL,
  `month` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `year` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos_generados`
--

INSERT INTO `pagos_generados` (`id`, `month`, `year`, `created_at`, `updated_at`) VALUES
(68, '02', '2022', '2022-02-02 07:56:32', '2022-02-02 07:56:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_parametros`
--

CREATE TABLE `pagos_parametros` (
  `id` int(11) NOT NULL,
  `valor_cuota` int(11) NOT NULL,
  `periodo_activo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos_parametros`
--

INSERT INTO `pagos_parametros` (`id`, `valor_cuota`, `periodo_activo`, `created_at`, `updated_at`) VALUES
(1, 80000, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('andresalfredosotosuarez@gmail.com', '$2y$10$A.tdC3QVQwGRb8tGR4mEQe1t8IWxrxLg7kx60TNNq06fFivYIavBS', '2021-11-20 03:32:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante_empresa`
--

CREATE TABLE `representante_empresa` (
  `id_rprt_legal` int(11) NOT NULL,
  `tipo_documento_rprt` text COLLATE utf8_spanish_ci NOT NULL,
  `cc_rprt_legal` text COLLATE utf8_spanish_ci NOT NULL,
  `primer_nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `segundo_nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo_rprt` text COLLATE utf8_spanish_ci NOT NULL,
  `email_rprt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_rprt` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_rprt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_cedula_rprt` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `representante_empresa`
--

INSERT INTO `representante_empresa` (`id_rprt_legal`, `tipo_documento_rprt`, `cc_rprt_legal`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `sexo_rprt`, `email_rprt`, `telefono_rprt`, `foto_rprt`, `foto_cedula_rprt`, `created_at`, `updated_at`) VALUES
(3, 'cedula', '10658327539', 'Sandra', 'María', 'Gonzalez', 'Pereira', '1981-04-23', 'f', 'mgonzalez@gmail.com', '3004568234', 'vistas/images/afiliados/fotos/14378.jpg', 'vistas/images/afiliados/documentos/49086.jpg', '2022-01-09 07:26:16', '2022-01-10 03:54:13'),
(5, 'cedula', '1065920394', 'Mariana', 'Sofia', 'De Austria', 'y Borbon', '1984-09-07', 'f', 'msdeaustria@gmail.com', '3205483275', 'vistas/images/afiliados/fotos/20133.png', 'vistas/images/afiliados/documentos/13185.png', '2022-01-10 01:03:01', '2022-01-10 21:27:06'),
(6, 'cedula', '1065839234', 'Andrea', 'Martina', 'Ortiz', 'Almaza', '1970-04-04', 'f', 'aortiz@gmail.com', '3048457294', 'vistas/images/afiliados/fotos/46193.jpg', 'vistas/images/afiliados/documentos/27621.png', '2022-01-10 03:51:42', '2022-01-10 21:06:55'),
(7, 'cedula', '1065831073', 'Andrés', 'Alfredo', 'Soto', 'Suárez', '1997-02-13', 'm', 'aasoto@gmail.com', '3045395221', 'vistas/images/afiliados/fotos/62033.jpg', 'vistas/images/afiliados/documentos/36430.png', '2022-01-10 21:21:30', '2022-01-10 21:21:30'),
(8, 'cedula', '1065829462', 'José', 'Martín', 'Pérez', 'Gonzalez', '1990-10-08', 'm', 'jperez@gmail.com', '3125385693', 'vistas/images/afiliados/fotos/18711.jpg', 'vistas/images/afiliados/documentos/42465.png', '2022-01-12 07:23:35', '2022-01-22 07:21:11'),
(9, 'cedula', '1065827495', 'Esteban', 'José', 'Martinez', 'Iguarán', '1996-04-04', 'm', 'emartinez04@gmail.com', '3205395482', 'vistas/images/afiliados/fotos/16404.jpg', 'vistas/images/afiliados/documentos/88338.jpg', '2022-01-26 02:17:42', '2022-01-26 02:17:42'),
(10, 'cedula', '77342950', 'Aleajndra', 'Martina', 'Herrera', 'Marquez', '1978-05-25', 'f', 'amherrara25@gmail.com', '3045394385', 'vistas/images/afiliados/fotos/84349.jpg', 'vistas/images/afiliados/documentos/52931.jpg', '2022-01-26 02:19:34', '2022-01-26 02:19:34'),
(11, 'cedula', '49520439', 'Ignacio', NULL, 'Hernandez', 'Gonzalez', '1980-07-06', 'm', 'ihermandez06@gmail.com', '3149530583', 'vistas/images/afiliados/fotos/44039.jpg', 'vistas/images/afiliados/documentos/99349.jpg', '2022-01-26 02:21:08', '2022-01-26 02:21:08'),
(12, 'cedula', '77324956', 'María', 'Gracia', 'Santos', 'De la cruz', '1988-07-13', 'f', 'mgsantos13@gmail.com', '3205395386', 'vistas/images/afiliados/fotos/10871.jpg', 'vistas/images/afiliados/documentos/49646.jpg', '2022-01-26 02:23:13', '2022-01-26 02:23:13'),
(13, 'cedula', '1065873651', 'Jennie', NULL, 'Lee', 'Wang', '1990-02-04', 'f', 'jlee04@gmail.com', '3117584302', 'vistas/images/afiliados/fotos/69981.jpg', 'vistas/images/afiliados/documentos/29896.jpg', '2022-01-26 02:24:52', '2022-01-26 02:24:52'),
(14, 'cedula', '1065832945', 'Helena', 'Margarita', 'Castillo', 'Perez', '1991-03-31', 'f', 'mhcastillo@gmail.com', '3154350976', 'vistas/images/afiliados/fotos/19288.jpg', 'vistas/images/afiliados/documentos/47540.jpg', '2022-01-26 02:37:56', '2022-01-26 02:37:56'),
(15, 'cedula', '77834932', 'Marciana', 'Ernesta', 'Mendoza', 'Herrera', '1982-07-07', 'f', 'memendoza07@gmail.com', '3167348450', 'vistas/images/afiliados/fotos/57017.jpg', 'vistas/images/afiliados/documentos/54155.jpg', '2022-01-26 02:40:24', '2022-01-26 02:40:24'),
(16, 'cedula', '56439438', 'Jesus', 'David', 'Moscote', 'Cartagena', '1985-09-23', 'm', 'jdmoscote23@gmail.com', '3103459356', 'vistas/images/afiliados/fotos/66761.jpg', 'vistas/images/afiliados/documentos/58862.jpg', '2022-01-26 02:42:16', '2022-01-26 02:42:16'),
(17, 'cedula', '77834943', 'Federica', 'Micaela', 'Holguin', 'Arteaga', '1965-11-01', 'f', 'fmholgin01@gmail.com', '3043195492', 'vistas/images/afiliados/fotos/96564.jpg', 'vistas/images/afiliados/documentos/69474.jpg', '2022-01-26 02:44:12', '2022-01-26 02:44:12'),
(18, 'cedula', '1065832953', 'Tomasita', NULL, 'Torres', 'Duertete', '1979-07-12', 'f', 'ttorres12@gmail.com', '3003258345', 'vistas/images/afiliados/fotos/30155.jpg', 'vistas/images/afiliados/documentos/66157.jpg', '2022-01-26 02:45:44', '2022-01-26 02:45:44'),
(19, 'cedula', '49548329', 'Miguel', 'Angel', 'Santo Domingo', 'y Torres', '1945-08-12', 'm', 'masantodomingo12@gmail.com', '3173249540', 'vistas/images/afiliados/fotos/85126.jpg', 'vistas/images/afiliados/documentos/72404.jpg', '2022-01-26 02:49:25', '2022-01-26 02:49:25'),
(20, 'cedula', '77213845', 'Carla', 'Josefa', 'Epiayu', 'Aguilar', '1990-03-12', 'f', 'cjepiayu12@gmail.com', '3004395412', 'vistas/images/afiliados/fotos/11975.jpg', 'vistas/images/afiliados/documentos/91742.jpg', '2022-01-26 02:54:40', '2022-01-26 02:54:40'),
(21, 'cedula', '77345723', 'Hernan', 'Andrés', 'Mosquera', 'Moscote', '1969-12-31', 'm', 'hamosquera31@gmail.com', '3123284375', 'vistas/images/afiliados/fotos/13161.jpg', 'vistas/images/afiliados/documentos/82375.jpg', '2022-01-26 02:57:16', '2022-01-26 02:57:16'),
(22, 'cedula', '49328431', 'Teobaldo', 'De Jésus', 'Alvarez', 'Villalba', '1950-02-02', 'm', 'tdjalvarez02@gmail.com', '3003215395', 'vistas/images/afiliados/fotos/70843.jpg', 'vistas/images/afiliados/documentos/33608.jpg', '2022-01-26 03:01:01', '2022-01-26 03:01:01'),
(23, 'cedula', '1065856913', 'John', NULL, 'Andrade', 'Castro', '1993-08-06', 'm', 'jandrade06@gmail.com', '3044369783', 'vistas/images/afiliados/fotos/49864.jpg', 'vistas/images/afiliados/documentos/11770.jpg', '2022-01-26 03:02:53', '2022-01-26 03:02:53'),
(24, 'cedula', '65327430', 'Teresita', 'Martina', 'Morales', 'Mieles', '1990-05-08', 'f', 'tmmorales08@gmail.com', '3203295482', 'vistas/images/afiliados/fotos/40523.jpg', 'vistas/images/afiliados/documentos/14730.jpg', '2022-01-26 03:05:13', '2022-01-26 03:05:13'),
(25, 'cedula', '1001438437', 'Jean', 'Michael', 'Park', 'Park', '1974-02-04', 'm', 'jmpark04@gmail.com', '3014384385', 'vistas/images/afiliados/fotos/11799.jpg', 'vistas/images/afiliados/documentos/80597.jpg', '2022-01-26 03:15:53', '2022-01-26 03:15:53'),
(26, 'cedula', '77345213', 'Antoine', 'Paul', 'Satre', 'Foret', '1960-02-12', 'm', 'apsatre12@gmail.com', '3003216384', 'vistas/images/afiliados/fotos/68091.jpg', 'vistas/images/afiliados/documentos/18088.jpg', '2022-01-26 03:18:32', '2022-01-26 03:18:32'),
(27, 'cedula', '1001234758', 'Antonio', 'Miguel', 'Sequeda', 'Hinojosa', '1991-08-07', 'm', 'amsequeda07@gmail.com', '3193284302', 'vistas/images/afiliados/fotos/83781.jpg', 'vistas/images/afiliados/documentos/99056.jpg', '2022-01-26 03:21:04', '2022-01-26 03:21:04'),
(28, 'cedula', '1065723941', 'Claudia', 'Helena', 'De Sanctis', 'Isaza', '1978-06-22', 'f', 'chdesanctis22@gmail.com', '3173247328', 'vistas/images/afiliados/fotos/23559.jpg', 'vistas/images/afiliados/documentos/66967.jpg', '2022-01-26 03:26:44', '2022-01-26 03:26:44'),
(29, 'cedula', '49213754', 'Marcina', 'Enriqueta', 'Costelo', 'Marañon', '1949-06-28', 'f', 'mecostelo28@gmail.com', '3123274385', 'vistas/images/afiliados/fotos/73893.jpg', 'vistas/images/afiliados/documentos/59680.jpg', '2022-01-26 03:28:55', '2022-01-26 03:28:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Director ejecutivo', NULL, NULL),
(3, 'Subdirector administrativo y financiero', NULL, NULL),
(4, 'Subdirector de desarrollo empresarial', NULL, NULL),
(5, 'Subdirector juridico', NULL, NULL),
(6, 'Subdirector de comunicaciones y eventos', NULL, NULL),
(7, 'Asistente de dirección', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_empresa`
--

CREATE TABLE `sector_empresa` (
  `id_sector` int(11) NOT NULL,
  `nombre_sector` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sector_empresa`
--

INSERT INTO `sector_empresa` (`id_sector`, `nombre_sector`, `created_at`, `updated_at`) VALUES
(1, 'Agroindustrial', NULL, NULL),
(2, 'Prestación de servicios', NULL, NULL),
(4, 'Tecnología', '2022-02-04 04:50:32', '2022-02-04 04:52:53'),
(5, 'Industria Textil', '2022-02-04 04:57:04', '2022-02-04 04:57:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modo` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Diurno',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `rol`, `modo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrés Soto', 'andresalfredosotosuarez@gmail.com', NULL, '$2y$10$jPmKrQ9l3Xvt8xN35BHt.OJ.NTYenPs9nHvKxAy6r6ZTKq1.sZln6', 'vistas/images/usuarios/723.jpg', 'Administrador', 'Nocturno', NULL, '2021-11-17 01:34:47', '2022-02-02 00:49:33'),
(4, 'Jean Carlos Recio', 'jrecio@gmail.com', NULL, '$2y$10$TqKqyV6QZ5LHB8OO.3nkm.VmkdIuxptHz2e6MgeMCMKeCFIjleBSy', 'vistas/images/usuarios/563.jpg', 'Administrador', 'Nocturno', NULL, '2021-11-30 07:18:38', '2022-01-22 06:41:14'),
(5, 'Jimena Castro', 'jcastro@gmail.com', NULL, '$2y$10$SBtB5gICn1uZEoxOU0TvNey5zD1dFMPvYiFfl2O20ZX9YQS0N.VkG', 'vistas/images/usuarios/138.jpg', 'Subdirector de comunicaciones y eventos', 'Diurno', NULL, '2021-12-01 07:11:36', '2021-12-02 07:07:32'),
(6, 'Adonais Fuentes', 'afuentes@gmail.com', NULL, '$2y$10$lc1gRh.wzkdYFpvXe4jxF.WLV1L1fQdojmUSzSK2UGxr1IunW7vka', 'vistas/images/usuarios/588.png', 'Director ejecutivo', 'Diurno', NULL, '2021-12-02 02:45:34', '2021-12-03 01:42:01'),
(7, 'Marta Alvarez', 'malvarez@gmail.com', NULL, '$2y$10$WdiSUVGfSa1axi9l8q2K4OdlRdgktWSgux0e38o2I0tXAiE46DcLG', 'vistas/images/usuarios/233.jpg', 'Subdirector administrativo y financiero', 'Diurno', NULL, '2021-12-02 21:02:17', '2021-12-02 21:10:23'),
(8, 'Emilio Carranza', 'ecarranza@gmail.com', NULL, '$2y$10$jkHq5tSKo/ZLoMGUq3cFCO9wcw49xsXoBCv48UKqPPAcw9SJ.N.pm', 'vistas/images/usuarios/593.jpg', 'Subdirector de desarrollo empresarial', 'Diurno', NULL, '2021-12-02 21:05:09', '2021-12-02 21:11:39'),
(9, 'Mariana De Austria', 'mdeaustria@gmail.com', NULL, '$2y$10$W3uHgkNJ3q6CUPaNbl.r9eoXY3jtTgy5bssDtIVGiCNkZqhmb.6bK', 'vistas/images/usuarios/797.jpg', 'Asistente de dirección', 'Diurno', NULL, '2021-12-02 21:06:23', '2021-12-02 21:19:37'),
(10, 'Eugenia Rojas', 'erojas@gmail.com', NULL, '$2y$10$DEBXjXgcgQK/qFuzbYTfUeZx4G4VpkRoTx/NzZ1Y516N5olET766e', 'vistas/images/usuarios/570.jpg', 'Subdirector juridico', 'Diurno', NULL, '2021-12-02 21:07:52', '2021-12-02 21:17:01'),
(11, 'Maria Perez', 'mperez@gmail.com', NULL, '$2y$10$nMOugiOl.Lb1ZFVHXUeeJeyUOBSFkU3UZjg.oaNwCB9mck.HK4NMu', NULL, NULL, 'Diurno', NULL, '2021-12-03 01:53:14', '2021-12-03 01:53:14'),
(13, 'Catalina Martinez', 'cmartinez@gmail.com', NULL, '$2y$10$4b4k439EF19pJ2dsJf7fe.RqamEPs3j385RE98Ie8/j7pqgSBwyWe', NULL, NULL, 'Diurno', NULL, '2021-12-03 02:08:21', '2021-12-03 02:08:21'),
(14, 'Cristobal Colón', 'ccolon@gmail.com', NULL, '$2y$10$zFonJQpo9FLcb0OVPAUXf.UbuEbbgiT.QGlRFVp5l9R41t.EmwlNi', NULL, NULL, 'Diurno', NULL, '2021-12-03 08:25:01', '2021-12-03 08:25:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `empleados_afiliados`
--
ALTER TABLE `empleados_afiliados`
  ADD PRIMARY KEY (`id_empleado_afiliado`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `interesados`
--
ALTER TABLE `interesados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios_departamento`
--
ALTER TABLE `municipios_departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagina_web`
--
ALTER TABLE `pagina_web`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos_generados`
--
ALTER TABLE `pagos_generados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos_parametros`
--
ALTER TABLE `pagos_parametros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `representante_empresa`
--
ALTER TABLE `representante_empresa`
  ADD PRIMARY KEY (`id_rprt_legal`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sector_empresa`
--
ALTER TABLE `sector_empresa`
  ADD PRIMARY KEY (`id_sector`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleados_afiliados`
--
ALTER TABLE `empleados_afiliados`
  MODIFY `id_empleado_afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `interesados`
--
ALTER TABLE `interesados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `municipios_departamento`
--
ALTER TABLE `municipios_departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pagina_web`
--
ALTER TABLE `pagina_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1981;

--
-- AUTO_INCREMENT de la tabla `pagos_generados`
--
ALTER TABLE `pagos_generados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `pagos_parametros`
--
ALTER TABLE `pagos_parametros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `representante_empresa`
--
ALTER TABLE `representante_empresa`
  MODIFY `id_rprt_legal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sector_empresa`
--
ALTER TABLE `sector_empresa`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

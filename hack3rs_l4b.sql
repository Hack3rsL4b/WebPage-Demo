-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-10-2021 a las 02:04:31
-- Versión del servidor: 5.7.32-log
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hack3rs_l4b`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE IF NOT EXISTS `actividades` (
  `id_actividad` int(11) NOT NULL,
  `actividad` varchar(45) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `enlace` varchar(45) NOT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `actividad`, `descripcion`, `enlace`) VALUES
(1, '¿Quiénes somos?', 'Descripción del sitio', 'descripcion.php'),
(2, 'Postúlate', 'Los usuarios que no son integrantes podrán postularse cuando se abran convocatorias', 'postulaciones.php'),
(3, 'Eventos', 'Eventos en los que se ha participado y/o se planea participar', 'eventos.php'),
(4, 'Proyectos', 'Proyectos finalizados por integrantes del semillero', 'proyectos.php'),
(5, 'Galeria', 'Galería de fotos del semillero', 'galeria.php'),
(6, 'Integrantes', 'Listado de los líderes e integrantes del semillero', 'integrantes.php'),
(7, 'Enlaces', 'Enlaces de interés para practicar ciberseguridad', 'enlaces-interes.php'),
(8, 'Contáctanos', 'Formulario de contacto con el semillero de investigación', 'contacto.php'),
(9, 'Foro', 'Solo los usuarios registrados tendrán acceso al foro', 'foro.php'),
(10, 'Usuarios', 'Operaciones CRUD de los usuarios', 'gestion-usuarios.php'),
(11, 'Roles', 'Lista los roles con los que cuenta el sistema, esta no cambia', 'lista-roles.php'),
(12, 'Actividades', 'Operaciones CRUD de actividades que pueden ser asignadas', 'gestion-actividades.php'),
(13, 'Permisos', 'Asignación, eliminación y consulta de los permisos de usuario', 'gestion-permisos.php'),
(15, 'Ya no es leer', 'Leer libro jejejeje', 'leer1.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores_publicaciones`
--

DROP TABLE IF EXISTS `autores_publicaciones`;
CREATE TABLE IF NOT EXISTS `autores_publicaciones` (
  `autor` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL,
  PRIMARY KEY (`autor`,`proyecto`),
  KEY `fk_publicaciones_autores` (`proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `ubicacion` blob NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `fecha_postulacion` datetime NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

DROP TABLE IF EXISTS `integrantes`;
CREATE TABLE IF NOT EXISTS `integrantes` (
  `id_integrante` int(11) NOT NULL AUTO_INCREMENT,
  `programa` varchar(45) NOT NULL,
  `id_usuario` int(45) NOT NULL,
  PRIMARY KEY (`id_integrante`),
  KEY `fk_integrantes_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participaciones`
--

DROP TABLE IF EXISTS `participaciones`;
CREATE TABLE IF NOT EXISTS `participaciones` (
  `eventos` int(11) NOT NULL,
  `publicaciones` int(11) NOT NULL,
  `info_extra` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`eventos`,`publicaciones`),
  KEY `fk_participaciones_publicaciones` (`publicaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `actividad` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`actividad`,`rol`),
  KEY `fk_permisos_roles` (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`actividad`, `rol`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(1, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `palabras_clave` varchar(100) NOT NULL,
  `resumen` text NOT NULL,
  `referencias` text NOT NULL,
  `direccion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `replicas_foro`
--

DROP TABLE IF EXISTS `replicas_foro`;
CREATE TABLE IF NOT EXISTS `replicas_foro` (
  `id_replica` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `id_usuario` int(45) NOT NULL,
  `tema` int(11) NOT NULL,
  PRIMARY KEY (`id_replica`),
  KEY `fk_replicas_usuario` (`id_usuario`),
  KEY `fk_replicas_tema` (`tema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Usuario con permisos para modificar la información y los usuarios registrados en la aplicación, agregar temas de discusión a los foros y participar en ellos'),
(2, 'Integrante', 'Usuario con permisos para modificar su propia información en la aplicación, agregar publicaciones de su autoría y participar en foros de discución'),
(3, 'Externo', 'Usuario con permisos para modificar su propia infromación y participar en foros de discusión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_foro`
--

DROP TABLE IF EXISTS `tema_foro`;
CREATE TABLE IF NOT EXISTS `tema_foro` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(45) NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `estado` varchar(45) NOT NULL,
  `id_usuario` int(45) NOT NULL,
  PRIMARY KEY (`id_tema`),
  KEY `fk_tema_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contrasenia` varchar(80) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `roles_id_rol` int(11) DEFAULT '3',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `telefono_UNIQUE` (`telefono`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_semillerista_roles` (`roles_id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contrasenia`, `nombre`, `apellido`, `telefono`, `email`, `estado`, `roles_id_rol`) VALUES
(1, 'Mikle12233', 'MiklePWD2', 'Michaelw', 'González', '123455556', 'msgonzalezv@academia.usbbog.edu.co', 'ACTIVO', 1),
(2, 'KarenAdmin', 'KarenPWD', 'Karen', 'Espitia', '2345671', 'kmespitiad@academia.usbbog.edu.co', 'ACTIVO', 1),
(3, 'GianEW', 'GianPWD3', 'GianE', 'HerreraE', '3456783', 'gcherreraq@academia.usbbog.edu.co', 'ACTIVO', 1),
(4, 'Alex', 'AlexPWD', 'Alex', 'Martínez', '456789', 'alex@email.com', 'ACTIVO', 2),
(5, 'David', 'DavidPWD', 'David', 'Rojas', '567890', 'david@email.com', 'INACTIVO', 2),
(8, 'pipe1', '1234', 'Felipe', 'Gomez', '234534', 'pipe@gmail.com', 'ACTIVO', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autores_publicaciones`
--
ALTER TABLE `autores_publicaciones`
  ADD CONSTRAINT `fk_autores_publicaciones` FOREIGN KEY (`autor`) REFERENCES `integrantes` (`id_integrante`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_publicaciones_autores` FOREIGN KEY (`proyecto`) REFERENCES `publicaciones` (`id_publicacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `fk_integrantes_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD CONSTRAINT `fk_participaciones_eventos` FOREIGN KEY (`eventos`) REFERENCES `eventos` (`id_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_participaciones_publicaciones` FOREIGN KEY (`publicaciones`) REFERENCES `publicaciones` (`id_publicacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_permisos_actividades` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_permisos_roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `replicas_foro`
--
ALTER TABLE `replicas_foro`
  ADD CONSTRAINT `fk_replicas_tema` FOREIGN KEY (`tema`) REFERENCES `tema_foro` (`id_tema`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_replicas_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema_foro`
--
ALTER TABLE `tema_foro`
  ADD CONSTRAINT `fk_tema_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_semillerista_roles` FOREIGN KEY (`roles_id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO hack3rs_l4b.eventos (`id_evento`, `nombre`, `descripcion`, `ubicacion`, `fecha_inicio`, `fecha_fin`, `fecha_postulacion`) VALUES
(1, 'Semana Ingeniería', 'Se hace la primer presentación formal del proyecto, presentado por los desarrolladores: Michael Gonzalez, Karen Espitia, Gian Herrera.', 'Virtual', '2021-11-09 14:00:00', '2021-11-09 17:00:00', '2021-11-04 16:00:00'),
(2, 'Ejemplo', 'Ejemplo', 'Ejemplo', '2021-11-08 15:05:44', '2021-11-08 15:05:44', '2021-11-08 15:05:44'),
(3, 'Ejemplo', 'Ejemplo', 'Ejemplo', '2021-11-08 15:05:44', '2021-11-08 15:05:44', '2021-11-08 15:05:44');



INSERT INTO hack3rs_l4b.integrantes (`programa`, `descripcion`, `id_usuario`) VALUES
('Ingeniería de sistemas', 'Proyectos:  1.PortalmyU: Autentificación centralizada mediante SSO de sistemas de información 2. Desarrollo de página web para el semillero Segurinfo-H4ck4rs L4b.
 Sexto Semestre . Ingresó al semillero en el año 2021-1', '2'),
 ('Ingeniería de sistemas', 'Proyectos:  1.PortalmyU: Autentificación centralizada mediante SSO de sistemas de información 2. Desarrollo de página web para el semillero Segurinfo-H4ck4rs L4b.
 Sexto Semestre . Ingresó al semillero en el año 2021-1', '3'),
 ('Ingeniería de sistemas', 'Proyectos:  1. Data Network Overlock: Sistema de Monitoreo y Gestión de Vulnerabilidades en Sistemas Activos de Red de Datos.
 Sexto Semestre . Ingresó al semillero en el año 2021-1', '4'),
 ('Ingeniería de sistemas', 'Proyectos:  1. Data Network Overlock: Sistema de Monitoreo y Gestión de Vulnerabilidades en Sistemas Activos de Red de Datos.
 Sexto Semestre . Ingresó al semillero en el año 2021-1', '5'),
 ('Ingeniería de sistemas', 'Proyectos:  1. Certifield Sistema de Generación y Validación para Certificados
Academicos Digitales. 
 Quinto Semestre . Ingresó al semillero en el año 2021-2', '16'),
  ('Ingeniería de sistemas', 'Proyectos:  Sistema de escritorios virtuales. 
 Noveno Semestre . Ingresó al semillero en el año 2021-1', '18'),
  ('Ingeniería de sistemas', 'Proyectos:  Sistema de escritorios virtuales. 
 Noveno Semestre . Ingresó al semillero en el año 2021-1', '19'),
 ('Ingeniería de sistemas', 'Proyectos:  Sistema de escritorios virtuales. 
 Noveno Semestre . Ingresó al semillero en el año 2021-1', '20'),
 ('Ingeniería de sistemas', 'Proyectos:  1. PortalmyU: Autentificación centralizada mediante SSO de sistemas de información. 
 Noveno Semestre . Ingresó al semillero en el año 2021-1', '21'),
  ('Ingeniería de sistemas', 'Proyectos: 1. PortalmyU: Autentificación centralizada mediante SSO de sistemas de información. 
 Sexto Semestre . Ingresó al semillero en el año 2021-1', '23'),
('Ingeniería de sistemas', 'Proyectos:  1. Certifield Sistema de Generación y Validación para Certificados
Academicos Digitales. Quinto Semestre. Ingresó al semillero en el año 2021-2', '22'),
('Ingeniería de sistemas', 'Proyectos:  1. Certifield Sistema de Generación y Validación para Certificados
Academicos Digitales. Quinto Semestre. Ingresó al semillero en el año 2021-2', '24');


 
 





















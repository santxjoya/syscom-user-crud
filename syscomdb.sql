-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2025 a las 20:23:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `syscomdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_09_24_052309_create_roles_table', 1),
(2, '2025_09_24_052509_create_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `rol_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_name`, `created_at`, `updated_at`) VALUES
(1, 'Jefe', NULL, NULL),
(2, 'Empleado', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `use_id` bigint(20) UNSIGNED NOT NULL,
  `use_name` varchar(255) NOT NULL,
  `use_mail` varchar(255) NOT NULL,
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `use_confirmation_date` date NOT NULL,
  `use_signature` longtext DEFAULT NULL,
  `use_contract` varchar(255) DEFAULT NULL,
  `use_elimination_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`use_id`, `use_name`, `use_mail`, `rol_id`, `use_confirmation_date`, `use_signature`, `use_contract`, `use_elimination_date`, `created_at`, `updated_at`) VALUES
(2, 'Santiago', 'Santiagojoyaa@gmail.com', 1, '2025-09-24', NULL, NULL, NULL, '2025-09-24 11:10:06', '2025-09-24 11:10:06'),
(3, 'John', 'Juan@gmail.com', 2, '2025-09-24', NULL, NULL, NULL, '2025-09-24 11:31:19', '2025-09-24 12:23:24'),
(5, 'Julian', 'Julian@gmail.com', 1, '2022-12-24', NULL, NULL, NULL, '2025-09-24 11:58:57', '2025-09-24 11:58:57'),
(8, 'Toño', 'tono@gmail.com', 2, '2025-09-12', NULL, NULL, NULL, '2025-09-24 23:00:53', '2025-09-24 23:00:53'),
(9, 'Sara', 'sara@gmail.com', 2, '2025-09-01', NULL, NULL, NULL, '2025-09-24 23:04:17', '2025-09-24 23:04:17'),
(10, 'Karol', 'karol@gmail.com', 2, '2025-08-02', NULL, NULL, NULL, '2025-09-24 23:06:20', '2025-09-24 23:06:20'),
(11, 'Pedro', 'pedro@gmail.com', 2, '2025-07-02', NULL, NULL, NULL, '2025-09-24 23:07:43', '2025-09-24 23:07:43'),
(12, 'Areas', 'areas@gmail.com', 2, '2025-01-10', NULL, 'contracts/o0ILcAWjRL09Y3YaNGX5fkJOruRizWReLeGLJUDd.pdf', NULL, '2025-09-24 23:08:21', '2025-09-24 23:08:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`use_id`),
  ADD UNIQUE KEY `users_use_mail_unique` (`use_mail`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `use_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

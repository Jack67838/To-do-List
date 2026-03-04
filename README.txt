En el http://localhost/phpmyadmin hay que crear varios bases de datos:

CREATE DATABASE IF NOT EXISTS `ToDoList`;
USE `ToDoList`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 2. Creación de la tabla de Tareas (TODO)
CREATE TABLE `todo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(50) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 3. Definición de Restricciones (Llaves Foráneas)
ALTER TABLE `todo`
  ADD CONSTRAINT `fk_usuario` 
  FOREIGN KEY (`usuario_id`) 
  REFERENCES `usuarios` (`id`) 
  ON DELETE CASCADE;
-- Eliminar base anterior si existe
DROP DATABASE IF EXISTS BDBOLIGRAMA;

-- Crear base con soporte para acentos y emojis
CREATE DATABASE BDBOLIGRAMA
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Crear usuario boligrama si no existe
CREATE USER IF NOT EXISTS 'boligrama'@'localhost' IDENTIFIED BY 'Boligrama2025';

-- Otorgar permisos al usuario sobre la base
GRANT ALL PRIVILEGES ON BDBOLIGRAMA.* TO 'boligrama'@'localhost';

-- Aplicar los permisos
FLUSH PRIVILEGES;

-- Seleccionar la base
USE BDBOLIGRAMA;

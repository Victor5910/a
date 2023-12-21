-- Crear la base de datos 'banco' si no existe
CREATE DATABASE IF NOT EXISTS banco CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
-- Usar la base de datos 'banco'
USE banco;
-- Crear la tabla 'cuentas'
CREATE TABLE IF NOT EXISTS cuentas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    saldo DECIMAL(10, 2) NOT NULL
);
-- Archivo: docker/mysql/init.sql
-- Objetivo: inicializar datos mínimos para validar la conexión de la app con MySQL.
-- Contexto: se ejecuta automáticamente al crear el contenedor por primera vez.
-- Paso 1: crear tabla de mensajes si no existe previamente.
CREATE TABLE IF NOT EXISTS mensajes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  texto VARCHAR(255) NOT NULL
);

-- Paso 2: insertar un registro semilla para comprobar lectura desde PHP.
INSERT INTO mensajes (texto) VALUES ('Hola desde MySQL en Proyecto con persistencia en MySQL');


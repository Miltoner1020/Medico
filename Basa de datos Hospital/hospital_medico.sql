-- Base de datos: hospital
CREATE DATABASE IF NOT EXISTS hospital
  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE hospital;

-- Tabla: medico
CREATE TABLE IF NOT EXISTS medico (
    id INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Datos de ejemplo para la tabla medico
INSERT INTO medico (nombres, apellidos, especialidad, telefono, foto) VALUES
('Carlos', 'Rojas Mendoza', 'Medicina general', '70712345', 'carlos_rojas.jpg'),
('María', 'Fernández López', 'Pediatría', '71234567', 'maria_fernandez.jpg'),
('José', 'Gutiérrez Flores', 'Cardiología', '76543210', 'jose_gutierrez.jpg'),
('Ana', 'Mamani Quispe', 'Dermatología', '69876543', 'ana_mamani.jpg');

-- Consultar todos los médicos
SELECT * FROM medico;

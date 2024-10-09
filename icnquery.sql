CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(100) UNIQUE NOT NULL
    password VARCHAR(50) NOT NULL
);

CREATE TABLE roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE rango (
    id_rango INT,
    id_rol INT,
    PRIMARY KEY (id_rango, id_rol),
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
);

ALTER TABLE users
ADD COLUMN id_rol INT,
ADD FOREIGN KEY (id_rol) REFERENCES roles(id_rol);

INSERT INTO roles (nombre) VALUES
('Director General'),
('Gerente'),
('Jefe de Departamento'),
('Supervisor'),
('Coordinador'),
('Empleado'),
('Asistente'),
('Practicante'),
('Becario');

-- Rango 1
INSERT INTO rango (id_rango, id_rol) VALUES
(1, 1),  -- Director General
(1, 2),  -- Gerente
(1, 3);  -- Jefe de Departamento

-- Rango 2
INSERT INTO rango (id_rango, id_rol) VALUES
(2, 4),  -- Supervisor
(2, 5);  -- Coordinador

-- Rango 3
INSERT INTO rango (id_rango, id_rol) VALUES
(3, 6),  -- Empleado
(3, 7),  -- Asistente
(3, 8),  -- Practicante
(3, 9);  -- Becario

INSERT INTO users (user, password, id_rol) VALUES
('diana.vasquez57376', MD5('uped2024'), 1),   -- Director General
('mario.rubio57336', MD5('uped2024'), 2),-- Gerente
('julissa.lopez59398', MD5('uped2024'), 3), -- Jefe de Departamento
('nestor.santamaria59447', MD5('uped2024'), 4), -- Coordinador
('marvin.ortiz59337', MD5('uped2024'), 5), -- Coordinador
('josue.delao59056', MD5('uped2024'),6), --Empleado
('kevin.rivas62325', MD5('uped2024'),7), --Asistente
('marielos.velasco42665', MD5('uped2024'),8), --Practicante
('daniel.hernandez59053', MD5('uped2024'),9), --Becario
('daniela.tejada58536', MD5('uped2024'),9); --Becario


UPDATE users
SET id_rol = 1  WHERE id = 1,
SET id_rol = 2  WHERE id = 2,
SET id_rol = 3  WHERE id = 3,
SET id_rol = 4  WHERE id = 4,
SET id_rol = 5  WHERE id = 5;
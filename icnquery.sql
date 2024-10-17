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


CREATE TABLE empleados (
    id_empleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    genero VARCHAR(20) NOT NULL,
    documento_identidad VARCHAR(50) NOT NULL,
    estado_civil VARCHAR(20),
    nacionalidad VARCHAR(50),
    direccion TEXT,
    telefono VARCHAR(20),
    correo_electronico VARCHAR(100) NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    departamento VARCHAR(50),
    fecha_contratacion DATE NOT NULL,
    tipo_contrato VARCHAR(50),
    salario DECIMAL(10, 2),
    ubicacion VARCHAR(100),
    id_rol INT,
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
('diana.vasquez57376', 'uped2024', 1),   -- Director General
('mario.rubio57336', 'uped2024', 2),-- Gerente
('julissa.lopez59398', 'uped2024', 3), -- Jefe de Departamento
('nestor.santamaria59447', 'uped2024', 3), -- Coordinador
('marvin.ortiz59337', 'uped2024', 5), -- Coordinador
('josue.delao59056', 'uped2024',6), --Empleado
('kevin.rivas62325', 'uped2024',7), --Asistente
('marielos.velasco42665', 'uped2024',8), --Practicante
('daniel.hernandez59053', 'uped2024',9), --Becario
('daniela.tejada58536', 'uped2024',9); --Becario


UPDATE users
SET id_rol = 1  WHERE id = 1,
SET id_rol = 2  WHERE id = 2,
SET id_rol = 3  WHERE id = 3,
SET id_rol = 4  WHERE id = 4,
SET id_rol = 5  WHERE id = 5;

UPDATE `users` SET `id_rol` = '3' WHERE `users`.`id` = 4; --Cambiando de rol a Nestor con rango 1
UPDATE `users` SET `id_rol` = '4' WHERE `users`.`id` = 22; --Cambiando de rol a Kevin con rango 2

INSERT INTO empleados (
    nombre, apellidos, fecha_nacimiento, genero, documento_identidad, 
    estado_civil, nacionalidad, direccion, telefono, correo_electronico, 
    cargo, departamento, fecha_contratacion, tipo_contrato, salario, ubicacion, id_rol
) VALUES
('Juan', 'Pérez', '1990-05-12', 'Masculino', '02439124-3', 'Soltero', 'Hondureño', '123 Calle Principal', '999111222', 'juan.perez@example.com', 'Gerente', 'Administración', '2023-01-15', 'Tiempo completo', 50000.00, 'Tegucigalpa', 6),
('María', 'González', '1988-11-23', 'Femenino', '12358947-9', 'Casada', 'Salvadoreña', '456 Calle Secundaria', '998877665', 'maria.gonzalez@example.com', 'Asistente', 'Recursos Humanos', '2022-05-10', 'Tiempo parcial', 25000.00, 'San Salvador', 6),
('Carlos', 'Rodríguez', '1992-07-30', 'Masculino', '78451236-8', 'Soltero', 'Guatemalteco', '789 Calle Central', '993344556', 'carlos.rodriguez@example.com', 'Analista', 'Finanzas', '2021-09-20', 'Tiempo completo', 45000.00, 'Guatemala City', 6),
('Ana', 'López', '1995-02-17', 'Femenino', '45678123-5', 'Soltera', 'Hondureña', '101 Avenida Norte', '998844221', 'ana.lopez@example.com', 'Secretaria', 'Administración', '2020-03-10', 'Tiempo completo', 30000.00, 'Tegucigalpa', 6),
('Pedro', 'Hernández', '1985-09-09', 'Masculino', '96325874-1', 'Casado', 'Salvadoreño', '202 Calle 10', '994433221', 'pedro.hernandez@example.com', 'Supervisor', 'Producción', '2019-07-01', 'Tiempo completo', 55000.00, 'San Salvador', 6),
('Laura', 'Martínez', '1991-04-22', 'Femenino', '74123698-6', 'Divorciada', 'Guatemalteca', '505 Avenida 3', '991122334', 'laura.martinez@example.com', 'Contadora', 'Finanzas', '2023-08-15', 'Tiempo parcial', 38000.00, 'Guatemala City', 6),
('José', 'Fernández', '1993-06-12', 'Masculino', '85236941-4', 'Soltero', 'Hondureño', '606 Calle Central', '995566778', 'jose.fernandez@example.com', 'Operador', 'Producción', '2018-12-01', 'Tiempo completo', 32000.00, 'San Pedro Sula', 6),
('Carmen', 'Ramírez', '1997-03-29', 'Femenino', '19384756-7', 'Soltera', 'Salvadoreña', '707 Calle Norte', '993344223', 'carmen.ramirez@example.com', 'Diseñadora', 'Marketing', '2021-06-10', 'Tiempo parcial', 27000.00, 'San Salvador', 6),
('Luis', 'Torres', '1989-08-14', 'Masculino', '37482916-0', 'Viudo', 'Guatemalteco', '808 Avenida Sur', '998811122', 'luis.torres@example.com', 'Jefe', 'Recursos Humanos', '2017-11-25', 'Tiempo completo', 60000.00, 'Guatemala City', 6),
('Sofía', 'Sánchez', '1994-10-02', 'Femenino', '50617284-2', 'Soltera', 'Hondureña', '909 Calle Norte', '997755334', 'sofia.sanchez@example.com', 'Asesora', 'Ventas', '2022-02-05', 'Tiempo completo', 35000.00, 'Tegucigalpa', 6),
('Miguel', 'Castro', '1986-12-25', 'Masculino', '67284019-5', 'Casado', 'Salvadoreño', '1010 Avenida 5', '994422112', 'miguel.castro@example.com', 'Ingeniero', 'IT', '2020-10-20', 'Tiempo completo', 65000.00, 'San Salvador', 6),
('Paola', 'Morales', '1998-05-07', 'Femenino', '29583741-2', 'Soltera', 'Guatemalteca', '1111 Calle Oriente', '993355221', 'paola.morales@example.com', 'Analista', 'Logística', '2023-04-30', 'Tiempo parcial', 24000.00, 'Guatemala City', 6),
('Daniel', 'Vega', '1990-07-18', 'Masculino', '18273645-9', 'Casado', 'Hondureño', '1212 Calle Norte', '997766443', 'daniel.vega@example.com', 'Encargado', 'Compras', '2021-01-17', 'Tiempo completo', 48000.00, 'Tegucigalpa', 6),
('Marta', 'Ortiz', '1992-03-03', 'Femenino', '92736451-3', 'Divorciada', 'Salvadoreña', '1313 Avenida Central', '995522113', 'marta.ortiz@example.com', 'Administradora', 'Administración', '2022-07-12', 'Tiempo parcial', 35000.00, 'San Salvador', 6),
('Jorge', 'Rivas', '1984-09-20', 'Masculino', '30958647-4', 'Casado', 'Guatemalteco', '1414 Calle Oeste', '994433224', 'jorge.rivas@example.com', 'Supervisor', 'Producción', '2016-05-25', 'Tiempo completo', 58000.00, 'Guatemala City', 6),
('Isabel', 'Flores', '1996-11-10', 'Femenino', '57682943-1', 'Soltera', 'Hondureña', '1515 Avenida Sur', '993377665', 'isabel.flores@example.com', 'Asistente', 'Finanzas', '2021-09-30', 'Tiempo completo', 29000.00, 'San Pedro Sula', 6),
('Raúl', 'Reyes', '1983-06-04', 'Masculino', '73829106-0', 'Casado', 'Salvadoreño', '1616 Calle Norte', '992211334', 'raul.reyes@example.com', 'Director', 'Marketing', '2015-08-10', 'Tiempo completo', 70000.00, 'San Salvador', 6),
('Verónica', 'Navarro', '1990-01-21', 'Femenino', '85927361-7', 'Divorciada', 'Guatemalteca', '1717 Calle Principal', '991122334', 'veronica.navarro@example.com', 'Diseñadora', 'Diseño', '2023-09-15', 'Tiempo parcial', 33000.00, 'Guatemala City', 6),
('Héctor', 'Cruz', '1993-12-13', 'Masculino', '48293715-5', 'Soltero', 'Hondureño', '1818 Avenida Norte', '996655443', 'hector.cruz@example.com', 'Vendedor', 'Ventas', '2021-04-20', 'Tiempo completo', 38000.00, 'Tegucigalpa', 6),
('Lucía', 'Salinas', '1997-07-05', 'Femenino', '19475638-2', 'Soltera', 'Salvadoreña', '1919 Calle Oriente', '993322556', 'lucia.salinas@example.com', 'Asistente', 'Compras', '2022-11-05', 'Tiempo parcial', 27000.00, 'San Salvador', 6);



ALTER TABLE empleados
ADD COLUMN porcentaje_rendimiento DECIMAL(5,2),
ADD COLUMN horas_extra INT;

UPDATE empleados
SET porcentaje_rendimiento = 100, horas_extra = 4;



















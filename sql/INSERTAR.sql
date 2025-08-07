USE BDBOLIGRAMA;

-- 1. Insertar Plan de Estudios
INSERT INTO PlanEstudios (nombre, anio_vigencia, creditos_totales)
VALUES ('Licenciatura en Tecnologias y Sistemas de Informacion', 2022, 452);

-- 2. Insertar Trimestres (ahora sí con plan ya creado)
INSERT INTO Trimestre (id_trimestre, numero_trimestre, id_plan)
VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1);

-- INSERTAR RECOMENDACIONES
INSERT INTO Recomendacion (descripcion) VALUES
('Enfócate en integrar conocimientos adquiridos en trimestres anteriores.'),
('Participa activamente; se basa en práctica constante.'),
('Aprovecha para discutir ideas clave con tus compañeros.'),
('Fortalece tu pensamiento lógico y resolución de problemas.'),
('Debe haberse cursado Taller de Matemáticas'),
('Aplica lógica computacional desde el inicio del trimestre.'),
('Aplica lógica computacional desde el inicio del trimestre.'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Debe haberse cursado Matemáticas Discretas I'),
('Debe haberse cursado Programación Estructurada'),
('Debe haberse cursado Programación Estructurada'),
('Aprovecha para discutir ideas clave con tus compañeros.'),
('Aplica lógica computacional desde el inicio del trimestre.'),
('Debe haberse cursado Programación Estructurada'),
('Comprender cómo funciona el software base de una computadora será esencial.'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Debe haberse cursado Estructura de Datos'),
('Debe haberse cursado Sistemas Operativos'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Requiere autorización de la coordinación'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Debe haberse cursado Estructura de Datos'),
('Debe haberse cursado Sistemas Operativos'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Requiere autorización de la coordinación'),
('Debe haberse cursado Lógica y Programación Lógica'),
('Debe haberse cursado Bases de Datos'),
('Debe haberse cursado Arquitectura de Redes (Modelo OSI del ISO)'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Requiere autorización de la coordinación'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Prepárate para aplicar y conectar conocimientos teóricos y prácticos.'),
('Debe haberse cursado la UEA con clave 46000020'),
('Debe haberse cursado la UEA con clave 46000009'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Enfócate en integrar conocimientos adquiridos en trimestres anteriores.'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Enfócate en integrar conocimientos adquiridos en trimestres anteriores.'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Requiere autorización de la coordinación'),
('Enfócate en integrar conocimientos adquiridos en trimestres anteriores.');

-- 3.insertar las UEAs como las tienes.
INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4000005, 'Introducción al Pensamiento Matemático', 9, 1, 1),
(4000008, 'Taller de Literacidad Académica', 9, 1, 2),
(4000007, 'Seminario sobre Sustentabilidad', 6, 1, 3),
(4600000, 'Taller de Matemáticas', 8, 1, 4);

-- Trimestre 2 (id_trimestre = 2), Plan 1
INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4600001, 'Matemáticas Discretas I', 8, 2, 5),
(4600005, 'Programación Estructurada', 14, 2, 6),
(4502004, 'Programación de Web Estático', 8, 2, 7),
(4502002, 'Historia y Cultura de la Computación', 6, 2, 8);

-- Trimestre 3 (id_trimestre = 3), Plan 1
INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4600002, 'Matemáticas Discretas II', 8, 3, 9),
(4600009, 'Estructura de Datos', 14, 3, 10),
(4600012, 'Arquitectura de Computadoras', 8, 3, 11),
(4502001, 'Seminario de Comunicación, Diseño y Tecnologías de la Información', 8, 3, 12);

-- Trimestre 4 (id_trimestre = 4), Plan 1
INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4502003, 'Lógica y Programación Lógica', 8, 4, 13),
(4600006, 'Programación Orientada a Objetos', 14, 4, 14),
(4600017, 'Sistemas Operativos', 11, 4, 15),
(4210011, 'Fundamentos de Teoría Administrativa', 8, 4, 16);

INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4210025, 'Gestión de Sistemas de Información y Comunicación', 8, 5, 17),
(4500207, 'Laboratorio Temático I', 10, 5, 18),
(4600011, 'Probabilidad y Estadística', 8, 5, 19),
(4600013, 'Análisis y Diseño de Algoritmos', 12, 5, 20),
(4600020, 'Arquitectura de Redes (Modelo OSI del ISO)', 8, 5, 21);


INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4210013, 'Comportamiento Humano en las Organizaciones I', 8, 6, 22),
(4502006, 'Teoría de Autómatas y Lenguajes Formales', 6, 6, 23),
(4502015, 'Laboratorio Temático II', 10, 6, 24),
(4600018, 'Bases de Datos', 11, 6, 25),
(4600021, 'Sistemas Distribuidos', 11, 6, 26);


INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4210018, 'Comportamiento Humano en las Organizaciones II', 8, 7, 27),
(4502008, 'Inteligencia Artificial I', 8, 7, 28),
(4502009, 'Programación Web-Dinámico', 8, 7, 29),
(4502010, 'Seminario de Seguridad', 8, 7, 30),
(4502016, 'Laboratorio Temático III', 10, 7, 31);

INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4502011, 'Integración de Sistemas', 8, 8, 32),
(4502012, 'Interacción Humano-Computadora', 8, 8, 33),
(4502013, 'Taller de Diseño e Instalación de Redes de Cómputo', 8, 8, 34),
(4502014, 'Comunicación, Información y Sistemas', 8, 8, 35),
(4502017, 'Laboratorio Temático IV', 10, 8, 36);

INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(4502051, 'Optativa de Movilidad de Intercambio I', 9, 9, 37),
(4502052, 'Optativa de Movilidad de Intercambio II', 9, 9, 38),
(4502053, 'Optativa de Movilidad de Intercambio III', 9, 9, 39),
(4502054, 'Optativa de Movilidad de Intercambio IV', 9, 9, 40);

INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(9990001, 'Optativa de Orientación I', 8, 10, 41),
(9990002, 'Optativa de Orientación II', 8, 10, 42),
(9990003, 'Optativa de Orientación III', 8, 10, 43),
(4502018, 'Proyecto Terminal I', 12, 10, 44);

INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(9990004, 'Optativa de Orientación IV', 8, 11, 45),
(9990005, 'Optativa de Orientación V', 8, 11, 46),
(9990006, 'Optativa de Orientación VI', 8, 11, 47),
(4502019, 'Proyecto Terminal II', 12, 11, 48);

INSERT INTO UEA (clave, nombre, creditos, id_trimestre, id_recomendacion) VALUES
(9990007, 'Optativa de Orientación VII', 8, 12, 49),
(9990008, 'Optativa de Orientación VIII', 8, 12, 50),
(9990009, 'Optativa de Orientación IX', 8, 12, 51),
(4502020, 'Proyecto Terminal III', 12, 12, 52);

INSERT INTO Seriacion (clave, seriacion) VALUES
-- 🔹 Trimestres 2 y 3
(4600001, 4600000),   -- Discretas I ← Taller de Matemáticas
(4600002, 4600001),   -- Discretas II ← Discretas I
(4600009, 4600005),   -- Estructura de Datos ← Prog. Estructurada
(4600012, 4600005),   -- Arq. Computadoras ← Prog. Estructurada

-- 🔹 Trimestre 4
(4600006, 4600005),   -- POO ← Prog. Estructurada

-- 🔹 Trimestre 5
(4600020, 4600017),    -- Arq. de Redes ← Sistemas Operativos
(4600013, 4600009),    -- Análisis y Diseño de Algoritmos ← Estructura de Datos

-- 🔹 Trimestre 6
(4600018, 4600009),    -- Bases de Datos ← Estructura de Datos
(4600021, 4600017),    -- Sistemas Distribuidos ← Sistemas Operativos

-- 🔹 Trimestre 7
(4502008, 4502003),    -- IA I ← Lógica y Programación Lógica
(4502009, 4600018),    -- Web Dinámico ← Bases de Datos
(4502010, 4600020),    -- Seguridad ← Arq. de Redes

-- 🔹 Trimestre 8
(4502011, 4600009),    -- Integración de Sistemas ← Estructura de Datos
(4502013, 4600020),    -- Taller de Redes ← Arq. de Redes

-- 🔹 Proyectos Terminales
(4502019, 4502018),   -- PT II ← PT I
(4502020, 4502019);   -- PT III ← PT II







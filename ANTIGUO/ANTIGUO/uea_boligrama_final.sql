
DROP TABLE IF EXISTS uea;

CREATE TABLE uea (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150),
    creditos TINYINT,
    porcentaje FLOAT,
    clave VARCHAR(10),
    trimestre TINYINT,
    seriacion VARCHAR(50),
    condiciones TEXT
);

INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Introducción al Pensamiento Matemático', 9, 1.96, '4000005', 1, '', 'Enfócate en integrar conocimientos adquiridos en trimestres anteriores.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Taller de Literacidad Académica', 9, 1.96, '4000008', 1, '', 'Participa activamente; se basa en práctica constante.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Seminario sobre Sustentabilidad', 6, 1.3, '4000007', 1, '', 'Aprovecha para discutir ideas clave con tus compañeros.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Taller de Matemáticas', 8, 1.75, '4600000', 1, '', 'Fortalece tu pensamiento lógico y resolución de problemas.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Matemáticas Discretas I', 8, 1.75, '4600001', 2, '4600000', 'Debe haberse cursado Taller de Matemáticas');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Programación Estructurada', 14, 3.05, '4600005', 2, '', 'Aplica lógica computacional desde el inicio del trimestre.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Programación de Web Estático', 8, 1.75, '4502004', 2, '', 'Aplica lógica computacional desde el inicio del trimestre.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Historia y Cultura de la Computación', 6, 1.3, '4502002', 2, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Matemáticas Discretas II', 8, 1.75, '4600002', 3, '4600001', 'Debe haberse cursado Matemáticas Discretas I');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Estructura de Datos', 14, 3.05, '4600009', 3, '4600005', 'Debe haberse cursado Programación Estructurada');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Arquitectura de Computadoras', 8, 1.75, '4600012', 3, '4600005', 'Debe haberse cursado Programación Estructurada');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Seminario de Comunicación, Diseño y Tecnologías de la Información', 8, 1.75, '4502001', 3, '', 'Aprovecha para discutir ideas clave con tus compañeros.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Lógica y Programación Lógica', 8, 1.75, '4502003', 4, '', 'Aplica lógica computacional desde el inicio del trimestre.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Programación Orientada a Objetos', 14, 3.05, '4600006', 4, '4600005', 'Debe haberse cursado Programación Estructurada');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Sistemas Operativos', 11, 2.4, '4600017', 4, '', 'Comprender cómo funciona el software base de una computadora será esencial.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Fundamentos de Teoría Administrativa', 8, 1.75, '4210011', 4, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Probabilidad y Estadística', 8, 1.75, '4600011', 5, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Análisis y Diseño de Algoritmos', 12, 2.61, '4600013', 5, '4600009', 'Debe haberse cursado Estructura de Datos');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Arquitectura de Redes (Modelo OSI del ISO)', 8, 1.75, '4600020', 5, '4600017', 'Debe haberse cursado Sistemas Operativos');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Gestión de Sistemas de Información y Comunicación', 8, 1.75, '4210025', 5, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Laboratorio Temático I', 10, 2.18, '4502007', 5, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Teoría de Autómatas y Lenguajes Formales', 6, 1.3, '4502006', 6, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Bases de Datos', 11, 2.4, '4600018', 6, '4600009', 'Debe haberse cursado Estructura de Datos');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Sistemas Distribuidos', 11, 2.4, '4600021', 6, '4600017', 'Debe haberse cursado Sistemas Operativos');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Comportamiento Humano en las Organizaciones I', 8, 1.75, '4210013', 6, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Laboratorio Temático II', 10, 2.18, '4502015', 6, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Inteligencia Artificial I', 8, 1.75, '4502008', 7, '4502003', 'Debe haberse cursado Lógica y Programación Lógica');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Programación Web-Dinámico', 8, 1.75, '4502009', 7, '4600018', 'Debe haberse cursado Bases de Datos');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Seminario de Seguridad', 8, 1.75, '4502010', 7, '4600020', 'Debe haberse cursado Arquitectura de Redes (Modelo OSI del ISO)');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Comportamiento Humano en las Organizaciones II', 8, 1.75, '4210018', 7, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Laboratorio Temático III', 10, 2.18, '4502016', 7, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Comunicación, Información y Sistemas', 8, 1.75, '4502014', 8, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Interacción Humano-Computadora', 8, 1.75, '4502012', 8, '', 'Prepárate para aplicar y conectar conocimientos teóricos y prácticos.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Taller de Diseño e Instalación de Redes de Cómputo', 8, 1.75, '4502013', 8, '4600020', 'Debe haberse cursado la UEA con clave 46000020');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Integración de Sistemas', 8, 1.75, '4502011', 8, '4600009', 'Debe haberse cursado la UEA con clave 46000009');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Laboratorio Temático IV', 10, 2.18, '4502017', 8, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Movilidad de Intercambio I', 9, 1.96, '4502051', 9, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Movilidad de Intercambio II', 9, 1.96, '4502052', 9, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Movilidad de Intercambio III', 9, 1.96, '4502053', 9, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Movilidad de Intercambio IV', 9, 1.96, '4502054', 9, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 10, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 10, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 10, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Proyecto Terminal I', 12, 2.61, '4502018', 10, '', 'Enfócate en integrar conocimientos adquiridos en trimestres anteriores.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 11, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 11, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 11, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Proyecto Terminal II', 12, 2.61, '4502019', 11, '', 'Enfócate en integrar conocimientos adquiridos en trimestres anteriores.');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 12, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 12, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Optativa de Orientación', 8, 1.75, '', 12, 'A', 'Requiere autorización de la coordinación');
INSERT INTO uea (nombre, creditos, porcentaje, clave, trimestre, seriacion, condiciones) VALUES ('Proyecto Terminal III', 12, 2.61, '4502020', 12, '', 'Enfócate en integrar conocimientos adquiridos en trimestres anteriores.');

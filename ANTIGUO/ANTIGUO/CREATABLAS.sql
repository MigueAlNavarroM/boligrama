
-- Archivo: CREATABLAS.sql
-- Descripción: Define todas las tablas del proyecto Boligrama

-- Tabla PlanEstudios
CREATE TABLE PlanEstudios (
    id_plan INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    anio_aprobacion INT,
    creditos_totales INT
);

-- Tabla Trimestre
CREATE TABLE Trimestre (
    id_trimestre INT PRIMARY KEY AUTO_INCREMENT,
    numero_trimestre INT NOT NULL,
    etiqueta VARCHAR(20),
    id_plan INT,
    FOREIGN KEY (id_plan) REFERENCES PlanEstudios(id_plan)
);

-- Tabla UEA
CREATE TABLE UEA (
    id_uea INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    clave VARCHAR(20) NOT NULL,
    creditos INT NOT NULL,
    tipo ENUM('obligatoria', 'optativa_orientacion', 'optativa_divisional', 'optativa_movilidad') NOT NULL,
    id_trimestre INT,
    id_plan INT,
    FOREIGN KEY (id_trimestre) REFERENCES Trimestre(id_trimestre),
    FOREIGN KEY (id_plan) REFERENCES PlanEstudios(id_plan)
);

-- Tabla Seriacion
CREATE TABLE Seriacion (
    id_seriacion INT PRIMARY KEY AUTO_INCREMENT,
    id_uea_origen INT,
    id_uea_destino INT,
    FOREIGN KEY (id_uea_origen) REFERENCES UEA(id_uea),
    FOREIGN KEY (id_uea_destino) REFERENCES UEA(id_uea)
);

-- Tabla Optativas (catálogo general si se desea extender más allá de UEA)
CREATE TABLE Optativas (
    id_optativa INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    tipo_optativa ENUM('orientacion', 'divisional', 'interdivisional', 'movilidad') NOT NULL,
    creditos INT,
    id_plan INT,
    FOREIGN KEY (id_plan) REFERENCES PlanEstudios(id_plan)
);

-- Tabla Recomendaciones
CREATE TABLE Recomendaciones (
    id_recomendacion INT PRIMARY KEY AUTO_INCREMENT,
    id_uea INT,
    texto TEXT NOT NULL,
    nivel_prioridad ENUM('baja', 'media', 'alta') DEFAULT 'media',
    FOREIGN KEY (id_uea) REFERENCES UEA(id_uea)
);

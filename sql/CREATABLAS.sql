-- Eliminar tablas si ya existen
DROP TABLE IF EXISTS Seriacion;
DROP TABLE IF EXISTS UEA;
DROP TABLE IF EXISTS Trimestre;
DROP TABLE IF EXISTS Recomendacion;
DROP TABLE IF EXISTS PlanEstudios;

USE BDBOLIGRAMA;

-- 🔹 Plan de Estudios
CREATE TABLE PlanEstudios (
  id_plan INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  anio_vigencia INT NOT NULL,
  creditos_totales INT NOT NULL
);

-- 🔹 Trimestres
CREATE TABLE Trimestre (
  id_trimestre INT PRIMARY KEY, 
  numero_trimestre INT NOT NULL,
  id_plan INT,
  FOREIGN KEY (id_plan) REFERENCES PlanEstudios(id_plan)
);


-- 🔹 Recomendaciones
CREATE TABLE Recomendacion (
  id_recomendacion INT AUTO_INCREMENT PRIMARY KEY,
  descripcion TEXT NOT NULL
);

-- 🔹 UEAs (sin tipo, con clave real y relación con trimestre + plan)
CREATE TABLE UEA (
  clave INT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  creditos TINYINT NOT NULL,
  id_trimestre INT,
  id_recomendacion INT,  -- se agrega aquí
  FOREIGN KEY (id_trimestre) REFERENCES Trimestre(id_trimestre),
  FOREIGN KEY (id_recomendacion) REFERENCES Recomendacion(id_recomendacion)
);

-- 🔹 Seriación (relaciones entre UEAs por clave)
CREATE TABLE Seriacion (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clave INT,         -- Clave de la UEA que requiere otra
  seriacion INT,     -- Clave de la UEA que se debe cursar antes
  FOREIGN KEY (clave) REFERENCES UEA(clave),
  FOREIGN KEY (seriacion) REFERENCES UEA(clave)
);


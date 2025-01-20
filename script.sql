CREATE DATABASE groundsound;
USE groundsound;

CREATE TABLE Foro (
  id INT NOT NULL PRIMARY KEY
);

CREATE TABLE Hilo (
  id INT NOT NULL PRIMARY KEY,
  id_foro INT,
  CONSTRAINT Hilo_id_foro_fk FOREIGN KEY (id_foro) REFERENCES Foro (id)
);

CREATE TABLE Mensajes (
  id INT NOT NULL PRIMARY KEY,
  id_hilo INT,
  usuario VARCHAR(32),
  comentario VARCHAR(512),
  CONSTRAINT Mensajes_id_hilo_fk FOREIGN KEY (id_hilo) REFERENCES Hilo (id),
  CONSTRAINT Mensajes_usuario_fk FOREIGN KEY (usuario) REFERENCES User (username)
);

CREATE TABLE Ventas (
  id INT NOT NULL PRIMARY KEY,
  producto INT,
  usuario VARCHAR(32),
  precio NUMERIC,
  cantidad INT,
  precio_total NUMERIC,
  fecha DATETIME,
  CONSTRAINT Ventas_producto_fk FOREIGN KEY (producto) REFERENCES Productos (id),
  CONSTRAINT Ventas_usuario_fk FOREIGN KEY (usuario) REFERENCES User (username)
);

CREATE TABLE Productos (
  id INT NOT NULL PRIMARY KEY,
  nombre VARCHAR(32),
  descripcion TEXT,
  precio FLOAT
);

CREATE TABLE Stock (
  id_producto INT NOT NULL PRIMARY KEY,
  last_update_time DATE,
  cantidad INT,
  CONSTRAINT Stock_id_producto_fk FOREIGN KEY (id_producto) REFERENCES Productos (id)
);

CREATE TABLE Valoracion (
  id INT NOT NULL PRIMARY KEY,
  usuario VARCHAR(32),
  contenido INT,
  valoracion INT,
  comentario VARCHAR(512),
  CONSTRAINT Valoracion_contenido_fk FOREIGN KEY (contenido) REFERENCES Contenidos (id),
  CONSTRAINT Valoracion_usuario_fk FOREIGN KEY (usuario) REFERENCES User (username)
);

CREATE TABLE Contenidos (
  id INT NOT NULL PRIMARY KEY,
  titulo VARCHAR(32),
  fecha_pub DATETIME,
  texto TEXT
);

CREATE TABLE Fotos (
  id INT NOT NULL PRIMARY KEY,
  url_foto VARCHAR(128),
  comentario VARCHAR(512),
  usuario VARCHAR(32),
  fecha_subida DATETIME,
  CONSTRAINT Fotos_usuario_fk FOREIGN KEY (usuario) REFERENCES User (username)
);

CREATE TABLE User (
  id INT NOT NULL PRIMARY KEY,
  username VARCHAR(32) UNIQUE,
  clave VARCHAR(255),
  nombre VARCHAR(32),
  apellido1 VARCHAR(32),
  apellido2 VARCHAR(32),
  correo_electronico VARCHAR(64),
  fecha_nac DATE,
  pais VARCHAR(32),
  codigo_postal VARCHAR(32),
  telefono VARCHAR(32),
  rol ENUM('admin', 'editor', 'usuario') DEFAULT 'usuario'
);

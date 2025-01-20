CREATE DATABASE groundsound;
USE groundsound;

CREATE TABLE Ventas (
  id INT NOT NULL PRIMARY KEY,
  id_producto INT,
  id_usuario INT,
  precio NUMERIC,
  cantidad INT,
  precio_total NUMERIC,
  fecha DATETIME
);

CREATE TABLE Productos (
  id INT NOT NULL PRIMARY KEY,
  nombre VARCHAR(32) UNIQUE,
  descripcion VARCHAR(512),
  detalles VARCHAR(512),
  precio FLOAT,
  stock INT
);

CREATE TABLE Valoracion (
  id INT NOT NULL PRIMARY KEY,
  id_producto INT,
  id_usuario INT,
  valoracion INT,
  comentario VARCHAR(512)
);

CREATE TABLE Fotos (
  id INT NOT NULL PRIMARY KEY,
  id_usuario INT,
  foto blob,
  fecha_subida DATETIME
);

CREATE TABLE Usuario (
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
  img_perfil blob,
  rol ENUM('admin', 'editor', 'usuario') DEFAULT 'usuario'
);

alter table ventas add CONSTRAINT Ventas_producto_fk FOREIGN KEY (id_producto) REFERENCES Productos (id);
alter table ventas add CONSTRAINT Ventas_usuario_fk FOREIGN KEY (id_usuario) REFERENCES Usuario (id);
alter table fotos add CONSTRAINT Fotos_usuario_fk FOREIGN KEY (id_usuario) REFERENCES Usuario (id);
alter table valoracion add CONSTRAINT Valoracion_usuario_fk FOREIGN KEY (id_usuario) REFERENCES Usuario (id);
alter table valoracion add constraint valoracion_producto_fk FOREIGN KEY (id_producto) REFERENCES Productos (id);
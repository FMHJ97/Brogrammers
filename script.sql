create database groundsound;
use groundsound;

CREATE TABLE Foro (
  id int NOT NULL PRIMARY KEY
);

CREATE TABLE Ventas (
  id int NOT NULL PRIMARY KEY,
  producto int,
  usuario varchar(32),
  precio numeric,
  cantidad int,
  precio_total numeric,
  fecha datetime
);

CREATE TABLE Productos (
  id int NOT NULL PRIMARY KEY,
  nombre varchar(32),
  descripcion text,
  precio float,
  );

CREATE TABLE Stock {
  id_producto int NOT NULL PRIMARY KEY,
  last_update_time date,
  cantidad int
}

CREATE TABLE Valoracion (
  id int NOT NULL PRIMARY KEY,
  usuario varchar(32),
  contenido int,
  valoracion int,
  comentario varchar(512)
);


CREATE TABLE Mensajes (
  id int NOT NULL PRIMARY KEY,
  id_hilo int,
  usuario varchar(32),
  comentario varchar(512)
);


CREATE TABLE Contenidos (
  id int NOT NULL PRIMARY KEY,
  titulo varchar(32),
  fecha_pub datetime,
  texto text
);


CREATE TABLE Fotos (
  id int NOT NULL PRIMARY KEY,
  url_foto varchar(128),
  comentario varchar(512),
  usuario varchar(32),
  fecha_subida datetime
);


CREATE TABLE User (
  id int NOT NULL PRIMARY KEY,
  username varchar(32) UNIQUE,
  clave varchar(255),
  nombre varchar(32),
  apellido1 varchar(32),
  apellido2 varchar(32),
  correo_electronico varchar(64),
  fecha_nac date,
  pais varchar(32),
  codigo_postal varchar(32),
  telefono varchar(32),
  rol Set('admin', 'editor', 'usuario') DEFAULT 'usuario'
);


CREATE TABLE Hilo (
  id int NOT NULL PRIMARY KEY,
  id_foro int
);


ALTER TABLE Hilo ADD CONSTRAINT Hilo_id_foro_fk FOREIGN KEY (id_foro) REFERENCES Foro (id);
ALTER TABLE Mensajes ADD CONSTRAINT Mensajes_id_hilo_fk FOREIGN KEY (id_hilo) REFERENCES Hilo (id);
ALTER TABLE Valoracion ADD CONSTRAINT Valoracion_contenido_fk FOREIGN KEY (contenido) REFERENCES Contenidos (id);
ALTER TABLE Ventas ADD CONSTRAINT Ventas_producto_fk FOREIGN KEY (producto) REFERENCES Productos (id);
ALTER TABLE Valoracion ADD CONSTRAINT Valoracion_usuario_fk FOREIGN KEY (usuario) REFERENCES User (username);
ALTER TABLE Fotos ADD CONSTRAINT Fotos_usuario_fk FOREIGN KEY (usuario) REFERENCES User (username);
ALTER TABLE Mensajes ADD CONSTRAINT Mensajes_usuario_fk FOREIGN KEY (usuario) REFERENCES User (username);
ALTER TABLE Ventas ADD CONSTRAINT Ventas_usuario_fk FOREIGN KEY (usuario) REFERENCES User (username);
ALTER TABLE Stock ADD CONSTRAINT Stock_id_producto_fk FOREIGN KEY (id_producto) REFERENCES Productos (id);

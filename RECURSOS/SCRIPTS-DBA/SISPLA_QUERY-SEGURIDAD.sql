/*CREACION DE LA BD DE DATOS*/

DROP DATABASE IF EXISTS sispla;
CREATE DATABASE sispla;
USE sispla;

/*TABLA DE CONTROL DE ESTADOS*/
DROP TABLE IF EXISTS estado;
CREATE TABLE estado(
idEstado int auto_increment not null primary key,
nombre varchar(15)
);

/*MODULO DE SEGURIDAD*/
/*01. Usuario*/
DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
idUsuario int auto_increment not null primary key,
usuario varchar(45),
pwd varchar (45),
nombres varchar (50),
apellidos varchar (50),
correo varchar (50),
idEstado int,
firt_time int,
foreign key (idEstado) references estado(idEstado)
);

/*02. Rol*/
DROP TABLE IF EXISTS rol;
CREATE TABLE rol(
idRol int auto_increment not null primary key,
rolDescripcion varchar(70),
idEstado int,

foreign key (idEstado) references estado(idEstado)
);

/*03. Opciones*/
DROP TABLE IF EXISTS opciones;
CREATE TABLE opciones(
idOpciones int auto_increment not null primary key,
opcionDescripcion varchar(70),
idEstado int,

foreign key (idEstado) references estado(idEstado)
);

/*04. RolOpciones*/
DROP TABLE IF EXISTS rolopciones;
CREATE TABLE rolopciones(
idRolOpciones int auto_increment not null primary key,
idRol int,
idOpciones int,

foreign key (idRol) references rol(idRol),
foreign key (idOpciones) references opciones(idOpciones)
);

/*04. RolUsuario*/
DROP TABLE IF EXISTS rolusuario;
CREATE TABLE rolusuario(
idRolUsuario int auto_increment not null primary key,
idUsuario int,
idRol int,

foreign key (idUsuario) references usuario(idUsuario),
foreign key (idRol) references rol(idRol)
);

create table intentos_permitido (
id_intentos_permitido  int auto_increment not null primary key,
idUsuario int,
num_intentos int,

foreign key (idUsuario) references usuario(idUsuario)
);









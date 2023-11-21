/*CREACION DE LA BD DE DATOS*/

DROP DATABASE IF EXISTS SISPLA;
CREATE DATABASE SISPLA;
USE SISPLA;

/*TABLA DE CONTROL DE ESTADOS*/
DROP TABLE IF EXISTS Estado;
CREATE TABLE Estado(
idEstado int auto_increment not null primary key,
nombre varchar(15)
);

/*MODULO DE SEGURIDAD*/
/*01. Usuario*/
DROP TABLE IF EXISTS Usuario;
CREATE TABLE Usuario(
idUsuario int auto_increment not null primary key,
usuario varchar(45),
pwd varchar (45),
nombres varchar (50),
apellidos varchar (50),
correo varchar (50),
idEstado int,
firt_time int,
foreign key (idEstado) references Estado(idEstado)
);

/*02. Rol*/
DROP TABLE IF EXISTS Rol;
CREATE TABLE Rol(
idRol int auto_increment not null primary key,
rolDescripcion varchar(70),
idEstado int,

foreign key (idEstado) references Estado(idEstado)
);

/*03. Opciones*/
DROP TABLE IF EXISTS Opciones;
CREATE TABLE Opciones(
idOpciones int auto_increment not null primary key,
opcionDescripcion varchar(70),
idEstado int,

foreign key (idEstado) references Estado(idEstado)
);

/*04. RolOpciones*/
DROP TABLE IF EXISTS RolOpciones;
CREATE TABLE RolOpciones(
idRolOpciones int auto_increment not null primary key,
idRol int,
idOpciones int,

foreign key (idRol) references Rol(idRol),
foreign key (idOpciones) references Opciones(idOpciones)
);

/*04. RolUsuario*/
DROP TABLE IF EXISTS RolUsuario;
CREATE TABLE RolUsuario(
idRolUsuario int auto_increment not null primary key,
idUsuario int,
idRol int,

foreign key (idUsuario) references Usuario(idUsuario),
foreign key (idRol) references Rol(idRol)
);










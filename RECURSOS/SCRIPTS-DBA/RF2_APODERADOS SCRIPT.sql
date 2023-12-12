DROP TABLE IF EXISTS apoderados;
CREATE TABLE apoderados(
idApoderados int auto_increment not null primary key,  
nombreCompletoApoderados varchar (250) null,
numIdApoderados varchar(50) null,
cargo varchar(150) null,
idPic int,
usuario_creacion int,
fecha_creacion datetime null,
usuario_modificacion int null,
fecha_modificacion datetime null,
usuario_eliminacion int null,
fecha_eliminacion datetime null,
FOREIGN KEY (idPic) references pic(idPic) ON DELETE CASCADE,
FOREIGN KEY (usuario_creacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_modificacion) REFERENCES usuario(idUsuario),
FOREIGN KEY (usuario_eliminacion) REFERENCES usuario(idUsuario)
);
DROP TABLE IF EXISTS engel_list;
CREATE TABLE engel_list (
id_engel_list int auto_increment not null primary key,
nombre_completo varchar (150),
cargo varchar (200),
pais varchar (100),
año_ingreso varchar (15),
lista varchar (25),
observaciones varchar (255)					
);
create database neoranking2;

use neoranking2;

create table usuarios(
idusuario int not null primary key auto_increment,
nombre varchar(60) not null,
rol varchar(1) not null,
email varchar(60) not null,
contraseña varchar(64) not null
);

create table tipo(
idtipo int not null primary key auto_increment,
tipo varchar(45) not null,
descripcion varchar(45) not null
);

create table estudiante(
idestudiante int not null primary key auto_increment,
nombre varchar(35) not null,
apellidos varchar(35) not null, 
fecha_nacimiento date not null,
telefono varchar(9) not null,
email varchar(45) not null,
direccion varchar(60) not null,
anio int(4) not null,
seccion varchar(25) not null,
centro_escolar varchar(45)
);

create table documento(
iddocumento int not null primary key auto_increment,
idestudiante int not null,
tipodocumento varchar(25),
documento varchar(120),
descripcion varchar(60),
foreign key (idestudiante) references estudiante(idestudiante)
);

create table materia(
idmateria int not null primary key auto_increment,
idtipo int not null,
materia varchar(60),
foreign key (idtipo) references tipo(idtipo)
);

create table nota(
idnota int not null primary key auto_increment,
idestudiante int not null,
idmateria int not null,
nota decimal(4,2) not null,
foreign key (idestudiante) references estudiante(idestudiante),
foreign key (idmateria) references materia(idmateria)
);

create table reporteap(
idreporteap int not null primary key auto_increment,
idestudiante int not null,
idtipo int not null,
anio int(4) not null,
seccion varchar(45) not null,
nota decimal(4,2) not null,
observaciones varchar(300),
foreign key (idestudiante) references estudiante(idestudiante),
foreign key (idtipo) references tipo(idtipo)
);
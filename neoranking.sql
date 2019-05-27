create database neoranking;
use neoranking;
create table tipo(
idtipo int not null auto_increment primary key,
tipo varchar(45) not null,
descripcion varchar(200)
);

create table estudiante(
idestudiante int not null auto_increment primary key,
nombre varchar(45) not null,
apellidos varchar(45), 
fecha_nacimiento date not null,
telefono varchar(9) not null,
email varchar(45) not null,
direccion varchar(120) not null,
anio int(4) not null,
seccion varchar(35) not null,
centroescolar varchar(45) not null
);

create table promce(
idpromce int not null auto_increment primary key,
idestudiante int not null,
promce decimal(4,2) not null
);

create table promfunda(
idpromfunda int not null auto_increment primary key,
idestudiante int not null,
promfunda decimal(4,2) not null
);

create table promcertificacion(
idpromcertificacion int not null auto_increment primary key,
idestudiante int not null,
promcertificacion decimal(4,2) not null
);

create table reporteap(
idreporteap int not null auto_increment primary key,
idestudiante int not null,
idtipo int not null,
anio int(4) not null,
seccion varchar(10) not null,
nota decimal(4,2) not null,
observaciones varchar(350) not null,
foreign key (idestudiante) references estudiante(idestudiante),
foreign key (idtipo) references tipo(idtipo)
);

create table ranking(
idranking int not null auto_increment primary key,
idestudiante int not null,
idpromfunda int not null,
idpromce int not null,
idpromcertificacion int not null,
promfundayce decimal(4,2) not null,
diferencia decimal(4,2) not null,
idnota_ap int not null,
puntuacion decimal(4,2) not null,
foreign key (idestudiante) references estudiante(idestudiante),
foreign key (idpromfunda) references promfunda(idpromfunda),
foreign key (idpromce) references promce(idpromce),
foreign key (idpromcertificacion) references  promcertificacion(idpromcertificacion),
foreign key (idnota_ap) references reporteap(idreporteap)
);

create table documento(
iddocumento int not null auto_increment primary key,
idestudiante int not null,
tipodocumento varchar(45) not null,
documento varchar(120) not null,
descripcion varchar(45) not null,
foreign key (idestudiante) references estudiante(idestudiante)
);

create table notafundacion(
idnotafundacion int not null auto_increment primary key,
idestudiante int not null,
idtipo int not null,
nota decimal(4,2) not null,
foreign key (idestudiante) references estudiante(idestudiante),
foreign key (idtipo) references tipo(idtipo)
);

create table notace(
idnotace int not null auto_increment primary key,
idestudiante int not null,
idtipo int not null,
nota decimal(4,2) not null,
foreign key (idestudiante) references estudiante(idestudiante),
foreign key (idtipo) references tipo(idtipo)
);

create table notacertificacion(
idnotacertificacion int not null auto_increment primary key,
idestudiante int not null,
idtipo int not null,
nota decimal(4,2) not null,
foreign key (idestudiante) references estudiante(idestudiante),
foreign key (idtipo) references tipo(idtipo)
);

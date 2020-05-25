CREATE database Admon_Juegos
use Admon_Juegos

CREATE TABLE departamento
(
id_departamento int primary key  identity(1,1)  not null,
Departamento nvarchar(30)
)



CREATE TABLE tienda
(
id_tienda			int	 	primary key identity(1,1)  not null,
Nombre_tienda		nvarchar(25),
Direccion			nvarchar(25),
Telefono			varchar(8),
Capacidad			nvarchar(10),
id_departamento		int

foreign key  (id_departamento)
references   departamento     (id_departamento)
)



CREATE TABLE estatus
(
id_estatus			int			primary key identity(1,1) not null,
Estado				nvarchar(10),
Descripcion			nvarchar(25)
)


CREATE TABLE puesto
(
id_puesto		int			primary key identity(1,1) not null,
Nombre_puesto	nvarchar(25),
Descripcion		nvarchar(25)
)



CREATE TABLE seccion
(
id_seccion  int          primary key identity(1,1) not null,
Nombre_Area nvarchar(25),
Descripcion nvarchar(25)
)


CREATE TABLE empleado
(
id_empleado		int			primary key identity(1,1) not null,
Nombres			nvarchar(35),
Apellidos		nvarchar(35),
Fecha_alta		date,
Salario_base	money,
id_puesto		int,
id_tienda		int,
id_estatus		int,
id_seccion      int, 

foreign key (id_puesto)
references   puesto   (id_puesto),
foreign key (id_tienda)
references   tienda   (id_tienda),
foreign key (id_estatus)
references   estatus   (id_estatus),
foreign key (id_seccion)
references   seccion   (id_seccion)
)



--------Tablas conectadas de socios-----

CREATE TABLE pais
(
id_pais int primary key identity(1,1) not null,
Nombre  nvarchar(35),
)



CREATE TABLE participacion
(
id_participacion	int			primary key identity(1,1) not null,
Tipo_participacion  nvarchar(25),
Descripcion			nvarchar(25)
)



CREATE TABLE tipo
(
id_tipo     int			primary key identity(1,1) not null,
Nombre      nvarchar(10),
Descripcion nvarchar(25)
)




CREATE TABLE persona_contacto
(
id_PerContacto  int			primary key identity(1,1) not null,
Nombre			nvarchar(25),
Apellido		nvarchar(25),
Telefono		varchar(8),
Email			nvarchar(30)
)




CREATE TABLE socio
(
id_socio	int			primary key identity(1,1) not null,
Nombres		nvarchar(35),
Apellidos	nvarchar(35),
Telefono	varchar(8),
id_pais				int,
id_participacion	int,
id_tipo				int,
id_PerContacto		int	

foreign key (id_pais)
references	pais             (id_pais),

foreign key (id_participacion)
references	participacion    (id_participacion),

foreign key (id_tipo)
references	tipo             (id_tipo),

foreign key (id_PerContacto)
references	persona_contacto (id_PerContacto)
)






------Procedimientos Almacenados----------

CREATE PROCEDURE  insertar_departamento
@Departamento    nvarchar(30)
as
begin
insert into departamento 
values
  (
   @Departamento)
end







CREATE PROCEDURE  insertar_tienda
@Nombre_tienda		nvarchar(25),
@Direccion			nvarchar(25),
@Telefono			varchar (8) ,
@Capacidad			nvarchar(10),
@id_departamento	int
as
begin
insert into tienda 
values
      (
       @Nombre_tienda,
       @Direccion,
       @Telefono,
       @Capacidad,
       @id_departamento)
end






CREATE PROCEDURE  insertar_estatus
@Estado				nvarchar(10),
@Descripcion		nvarchar(25)
as
begin
insert into estatus 
values
  (
   @Estado,
   @Descripcion
  )
end



CREATE PROCEDURE  insertar_puesto
@Nombre_puesto	nvarchar(25),
@Descripcion	nvarchar(25)
as
begin
insert into puesto 
values
  (
   @Nombre_puesto,
   @Descripcion)
end




CREATE PROCEDURE  insertar_seccion
@Nombre_Area nvarchar(25),
@Descripcion nvarchar(25)
as
begin
insert into seccion 
values
  (
   @Nombre_Area,
   @Descripcion)
end



CREATE PROCEDURE  insertar_empleado
@Nombres		   nvarchar(35),
@Apellidos		   nvarchar(35),
@Fecha_alta		   date		   ,
@Salario_base	   money	   ,
@id_puesto		   int         ,
@id_tienda		   int         ,
@id_estatus		   int         ,
@id_seccion        int          
as
begin
insert into empleado 
values
  (
   @Nombres,
   @Apellidos,
   @Fecha_alta,
   @Salario_base,
   @id_puesto,
   @id_tienda,
   @id_estatus,
   @id_seccion)
end

-------Procedimientos socios---------------

CREATE PROC insertar_pais
@Nombre  nvarchar(35)
as
begin
insert into pais
values
(@Nombre)
end





CREATE PROC insertar_participacion
@Tipo_participacion  nvarchar(25),
@Descripcion		 nvarchar(25)
as
begin
insert into participacion
values
(@Tipo_participacion,@Descripcion)
end





CREATE PROC insertar_tipo
@Nombre      nvarchar(10),
@Descripcion nvarchar(25)
as
begin
insert into tipo
values
(@Nombre,@Descripcion)
end






CREATE PROC insertar_persona_contacto
@Nombre			nvarchar(25),
@Apellido		nvarchar(25),
@Telefono		varchar(8),
@Email			nvarchar(30)
as
begin
insert into persona_contacto
values
(@Nombre,@Apellido,@Telefono,@Email)
end





CREATE PROC insertar_socio
@Nombres			nvarchar(35),
@Apellidos			nvarchar(35),
@Telefono			varchar(8)  ,
@id_pais			int			,
@id_participacion	int			,
@id_tipo			int			,
@id_PerContacto		int	
as
begin
insert into socio
values
       (
       
       @Nombres,
       @Apellidos,
       @Telefono,
       @id_pais,
       @id_participacion,
       @id_tipo,
       @id_PerContacto)
end








Create database info_juegos
use info_juegos

CREATE TABLE   desarrollador
(
id_desarrollador		int      primary key identity(1,1) not null,
Nombre					nvarchar(58),
Descripcion				nvarchar(50),
Direccion_Desarrollador  nvarchar(25),
Pais_Desarrollador		nvarchar(41)
)



CREATE TABLE	   proveedor
(
id_proveedor int			primary key identity(1,1) not null,
Nombre		 nvarchar(58),
Direccion	 nvarchar(25),
Telefono	 int
)

CREATE TABLE	   plataforma
(
id_plataforma int           primary key identity(1,1) not null,
Nombre		  nvarchar(58),
Descripcion   nvarchar(50)
)



CREATE TABLE		video_juegos
(
id_videojuegos		int		primary key identity(1,1) not null,
Nombre				nvarchar(58),
Descripcion			nvarchar(50),
Fecha_lanzamiento	date,
Costo				money,
id_desarrollador	int,
id_proveedor        int,
id_plataforma       int 

foreign key (id_desarrollador)
references desarrollador (id_desarrollador),
foreign key (id_proveedor)
references proveedor (id_proveedor),
foreign key (id_plataforma)
references plataforma (id_plataforma),
)



create trigger Tr_Nuevo_Juego
on video_juegos 
for insert 
as 
declare @Id_plataforma int
declare @Nvalor decimal(5,2)
declare @valor decimal(5,2)
set	@Id_plataforma = (select id_plataforma from inserted)
set @valor = (select Costo from inserted)

  if @Id_plataforma = 4 -- Nintendo 20%

  begin 
 set @Nvalor =(@valor-(@valor*0.2))
  update video_juegos set Costo = @Nvalor where id_videojuegos = (select id_videojuegos from inserted)
  end

  else if @Id_plataforma = 1 -- PS4 10%
  begin 
 set @Nvalor =(@valor-(@valor*0.1))
  update video_juegos set Costo = @Nvalor where id_videojuegos = (select id_videojuegos from inserted)
  end




--------------------Inventario----------------------
CREATE TABLE inventario
(
id_inventario  int primary key identity(1,1) not null,
stock		   int,
direccion      nvarchar(25),
telefono       varchar(8),
id_videojuegos int,
foreign key (id_videojuegos)
references  video_juegos    (id_videojuegos)
)

CREATE TABLE tipo_cliente
(
id_tipocliente  int primary key identity(1,1) not null,
Nombre			nvarchar(58),
Descripcion		nvarchar(25)
)

CREATE TABLE cliente
(
id_cliente         int        primary key identity(1,1) not null,
Nombre_cliente     nvarchar(58),
Nit			       nvarchar(15),
Telefono           varchar(8),
Direccion          nvarchar(25),
Correo_Electronico nvarchar(25),
id_tipocliente     int,
foreign key (id_tipocliente)
references  tipo_cliente   (id_tipocliente)
)


CREATE TABLE ventas
(
id_ventas			int primary key identity(1,1) not null,
Fecha				date,
Cantidad			int,
Nombre_Cliente		nvarchar(50),
Nit					nvarchar(15),
id_videojuegos		int,
id_cliente			int,
total				money,
foreign key (id_videojuegos)
references  video_juegos   (id_videojuegos),
foreign key (id_cliente)
references  cliente        (id_cliente)
)

--------------TRIGER VENTA ----------------

create trigger tr_nueva_venta
on ventas 
for insert 
as 

declare @stock int 
declare @cant int
declare @tot money
declare @prec money
declare @nombre nvarchar(50)
declare @nit nvarchar(15)

select @nombre = cliente.Nombre_cliente from cliente  join inserted
on inserted.id_cliente = cliente.id_cliente
where cliente.id_cliente = inserted.id_cliente

select @nit = cliente.Nit from cliente  join inserted
on inserted.id_cliente = cliente.id_cliente
where cliente.id_cliente = inserted.id_cliente

select @prec = video_juegos.Costo from video_juegos  join ventas
on ventas.id_videojuegos = video_juegos.id_videojuegos
where video_juegos.id_videojuegos = ventas.id_videojuegos

set @cant = ( select cantidad from inserted)

select @stock = stock from inventario  join inserted 
on inserted.id_videojuegos = inventario.id_videojuegos
where inventario.id_videojuegos = inserted.id_videojuegos

set @tot = @cant * @prec
update ventas set total = @tot where id_ventas = (select id_ventas from inserted)
update ventas set Nombre_Cliente = @nombre where id_ventas = (select id_ventas from inserted)
update ventas set Nit = @nit where id_ventas = (select id_ventas from inserted)

if ( @stock >= @cant)

 update inventario set stock = stock - @cant  from 
 inventario join inserted 
 on inserted.id_videojuegos = inventario.id_videojuegos
 where inventario.id_videojuegos = inserted.id_videojuegos

else 

begin 
raiserror ('No se cuenta con la cantidad que se pide en stock', 16,1)
rollback transaction 
end 

go 



---Procedimientos para insertar datos

 
CREATE PROCEDURE  insertar_desarrollador
@Nombre					nvarchar(58),
@Descripcion			nvarchar(50),
@Direccion_Desarrollador nvarchar(25),
@Pais_Desarrollador		nvarchar(41)
as
begin
insert into desarrollador 
values
(@Nombre,@Descripcion,@Direccion_Desarrollador,@Pais_Desarrollador)
end



CREATE PROC insertar_proveedor
@Nombre		 nvarchar(58),
@Direccion	 nvarchar(25),
@Telefono	 int
as
begin
insert into proveedor
values
(@Nombre,@Direccion,@Telefono)
end



CREATE PROC insertar_plataforma
@Nombre		  nvarchar(58),
@Descripcion   nvarchar(50)
as
begin
insert into plataforma
values
(@Nombre,@Descripcion)
end


CREATE PROC insertar_videojuegos
@Nombre				nvarchar(58),
@Descripcion		nvarchar(50),
@Fecha_lanzamiento	date,
@Costo				money,
@id_desarrollador	int,
@id_proveedor       int,
@id_plataforma      int
as
begin
insert into  video_juegos
values
(@Nombre,  @Descripcion,    @Fecha_lanzamiento, @Costo,
@id_desarrollador,@id_proveedor,@id_plataforma)
end

----Procedimientos almacenados inventario------

CREATE PROCEDURE  insertar_inventario
@stock		    int,
@direccion      nvarchar(25),
@telefono       varchar(8),
@id_videojuegos int
as
begin
insert into inventario 
values
(@stock,@direccion,@telefono,@id_videojuegos)
end


CREATE PROCEDURE  insertar_tipoCliente
@Nombre			 nvarchar(58),
@Descripcion	 nvarchar(25)
as 
begin
insert into tipo_cliente
values(@Nombre,@Descripcion)
end


CREATE PROCEDURE insertar_cliente
@Nombre_cliente     nvarchar(58),
@Nit			    nvarchar(15),
@Telefono           varchar (8) ,
@Direccion          nvarchar(25),
@Correo_Electronico nvarchar(25),
@id_tipocliente     int
as
begin
insert into cliente
values(@Nombre_cliente,@Nit,@Telefono,@Direccion,
	   @Correo_Electronico,@id_tipocliente)
end


CREATE PROCEDURE insertar_ventas
@Fecha				date,
@Cantidad			int ,
@Nombre_cliente     nvarchar(50),
@nit			    nvarchar(15),
@id_videojuegos		int ,
@id_cliente			int ,
@total				money
as
begin
insert into ventas 
values(@Fecha,@Cantidad,@Nombre_cliente,@nit,@id_videojuegos,@id_cliente, @total)
end



use info_juegos

EXEC insertar_desarrollador 'Nintendo'      ,'multinacional en el mercado de los videojuegos',    'Tokio'     ,'Japon'
EXEC insertar_desarrollador 'Rockstar Games','desarrolladora y publicadora de videojuegos'   ,    'Chicago'   ,'EE UU'
EXEC insertar_desarrollador 'Ubisoft'       ,'desarrolladora y distribuidora de videojuegos' ,    'Paris'     ,'francia'
EXEC insertar_desarrollador 'EA'            ,'desarrolladora y distribuidora de videojuegos' ,    'California','EE UU'
EXEC insertar_desarrollador 'Activision'    ,'desarrolladora y distribuidora de videojuegos' ,    'California','EE UU'
EXEC insertar_desarrollador 'Konami'        ,'desarrolladora y distribuidora de videojuegos' ,    'osaka'     ,'japon'



EXEC insertar_proveedor 'Diversiones','Guatemala' ,56478536
EXEC insertar_proveedor 'Artigames'  ,'Costa Rica',68746574
EXEC insertar_proveedor 'Desk'       ,'EE UU'     ,89745863
EXEC insertar_proveedor 'Tradenia'   ,'Panama'	,45796321
EXEC insertar_proveedor 'Play fab'   ,'Mexico'    ,95874631



EXEC insertar_plataforma 'PlayStation','Creado por Sony'
EXEC insertar_plataforma 'X BOX'      ,'Creado por microsoft'
EXEC insertar_plataforma 'PC Gaming'  ,'Creado por los mismos usuarios'
EXEC insertar_plataforma 'Nintendo'   ,'Creado por la empresa nintendo en japon'



EXEC insertar_videojuegos 'Mortal Kombat'			,'juego de peleas'  ,'10-12-2019',500,6,1,1
EXEC insertar_videojuegos 'Call of Duty'			,'juego de accion'  ,'10-12-2019',450,5,2,1
EXEC insertar_videojuegos 'Resident Evil'			,'juego de accion'  ,'10-12-2019',350,3,5,1
EXEC insertar_videojuegos 'fifa'					,'juego de deporte' ,'10-10-2017',200,4,2,2
EXEC insertar_videojuegos 'The Last of Us'		,'juego de accion'  ,'10-12-2019',600,6,1,3
EXEC insertar_videojuegos 'Destiny'				,'juego de accion'  ,'10-10-2017',800,5,1,3
EXEC insertar_videojuegos 'Dragon Ball Xenoverse' ,'juego de peleas'  ,'10-10-2017',700,3,1,1
EXEC insertar_videojuegos 'Uncharted'				,'juego de aventura','10-10-2017',550,2,2,4
EXEC insertar_videojuegos 'Super Mario'			,'juego de aventura','10-10-2017',500,1,2,1
EXEC insertar_videojuegos 'Batman'				,'juego de accion'  ,'10-10-2017',250,2,1,1



EXEC insertar_inventario 200,'Guatemala'		,45789658,1
EXEC insertar_inventario 400,'Peten'			,78523657,2
EXEC insertar_inventario 900,'Alta verapaz'	,48967853,3
EXEC insertar_inventario 110,'San marcos'		,56478934,4
EXEC insertar_inventario 780,'Huehuetenango'	,52379564,5
EXEC insertar_inventario 980,'Santa Rosa'		,54697823,6
EXEC insertar_inventario 210,'Izabal'			,25469784,7
EXEC insertar_inventario 600,'Escuintla'		,31456712,8
EXEC insertar_inventario 305,'Quetzaltenango' ,64251379,9
EXEC insertar_inventario 123,'Jutiapa'		,12468975,10




EXEC insertar_tipoCliente 'Frecuente',     'Llega 1 vez a la semana'
EXEC insertar_tipoCliente 'Poco frecuente','Llega 2 veces al mes'
EXEC insertar_tipoCliente 'Nada frecuente','Llega 1 vez al año'



EXEC insertar_cliente 'Jose Hernandez'	,256478,25639876,'Guatemala'     ,'jhernandez@gmail.com',1
EXEC insertar_cliente 'Marco Escobar'		,879654,89654786,'Jutiapa'		 ,'mescobar@gmail.com'  ,3
EXEC insertar_cliente 'Mario guerra'		,745891,64785231,'Quetzaltenango','mguerra@gmail.com'   ,2
EXEC insertar_cliente 'Cindy Perez'		,369871,64782456,'Escuintla'     ,'cperez@gmail.com'    ,1
EXEC insertar_cliente 'Hugo Carrillo'		,658743,69854783,'Izabal'        ,'hcarrillo@gmail.com' ,3
EXEC insertar_cliente 'Alejandro Fuentes' ,654783,34687569,'Santa Rosa'    ,'afuentes@gmail.com'  ,2
EXEC insertar_cliente 'Alberto Fernandez' ,547893,10364869,'Peten'		 ,'afernandez@gmail.com',1
EXEC insertar_cliente 'Sergio Lopez'		,325478,70398421,'Huehuetenango' ,'slopez@gmail.com'    ,3
EXEC insertar_cliente 'Edwin Hernandez'   ,346587,93013564,'San marcos'    ,'ehernandez@gmail.com',3
EXEC insertar_cliente 'Juan Manzo'		,63457,63520145 ,'Alta verapaz'  ,'jmanzo@gmail.com'    ,2



EXEC insertar_ventas '2020-04-19',1,null,null,5,1,null
EXEC insertar_ventas '2020-04-19',2,null,null,5,2,null
EXEC insertar_ventas '2020-04-19',3,null,null,2,3,null
EXEC insertar_ventas '2020-04-19',4,null,null,1,4,null
EXEC insertar_ventas '2020-04-19',1,null,null,6,5,null
EXEC insertar_ventas '2020-04-19',2,null,null,3,6,null






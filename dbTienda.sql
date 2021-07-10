CREATE TABLE cliente(
	idCliente int not null auto_increment,
    nombre varchar(50),
    apellido varchar(50),
    primary key (idCliente)
);
CREATE TABLE tienda(
	idTienda int not null auto_increment,
    nombre varchar(50),
    direccion varchar(50),
    primary key (idTienda)
);
CREATE TABLE producto(
	idProducto int not null auto_increment,
    nombre varchar(50),
    precio float,
    idTienda int references tienda(idTienda),
	primary key (idProducto)
);
CREATE TABLE venta(
	idVenta int not null auto_increment,
    idCliente int references cliente(idCliente),
    idProducto int references producto(idProducto),
    cantidad int,
    montoTotal float,
    fecha date,
    primary key (idVenta)
)
INSERT INTO tienda (nombre,direccion)VALUES ("mercado local","direccion x");
INSERT INTO producto (nombre,precio,idTienda)VALUES ("leche",5.2,1);
INSERT INTO producto (nombre,precio,idTienda)VALUES ("carne",13.2,1);
INSERT INTO producto (nombre,precio,idTienda)VALUES ("televisor",3325.2,1);
INSERT INTO producto (nombre,precio,idTienda)VALUES ("yogurt",7.2,1);
INSERT INTO venta (idProducto, idCliente, cantidad, montoTotal, fecha) VALUES 
(1,5,20,40,2021-02-20);
INSERT INTO venta (idProducto, idCliente, cantidad, montoTotal, fecha) VALUES 
(2,5,20,264,2021-02-20);
INSERT INTO venta (idProducto, idCliente, cantidad, montoTotal, fecha) VALUES 
(3,5,1,3325.2,2021-02-20);
INSERT INTO venta (idProducto, idCliente, cantidad, montoTotal, fecha) VALUES 
(4,5,1,7.2,2021-02-20);

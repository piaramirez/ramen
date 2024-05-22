DROP DATABASE IF EXISTS soraRamen;
CREATE DATABASE soraRamen CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE soraRamen;

/*
    Verificamos si existe la tablaprivilegios y sino la creamos
*/

CREATE TABLE areaTrabajo(
    idaTrabajo smallint AUTO_INCREMENT,
    nombreaTrabajo varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    despcionTrabajo varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    aldeaTrabajo varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    mentorTrabajo varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,

    PRIMARY KEY(idaTrabajo)

)ENGINE=InnoDB ;

CREATE TABLE Usuarios (
    idUser smallint AUTO_INCREMENT,
    nombreUser varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    apellidoUser varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    correouser varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    passUser varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    tokenUser  varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    areaUser  smallint NOT NULL,
    
    
    PRIMARY KEY(idUser),
    UNIQUE (correouser),
    FOREIGN KEY (areaUser) REFERENCES areaTrabajo(idaTrabajo)
)ENGINE=InnoDB;
/*
    Corregir depués de proyecto web, restaurar a Roles del restaurante
*/
/*INSERT INTO Usuarios VALUES
(1, 'Pia', 'ramuirez', 'hola@gmail', '1234', '1234', 1),
(2, 'Pia', 'ramuirez', 'hola2@gmail', '1234', '1234', 2),
(3, 'Pia', 'ramuirez', 'hola3@gmail', '1234', '1234', 3);*/

CREATE TABLE Pedidos(
    idPedido smallint AUTO_INCREMENT,
    idUser smallint NOT NULL,
    folioPedido varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    fechaPedido date NOT NULL,
    totalPedido decimal(10,2) NOT NULL,
    PRIMARY KEY(idPedido),
    UNIQUE(folioPedido),
    FOREIGN KEY (idUser) REFERENCES Usuarios(idUser)    
);

CREATE TABLE Catagolo(
    idCatagolo smallint AUTO_INCREMENT,
    nombreCatagolo varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    PRIMARY KEY(idCatagolo),
    UNIQUE(nombreCatagolo)
);
INSERT INTO Catagolo VALUES
(1, 'Ramen'),
(2, 'Bebidas'),
(3, 'Postres');
CREATE TABLE Productos(
    idProducto smallint AUTO_INCREMENT,
    nombreProducto varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    descripcionProducto varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    fotoProducto varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
    precioProducto decimal(10,2) NOT NULL,
    idCatagolo smallint NOT NULL,
    PRIMARY KEY(idProducto),
    UNIQUE(nombreProducto),
    FOREIGN KEY (idCatagolo) REFERENCES Catagolo(idCatagolo)
);
insert into Productos VALUES
(1, 'HAKATA RAMEN', 'cldo de cerdo contundente elaborado a partir de huesos, manitas, orejas y demás cortes que agregan gelatina y cuerpo al caldo. Los fideos que usan son finos y rectos y suelen aderezar el ramen con chasu, cebolletas, setas oreja de madera y hojas de mostaza picante. Esta región es la cuna del caldo tonkotsu que suele sazonarse con shio para salvaguardar el color blanco lechoso de la sopa.', 'Assets/Img/Catalogo/Ramen/tonkotsuramen.jpg',150, 1),
(2, 'Shoyu Ramen', 'Este es un caldo más ligero en su textura. Se hace con huesos de pollo, dashi (caldo ligero de pescado), salsa de soja (shoyu, de ahí el nombre) y rayu (extracto de pimiento rojo con aceite de sésamo) que le dan un tono oscuro.', 'Assets/Img/Catalogo/Ramen/ShoyuRamen.jpg',150, 1);

CREATE TABLE PedidoProductos(
    idPedidoProducto int AUTO_INCREMENT,
    idPedido smallint NOT NULL,
    idProducto smallint NOT NULL,
    cantidad int NOT NULL,
    precioUnitario decimal(10,2) NOT NULL,
    PRIMARY KEY(idPedidoProducto),
    FOREIGN KEY (idPedido) REFERENCES Pedidos(idPedido),
    FOREIGN KEY (idProducto) REFERENCES Productos(idProducto)
);

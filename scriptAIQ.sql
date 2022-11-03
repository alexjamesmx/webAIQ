-- Active: 1660898070550@@127.0.0.1@3306@AIQ
CREATE TABLE carrito(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fecha DATETIME NOT NULL,
    id_status INT(11) NULL,
    id_mesa VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE detalle_carrito(  
    id_carrito INT NOT NULL,
    id_comida INT(11) NOT NULL ,
    cantidad INT(10) NOT NULL,
    subtotal FLOAT(10,2) NOT NULL
);

ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status_pedido` (`id_status`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id_mesa`);

ALTER TABLE `detalle_carrito`
  ADD CONSTRAINT `det_carr_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id`),
  ADD CONSTRAINT `det_carr_ibfk_2` FOREIGN KEY (`id_comida`) REFERENCES `menu` (`id_comida`);

ALTER TABLE pedidos_users
  ADD comentario VARCHAR(500) DEFAULT NULL,
  ADD cantidad INT(10) NOT NULL,
  ADD subtotal FLOAT(10,2) NOT NULL;

ALTER Table pedidos
  ADD id_user INT(11),
  ADD CONSTRAINT id_user FOREIGN KEY (id_user) REFERENCES users (id_user);

ALTER TABLE mesas
  ADD nombre VARCHAR(255),
  MODIFY COLUMN id_mesa INT(11) AUTO_INCREMENT;

ALTER TABLE pedidos
  ADD id_carrito INT(11),
  ADD CONSTRAINT id_carrito FOREIGN KEY (id_carrito) REFERENCES carrito (id);

ALTER TABLE mesas
  ADD nombre VARCHAR(255),
  MODIFY COLUMN id_mesa INT(11) AUTO_INCREMENT;

ALTER TABLE pedidos
DROP FOREIGN KEY ;

ALTER TABLE `pedidos` 
DROP CONSTRAINT `id_mesa`;

ALTER TABLE pedidos_users
DROP COLUMN id_user;

ALTER TABLE peididos 
ADD id_mesa int not null
-> after nom;

ALTER TABLE `pedidos_users` DROP INDEX `id_pedido`;

ALTER TABLE `pedidos` 
DROP CONSTRAINT `vcsoftco_AIQ/pedidos_r_ibfk_3`;

CREATE TABLE metodo_pago(
	id_pago INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    metodo VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pedidos`(`fecha`, `fecha_act`, `id_mesa`, `id_status`, `id_repartidor`, `nombre_alias`, `telefono`, `total`, `id_user`, `metodo`) VALUES (now(), NULL, 3, 1, 2, 'Maria', 4421234567, 500, 2, 'efectivo');

INSERT INTO `pedidos_users`(`id_pedido`, `id_comida`, `precio`, `comentario`, `cantidad`, `subtotal`) VALUES (2, 88, 100, NULL, 2, 200);






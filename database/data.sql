CREATE TABLE `Usuarios` (
	`correo` varchar(100) NOT NULL,
	`nombre` varchar(50) NOT NULL,
	`apellido` varchar(50) NOT NULL,
	`contrasenha` varchar(20) NOT NULL,
	`admin` BOOLEAN NOT NULL,
	`foto_perfil` TEXT,
	`telefono` TEXT NOT NULL UNIQUE,
	PRIMARY KEY (`correo`)
);

CREATE TABLE `Articulos` (
	`id_articulo` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` varchar(50) NOT NULL,
	`imagen` TEXT NOT NULL,
	`descripcion` TEXT NOT NULL,
	`categoria` INT(10) NOT NULL,
	`propietario` varchar(100) NOT NULL,
	`adquirido` BOOLEAN NOT NULL,
	PRIMARY KEY (`id_articulo`)
);

CREATE TABLE `categorias` (
	`id_categoria` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` varchar(50) NOT NULL,
	PRIMARY KEY (`id_categoria`)
);

CREATE TABLE `HistorialDonaciones` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_usuario` varchar(100) NOT NULL,
	`id_articulo` INT(10) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `Articulos` ADD CONSTRAINT `Articulos_fk0` FOREIGN KEY (`categoria`) REFERENCES `categorias`(`id_categoria`);

ALTER TABLE `Articulos` ADD CONSTRAINT `Articulos_fk1` FOREIGN KEY (`propietario`) REFERENCES `Usuarios`(`correo`);

ALTER TABLE `HistorialDonaciones` ADD CONSTRAINT `HistorialDonaciones_fk0` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios`(`correo`);

ALTER TABLE `HistorialDonaciones` ADD CONSTRAINT `HistorialDonaciones_fk1` FOREIGN KEY (`id_articulo`) REFERENCES `Articulos`(`id_articulo`);

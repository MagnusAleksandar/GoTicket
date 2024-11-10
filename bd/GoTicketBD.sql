DROP DATABASE goticket;
CREATE DATABASE goticket;
USE goticket;

CREATE TABLE `asistente` (
  `idAsistente` INT(11) NOT NULL,
  `clave` VARCHAR(45) DEFAULT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) DEFAULT NULL,
  `telefono` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`idAsistente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `proveedor` (
  `nit` INT(11) NOT NULL AUTO_INCREMENT,
  `clave` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`nit`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=1010 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `evento` (
  `pulep` VARCHAR(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `precio` INT NOT NULL,
  `aforo` INT(11) NOT NULL,
  `nitProveedor` INT(11) NOT NULL,
  `imagen` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`pulep`,`nitProveedor`),
  FOREIGN KEY (`nitProveedor`) REFERENCES `proveedor` (`nit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `factura` (
  `idFactura` INT(11) NOT NULL AUTO_INCREMENT,
  `idCliente` INT(11) NOT NULL,
  `fecha_generacion` DATE NOT NULL,
  `hora_generacion` TIME NOT NULL,
  `monto_total` INT(11) NOT NULL,
  PRIMARY KEY (`idFactura`),
  FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `boleta` (
  `idBoleta` INT(11) NOT NULL,
  `idAsistente` INT(11) NOT NULL,
  `pulep` VARCHAR(45) NOT NULL,
  `idFactura` INT(11) NOT NULL,
  PRIMARY KEY (`idBoleta`),
  FOREIGN KEY (`idAsistente`) REFERENCES `asistente` (`idAsistente`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`pulep`) REFERENCES `evento` (`pulep`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `proveedor` (`nit`, `clave`, `nombre`, `email`, `telefono`) VALUES
(1, '123', 'Páramo Presenta', 'admin@paramo.com', NULL);

INSERT INTO `cliente` (`idCliente`, `clave`, `nombre`, `email`, `telefono`) VALUES
(1007, '789', 'Eva Martínez', 'eva.martinez@example.com', '355 512 3456'),
(1008, '456', 'Tomás Fernández', 'tomas.fernandez@example.com', '398 654 8321'),
(1009, '963', 'Sofía Gómez', 'sofia.gomez@example.com', '323 456 7895');

INSERT INTO `evento` (`pulep`, `nombre`, `fecha`, `hora`, `precio`, `aforo`, `nitProveedor`, `imagen`) VALUES
('0001', 'Charla Motivacional', '2024-11-01', '10:00:00', '50000', 150, 1, 'img/charlamotivacional.jpg'),
('0002', 'Concierto de Jazz', '2024-11-05', '20:00:00', '30000', 300, 1, 'img/conciertodejazz.jpg'),
('0003', 'Concierto de Rock', '2024-11-08', '21:30:00', '30000', 500, 1, 'img/conciertoderock.jpg'),
('0004', 'Conferencia Tecnológica', '2024-11-10', '09:00:00', '80000', 200, 1, 'img/conferenciadetecnologia.jpg'),
('0005', 'Exposición de Arte', '2024-11-15', '11:00:00', '100000', 100, 1, 'img/exposiciondearte.jpg'),
('0006', 'Festival de Cine', '2024-11-18', '19:00:00', '50000', 400, 1, 'img/festivaldecine.jpg'),
('0007', 'Feria de Emprendimiento', '2024-11-20', '15:00:00', '25000', 250, 1, 'img/feriadeemprendimiento.jpg'),
('0008', 'Teatro Musical', '2024-11-25', '18:30:00', '50000', 350, 1, 'img/teatromusical.jpg');
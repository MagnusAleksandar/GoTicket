CREATE SCHEMA IF NOT EXISTS `GoTicket` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `goticket`.`cliente` (
  `idCliente` INT(11) NOT NULL AUTO_INCREMENT,
  `clave` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`idCliente`));

CREATE TABLE IF NOT EXISTS `goticket`.`asistente` (
  `idAsistente` INT(11) NOT NULL,
  `clave` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idAsistente`));

CREATE TABLE IF NOT EXISTS `goticket`.`proveedor` (
  `nit` INT(11) NOT NULL AUTO_INCREMENT,
  `clave` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`nit`));
    
CREATE TABLE IF NOT EXISTS `goticket`.`evento` (
  `pulep` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `aforo` INT(11) NOT NULL,
  `nitProveedor` INT(11) NOT NULL,
  `imagen` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`pulep`, `nitProveedor`),
  FOREIGN KEY (`nitProveedor`)
    REFERENCES `goticket`.`proveedor` (`nit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE IF NOT EXISTS `goticket`.`factura` (
  `idFactura` INT(11) NOT NULL AUTO_INCREMENT,
  `idCliente` INT(11) NOT NULL,
  `pulep` VARCHAR(45) NOT NULL,
  `fecha_generacion` DATE NOT NULL,
  `hora_generacion` TIME NOT NULL,
  `monto_total` DECIMAL(10,0) NOT NULL,
  PRIMARY KEY (`idFactura`),
  FOREIGN KEY (`idCliente`)
    REFERENCES `goticket`.`cliente` (`idCliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `factura_ibfk_2`
    FOREIGN KEY (`pulep`)
    REFERENCES `goticket`.`evento` (`pulep`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS `goticket`.`boleta` (
  `idBoleta` INT(11) NOT NULL,
  `idAsistente` INT(11) NOT NULL,
  `idFactura` INT(11) NOT NULL,
  `precio` INT(11) NOT NULL,
  PRIMARY KEY (`idBoleta`),
  FOREIGN KEY (`idAsistente`)
    REFERENCES `goticket`.`asistente` (`idAsistente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (`idFactura`)
    REFERENCES `goticket`.`factura` (`idFactura`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- INSERTS
INSERT INTO `goticket`.`evento` (`pulep`, `nombre`, `fecha`, `hora`, `aforo`, `nitProveedor`, `imagen`) VALUES
('0001', 'Charla Motivacional', '2024-11-01', '10:00:00', 150, 1, 'charlamotivacional.jpg'),
('0002', 'Concierto de Jazz', '2024-11-05', '20:00:00', 300, 1, 'conciertodejazz.jpg'),
('0003', 'Concierto de Rock', '2024-11-08', '21:30:00', 500, 1, 'conciertodderock.jpg'),
('0004', 'Conferencia Tecnológica', '2024-11-10', '09:00:00', 200, 1, 'conferenciadetecnologia.jpg'),
('0005', 'Exposición de Arte', '2024-11-15', '11:00:00', 100, 1, 'exposiciondearte.jpg'),
('0006', 'Festival de Cine', '2024-11-18', '19:00:00', 400, 1, 'festivaldecine.jpg'),
('0007', 'Feria de Emprendimiento', '2024-11-20', '15:00:00', 250, 1, 'feriadeemprendimiento.jpg'),
('0008', 'Teatro Musical', '2024-11-25', '18:30:00', 350, 1, 'teatromusical.jpg');
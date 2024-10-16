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
ENGINE = InnoDB

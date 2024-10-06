CREATE SCHEMA IF NOT EXISTS `GoTicket` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `GoTicket`.`Proveedor` (
  `nit` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`nit`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `GoTicket`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;

CREATE TABLE  IF NOT EXISTS `GoTicket`.`Asistente` (
  `idAsistente` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`idAsistente`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `GoTicket`.`Evento` (
  `pulep` VARCHAR(45) NOT NULL	,
  `nombre` VARCHAR(45) NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `aforo` INT NOT NULL,
  `nitProveedor` INT NOT NULL,
  PRIMARY KEY (`pulep`, `nitProveedor`),
  FOREIGN KEY (`nitProveedor`)
    REFERENCES `GoTicket`.`Proveedor` (`nit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `GoTicket`.`Factura` (
  `idFactura` INT NOT NULL AUTO_INCREMENT,
  `idBoleta` INT NOT NULL,
  `idCliente` INT NOT NULL,
  `pulep` VARCHAR (45) NOT NULL,
  `fecha_generacion` DATE NOT NULL,
  `hora_generacion` TIME NOT NULL,
  `monto_total` DECIMAL NOT NULL,
  PRIMARY KEY (`idFactura`),
  FOREIGN KEY (`idCliente`)
    REFERENCES `GoTicket`.`Cliente` (`idCliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (`pulep`)
    REFERENCES `GoTicket`.`Evento` (`pulep`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `GoTicket`.`Boleta` (
  `idBoleta` INT NOT NULL,
  `idAsistente` INT NOT NULL,
  `idFactura` INT NOT NULL,
  `pulep` VARCHAR (45) NOT NULL,
  `precio` INT NOT NULL,
  PRIMARY KEY (`idBoleta`),  
  FOREIGN KEY (`idAsistente`)
    REFERENCES `GoTicket`.`Asistente` (`idAsistente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (`idFactura`)
    REFERENCES `GoTicket`.`Factura` (`idFactura`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

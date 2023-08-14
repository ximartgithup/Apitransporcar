
-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `documento` VARCHAR(20) NOT NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(20) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `created` TIMESTAMP NOT NULL,
  `modified` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

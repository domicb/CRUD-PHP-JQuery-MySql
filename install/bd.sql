-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tareas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tareas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tareas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `tareas` ;

-- -----------------------------------------------------
-- Table `tareas`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tareas`.`provincia` (
  `idprovincia` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idprovincia`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tareas`.`tarea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tareas`.`tarea` (
  `idtarea` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcion` VARCHAR(150) NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `apellidos` VARCHAR(60) NOT NULL COMMENT '',
  `telefono` VARCHAR(12) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `direccion` VARCHAR(80) NULL COMMENT '',
  `poblacion` VARCHAR(60) NULL COMMENT '',
  `cod_postal` INT(5) NULL COMMENT '',
  `estado` CHAR(1) NULL COMMENT '',
  `fecha_creacion` VARCHAR(15) NULL COMMENT '',
  `operario` VARCHAR(45) NULL COMMENT '',
  `fecha_realizacion` VARCHAR(15) NULL COMMENT '',
  `anotaciones_anteriores` VARCHAR(150) NULL COMMENT '',
  `anotaciones_posteriores` VARCHAR(150) NULL COMMENT '',
  `idprovincia` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idtarea`)  COMMENT '',
  INDEX `fk_tarea_provincia_idx` (`idprovincia` ASC)  COMMENT '',
  CONSTRAINT `fk_tarea_provincia`
    FOREIGN KEY (`idprovincia`)
    REFERENCES `tareas`.`provincia` (`idprovincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- -----------------------------------------------------
-- Table `tareas`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tareas`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `email` VARCHAR(25) NOT NULL COMMENT '',
  `password` VARCHAR(45) NOT NULL COMMENT '',
  `tipo` CHAR(1) NOT NULL COMMENT '',
  PRIMARY KEY (`idusuario`)  COMMENT '')
ENGINE = InnoDB;


INSERT INTO `usuario` VALUES (null,'domic@hotmail.es','domic','123','1');



INSERT INTO `provincia` VALUES ('01', 'Alava'),
('02', 'Albacete'),
('03', 'Alicante'),
('04', 'Almera'),
('05', 'Avila'),
('06', 'Badajoz'),
('07', 'Balears (Illes)'),
('08', 'Barcelona'),
('09', 'Burgos'),
('10', 'Cáceres'),
('11', 'Cádiz'),
('12', 'Castellón'),
('13', 'Ciudad Real'),
('14', 'Córdoba'),
('15', 'Coruña (A)'),
('16', 'Cuenca'),
('17', 'Girona'),
('18', 'Granada'),
('19', 'Guadalajara'),
('20', 'Guipzcoa'),
('21', 'Huelva'),
('22', 'Huesca'),
('23', 'Jaén'),
('24', 'León'),
('25', 'Lleida'),
('26', 'Rioja (La)'),
('27', 'Lugo'),
('28', 'Madrid'),
('29', 'Málaga'),
('30', 'Murcia'),
('31', 'Navarra'),
('32', 'Ourense'),
('33', 'Asturias'),
('34', 'Palencia'),
('35', 'Palmas (Las)'),
('36', 'Pontevedra'),
('37', 'Salamanca'),
('38', 'Santa Cruz de Tenerife'),
('39', 'Cantabria'),
('40', 'Segovia'),
('41', 'Sevilla'),
('42', 'Soria'),
('43', 'Tarragona'),
('44', 'Teruel'),
('45', 'Toledo'),
('46', 'Valencia'),
('47', 'Valladolid'),
('48', 'Vizcaya'),
('49', 'Zamora'),
('50', 'Zaragoza'),
('51', 'Ceuta'),
('52', 'Melilla');

INSERT INTO `tarea` VALUES 
(null, 'cortar cesped', 'domise','carrasco',603781256,'domi1213@hotmail.com','coquina','puna umbria',21100,'r','24/12/1987','domic','24/12/2015','lol','loleilo',1),
(null,'limpar piscina','pepito','rodriguez',604886428,'domic@hotmail.es','aurora','punta umbria',22100,'p','12/04/1999','juan','23/11/2016','limpiar bien','todo corrcto',2),
(null,'cortar petunias','juanito','sanchez',604666428,'carlos806@hotmail.es','orquideas','punta umbria',22400,'c','09/04/1993','ricardo','11/08/2014','ojo','necesita repaso',3),
(null,'regar', 'alberto','carrasco',603781256,'domi1213@hotmail.com','coquina','puna umbria',21100,'r','24/12/1987','domic','24/12/2015','lol','loleilo',4),
(null,'podar arboles','ramon','rodriguez',604886428,'domic@hotmail.es','aurora','punta umbria',22100,'p','12/04/1999','juan','23/11/2016','limpiar bien','todo corrcto',5),
(null,'cortar petunias','carlos','sanchez',604666428,'carlos806@hotmail.es','orquideas','punta umbria',22400,'c','09/04/1993','ricardo','11/08/2014','ojo','necesita repaso',6);
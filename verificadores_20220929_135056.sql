-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "verificadores" -------------------------
CREATE DATABASE IF NOT EXISTS `verificadores` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `verificadores`;
-- ---------------------------------------------------------


-- CREATE TABLE "categorias_faq_verificadores" -----------------
CREATE TABLE `categorias_faq_verificadores`( 
	`id_categoria_faq` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`texto_categoria_faq` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`estado_categoria_faq` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`fecha_creacion_faq` DateTime NOT NULL,
	`creo_categoria_faq` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	CONSTRAINT `unique_id_categoria_faq` UNIQUE( `id_categoria_faq` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "contenido_faq_verificadores" ------------------
CREATE TABLE `contenido_faq_verificadores`( 
	`id_entrada_faq` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`tipo_entrada_faq` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`texto_faq` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`estado_faq` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`fecha_creacion_faq` DateTime NOT NULL,
	`creo_faq` Int( 255 ) AUTO_INCREMENT NOT NULL,
	CONSTRAINT `unique_creo_faq` UNIQUE( `creo_faq` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "contenido_publico_verificadores" --------------
CREATE TABLE `contenido_publico_verificadores`( 
	`id_contenido_publico_ver` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`contenido_publico_ver` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`creo_publico_ver` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`fecha_creacio_ver` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`estado_contenido_ver` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`token_verif_cont` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	CONSTRAINT `unique_id_contenido_publico_ver` UNIQUE( `id_contenido_publico_ver` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- -------------------------------------------------------------


-- CREATE TABLE "usuarios_verificadores" -----------------------
CREATE TABLE `usuarios_verificadores`( 
	`usu_ver_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`usu_ver_nombre` Text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`usu_ver_usuario` Text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`usu_ver_password` Text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`usu_ver_perfil` Text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`usu_ver_foto` Text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`usu_ver_estado` Int( 11 ) NOT NULL,
	`usu_ver_ultimo_login` DateTime NOT NULL,
	`usu_ver_fecha_alta` Timestamp NOT NULL DEFAULT current_timestamp(),
	`usu_ver_token` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	PRIMARY KEY ( `usu_ver_id` ) )
CHARACTER SET = utf8
COLLATE = utf8_spanish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "verificadores_tbl" ----------------------------
CREATE TABLE `verificadores_tbl`( 
	`id_verificador` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`municipio_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`unidad_eco_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`tel_titular_ue_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`tel_contraloria_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`nombre_completo_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`ruta_imagen_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`estado_verificador` Int( 255 ) NOT NULL,
	`token_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`ruta_qr_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`url_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`alta_verificador` DateTime NOT NULL,
	`creo_verificador` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`ultima_mod_verificador` Timestamp NULL DEFAULT current_timestamp(),
	`modifico_verificador` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0000-00-00 00:00:00',
	`conteo_vistas_verificador` Int( 11 ) NOT NULL,
	`titularue_verificadores` VarChar( 190 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
	CONSTRAINT `unique_id_verificador` UNIQUE( `id_verificador` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 11;
-- -------------------------------------------------------------


-- Dump data of "categorias_faq_verificadores" -------------
-- ---------------------------------------------------------


-- Dump data of "contenido_faq_verificadores" --------------
-- ---------------------------------------------------------


-- Dump data of "contenido_publico_verificadores" ----------
BEGIN;

INSERT INTO `contenido_publico_verificadores`(`id_contenido_publico_ver`,`contenido_publico_ver`,`creo_publico_ver`,`fecha_creacio_ver`,`estado_contenido_ver`,`token_verif_cont`) VALUES 
( '1', 'http://189.192.220.2:8080/verificadores/public/index.php?token=632cb9866c4e3', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-26 02:33:35', '1', '632cb9866c4e3' ),
( '2', 'http://189.192.220.2:8080/verificadores/public/index.php?token=632dd954083d0', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-26 02:33:35', '1', '632dd954083d0' ),
( '3', 'http://189.192.220.2:8080/verificadores/public/index.php?token=6331540d37b49', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-26 02:33:35', '1', '6331540d37b49' ),
( '4', 'http://189.192.220.2:8080/verificadores/public/index.php?token=633155cf390d8', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-26 02:33:35', '1', '633155cf390d8' ),
( '5', 'http://189.192.220.2:8080/verificadores/public/index.php?token=63315bcdca22c', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-26 02:59:09', '0', '63315bcdca22c' ),
( '6', 'http://189.192.220.2:8080/verificadores/public/index.php?token=63348e28cbfc2', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-28 13:10:48', '1', '63348e28cbfc2' ),
( '7', 'http://189.192.220.2:8080/verificadores/public/index.php?token=63348f0c030ba', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-28 13:14:36', '1', '63348f0c030ba' ),
( '8', 'http://10.100.23.68/verificadores/public/index.php?token=6335e3729dda1', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-29 13:26:58', '1', '6335e3729dda1' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "usuarios_verificadores" -------------------
BEGIN;

INSERT INTO `usuarios_verificadores`(`usu_ver_id`,`usu_ver_nombre`,`usu_ver_usuario`,`usu_ver_password`,`usu_ver_perfil`,`usu_ver_foto`,`usu_ver_estado`,`usu_ver_ultimo_login`,`usu_ver_fecha_alta`,`usu_ver_token`) VALUES 
( '1', 'Administrador de sistema', 'admin@admin.com', '$2a$07$tsjloi76rd45VCR56709D.lxJ1bCvrvVVGQecKLXvD//ljd8a8TRq', '1', '/vistas/fotos/1/admin.jpg', '1', '2022-08-31 09:50:59', '2022-08-31 09:50:59', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "verificadores_tbl" ------------------------
BEGIN;

INSERT INTO `verificadores_tbl`(`id_verificador`,`municipio_verificador`,`unidad_eco_verificador`,`tel_titular_ue_verificador`,`tel_contraloria_verificador`,`nombre_completo_verificador`,`ruta_imagen_verificador`,`estado_verificador`,`token_verificador`,`ruta_qr_verificador`,`url_verificador`,`alta_verificador`,`creo_verificador`,`ultima_mod_verificador`,`modifico_verificador`,`conteo_vistas_verificador`,`titularue_verificadores`) VALUES 
( '3', 'Huixquilucan', 'ORGANISMO DESCENTRALIZADO SISTEMA DE AGUAS DE HUIXQUILUCAN', '5546987564', '5564978564', 'CARLOS ALDAMA PONCE', './vistas/assets/uploads/verif632cb9866c4e3/143742-messages-3.jpg', '1', '632cb9866c4e3', './vistas/assets/uploads/verif632cb9866c4e3/632cb9866c4e3.png', 'http://189.192.220.2:8080/verificadores/public/index.php?token=632cb9866c4e3', '2022-09-22 14:37:42', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-28 12:15:11', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '19', 'VICTOR BAEZ MELO' ),
( '4', 'Huixquilucan', 'SUBDIRECCIÓN DE SISTEMAS', '5548976541', '552136457', 'AXEL ROSE LOPEZ', './vistas/assets/uploads/verif632dd954083d0/110540-profile-img.jpg', '1', '632dd954083d0', './vistas/assets/uploads/verif632dd954083d0/632dd954083d0.png', 'http://189.192.220.2:8080/verificadores/public/index.php?token=632dd954083d0', '2022-09-23 11:05:40', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-27 00:20:49', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '0', 'MTRO. RAUL QUINTANAR CASILLAS' ),
( '5', 'Otros', 'SECRETARIA DE FINANZAS SEGOB', '554698754', '554652136', 'FULANITO EQUIS YE', './vistas/assets/uploads/verif6331540d37b49/022605-gafete_Rogelio.jpeg', '1', '6331540d37b49', './vistas/assets/uploads/verif6331540d37b49/6331540d37b49.png', 'http://189.192.220.2:8080/verificadores/public/index.php?token=6331540d37b49', '2022-09-26 02:26:05', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-26 14:15:19', '0', '0', 'SEÑOR DE SEGOB' ),
( '6', 'Huixquilucan', 'CATASTRO', '4456598754', '556498754', 'VERIFICADOR DE CATASTRO', './vistas/assets/uploads/verif633155cf390d8/023335-gafete.jpg', '1', '633155cf390d8', './vistas/assets/uploads/verif633155cf390d8/633155cf390d8.png', 'http://189.192.220.2:8080/verificadores/public/index.php?token=633155cf390d8', '2022-09-26 02:33:35', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-26 02:33:35', '0', '0', 'DIRECTOR DE CATASTRO' ),
( '7', 'Huixquilucan', 'xxxxxxxxxxxxx', '5555555555', '4444444444', 'yyyyyyyyyyyyyyyyyy', './vistas/assets/uploads/verif63315bcdca22c/025909-gafete_Rogelio.jpeg', '1', '63315bcdca22c', './vistas/assets/uploads/verif63315bcdca22c/63315bcdca22c.png', 'http://189.192.220.2:8080/verificadores/public/index.php?token=63315bcdca22c', '2022-09-26 02:59:09', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-29 13:16:31', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '0', 'yyyyyyyyyyyyyy' ),
( '8', 'Huixquilucan', 'Sistemas', '5540907500', '5540907500', 'Rogelio Gutierrez chicho', './vistas/assets/uploads/verif63348e28cbfc2/131048-gafete_Rogelio.jpeg', '1', '63348e28cbfc2', './vistas/assets/uploads/verif63348e28cbfc2/63348e28cbfc2.png', 'http://189.192.220.2:8080/verificadores/public/index.php?token=63348e28cbfc2', '2022-09-28 13:10:48', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-28 13:11:52', '0', '1', 'Raul Quintanar Casillas' ),
( '9', 'Otros', 'GOBIERNO FEDERAL', '5564978566', '5546210022', 'SAMAEL TORNEO REGINA', './vistas/assets/uploads/verif63348f0c030ba/131436-gafete.jpg', '1', '63348f0c030ba', './vistas/assets/uploads/verif63348f0c030ba/63348f0c030ba.png', 'http://189.192.220.2:8080/verificadores/public/index.php?token=63348f0c030ba', '2022-09-28 13:14:36', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-28 14:17:54', '0', '2', 'JUAN PEREZ PEREZ' ),
( '10', 'Huixquilucan', 'Gobierno', '5546458478', '5546987541', 'Pedro Perez Perez', './vistas/assets/uploads/verif6335e3729dda1/132658-gafete.jpg', '1', '6335e3729dda1', './vistas/assets/uploads/verif6335e3729dda1/6335e3729dda1.png', 'http://10.100.23.68/verificadores/public/index.php?token=6335e3729dda1', '2022-09-29 13:26:58', 'dfc5552ba90c56fe61b07a58e20360b7f91039b559842d7f1d8c7d599df49131', '2022-09-29 13:26:58', '0', '0', 'GObierno Jefe de gobierno' );
COMMIT;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------



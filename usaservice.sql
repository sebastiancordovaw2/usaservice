
#tabla para almacenar las regiones
CREATE TABLE `regions` (
  `id_region` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

#inserts de regiones
INSERT INTO `regions` (`name`) VALUES
  ('Región de Arica y Parinacota'),
  ('Región de Tarapacá'),
  ('Región de Antofagasta'),
  ('Región de Atacama'),
  ('Región de Coquimbo'),
  ('Región de Valparaíso'),
  ('Región Metropolitana de Santiago'),
  ('Región del Libertador General Bernardo O\'Higgins'),
  ('Región del Maule'),
  ('Región de Ñuble'),
  ('Región del Biobío'),
  ('Región de La Araucanía'),
  ('Región de Los Ríos'),
  ('Región de Los Lagos'),
  ('Región Aysén del General Carlos Ibáñez del Campo'),
  ('Región de Magallanes y de la Antártica Chilena');

#tabla para almacenar las comunas/ciudades
CREATE TABLE `cities` (
  `id_city` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_region` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_city`),
  KEY `FK_cities_regions` (`id_region`),
  CONSTRAINT `FK_cities_regions` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id_region`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#inserts de comunas/ciudades
INSERT INTO `cities` (`name`, `id_region`) VALUES
('Santiago', 7),
('Valparaíso', 6),
('La Serena', 5),
('Antofagasta', 3),
('Puerto Montt', 14),
('Punta Arenas', 16),
('Arica', 1),
('Iquique', 2),
('Rancagua', 8),
('Talca', 9),
('Concepción', 11),
('Temuco', 12),
('Coyhaique', 15);

#tabla para almacenar los candidatos
CREATE TABLE `candidato` (
  `id_candidato` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_city` INT(10) UNSIGNED NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `partido_politico` VARCHAR(50) NOT NULL,
  `fecha_de_nacimiento` DATE,
  `cargo_postulado` VARCHAR(50),
  `biografia` TEXT,
  `foto_url` VARCHAR(255),
  `sitio_web` VARCHAR(255),
  `email` VARCHAR(100),
  `telefono` VARCHAR(20),
  PRIMARY KEY (`id_candidato`),
  KEY `FK_candidato_cities` (`id_city`),
  CONSTRAINT `FK_candidato_cities` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#inserts de candidatos
INSERT INTO `candidato` (`id_city`, `nombre`, `partido_politico`, `fecha_de_nacimiento`, `cargo_postulado`, `biografia`, `foto_url`, `sitio_web`, `email`, `telefono`) VALUES
(1, 'Juan Pérez', 'Partido de la Esperanza', '1980-05-15', 'Alcalde', 'Juan Pérez ha servido en el concejo municipal durante 10 años, abogando por la educación y la infraestructura verde.', 'https://example.com/fotos/juanperez.jpg', 'https://juanperez.com', 'juan.perez@example.com', '555-1234'),
(1, 'Marta Sánchez', 'Partido Verde', '1975-09-25', 'Concejala', 'Marta Sánchez es una activista ambiental reconocida, con una fuerte pasión por cambiar las políticas urbanas para un futuro sostenible.', 'https://example.com/fotos/martasanchez.jpg', 'https://martasanchez.com', 'marta.sanchez@example.com', '555-5678'),
(2, 'Carlos Rodríguez', 'Partido de la Innovación', '1985-11-30', 'Diputado', 'Con una carrera en tecnología y innovación, Carlos busca llevar su experiencia al gobierno para promover la adopción de tecnologías sostenibles.', 'https://example.com/fotos/carlosrodriguez.jpg', 'https://carlosrodriguez.com', 'carlos.rodriguez@example.com', '555-9012'),
(3, 'Elena Mora', 'Partido Progresista', '1978-03-22', 'Senadora', 'Elena ha dedicado su carrera a la lucha por los derechos sociales y la igualdad, con especial enfoque en la educación pública de calidad.', 'https://example.com/fotos/elenamora.jpg', 'https://elenamora.com', 'elena.mora@example.com', '555-2345'),
(4, 'Roberto Díaz', 'Partido Liberal', '1982-07-04', 'Consejal', 'Roberto es un empresario local que busca llevar su experiencia en negocios al desarrollo económico y la creación de empleos en Antofagasta.', 'https://example.com/fotos/robertodiaz.jpg', 'https://robertodiaz.com', 'roberto.diaz@example.com', '555-6789'),
(5, 'Lucía Fernández', 'Partido Independiente', '1989-12-13', 'Alcaldesa', 'Lucía es arquitecta y ha liderado varios proyectos de desarrollo urbano sostenible. Su visión es transformar Temuco en un modelo de sostenibilidad.', 'https://example.com/fotos/luciafernandez.jpg', 'https://luciafernandez.com', 'lucia.fernandez@example.com', '555-3456'),
(6, 'Andrés Solar', 'Unión Centrista', '1972-08-30', 'Intendente', 'Con una larga trayectoria en la administración pública, Andrés busca promover el desarrollo regional equilibrado, con énfasis en la inclusión social y la inversión en infraestructura.', 'https://example.com/fotos/andressolar.jpg', 'https://andressolar.com', 'andres.solar@example.com', '555-4567'),
(7, 'Sofía Castillo', 'Movimiento Innovador', '1986-11-20', 'Diputada', 'Sofía es una joven abogada comprometida con la defensa de los derechos civiles y la transparencia gubernamental. Su campaña se centra en la educación y la salud pública.', 'https://example.com/fotos/sofiacastillo.jpg', 'https://sofiacastillo.com', 'sofia.castillo@example.com', '555-7890'),
(8, 'Mario Gutiérrez', 'Partido de la Gente', '1980-02-17', 'Alcalde', 'Mario ha trabajado en el sector social por más de 15 años, enfocándose en programas de vivienda y desarrollo comunitario. Se presenta como un candidato del pueblo para el pueblo.', 'https://example.com/fotos/mariogutierrez.jpg', 'https://mariogutierrez.com', 'mario.gutierrez@example.com', '555-0123'),
(9, 'Cecilia Oyarzo', 'Partido Ecológico', '1988-04-16', 'Concejala', 'Cecilia, con formación en biología marina, se dedica a la conservación del medio ambiente y al desarrollo sustentable de Punta Arenas, enfocándose en la protección de la biodiversidad local.', 'https://example.com/fotos/ceciliaoyarzo.jpg', 'https://ceciliaoyarzo.com', 'cecilia.oyarzo@example.com', '555-6789'),
(10, 'Rodrigo Vargas', 'Partido de la Reforma', '1970-12-25', 'Senador', 'Rodrigo ha servido como abogado de derechos humanos por más de dos décadas. Su campaña se centra en la reforma judicial y la garantía de derechos fundamentales para todos los ciudadanos de Valdivia.', 'https://example.com/fotos/rodrigovargas.jpg', 'https://rodrigovargas.com', 'rodrigo.vargas@example.com', '555-1234'),
(11, 'Ana María López', 'Partido Social', '1992-07-03', 'Diputada', 'Ana María es una activista social y política, con un fuerte enfoque en la igualdad de género y la justicia social. Representa una nueva generación política en Arica, promoviendo políticas inclusivas y equitativas.', 'https://example.com/fotos/anamarialopez.jpg', 'https://anamarialopez.com', 'ana.lopez@example.com', '555-4321'),
(12, 'Laura Espinoza', 'Partido Innovación Nacional', '1983-09-19', 'Gobernadora Regional', 'Laura es ingeniera civil con un máster en gestión pública. Se enfoca en el desarrollo sustentable y la innovación tecnológica para el crecimiento de Coyhaique.', 'https://example.com/fotos/lauraespinoza.jpg', 'https://lauraespinoza.com', 'laura.espinoza@example.com', '555-9876'),
(13, 'Manuel Torres', 'Partido Democrático', '1975-06-11', 'Alcalde', 'Manuel ha dedicado su carrera a la educación y el desarrollo comunitario en Iquique, promoviendo proyectos de inclusión y mejoramiento urbano.', 'https://example.com/fotos/manueltorres.jpg', 'https://manueltorres.com', 'manuel.torres@example.com', '555-6543');

#almacenar los datos de las personas votan
CREATE TABLE personas (
  `id_persona` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `apellido` VARCHAR(50) NOT NULL,
  `alias` VARCHAR(50),
  `rut` VARCHAR(12) NOT NULL UNIQUE,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `id_city` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `FK_personas_cities` (`id_city`),
  CONSTRAINT `FK_personas_cities` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#almacenar los datos de las votaciones (rut como campo único)
CREATE TABLE votacion (
  `id_votacion` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_candidato` INT(10) UNSIGNED NOT NULL,
  `id_persona` INT(10) UNSIGNED NOT NULL,
  `web` BOOLEAN NOT NULL DEFAULT FALSE,
  `tv` BOOLEAN NOT NULL DEFAULT FALSE,
  `redes_sociales` BOOLEAN NOT NULL DEFAULT FALSE,
  `amigo` BOOLEAN NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`id_votacion`),
  UNIQUE KEY `UNIQUE_relation` (`id_candidato`, `id_persona`),
  KEY `FK_votacion_candidato` (`id_candidato`),
  KEY `FK_votacion_persona` (`id_persona`),
  CONSTRAINT `FK_votacion_candidato` FOREIGN KEY (`id_candidato`) REFERENCES `candidato` (`id_candidato`),
  CONSTRAINT `FK_votacion_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Volcando datos para la tabla capacitaciones.items: ~1 rows (aproximadamente)
INSERT INTO `items` (`id`, `nombre`) VALUES
	(1, 'Tipo de accion de capacitación');
-- Volcando datos para la tabla capacitaciones.respuestas: ~5 rows (aproximadamente)
INSERT INTO `respuestas` (`id`, `nombre`) VALUES
	(1, 'Curso'),
	(2, 'Taller'),
	(3, 'Dimoplado'),
	(4, 'Pasantia'),
	(5, 'Seminarios');
-- Volcando datos para la tabla capacitaciones.item_respuesta: ~5 rows (aproximadamente)
INSERT INTO `item_respuesta` (`item_id`, `respuesta_id`, `valor`) VALUES
	(1, 1, '1'),
	(1, 2, '2'),
	(1, 3, '3'),
	(1, 4, '4'),
	(1, 5, '5');
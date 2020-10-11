<?php namespace App\Database\Seeds;

class MunicipioSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->disableForeignKeyChecks;

        // usando Queries simples
        $this->db->execute("DELETE FROM municipio");
        $this->db->execute("ALTER TABLE municipio AUTO_INCREMENT = 1");
        $this->db->execute("
            INSERT INTO `municipio` (`id`, `descripcion`, `estado`, `id_departamento`) VALUES
            (1, 'GUATEMALA', 1, 14),
            (2, 'SANTA CATARINA PINULA', 1, 14),
            (3, 'SAN JOSÉ PINULA', 1, 14),
            (4, 'SAN JOSÉ DEL GOLFO', 1, 14),
            (5, 'PALENCIA', 1, 14),
            (6, 'CHINAUTLA', 1, 14),
            (7, 'SAN PEDRO AYAMPUC', 1, 14),
            (8, 'MIXCO', 1, 14),
            (9, 'SAN PEDRO SACATEPÉQUEZ', 1, 14),
            (10, 'SAN JUAN SACATEPÉQUEZ', 1, 14),
            (11, 'SAN RAYMUNDO', 1, 14),
            (12, 'CHUARRANCHO', 1, 14),
            (13, 'FRAIJANES', 1, 14),
            (14, 'AMATITLÁN', 1, 14),
            (15, 'VILLA NUEVA', 1, 14),
            (16, 'VILLA CANALES', 1, 14),
            (17, 'PETAPA', 1, 14),
            (18, 'EL JÍCARO', 1, 18),
            (19, 'GUASTATOYA', 1, 18),
            (20, 'MORAZÁN', 1, 18),
            (21, 'SANARATE', 1, 18),
            (22, 'SANSARE', 1, 18),
            (23, 'SAN AGUSTÍN ACASAGUASTLÁN', 1, 18),
            (24, 'SAN ANTONIO LA PAZ', 1, 18),
            (25, 'SAN CRISTÓBAL ACASAGUASTLÁN', 1, 18),
            (26, 'CABAÑAS', 1, 11),
            (27, 'ESTANZUELA', 1, 11),
            (28, 'GUALÁN', 1, 11),
            (29, 'HUITÉ', 1, 11),
            (30, 'LA UNIÓN', 1, 11),
            (31, 'RÍO HONDO', 1, 11),
            (32, 'SAN DIEGO', 1, 11),
            (33, 'SAN JORGE', 1, 11),
            (34, 'TECULUTÁN', 1, 11),
            (35, 'USUMATLÁN', 1, 11),
            (36, 'ZACAPA', 1, 11),
            (37, 'JALAPA', 1, 15),
            (38, 'MATAQUESCUINTLA', 1, 15),
            (39, 'MONJAS', 1, 15),
            (40, 'SAN CARLOS ALZATATE', 1, 15),
            (41, 'SAN LUIS JILOTEPEQUE', 1, 15),
            (42, 'SAN PEDRO PINULA', 1, 15),
            (43, 'SAN MANUEL CHAPARRÓN', 1, 15),
            (44, 'AGUA BLANCA', 1, 8),
            (45, 'ASUNCIÓN MITA', 1, 8),
            (46, 'ATESCATEMPA', 1, 8),
            (47, 'COMAPA', 1, 8),
            (48, 'CONGUACO', 1, 8),
            (49, 'EL ADELANTO', 1, 8),
            (50, 'EL PROGRESO', 1, 8),
            (51, 'JALPATAGUA', 1, 8),
            (52, 'JEREZ', 1, 8),
            (53, 'JUTIAPA', 1, 8),
            (54, 'MOYUTA', 1, 8),
            (55, 'PASACO', 1, 8),
            (56, 'QUESADA', 1, 8),
            (57, 'SAN JOSÉ ACATEMPA', 1, 8),
            (58, 'SANTA CATARINA MITA', 1, 8),
            (59, 'YUPILTEPEQUE', 1, 8),
            (60, 'ZAPOTITLÁN', 1, 8),
            (61, 'COBÁN', 1, 3),
            (62, 'SAN PEDRO CARCHÁ', 1, 3),
            (63, 'SAN JUAN CHAMELCO', 1, 3),
            (64, 'SAN CRISTÓBAL VERAPAZ', 1, 3),
            (65, 'TACTIC', 1, 3),
            (66, 'TUCURU', 1, 3),
            (67, 'TAMAHÚ', 1, 3),
            (68, 'PANZÓS', 1, 3),
            (69, 'SENAHÚ', 1, 3),
            (70, 'CAHABÓN', 1, 3),
            (71, 'LANQUÍN', 1, 3),
            (72, 'CHAHAL', 1, 3),
            (73, 'FRAY BARTOLOMÉ DE LAS CASAS', 1, 3),
            (74, 'CHISEC', 1, 3),
            (75, 'SANTA CRUZ VERAPAZ', 1, 3),
            (76, 'SANTA CATALINA LA TINTA', 1, 3),
            (77, 'RAXRUHÁ', 1, 3),
            (78, 'CUBULCO', 1, 9),
            (79, 'SANTA CRUZ EL CHOL', 1, 9),
            (80, 'GRANADOS', 1, 9),
            (81, 'PURULHÁ', 1, 9),
            (82, 'RABINAL', 1, 9),
            (83, 'SALAMÁ', 1, 9),
            (84, 'SAN MIGUEL CHICAJ', 1, 9),
            (85, 'SAN JERÓNIMO', 1, 9),
            (86, 'ALMOLONGA', 1, 17),
            (87, 'CABRICÁN', 1, 17),
            (88, 'CAJOLÁ', 1, 17),
            (89, 'CANTEL', 1, 17),
            (90, 'COATEPEQUE', 1, 17),
            (91, 'COLOMBA', 1, 17),
            (92, 'CONCEPCIÓN CHIQUIRICHAPA', 1, 17),
            (93, 'EL PALMAR', 1, 17),
            (94, 'FLORES COSTA CUCA', 1, 17),
            (95, 'GÉNOVA', 1, 17),
            (96, 'HUITÁN', 1, 17),
            (97, 'LA ESPERANZA', 1, 17),
            (98, 'OLINTEPEQUE', 1, 17),
            (99, 'PALESTINA DE LOS ALTOS', 1, 17),
            (100, 'QUETZALTENANGO', 1, 17),
            (101, 'SALCAJÁ', 1, 17),
            (102, 'ÉCIJA', 1, 17),
            (103, 'SAN CARLOS ÉCIJA', 1, 17),
            (104, 'SAN JUAN OSTUNCALCO', 1, 17),
            (105, 'SAN FRANCISCO LA UNIÓN', 1, 17),
            (106, 'SAN MARTÍN SACATEPÉQUEZ', 1, 17),
            (107, 'SAN MATEO', 1, 17),
            (108, 'SAN MIGUEL SIGÜILÁ', 1, 17),
            (109, 'SIBILIA', 1, 17),
            (110, 'ZUNIL', 1, 17),
            (111, 'SOLOLÁ', 1, 20),
            (112, 'CONCEPCIÓN', 1, 20),
            (113, 'NAHUALÁ', 1, 20),
            (114, 'PANAJACHEL', 1, 20),
            (115, 'SAN ANDRÉS SEMETABAJ', 1, 20),
            (116, 'SAN ANTONIO PALOPÓ', 1, 20),
            (117, 'SAN JOSÉ CHACAYÁ', 1, 20),
            (118, 'SAN JUAN LA LAGUNA', 1, 20),
            (119, 'SAN LUCAS TOLIMÁN', 1, 20),
            (120, 'SAN MARCOS LA LAGUNA', 1, 20),
            (121, 'SAN PABLO LA LAGUNA', 1, 20),
            (122, 'SAN PEDRO LA LAGUNA', 1, 20),
            (123, 'SANTA CATARINA IXTAHUACÁN', 1, 20),
            (124, 'SANTA CATARINA PALOPÓ', 1, 20),
            (125, 'SANTA CLARA LA LAGUNA', 1, 20),
            (126, 'SANTA CRUZ LA LAGUNA', 1, 20),
            (127, 'SANTA LUCÍA UTATLÁN', 1, 20),
            (128, 'SANTA MARÍA VISITACIÓN', 1, 20),
            (129, 'SANTIAGO ATITLÁN', 1, 20),
            (130, 'PUERTO BARRIOS', 1, 2),
            (131, 'LIVINGSTON', 1, 2),
            (132, 'EL ESTOR', 1, 2),
            (133, 'MORALES', 1, 2),
            (134, 'LOS AMATES', 1, 2),
            (135, 'DOLORES', 1, 1),
            (136, 'FLORES', 1, 1),
            (137, 'SANTA ELENA DE LA CRUZ', 1, 1),
            (138, 'LA LIBERTAD', 1, 1),
            (139, 'MELCHOR DE MENCOS', 1, 1),
            (140, 'POPTÚN', 1, 1),
            (141, 'SAN ANDRÉS', 1, 1),
            (142, 'SAN BENITO', 1, 1),
            (143, 'SAN FRANCISCO', 1, 1),
            (144, 'SAN JOSÉ', 1, 1),
            (145, 'SAN LUIS', 1, 1),
            (146, 'SANTA ANA', 1, 1),
            (147, 'SAYAXCHÉ', 1, 1),
            (148, 'LAS CRUCES', 1, 1),
            (149, 'EL CHAL', 1, 1),
            (150, 'SANTA CRUZ DEL QUICHÉ', 1, 4),
            (151, 'CANILLÁ', 1, 4),
            (152, 'CHAJUL', 1, 4),
            (153, 'CHIMACÁN', 1, 4),
            (154, 'QUICHÉ', 1, 4),
            (155, 'CHICHICASTENANGO', 1, 4),
            (156, 'CHINIQUE', 1, 4),
            (157, 'CUNÉN', 1, 4),
            (158, 'JOYABAJ', 1, 4),
            (159, 'NEBAJ', 1, 4),
            (160, 'PACHALUM', 1, 4),
            (161, 'PATZITÉ', 1, 4),
            (162, 'PLAYA GRANDE-IXCÁN', 1, 4),
            (163, 'SACAPULAS', 1, 4),
            (164, 'SAN ANDRÉS SAJCABAJÁ', 1, 4),
            (165, 'SAN ANTONIO ILOTENANGO', 1, 4),
            (166, 'SAN BARTOLOMÉ JOCOTENANGO', 1, 4),
            (167, 'SAN JUAN COTZAL', 1, 4),
            (168, 'SAN PEDRO JOCOPILAS', 1, 4),
            (169, 'USPATÁN', 1, 4),
            (170, 'ZACUALPA', 1, 4),
            (171, 'SAN MARCOS (SAN MARCOS)', 1, 7),
            (172, 'AYUTLA', 1, 7),
            (173, 'CATARINA', 1, 7),
            (174, 'COMITANCILLO', 1, 7),
            (175, 'CONCEPCIÓN TUTUAPA', 1, 7),
            (176, 'EL QUETZAL', 1, 7),
            (177, 'EL RODEO', 1, 7),
            (178, 'EL TUMBADOR', 1, 7),
            (179, 'IXCHIGUÁN', 1, 7),
            (180, 'LA REFORMA', 1, 7),
            (181, 'MALACATÁN', 1, 7),
            (182, 'NUEVO PROGRESO', 1, 7),
            (183, 'OCÓS', 1, 7),
            (184, 'PAJAPITA', 1, 7),
            (185, 'ESQUIPULAS PALO GORDO', 1, 7),
            (186, 'SAN ANTONIO SACATEPÉQUEZ', 1, 7),
            (187, 'SAN CRISTÓBAL CUCHO', 1, 7),
            (188, 'SAN JOSÉ OJETENAM', 1, 7),
            (189, 'SAN LORENZO', 1, 7),
            (190, 'SAN MIGUEL IXTAHUACÁN', 1, 7),
            (191, 'SAN PABLO', 1, 7),
            (192, 'SAN PEDRO SACATEPÉQUEZ', 1, 7),
            (193, 'SAN RAFAEL PIE DE LA CUESTA', 1, 7),
            (194, 'SIBINAL', 1, 7),
            (195, 'SIPACAPA', 1, 7),
            (196, 'TACANÁ', 1, 7),
            (197, 'TAJUMULCO', 1, 7),
            (198, 'TEJUTLA', 1, 7),
            (199, 'RÍO BLANCO', 1, 7),
            (200, 'LA BLANCA', 1, 7),
            (201, 'AYARZA', 1, 10),
            (202, 'BARBERENA', 1, 10),
            (203, 'CASILLAS', 1, 10),
            (204, 'CHIQUIMULILLA', 1, 10),
            (205, 'CUILAPA', 1, 10),
            (206, 'GUAZACAPÁN', 1, 10),
            (207, 'MONTERRICO', 1, 10),
            (208, 'NUEVA SANTA ROSA', 1, 10),
            (209, 'ORATORIO', 1, 10),
            (210, 'PUEBLO NUEVO VIÑAS', 1, 10),
            (211, 'SAN JUAN TECUACO', 1, 10),
            (212, 'SAN RAFAEL LAS FLORES', 1, 10),
            (213, 'SANTA CRUZ NARANJO', 1, 10),
            (214, 'SANTA MARÍA IXHUATÁN', 1, 10),
            (215, 'SANTA ROSA DE LIMA', 1, 10),
            (216, 'TAXISCO', 1, 10),
            (217, 'MOMOSTENANGO', 1, 21),
            (218, 'SAN ANDRÉS XECUL', 1, 21),
            (219, 'SAN BARTOLO', 1, 21),
            (220, 'SAN CRISTÓBAL TOTONICAPÁN', 1, 21),
            (221, 'SAN FRANCISCO EL ALTO', 1, 21),
            (222, 'SANTA LUCÍA LA REFORMA', 1, 21),
            (223, 'SANTA MARÍA CHIQUIMULA', 1, 21),
            (224, 'TOTONICAPÁN', 1, 21),
            (225, 'CHIMALTENANGO', 1, 16),
            (226, 'SAN JOSÉ POAQUÍL', 1, 16),
            (227, 'SAN MARTÍN JILOTEPEQUE', 1, 16),
            (228, 'SANTA APOLONIA', 1, 16),
            (229, 'TECPÁN GUATEMALA', 1, 16),
            (230, 'PATZÚN', 1, 16),
            (231, 'POCHUTA', 1, 16),
            (232, 'PATZICÍA', 1, 16),
            (233, 'SANTA CRUZ BALANYÁ', 1, 16),
            (234, 'ACATENANGO', 1, 16),
            (235, 'SAN PEDRO YEPOCAPA', 1, 16),
            (236, 'SAN ANDRÉS ITZAPA', 1, 16),
            (237, 'PARRAMOS', 1, 16),
            (238, 'ZARAGOZA', 1, 16),
            (239, 'EL TEJAR', 1, 16),
            (240, 'CHIQUIMULA', 1, 13),
            (241, 'JOCOTÁN', 1, 13),
            (242, 'ESQUIPULAS', 1, 13),
            (243, 'CAMOTÁN', 1, 13),
            (244, 'QUETZALTEPEQUE', 1, 13),
            (245, 'OLOPA', 1, 13),
            (246, 'IPALA', 1, 13),
            (247, 'SAN JUAN ERMITA', 1, 13),
            (248, 'CONCEPCIÓN LAS MINAS', 1, 13),
            (249, 'SAN JACINTO', 1, 13),
            (250, 'SAN JOSÉ LA ARADA', 1, 13),
            (251, 'ESCUINTLA (MUNICIPIO)', 1, 6),
            (252, 'SANTA LUCÍA COTZUMALGUAPA', 1, 6),
            (253, 'LA DEMOCRACIA', 1, 6),
            (254, 'SIQUINALÁ', 1, 6),
            (255, 'MASAGUA', 1, 6),
            (256, 'TIQUISATE', 1, 6),
            (257, 'LA GOMERA', 1, 6),
            (258, 'GUAGANAZAPA', 1, 6),
            (259, 'SAN JOSÉ', 1, 6),
            (260, 'IZTAPA', 1, 6),
            (261, 'PALÍN', 1, 6),
            (262, 'SAN VICENTE PACAYA', 1, 6),
            (263, 'NUEVA CONCEPCIÓN', 1, 6),
            (264, 'HUEHUETENANGO', 1, 5),
            (265, 'CHIANTLA', 1, 5),
            (266, 'MALACATANCITO', 1, 5),
            (267, 'CUILCO', 1, 5),
            (268, 'NENTÓN', 1, 5),
            (269, 'SAN PEDRO NECTA', 1, 5),
            (270, 'JACALTENANGO', 1, 5),
            (271, 'SOLOMA', 1, 5),
            (272, 'IXTAHUACÁN', 1, 5),
            (273, 'SANTA BÁRBARA', 1, 5),
            (274, 'LA LIBERTAD', 1, 5),
            (275, 'LA DEMOCRACIA', 1, 5),
            (276, 'SAN MIGUEL ACATÁN', 1, 5),
            (277, 'SAN RAFAEL LA INDEPENDENCIA', 1, 5),
            (278, 'TODOS SANTOS CUCHUMATÁN', 1, 5),
            (279, 'SAN JUAN ATITLÁN', 1, 5),
            (280, 'SANTA EULALIA', 1, 5),
            (281, 'SAN MATEO IXTATÁN', 1, 5),
            (282, 'COLOTENANGO', 1, 5),
            (283, 'SAN SEBASTIAN HUEHUETENANGO', 1, 5),
            (284, 'TECTITÁN', 1, 5),
            (285, 'CONCEPCIÓN HUISTA', 1, 5),
            (286, 'SAN JUAN IXCOY', 1, 5),
            (287, 'SAN ANTONIO HUISTA', 1, 5),
            (288, 'SANTA CRUZ BARILLAS', 1, 5),
            (289, 'SAN SEBASTIÁN COATÁN', 1, 5),
            (290, 'AGUACATÁN', 1, 5),
            (291, 'SAN RAFAEL PETZAL', 1, 5),
            (292, 'SAN GASPAR IXCHIL', 1, 5),
            (293, 'SANTIAGO CHIMALTENANGO', 1, 5),
            (294, 'SANTA ANA HUISTA', 1, 5),
            (295, 'UNIÓN CANTINIL', 1, 5),
            (296, 'CHAMPERICO', 1, 19),
            (297, 'EL ASINTAL', 1, 19),
            (298, 'NUEVO SAN CARLOS', 1, 19),
            (299, 'RETALHULEU', 1, 19),
            (300, 'SAN ANDRÉS VILLA SECA', 1, 19),
            (301, 'SAN FELIPE', 1, 19),
            (302, 'SAN MARTÍN ZAPOTITLÁN', 1, 19),
            (303, 'SAN SEBASTIÁN', 1, 19),
            (304, 'SANTA CRUZ MULUÁ', 1, 19),
            (305, 'ALOTENANGO', 1, 22),
            (306, 'LA ANTIGUA GUATEMALA', 1, 22),
            (307, 'CIUDAD VIEJA', 1, 22),
            (308, 'JOCOTENANGO', 1, 22),
            (309, 'MAGDALENA MILPAS ALTAS', 1, 22),
            (310, 'PASTORES', 1, 22),
            (311, 'SAN ANTONIO AGUAS CALIENTES', 1, 22),
            (312, 'SAN BARTOLOMÉ MILPAS ALTAS', 1, 22),
            (313, 'SAN LUCAS SACATEPÉQUEZ', 1, 22),
            (314, 'SAN MIGUEL DUEÑAS', 1, 22),
            (315, 'SANTA CATARINA BARAHONA', 1, 22),
            (316, 'SANTA LUCÍA MILPAS ALTAS', 1, 22),
            (317, 'SANTA MARÍA DE JESÚS', 1, 22),
            (318, 'SANTIAGO SACATEPÉQUEZ', 1, 22),
            (319, 'SANTO DOMINGO XENACOJ', 1, 22),
            (320, 'SUMPANGO', 1, 22),
            (321, 'CHICACAO', 1, 12),
            (322, 'CUYOTENANGO', 1, 12),
            (323, 'MAZATENANGO', 1, 12),
            (324, 'PATULUL', 1, 12),
            (325, 'PUEBLO NUEVO', 1, 12),
            (326, 'RÍO BRAVO', 1, 12),
            (327, 'SAMAYAC', 1, 12),
            (328, 'SAN ANTONIO SUCHITEPÉQUEZ', 1, 12),
            (329, 'SAN BERNARDINO', 1, 12),
            (330, 'SAN FRANCISCO ZAPOTITLÁN', 1, 12),
            (331, 'SAN GABRIEL', 1, 12),
            (332, 'SAN JOSÉ EL ÍDOLO', 1, 12),
            (333, 'SAN JOSÉ LA MÁQUINA', 1, 12),
            (334, 'SAN JUAN BAUTISTA', 1, 12),
            (335, 'SAN LORENZO', 1, 12),
            (336, 'SAN MIGUEL PANÁN', 1, 12),
            (337, 'SAN PABLO JOCOPILAS', 1, 12),
            (338, 'SANTA BÁRBARA', 1, 12),
            (339, 'SANTO DOMINGO SUCHITEPÉQUEZ', 1, 12),
            (340, 'SANTO TOMÁS LA UNIÓN', 1, 12),
            (341, 'ZUNILITO', 1, 12);
        ");

        $this->db->enableForeignKeyChecks;
    }
}
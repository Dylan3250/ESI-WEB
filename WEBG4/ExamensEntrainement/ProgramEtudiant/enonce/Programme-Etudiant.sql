/* ============================================
 * DDL de création de la BD + valeurs de départ
 * ============================================
 */
 
/* Suppression des tables si BD existe deja */

DROP TABLE IF EXISTS Program;
DROP TABLE IF EXISTS Course;
DROP TABLE IF EXISTS Student;

/* Creation des tables */

CREATE TABLE Course (
     id      VARCHAR(10) NOT NULL,
     title   VARCHAR(50) NOT NULL,
     credits NUMERIC(2)  NOT NULL,
     CONSTRAINT CoursePK PRIMARY KEY (id)
);

CREATE TABLE Student (
     id      NUMERIC(10) NOT NULL,
     name    VARCHAR(20) NOT NULL,
     CONSTRAINT StudentPK PRIMARY KEY (id)
);

CREATE TABLE Program (
     id      int NOT NULL AUTO_INCREMENT,
     student NUMERIC(10) NOT NULL,
     course  VARCHAR(10) NOT NULL,
     CONSTRAINT ProgramPK PRIMARY KEY (id),
     CONSTRAINT StudentFK FOREIGN KEY (student) REFERENCES Student(id),
     CONSTRAINT CourseFK  FOREIGN KEY (course)  REFERENCES Course(id)
);
	
/* Remplissage des tables */

INSERT INTO Course VALUES ('INT1','Introductions', 10);
INSERT INTO Course VALUES ('DEV1','Développement I', 10);
INSERT INTO Course VALUES ('MAT1','Mathématique contextualisée', 6);
INSERT INTO Course VALUES ('CAI1','Communication anglophone contextualisée I', 2);
INSERT INTO Course VALUES ('CPT1','Comptabilité contextualisée I', 2);
INSERT INTO Course VALUES ('STA2','Statistique contextualisée', 3);
INSERT INTO Course VALUES ('DEV2','Développement II', 10);
INSERT INTO Course VALUES ('DON2','Persistance des données I', 5);
INSERT INTO Course VALUES ('SYS2','Systèmes d"exploitation I', 5);
INSERT INTO Course VALUES ('CAIG3','Communication anglophone contextualisée', 3);
INSERT INTO Course VALUES ('DRTG3','Droit et philosophie contextualisés', 2);

INSERT INTO Student VALUES (1,'Bulbizarre');
INSERT INTO Student VALUES (16,'Roucool');
INSERT INTO Student VALUES (25,'Pikachu');
INSERT INTO Student VALUES (52,'Miaouss');
INSERT INTO Student VALUES (114,'Saquedeneu');
INSERT INTO Student VALUES (128,'Tauros');
INSERT INTO Student VALUES (143,'Ronflex');

INSERT INTO Program VALUES (1, 1, 'INT1');
INSERT INTO Program VALUES (2, 1, 'DEV1');
INSERT INTO Program VALUES (3, 1, 'MAT1');
INSERT INTO Program VALUES (4, 1, 'CAI1');
INSERT INTO Program VALUES (5, 1, 'CPT1');
INSERT INTO Program VALUES (6, 1, 'STA2');
INSERT INTO Program VALUES (7, 1, 'DEV2');
INSERT INTO Program VALUES (8, 1, 'DON2');
INSERT INTO Program VALUES (9, 1, 'SYS2');

INSERT INTO Program VALUES (11, 16, 'INT1');
INSERT INTO Program VALUES (12, 16, 'DEV1');
INSERT INTO Program VALUES (13, 16, 'MAT1');
INSERT INTO Program VALUES (14, 16, 'CAI1');
INSERT INTO Program VALUES (15, 16, 'CPT1');
INSERT INTO Program VALUES (16, 16, 'STA2');
INSERT INTO Program VALUES (17, 16, 'DEV2');
INSERT INTO Program VALUES (18, 16, 'DON2');
INSERT INTO Program VALUES (19, 16, 'SYS2');

INSERT INTO Program VALUES (22, 25, 'DEV1');
INSERT INTO Program VALUES (23, 25, 'MAT1');
INSERT INTO Program VALUES (24, 25, 'CAI1');
INSERT INTO Program VALUES (25, 25, 'CPT1');
INSERT INTO Program VALUES (26, 25, 'STA2');
INSERT INTO Program VALUES (27, 25, 'DEV2');
INSERT INTO Program VALUES (28, 25, 'DON2');
INSERT INTO Program VALUES (29, 25, 'SYS2');
INSERT INTO Program VALUES (30, 25, 'CAIG3');
INSERT INTO Program VALUES (31, 25, 'DRTG3');

INSERT INTO Program VALUES (41, 52, 'INT1');
INSERT INTO Program VALUES (42, 52, 'DEV1');
INSERT INTO Program VALUES (43, 52, 'MAT1');
INSERT INTO Program VALUES (44, 52, 'CAI1');
INSERT INTO Program VALUES (45, 52, 'CPT1');
INSERT INTO Program VALUES (46, 52, 'STA2');
INSERT INTO Program VALUES (47, 52, 'DEV2');
INSERT INTO Program VALUES (48, 52, 'DON2');
INSERT INTO Program VALUES (49, 52, 'SYS2');
INSERT INTO Program VALUES (50, 52, 'CAIG3');
INSERT INTO Program VALUES (51, 52, 'DRTG3');

INSERT INTO Program VALUES (66, 114, 'STA2');
INSERT INTO Program VALUES (67, 114, 'DEV2');
INSERT INTO Program VALUES (68, 114, 'DON2');
INSERT INTO Program VALUES (69, 114, 'SYS2');


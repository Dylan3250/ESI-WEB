insert into Course (id, title, credits) 
values ('INT1', 'Introductions', 10),
('MAT1', 'Mathématiques II', 3),
('CAI1', 'Anglais I', 2),
('DEV1', 'Developpement I', 10),
('DEV2', 'Developpement II', 10),
('WEBG2', 'Developpement Web I', 5);

insert into Student (matricule, genre, name, section) 
values ('54027', 0, 'Dylan BRICAR', 0);

INSERT INTO COURSE_LINKED_STUDENTS (LIKED_COURSES_ID, LINKED_STUDENTS_MATRICULE) VALUES ('INT1', 54027) 
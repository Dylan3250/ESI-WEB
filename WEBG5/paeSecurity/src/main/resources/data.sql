insert into Course (id, title, credits) 
values ('INT1', 'Introductions', 10),
('MAT1', 'Mathématiques II', 3),
('CAI1', 'Anglais I', 2),
('DEV1', 'Developpement I', 10),
('DEV2', 'Developpement II', 10),
('WEBG2', 'Developpement Web I', 5);

insert into Student (matricule, genre, name, section) 
values ('54027', 0, 'Dylan BRICAR', 0);

INSERT INTO COURSE_LINKED_STUDENTS (LIKED_COURSES_ID, LINKED_STUDENTS_MATRICULE) VALUES ('INT1', 54027);

INSERT INTO User (username,password,enabled) values ('mcd','{bcrypt}$2a$10$jsgCoo8raZstxCcAvWIZNuizePs9bL5r.Wm3wdxQjiGKhVjZ6hIz2',true);
INSERT INTO Authority (id,username,authority) values (1,'mcd','PROF');
INSERT INTO User (username,password,enabled) values ('dylan','{noop}dylan',true);
INSERT INTO Authority (id,username,authority) values (2,'dylan','STUDENT');
INSERT INTO User (username,password,enabled) values ('secret','{noop}secret',true);
INSERT INTO Authority (id,username,authority) values (3,'secret','SECRETARIAT');

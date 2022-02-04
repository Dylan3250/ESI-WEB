insert into student (number, name) values ('54027', 'Dylan'), ('53735', 'Bryan');
insert into task (id, description) values (1, 'Exercice 1'), (2, 'Exercice 2'), (3, 'Exercice 3'), (4, 'Exercice 4'), (5, 'Exercice 5');

insert into task_students (tasks_id, students_number) values (1, 54027), (2, 54027), (3, 54027), (4, 54027), (1, 53735);

INSERT INTO User (username,password,enabled) values ('prof', '{noop}prof', true);
INSERT INTO Authority (id,username,authority) values (1, 'prof', 'PROF');


-- SELECT * FROM STUDENT;
-- SELECT * FROM STUDENT_TASKS;
-- SELECT * FROM TASK;
-- SELECT * FROM TASK_STUDENTS;

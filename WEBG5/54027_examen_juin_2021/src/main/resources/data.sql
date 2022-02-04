insert into Member (login, name) values ('54027', 'Dylan'), ('53735', 'Bryan');

insert into Repository (id, name, member_login) values (1, 'Repo de test Dylan', '54027'), (2, 'Repo de test Dylan 2', '54027');

insert into Commit (number, date, message, repository_id) values (1, {ts '2012-09-17 18:47:52.69'}, 'Message du repo de test', 1), (2, {ts '2017-09-19 11:41:51.61'}, 'Message du repo de test 2', 1);

-- SELECT * FROM COMMIT;
-- SELECT * FROM MEMBER;
-- SELECT * FROM REPOSITORY;
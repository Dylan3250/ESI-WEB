DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS chatusers;
DROP TABLE IF EXISTS channels;


CREATE TABLE chatusers (
                           id    INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                           login VARCHAR(10) NOT NULL,
                           displayName VARCHAR(30) NOT NULL
);

CREATE TABLE channels (
                          id   INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(20) NOT NULL,
                          topic VARCHAR(255)
);

CREATE TABLE messages (
                          id       INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          added_on TIMESTAMP,
                          content  TEXT NOT NULL,
                          author_id   INT(6) UNSIGNED NOT NULL,
                          chan_id INT(6) UNSIGNED NOT NULL,
                          FOREIGN KEY fk_author_id(author_id) REFERENCES chatusers(id),
                          FOREIGN KEY fk_chan_id(chan_id) REFERENCES channels(id)
);

INSERT INTO chatusers VALUES (1,"mcd","Codutti");
INSERT INTO chatusers VALUES (2,"nri","Richard");
INSERT INTO chatusers VALUES (3,"g52000","Superman");
INSERT INTO chatusers VALUES (4,"g53000","Batman");

INSERT INTO channels VALUES (21,"webg4", "Tout ce qui concerne l'UE WEBG4");
INSERT INTO channels VALUES (22,"dev1", "À propos de DEV1");
INSERT INTO channels VALUES (23,"général", "Tout ce qui ne va pas ailleurs");

INSERT INTO messages VALUES (10,
                             "2018-11-04 18:43:00",
                             "Bienvenue à tou·te·s",
                             1, 21);

INSERT INTO messages VALUES (11,
                             "2018-11-04 18:44:00",
                             "cc tlm, cmt cv ?",
                             2, 21);

INSERT INTO messages VALUES (12,
                             "2018-11-05 10:03:00",
                             "Quelqu'un aurait vu Robin ?",
                             4, 23);

INSERT INTO messages VALUES (13,
                             "2018-11-05 10:05:22",
                             "Batman: non mais j'ai vu la Batmobile tantôt, c'était pas toi ?",
                             3, 23);

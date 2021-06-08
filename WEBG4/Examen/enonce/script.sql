CREATE TABLE `contributors` (
  `login` varchar(255) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`login`)
);

CREATE TABLE `repositories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `contributor_login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `commits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `repository_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commits_repository_id_foreign` (`repository_id`),
  CONSTRAINT `commits_repository_id_foreign` FOREIGN KEY (`repository_id`) REFERENCES `repositories` (`id`)
);

INSERT INTO contributors (login,name) VALUES
     ('mcd','Marco Codutti pour de faux'),
     ('nri','Nicolas Richard');

INSERT INTO repositories (name,contributor_login) VALUES
     ('PremierDepot','nri'),
     ('SecondDepot','nri'),
     ('PremierDepot de mcd','mcd');

INSERT INTO commits (message,`date`,repository_id) VALUES
     ('Un premier message','2021-05-01',1),
     ('Un second message','2021-05-04',1),
     ('Un message','2021-05-02',3);

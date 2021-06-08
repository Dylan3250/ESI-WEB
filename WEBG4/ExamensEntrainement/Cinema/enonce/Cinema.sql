drop table if exists Shows;

drop table if exists Room;

drop table if exists Film;

create table Room (
     idRoom numeric(10) primary key,
     capacity numeric(4)
);

create table Film (
     idFilm numeric(10) primary key,
     title varchar(100) not null,
     synopsis varchar(500) not null,
     voteCount numeric(4),
     rating numeric(4, 2)
);

create table Shows (
     idShow numeric(10) primary key,
     start datetime not null,
     soldTickets numeric(4),
     idFilm numeric(10),
     idRoom numeric(10),
     foreign key (idFilm) references Film(idFilm),
     foreign key (idRoom) references Room(idRoom)
);

insert into
     Room (idRoom, capacity)
values
     (1, 250),
     (2, 300),
     (3, 150),
     (4, 150),
     (5, 100);

insert into
     Film (idFilm, title, synopsis, voteCount, rating)
values
     (
          1,
          'Robin Hood',
          'A war-hardened Crusader and his Moorish commander mount an audacious revolt against the corrupt English crown in a thrilling action-adventure packed with gritty battlefield exploits, mind-blowing fight choreography, and a timeless romance.',
          90,
          13
     ),
     (
          2,
          'Fantastic Beasts: The Crimes of Grindelwald',
          'The second installment of the Fantastic Beasts series featuring the adventures of Magizoologist Newt Scamander.',
          98,
          11
     ),
     (
          3,
          'Belleville Cop',
          'When a childhood friend from Miami gets killed after he comes to warn of encroaching drug gangs, Baaba moves to Miami and teams up with a local officer to bring down the criminals.',
          99,
          8
     ),
     (
          4,
          'Sink or Swim',
          'It is in the corridors of their municipal swimming pool that Bertrand, Marcus, Simon, Laurent, Thierry and the other train under the authority all comparative of Delphine, former glory of the basins.',
          99,
          14
     ),
     (
          5,
          'Bohemian Rhapsody',
          'A chronicle of the years leading up to Queen''s legendary appearance at the Live Aid (1985) concert.',
          100,
          11
     ),
     (
          6,
          'Nothing to Hide',
          'The time of a diner, couples of friends decide to play a game : each must place his mobile phone in the middle of the table and each Sms, phone call, mail, Facebook message, etc. must be shared with the other. It will not wait long for that this game turns into a nightmare.',
          100,
          15
     );

insert into
     Shows (idShow, start, soldTickets, idFilm, idRoom)
values
     (1, '2020-06-21 16:00:00', 20, 1, 1),
     (2, '2020-06-21 16:00:00', 30, 2, 2),
     (3, '2020-06-21 16:00:00', 40, 3, 3),
     (4, '2020-06-21 16:00:00', 50, 4, 4),
     (5, '2020-06-21 20:00:00', 60, 5, 5),
     (6, '2020-05-04 20:00:00', 70, 1, 1),
     (7, '2020-05-04 20:00:00', 10, 2, 3),
     (8, '2020-05-04 16:00:00', 0, 3, 1),
     (9, '2020-05-04 16:00:00', 20, 4, 1);

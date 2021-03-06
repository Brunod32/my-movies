-- Create Database
CREATE DATABASE my-movies-studi;

-- Create tables
CREATE TABLE movie (
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(180),
    description text,
    image_url text,
    release_date date,
    category_id int
);

CREATE TABLE category (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(80),
    color varchar(30)
);

-- Ajouter clés étrangères
ALTER TABLE movie
   ADD CONSTRAINT FK_category_id FOREIGN KEY (category_id)
      REFERENCES category (id)
;

-- Ajouter un colonne
ALTER TABLE movie
ADD director varchar(120);

-- Insertion données
INSERT INTO 
    category (name, color)
VALUES
    ('Horreur', 'tomato'),
    ('Aventure', 'skyblue'),
    ('Comédie', '#fcba03')
    ('Drame', 'rouge');;

INSERT INTO
    movie (title, description, image_url, release_date, category_id)
VALUES
    ('Avatar', 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre.', 'data:image/jpeg;base64,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', '2009-12-16', '3'),
    ('Titanic', "En 1997, l'épave du Titanic est l'objet d'une exploration fiévreuse, menée par des chercheurs de trésor en quête d'un diamant bleu qui se trouvait à bord. Frappée par un reportage télévisé, l'une des rescapées du naufrage, âgée de 102 ans, Rose DeWitt, se rend sur place et évoque ses souvenirs. 1912. Fiancée à un industriel arrogant, Rose croise sur le bateau un artiste sans le sou.",'https://m.media-amazon.com/images/M/MV5BMDdmZGU3NDQtY2E5My00ZTliLWIzOTUtMTY4ZGI1YjdiNjk3XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_UY1200_CR88,0,630,1200_AL_.jpg', '1998-01-16', '4' );

-- Ajoputer le directeur dans le film en base
UPDATE `movie` SET `director` = 'James Cameron' WHERE `movie`.`id`=1;
UPDATE `movie` SET `director` = 'James Cameron' WHERE `movie`.`id`=2;
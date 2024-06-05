create database hw1;
use hw1;

CREATE TABLE candidatura (
    id integer primary key auto_increment,
    name varchar(16) not null ,
    surname varchar(255) not null,
    data_n date not null ,
    domicilio varchar(255) not null,
    provincia varchar(255) not null,
    telefono varchar(255) not null,
	cittadinanza varchar(255) not null,
    ruolo varchar(255) not null
) Engine = InnoDB;


select * from candidatura;



CREATE TABLE users (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null
) Engine = InnoDB;

select * from users;

CREATE TABLE franchise (
    id integer primary key auto_increment,
    name varchar(16) not null,
    surname varchar(255) not null,
    email varchar(255) not null unique,
    telefono varchar(255) not null,
    regione varchar(255) not null,
    settore varchar(255) not null
) Engine = InnoDB;


select * from franchise;

drop table Prodotti_Ingredienti;
drop table Ingredienti;
drop table Prodotti;

CREATE TABLE prodotti (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_prodotto VARCHAR(255),
    categoria VARCHAR(255),
    prezzo DECIMAL(10, 2),
    immagine_prodotto VARCHAR(255)
);



CREATE TABLE carrello (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_prodotto VARCHAR(255),
    prezzo DECIMAL(10, 2)
);
select * from carrello;

CREATE TABLE ordini (
    id_ordine INT AUTO_INCREMENT PRIMARY KEY,
    costo DECIMAL(10, 2) NOT NULL,
    id_users INT NULL,
    FOREIGN KEY (id_users) REFERENCES users(id) ON DELETE SET NULL
);

select * from ordini;
-- Inserimento di un prodotto
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Classic Original', 'Panini', 5.99, 'image/1411_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Classic Zinger', 'Panini', 5.90, 'image/1426_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Grilled Chicken', 'Panini', 6.10, 'image/1418_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Double Colonel s Burger', 'Panini', 8.40, 'image/1430_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Double Kentucky BBQ & Bacon', 'Panini', 9.50, 'image/1540_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Double Kentucky Cheese and Bacon', 'Panini', 9.50, 'image/1413_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Salsa all aglio', 'Salsa', 0.35, 'image/1184_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Ketchup', 'Salsa', 0.35, 'image/1161_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Maionese', 'Salsa', 0.35, 'image/1160_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Sweet Imperial', 'Salsa', 0.35, 'image/1168_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Pepsi Max', 'Bevande', 3.30, 'image/1141_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Aranciata', 'Bevande', 3.30, 'image/1143_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Sprite', 'Bevande', 3.30, 'image/1145_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Acqua naturale', 'Bevande', 1.50, 'image/1148_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Twister Originale', 'Twister', 5.50, 'image/1356_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Twister Crispy', 'Twister', 5.50, 'image/1357_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Twister Grilled', 'Twister', 5.50, 'image/1353_image_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Twister Crispy', 'Twister', 5.50, 'image/325_thumb_it.png');
INSERT INTO prodotti (nome_prodotto, categoria, prezzo, immagine_prodotto) VALUES ('Acqua', 'Bibita', 1.50, 'image/289_thumb_it.png');

-- Ottieni l'ID del prodotto appena inserito
SET @id_prodotto = LAST_INSERT_ID();



select * from prodotti;

DELETE FROM prodotti WHERE id = 12;
SELECT nome_prodotto, immagine_prodotto, prezzo FROM prodotti;
DELETE FROM prodotti WHERE id = 21;
drop table carrello;

create database registro;

use registro;


CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    imagem varchar(50) NOT NULL
);

CREATE TABLE livros (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    autor varchar(100) NOT NULL,
    paginas int NOT NULL,
    idioma varchar(100) NOT NULL,
    editora varchar(100) NOT NULL,
    tag varchar(100), -- classico / famoso / novo
    imagem varchar(50) not null,
    descricao varchar(1000) not null
);

CREATE TABLE livros_biblioteca(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    autor varchar(100) NOT NULL,
    paginas int NOT NULL,
    idioma varchar(100) NOT NULL,
    editora varchar(100) NOT NULL,
    imagem varchar(50) NOT NULL,
    lidas int,
    estado varchar(50), -- Lido, Lendo, Quero Ler, Abandonado
    notas int,
    id_livr int,
    id_user int

);

ALTER TABLE livros_biblioteca
ADD FOREIGN KEY (id_livr) REFERENCES livros(id),
ADD FOREIGN KEY (id_user) REFERENCES users(id);
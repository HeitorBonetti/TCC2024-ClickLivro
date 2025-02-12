create database registro;

use registro;


CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    imagem varchar(50) NOT NULL
);

CREATE TABLE produtos (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    autor varchar(100) NOT NULL,
    paginas int NOT NULL,
    idioma varchar(100) NOT NULL,
    editora varchar(100) NOT NULL,
    tag varchar(100) NOT NULL, -- classico / famoso / novo
    imagem varchar(50) not null
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
    estado int,
    notas int,
    id_prod int NOT NULL,
    id_user int not null,
    foreign key (id_prod) references produtos(id),
    foreign key (id_user) references users(id)

);
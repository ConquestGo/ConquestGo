create table usuario(
	id int auto_increment primary key,
    nome varchar(200) not null,
    email varchar(200) not null,
    senha varchar(200) not null,
    cpf varchar(200) not null,
    cep varchar(200) not null,
    telefone varchar(200) not null
    );
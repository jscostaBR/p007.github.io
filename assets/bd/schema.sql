CREATE DATABASE IF NOT EXISTS coffee_lover DEFAULT CHARACTER SET latin1;
USE coffee_lover;

CREATE TABLE IF NOT EXISTS tipo_fornecedor(
	tipo_f SMALLINT NOT NULL,
    nome_tipo VARCHAR(25) NOT NULL,
    PRIMARY KEY (tipo_f));
    
CREATE TABLE IF NOT EXISTS fornecedor (
	id_f INT auto_increment NOT NULL,
    nome_f VARCHAR(200) NOT NULL,
	responsavel_f VARCHAR(200) NOT NULL,
    cnpj_f BIGINT NOT NULL,
    endereco_f VARCHAR(150) NOT NULL,
    bairro_f VARCHAR(50),
    cidade_f VARCHAR(50),
    uf_f CHAR(2),
    cep_f INT,
    telefone_f VARCHAR (14) NOT NULL,
    celular_f VARCHAR(14) NOT NULL,
    email_f VARCHAR(200) NOT NULL,
    website_f VARCHAR(200),
    tipo_f SMALLINT NOT NULL,
    cadastro_f DATETIME,
	PRIMARY KEY (id_f),
    UNIQUE INDEX cnpj_f_unique (cnpj_f ASC),
    FOREIGN KEY (tipo_f) REFERENCES tipo_fornecedor(tipo_f));

CREATE TABLE IF NOT EXISTS tipo_uso_torra(
	id_ut INT NOT NULL,
	nome_ut VARCHAR (25) NOT NULL,
	PRIMARY KEY (id_ut)
	);
    
CREATE TABLE IF NOT EXISTS produto (
	id_p INT auto_increment NOT NULL,
    nome_p VARCHAR(200) NOT NULL,
    variedade_p VARCHAR(200) NOT NULL,
    safra_p INT NOT NULL,
    regiao_p VARCHAR(100) NOT NULL,
    produtor_p VARCHAR(100) NOT NULL, -- fazenda ou sítio que produz 
    id_f INT NOT NULL, 
	fazenda_p VARCHAR(200) NOT NULL,
    torra_p VARCHAR(200) NOT NULL,
    pr_sensorial_p TEXT NOT NULL,
    pontuacao VARCHAR(10) NOT NULL,
    rastreio VARCHAR (100) NOT NULL,
    uso_torra_p INT NOT NULL,      -- (1-coado, 2-expresso, 3-coado e expresso)
    preco_100g_p DECIMAL(5,2) NOT NULL,
    preco_250g_p DECIMAL(5,2) NOT NULL,
    preco_kg_p DECIMAL (5,2) NOT NULL,
	PRIMARY KEY (id_p),
	FOREIGN KEY (id_f) REFERENCES fornecedor(id_f),
	FOREIGN KEY (uso_torra_p) REFERENCES tipo_uso_torra(id_ut));


CREATE TABLE IF NOT EXISTS cliente (
	id_c INT auto_increment NOT NULL,
    nome_c VARCHAR(200) NOT NULL,
    cpf_c BIGINT NOT NULL,
    endereco_c VARCHAR(150) NOT NULL,
    bairro_c VARCHAR(50),
    cidade_c VARCHAR(50),
    uf_c CHAR(2),
    cep_c INT,
    telefone_c VARCHAR (14) NOT NULL,
    celular_c VARCHAR(14) NOT NULL,
    email_c VARCHAR(200) NOT NULL,
    PRIMARY KEY (id_c)
	);
    
    
INSERT INTO tipo_fornecedor (tipo_f, nome_tipo) VALUES ('1','Cefeteria');
INSERT INTO tipo_fornecedor (tipo_f, nome_tipo) VALUES ('2','Torrefador');
INSERT INTO tipo_fornecedor (tipo_f, nome_tipo) VALUES ('3','Fazenda/Sítio');

INSERT INTO tipo_uso_torra (id_ut, nome_ut) VALUES (1, 'Coado');
INSERT INTO tipo_uso_torra (id_ut, nome_ut) VALUES (2, 'Expresso');
INSERT INTO tipo_uso_torra (id_ut, nome_ut) VALUES (3, 'coado e expresso');

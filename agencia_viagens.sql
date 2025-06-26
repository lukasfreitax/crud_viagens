CREATE DATABASE agencia_viagens;

USE agencia_viagens;

CREATE TABLE viagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destino VARCHAR(100) NOT NULL,
    codigo_pacote VARCHAR(20) NOT NULL,
    duracao_dias INT NOT NULL,
    quantidade_vagas INT NOT NULL
);


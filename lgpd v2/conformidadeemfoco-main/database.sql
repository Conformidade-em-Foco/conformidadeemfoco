-- Criar tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    tipo ENUM('empresa', 'dpo') NOT NULL,
    data_cadastro DATETIME NOT NULL,
    ultimo_acesso DATETIME
);

-- Criar tabela de empresas
CREATE TABLE IF NOT EXISTS empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    razao_social VARCHAR(255) NOT NULL,
    nome_fantasia VARCHAR(255),
    cnpj VARCHAR(20) NOT NULL UNIQUE,
    setor_atividade VARCHAR(100),
    porte ENUM('micro', 'pequena', 'media', 'grande'),
    numero_funcionarios INT,
    cep VARCHAR(10),
    cidade VARCHAR(100),
    estado CHAR(2),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Criar tabela de DPOs
CREATE TABLE IF NOT EXISTS dpos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nome_completo VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    formacao_academica VARCHAR(255),
    experiencia_anos INT,
    certificacoes TEXT,
    cep VARCHAR(10),
    cidade VARCHAR(100),
    estado CHAR(2),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
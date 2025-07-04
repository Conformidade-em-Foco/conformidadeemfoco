-- Tabela de empresas
CREATE TABLE empresas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    razao_social VARCHAR(255) NOT NULL,
    nome_fantasia VARCHAR(255),
    cnpj VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    setor_atividade VARCHAR(100),
    porte_empresa ENUM('micro', 'pequena', 'media', 'grande') DEFAULT 'micro',
    numero_funcionarios INT DEFAULT 0,
    cidade VARCHAR(100),
    estado VARCHAR(2),
    cep VARCHAR(8),
    senha VARCHAR(255) NOT NULL,
    confirmado BOOLEAN DEFAULT FALSE,
    codigo_confirmacao VARCHAR(6),
    codigo_expiracao DATETIME,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_confirmacao DATETIME NULL
);

-- Tabela de DPOs
CREATE TABLE dpos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_completo VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    formacao_academica VARCHAR(255),
    certificacoes TEXT,
    experiencia_anos INT DEFAULT 0,
    cidade VARCHAR(100),
    estado VARCHAR(2),
    cep VARCHAR(8),
    senha VARCHAR(255) NOT NULL,
    confirmado BOOLEAN DEFAULT FALSE,
    codigo_confirmacao VARCHAR(6),
    codigo_expiracao DATETIME,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_confirmacao DATETIME NULL
);

-- Tabela de avaliações LGPD
CREATE TABLE avaliacoes_lgpd (
    id INT PRIMARY KEY AUTO_INCREMENT,
    empresa_id INT NOT NULL,
    respostas JSON NOT NULL,
    percentual_geral INT NOT NULL,
    nivel_conformidade VARCHAR(50) NOT NULL,
    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id) ON DELETE CASCADE
);

-- Índices para performance
CREATE INDEX idx_empresas_email ON empresas(email);
CREATE INDEX idx_empresas_cnpj ON empresas(cnpj);
CREATE INDEX idx_dpos_email ON dpos(email);
CREATE INDEX idx_dpos_cpf ON dpos(cpf);
CREATE INDEX idx_avaliacoes_empresa ON avaliacoes_lgpd(empresa_id);

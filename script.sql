
CREATE DATABASE IF NOT EXISTS db_petshop_estoque
DEFAULT CHARACTER SET utf8mb4 
DEFAULT COLLATE utf8mb4_unicode_ci;

USE db_petshop_estoque;

CREATE TABLE IF NOT EXISTS funcionarios (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cargo VARCHAR(50) DEFAULT 'Atendente',
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome_categoria VARCHAR(50) NOT NULL UNIQUE,
    descricao VARCHAR(255)
);


CREATE TABLE IF NOT EXISTS produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    marca VARCHAR(50) NOT NULL,
    preco_custo DECIMAL(10, 2) NOT NULL,
    preco_venda DECIMAL(10, 2) NOT NULL,
    quantidade_estoque INT NOT NULL DEFAULT 0,
    estoque_minimo INT NOT NULL DEFAULT 5,
    data_validade DATE NULL, -- Nulo para produtos sem validade (ex: brinquedos)
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS movimentacoes_estoque (
    id_movimentacao INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    id_funcionario INT NOT NULL,
    tipo_operacao ENUM('ENTRADA', 'SAIDA') NOT NULL,
    quantidade INT NOT NULL,
    data_movimentacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    observacao VARCHAR(255),
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto) ON DELETE CASCADE,
    FOREIGN KEY (id_funcionario) REFERENCES funcionarios(id_funcionario) ON DELETE RESTRICT
);



INSERT INTO funcionarios (nome, email, senha, cargo) VALUES
('Carlos Silva', 'carlos@petshop.com', '123456', 'Gerente'),
('Ana Souza', 'ana@petshop.com', '123456', 'Atendente');


INSERT INTO categorias (nome_categoria, descricao) VALUES
('Rações', 'Alimentos secos e úmidos para cães e gatos'),
('Medicamentos', 'Remédios, antipulgas e vitaminas'),
('Brinquedos', 'Bolinhas, mordedores e arranhadores'),
('Acessórios', 'Coleiras, guias e caminhas'),
('Higiene', 'Shampoos, condicionadores e tapetes higiênicos');

INSERT INTO produtos (nome, descricao, marca, preco_custo, preco_venda, quantidade_estoque, estoque_minimo, data_validade, id_categoria) VALUES
('Ração Pedigree Cães Adultos 10kg', 'Ração seca sabor carne e vegetais', 'Pedigree', 65.00, 95.00, 15, 5, '2025-12-31', 1),
('Ração Whiskas Gatos Castrados 3kg', 'Ração seca sabor peixe', 'Whiskas', 35.00, 52.00, 3, 8, '2025-10-15', 1), -- (Abaixo do estoque mínimo!)
('Antipulgas Bravecto Cães 10 a 20kg', 'Comprimido mastigável contra pulgas e carrapatos', 'MSD', 180.00, 240.00, 10, 3, '2026-06-30', 2),
('Mordedor Osso de Borracha', 'Brinquedo resistente para cães de médio porte', 'PetPloy', 8.50, 18.00, 25, 5, NULL, 3),
('Shampoo Neutro Pet Clean 500ml', 'Shampoo higienizador suave para cães e gatos', 'Pet Clean', 12.00, 22.50, 4, 10, '2026-03-20', 5); -- (Abaixo do estoque mínimo!)


INSERT INTO movimentacoes_estoque (id_produto, id_funcionario, tipo_operacao, quantidade, observacao) VALUES
(1, 1, 'ENTRADA', 15, 'Entrada inicial de estoque via nota fiscal'),
(2, 1, 'ENTRADA', 5, 'Entrada inicial de estoque'),
(2, 2, 'SAIDA', 2, 'Venda ao cliente no balcão'),
(3, 1, 'ENTRADA', 10, 'Compra de lote novo');




SELECT 
    p.id_produto,
    p.nome AS produto,
    c.nome_categoria,
    p.quantidade_estoque,
    p.estoque_minimo
FROM produtos p
JOIN categorias c ON p.id_categoria = c.id_categoria
WHERE p.quantidade_estoque < p.estoque_minimo;


SELECT 
    m.id_movimentacao,
    m.data_movimentacao,
    p.nome AS produto,
    m.tipo_operacao,
    m.quantidade,
    f.nome AS funcionario,
    m.observacao
FROM movimentacoes_estoque m
JOIN produtos p ON m.id_produto = p.id_produto
JOIN funcionarios f ON m.id_funcionario = f.id_funcionario
ORDER BY m.data_movimentacao DESC;
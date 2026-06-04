CREATE TABLE usuarios

(

id_usuarios serial primary key,

nome varchar (100),

email varchar(100) unique,

senha varchar (100),

telefone varchar (11),

descricao varchar (3000),

url varchar (3000),

cookie varchar (255),

data_cookie date, 

ativo boolean

);

SELECT * FROM Usuarios;

SELECT * FROM  contatos;

drop table contatos;

CREATE TABLE contatos
(
    id_contatos serial primary key,
    nome varchar(100),
    url varchar(100),
    email varchar(100) unique,
    telefone varchar(100),
    ativo boolean -- A vírgula corrigida aqui!
    
    
);
 SELECT * FROM compromissos;
CREATE TABLE compromissos

(

id_compromisso serial primary key,

titulo varchar(100),

data_compromisso date,

hora_compromisso time,

local_compromisso varchar(100),

descricao varchar(900),

 
id_usuario integer,
    
    -- Ajustado de usuarios(id) para usuarios(id_usuarios)
CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuarios)
);


SELECT * FROM compromissos;

ALTER TABLE compromissos ADD COLUMN id_usuario INTEGER;

ALTER TABLE compromissos 
ADD CONSTRAINT fk_compromisso_usuario 
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuarios);

-- Atualiza todos os contatos e compromissos sem dono para o usuário ID 1
UPDATE contatos SET id_usuario = 1 WHERE id_usuario IS NULL OR id_usuario = 1;
UPDATE compromissos SET id_usuario = 1 WHERE id_usuario IS NULL OR id_usuario = 1;

-- 1. Garante que a coluna id_usuario existe na tabela de contatos
ALTER TABLE contatos ADD COLUMN IF NOT EXISTS id_usuario INTEGER;

-- 2. Remove qualquer chave estrangeira antiga que possa estar errada
ALTER TABLE contatos DROP CONSTRAINT IF EXISTS fk_usuario;

-- 3. Adiciona a ligação correta apontando para id_usuarios (que é o nome real na sua tabela usuarios)
ALTER TABLE contatos ADD CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuarios);

-- 1. Adiciona a coluna id_usuario à tabela contatos
ALTER TABLE contatos ADD COLUMN id_usuario INTEGER;

-- 2. Cria o vínculo (Chave Estrangeira) com a tabela usuarios apontando para a coluna certa (id_usuarios)
ALTER TABLE contatos 
ADD CONSTRAINT fk_usuario 
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuarios);

ALTER TABLE contatos ADD COLUMN id_usuario INTEGER;

ALTER TABLE contatos 
ADD CONSTRAINT fk_usuario_contatos 
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuarios);

ALTER TABLE compromissos ADD COLUMN IF NOT EXISTS id_usuario INTEGER;

ALTER TABLE compromissos DROP CONSTRAINT IF EXISTS fk_usuario_compromissos;
ALTER TABLE compromissos 
ADD CONSTRAINT fk_usuario_compromissos 
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuarios);
create table vagas (
id int AUTO_INCREMENT primary key,
titulo varchar(255),
descricao text,
ativo BOOLEAN default false,
data TIMESTAMP,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

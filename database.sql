CREATE DATABASE odonto;
use odonto;
CREATE TABLE consultas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    procedimento VARCHAR(255) NOT NULL,
    profissional VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    horario time not null
);
select *from consultas;






create database BDCliente;
use BDCliente;
create table CadasTable(
	nomeCliente varchar(8000) not null,
    senhaCliente varchar(8000) not null,
    empresaSON boolean not null,
	dataHora TIMESTAMP,
	ID_Cadas INT primary key not null auto_increment 
)ENGINE = innodb;
create table CadasEnd(
	EndeCliente varchar(8000) not null,
    CEPCliente int(8) not null,
	OBSCliente varchar(8000) not null,
	dataHora TIMESTAMP,
    ID_End INT primary key not null auto_increment 
)ENGINE = innodb;
ALTER TABLE CadasTable ADD CONSTRAINT fk_end FOREIGN KEY ( ID_Cadas ) REFERENCES CadasEnd ( ID_End ) ;
select * from CadasTable;
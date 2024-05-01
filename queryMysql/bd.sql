create database BDCliente;
use BDCliente;
create table CadasTable(
	nomeCliente varchar(6000) not null,
    senhaCliente varchar(6000) not null,
    empresaSON int not null,
	dataHora timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	ID_Cadas INT primary key not null auto_increment 
    
);
create table CadasEnd(
	nomeCliente varchar(8000) not null,
	EndeCliente varchar(8000) not null,
    CEPCliente int(8) not null,
	OBSCliente varchar(8000) not null,
	dataHora timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ID_End INT primary key not null auto_increment 
);
select * from CadasTable;
INSERT INTO CadasTable (nomeCliente,empresaSON,senhaCliente) VALUES ('$nomeCript',1,'$senhaCript');
INSERT INTO CadasTable (nomeCliente,senhaCliente) VALUES ('$nomeCript','$senhaCript');
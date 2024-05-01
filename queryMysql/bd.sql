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
	idCliente varchar(8000) ,
	EndeCliente varchar(2000) ,
    CEPCliente int(8) ,
	OBSCliente varchar(2000) ,
	dataHora timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ID_End INT primary key not null auto_increment 
);
select * from CadasEnd;
INSERT INTO CadasTable (nomeCliente,empresaSON,senhaCliente) VALUES ('$nomeCript',1,'$senhaCript');
INSERT INTO CadasTable (nomeCliente,senhaCliente) VALUES ('$nomeCript','$senhaCript');
SELECT ID_Cadas FROM CadasTable Where nomeCliente='827ccb0eea8a706c4c34a16891f84e7b' and senhaCliente='827ccb0eea8a706c4c34a16891f84e7b';
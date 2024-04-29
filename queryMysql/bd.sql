create database BDCliente;
use BDCliente;
create table CadasTable(
	nomeCliente varchar(6000) not null,
    senhaCliente varchar(6000) not null,
    N_cliente int,
    empresaSON int not null,
	dataHora TIMESTAMP,
	ID_Cadas INT primary key not null auto_increment ,
    constraint fk_EndCadas FOREIGN key(N_cliente) REFERENCES CadasEnd(ID_End)
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
INSERT INTO CadasTable (nomeCliente,empresaSON,senhaCliente) VALUES ('$nomeCript',1,'$senhaCript');
Insert into CadasEnd (EndeCliente,CEPCliente,OBSCliente) Values ('232',323,'3232323')
drop database ggdata;

create database if not exists ggdata;

use ggdata;

-- tabela aonde vão ser guardado os dados do usuario
create table usuario(
idUsuario int not null auto_increment,
nome varchar(20) not null,
email varchar(20) not null,
moeda int not null, -- moeda do sistema
senha varchar(20) not null,
tipo int not null,
primary key (idUsuario))
default charset = utf8
engine = innodb;

-- tabela que vai guardar as informações de um jogo ex:(cs go, dota 2)
create table jogo(
idJogo int not null auto_increment,
nome varchar(20) not null,
primary key (idJogo))
default charset = utf8
engine = innodb;

-- tabela que vai guardar as informações de um time ex:(cnb, flamengo)
create table equipe(
idEquipe int not null auto_increment,
nome varchar(20) not null,
primary key(idEquipe))
default charset = utf8
engine = innodb;

-- tabela que ira guardar as informações do cadastro do jogo por time ex: (flamengo - dota ,  cnb - lol)
create table cadastroJogo(
idCadastro int not null auto_increment,
fk_idJogo int not null,
fk_idEquipe int not null,
constraint foreign key (fk_idJogo) references jogo(idJogo),
constraint foreign key (fk_idEquipe) references equipe(idEquipe),
primary key(idCadastro))
default charset = utf8
engine = innodb;

-- tabela que ira guardar as informações de uma partida.
-- usamos a coluna tempo para saber se o jogo ja acabou, e comparamos o placar a e b pra saber quem venceu.
create table partida(
idPartida int not null auto_increment,
fk_idEquipeA int not null,
fk_idEquipeB int not null,
idVencedor int not null,
dataIni datetime not null, -- nessa coluna iremos usar para comparar o tempo da partida, colocamos a hora em que o jogo acaba.
-- se o jogo acaba as 17 horas precisamos consultar a hora atual pra saber se essa partida ja acabou ou não.
dataFim datetime not null,
fk_idJogo int not null,
estadoPartida int not null,
primary key(idPartida),
constraint foreign key (fk_idEquipeA) references equipe(idEquipe),
constraint foreign key (fk_idEquipeB) references equipe(idEquipe),
constraint foreign key (fk_idJogo) references jogo(idJogo))
default charset = utf8
engine = innodb;

-- essa tabela vai guardar as informações das apostas cada aposta feita no site vai ser armazenada por aqui.
create table aposta(
idAposta int not null auto_increment,
fk_idUsuario int not null,
valor int not null, -- valor apostado pelo usuario
fk_idEquipe int not null,
fk_idPartida int not null,
estadoAposta int not null,
fk_idJogo int not null,
primary key (idAposta),
constraint foreign key (fk_idUsuario) references usuario (idUsuario),
constraint foreign key (fk_idEquipe) references equipe (idEquipe),
constraint foreign key (fk_idPartida) references partida (idPartida),
constraint foreign key (fk_idJogo) references jogo(idJogo))
default charset = utf8
engine = innodb;

insert into equipe(nome) values ('flamengo');
insert into equipe(nome) values ('CNB');

insert into jogo(nome) values ('dota2');
insert into jogo(nome) values ('lol');
insert into jogo(nome) values ('cs');

insert into usuario(nome, email, moeda, senha, tipo) values ('admin','admin@admin',100,'admin','1');

insert into partida (fk_idEquipeA,fk_idEquipeB,idVencedor,fk_idJogo,dataIni,dataFim,estadoPartida) values (1,2,0,1,"2019-11-11 12:00","2019-11-11 14:00",0);
insert into partida (fk_idEquipeA,fk_idEquipeB,idVencedor,fk_idJogo,dataIni,dataFim,estadoPartida) values (1,2,0,1,"2019-11-11 12:00","2019-11-11 14:00",0);

insert into partida (fk_idEquipeA,fk_idEquipeB,idVencedor,fk_idJogo,dataIni,dataFim,estadoPartida) values (1,2,0,1,"2019-11-27 22:10","2019-11-27 22:50",0);
insert into partida (fk_idEquipeA,fk_idEquipeB,idVencedor,fk_idJogo,dataIni,dataFim,estadoPartida) values (1,2,0,1,"2019-11-27 23:15","2019-11-27 23:55",0);

insert into partida (fk_idEquipeA,fk_idEquipeB,idVencedor,fk_idJogo,dataIni,dataFim,estadoPartida) values (1,2,0,2,"2019-11-11 12:00","2019-11-11 14:00",0);
insert into partida (fk_idEquipeA,fk_idEquipeB,idVencedor,fk_idJogo,dataIni,dataFim,estadoPartida) values (1,2,0,2,"2019-11-11 12:00","2019-11-11 14:00",0);

insert into partida (fk_idEquipeA,fk_idEquipeB,idVencedor,fk_idJogo,dataIni,dataFim,estadoPartida) values (1,2,0,2,"2019-11-27 22:00","2019-11-27 22:40",0);
insert into partida (fk_idEquipeA,fk_idEquipeB,idVencedor,fk_idJogo,dataIni,dataFim,estadoPartida) values (1,2,0,2,"2019-11-27 23:00","2019-11-27 23:40",0);

insert into aposta (fk_idUsuario,valor,fk_idEquipe,fk_idPartida,estadoAposta,fk_idJogo) values (1,10,1,6,0,3);
insert into aposta (fk_idUsuario,valor,fk_idEquipe,fk_idPartida,estadoAposta,fk_idJogo) values (1,10,1,7,0,3);
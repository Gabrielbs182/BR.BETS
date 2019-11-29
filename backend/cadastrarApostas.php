<?php 

    session_start();

?>

<?php

// Gerando a aposta ->

include '../metodos/conexao.php';

$idPartida = $_GET['id'];

$idUser = $_SESSION['idUser'];

$idVencedor = $_GET['idVencedor'];

$idJogo = $_GET['idJogo'];

$bd = new Conexao();

$registro =  $bd->sql_query("insert into aposta(fk_idUsuario,valor,fk_idJogo,fk_idEquipe,fk_idPartida) values ($idUser,10,$idJogo,$idVencedor,$idPartida)  ");  

	header('Location: ../index.php');

?>
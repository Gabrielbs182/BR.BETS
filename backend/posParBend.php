<?php

session_start();


if(isset($_SESSION['logado']) and ($_SESSION['idUser'] == 1)){

	include "../metodos/conexao.php";

	$bd = new Conexao();

	$idPartida = $_GET["id"];

	$idVencedor = $_GET["idTime"];

	$registro =  $bd->sql_query("update partida set idVencedor = $idVencedor, estadoPartida = 1 where idPartida = $idPartida");

	header('Location: ../posPar.php');

}else{

	header('Location: ../index.php');

}

?>
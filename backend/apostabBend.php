<?php

session_start();

if(isset($_SESSION['logado']) and ($_SESSION['idUser'] == 1)){

	$usuario = "";

	include "../metodos/conexao.php";

    $bd = new Conexao();

    $idPartida = $_GET['idPartida'];

    $idAposta = $_GET['idAposta'];

   	$pSql = "
    SELECT fk_idUsuario as usuario, fk_idEquipe as idVencedorAposta, fk_idPartida, p.idPartida as idPartida, p.idVencedor as idVencedor, u.nome as nomeUsuario
    FROM aposta
    inner join partida p on fk_idPartida = p.idPartida
    inner join usuario u on fk_idUsuario = u.idUsuario
    WHERE  fk_idPartida = p.idPartida and idAposta = " . $idAposta . " " ;

    $consulta = $bd->sql_query($pSql);

    while($linha = mysql_fetch_array($consulta)) {

    	$idVencedor = $linha['idVencedor'];

    	$idVencedorAposta = $linha['idVencedorAposta'];

    	$usuario = $linha['usuario'];

    	$nomeUsuario = $linha['nomeUsuario'];

    }

    $registro =  $bd->sql_query("update aposta set estadoAposta = 1 where idAposta =" .  $idAposta . "");

    if ($idVencedor == $idVencedorAposta){

    	$registro =  $bd->sql_query("update usuario set moeda = moeda+10 where idUsuario =" .  $usuario . "");

    	header('Location: ../index.php?inteiro=1');

        $_SESSION['moedas'] = $_SESSION['moedas'] + 10;

    }else{

    	$registro =  $bd->sql_query("update usuario set moeda = moeda-10 where idUsuario =".  $usuario . "");

    	header('Location: ../index.php?inteiro=0');

        $_SESSION['moedas'] = $_SESSION['moedas'] - 10;

    }


}else{

	header('Location: ../index.php');

}

    ?>
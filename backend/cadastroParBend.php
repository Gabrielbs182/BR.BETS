<?php

session_start();

if(isset($_SESSION['logado']) and ($_SESSION['idUser'] == 1)){

	if (isset($_REQUEST['EquipeA'])){

		include '../metodos/conexao.php';

		$jogo = $_POST['jogo'];
		$equipeA = $_POST['EquipeA'];
		$equipeB = $_POST['EquipeB'];
		$data = $_REQUEST['calendario'];
		list ($dia, $mes, $ano) = split ('[/.-]', $data);
		$dateIni = "$ano-$mes-$dia"." ".$_POST['Horaini'].":00" ;
		list ($dia, $mes, $ano) = split ('[/.-]', $data);
		$dateFim = "$ano-$mes-$dia"." ".$_POST['Horafim'].":00" ;

		$bd = new Conexao();

		$registro =  $bd->sql_query("insert into partida(fk_idEquipeA,fk_idEquipeB,dataIni,dataFim,fk_idJogo) values ($equipeA,$equipeB,'$dateIni','$dateFim',$jogo)  ");  
		
	}

	header('Location: ../cadastroPar.php');

}else{

	header('Location: ../index.php');

}

?>
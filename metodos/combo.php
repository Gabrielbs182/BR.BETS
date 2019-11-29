<?php 
include "./metodos/conexao.php";

header("Content-type: text/html; charset=utf-8");

function comboWhere ($pNameSelect, $pCod, $pDesc, $pTabela, $pWhere, $evento="", $pos) {	 				

	$bd = new Conexao();

	$pSql="Select " . $pCod . ", " . $pDesc . " From " . $pTabela . " ";
	if ($pWhere != "") $pSql = $pSql . $pWhere;



	if ($pNameSelect=="") {
		print "<select class='form-control' name='" . $pTabela . "' $evento> ";
	} else {
		print "<select class='form-control' name='" . $pNameSelect . "' $evento> ";
	}				
	if  ($pos =="") {
		print "<option  selected> [Selecione a opção] </option> ";			
	} else {
		print "<option value=-1> [Selecione a opção] </option> ";	
	}

	$consulta = $bd->sql_query($pSql);

	while($linha = mysql_fetch_array($consulta)) {
		if  ($pos == $linha[0]) { 
			print "<option value= " . $linha[0] . " selected> " . $linha[1] . " </option> ";
		} else { 	
			print "<option value= " . $linha[0] . "> " . $linha[1] . " </option> ";
		}	
	}
	print "</select>";
}

?>	
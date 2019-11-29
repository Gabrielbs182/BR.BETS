<?php

//Backend do cadastro de equipes

//Iniciando a sessão

session_start();

//Funções que vou usar no cadastro

//Função para apagar todos os vinculos de um equipe com um jogo ->

function apagar(){

  $id = $_REQUEST["id"];

  $bd = new Conexao();

  $registro =  $bd->sql_query("delete from cadastrojogo where fk_idEquipe = $id");


}

//Função para cadastrar equipes ->

function cadastrar(){

  $bd = new Conexao();

  if (isset($_REQUEST["nomeEquipe"])) { 
   $nome = $_REQUEST["nomeEquipe"];

   $registro =  $bd->sql_query("insert into equipe(nome) values ('$nome')  ");  

   $pSql = "select max(idEquipe) as idEquipe from equipe" ;

   $consulta = $bd->sql_query($pSql);

   while($linha = mysql_fetch_array($consulta)) {

    $idFim = $linha['idEquipe'];
  }

  cadastrarJogo($idFim);

}
}

//Função que checa os checkbox e vincula a equipe a um jogo que estiver selecionado ->

function cadastrarJogo($idFim){

  $bd = new Conexao();

  if (isset($_POST['dota2check'])) {

    $idJogo = 1;

    $registro =  $bd->sql_query("insert into cadastrojogo(fk_idJogo,fk_idEquipe) values ($idJogo,$idFim)  ");


  }

  if (isset($_POST['lolcheck'])) {

    $idJogo = 2;

    $registro =  $bd->sql_query("insert into cadastrojogo(fk_idJogo,fk_idEquipe) values ($idJogo,$idFim)  ");


  }

  if (isset($_POST['cscheck'])) {

    $idJogo = 3;

    $registro =  $bd->sql_query("insert into cadastrojogo(fk_idJogo,fk_idEquipe) values ($idJogo,$idFim)  ");

  }
}

// Testando se o usuario está logado e analisando a permissão do mesmo.


if(isset($_SESSION['logado']) and ($_SESSION['idUser'] == 1)){

  include "../metodos/conexao.php";

  $idEquipe = "";
  $nmEquipe = "";
  $id = "";
  $teste = "";

  $id = $_REQUEST["id"];

  $teste = strcmp($id, $teste);

  if ($teste != 0){

    $bd = new Conexao();

    apagar();

    cadastrarJogo($id);

  }else{

    $bd = new Conexao();

    cadastrar();

  }

  header('Location: ../cadastros.php');

  //Se o usuario n estiver logado ou não obter a permissão necessaria vamos encaminhar para o index sem fazer nenhuma ação.

}else{

  header('Location: ../index.php');

}

?>
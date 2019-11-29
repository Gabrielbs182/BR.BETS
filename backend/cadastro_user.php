<?php 

    session_start();

?>

<?php

    print_r($_POST);

    include "../metodos/conexao.php";

    $name_user = ($_POST['nameuser']);
    $email_user = ($_POST['emailuser']);
    $pass_user = ($_POST['passuser']);
    $moedas = 100;
    $tipo = 2;

    $bd = new Conexao();
    
    
    $sql = "insert into usuario(nome, email, moeda, senha, tipo) values ('$name_user','$email_user',$moedas,'$pass_user',$tipo)";

    $registro =  $bd->sql_query($sql);

    unset($registro);
    unset($bd);

    // header("../index.php");


?>
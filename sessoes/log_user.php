<?php
    include '../metodos/conexao.php';

    include './start.php';


    if (isset($_POST['userlog'])) {
        
        $user = ($_POST['userlog']);
        $password = ($_POST['passlog']);

        $bd = new Conexao();

        $sql = "select idUsuario,nome,senha,moeda from usuario where senha = '$password' ;";

        $registro = $bd->sql_query($sql);

        $campo = mysql_fetch_array($registro);

        if(trim($campo['senha'] == $password )){
            echo "OK!";
            $_SESSION['logado'] = $user;
            $_SESSION['senha'] = $password;
            $_SESSION['idUser'] = $campo['idUsuario'];
            $_SESSION['moedas'] = $campo['moeda'];
            header('Location: ../index.php');
        } else {
            echo "ERROR!";
            // unset($_SESSION['login']);
            // unset($_SESSION['senha']);
            header('Location: ./error.php');
        };
        
    

        unset($registro);
        unset($bd);

    }

?>
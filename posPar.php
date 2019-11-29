<?php

session_start();


//Testamos se o usuario está logado e se tem a permissão necessaria para acessar a pagina.

if(isset($_SESSION['logado']) and ($_SESSION['idUser'] == 1)){

    include "./metodos/conexao.php";
    $bd = new Conexao();

    ?>

    <!DOCTYPE html>
    <html lang="pt-br">


    <head>
        <script src="https://kit.fontawesome.com/d372d112bf.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Apostas</title>
        <link href="../CSS/estilo.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <div id="Divmain" class="container-fluid">

        <div class="row">


            <div id="div1" class="col-sm-12">
                <!-- DIV do NAVBAR-->

                <header>

                    <?php include "./navbar/nav.php"; ?>

                </header>

            </div>

        </div>

        <div class="row">

            <div class="col-sm-12" id="divCorpo">



                <h1 style="color:blue; text-align: center;">

                    Tabela de partidas finalizadas

                </h1>

                <div style="color:blue;">

                    <form action="cadastrosbend.php" method="post" name="f">

                        <div class="form-group" id="tabela">

                            <?php include "./tabelas/postab.php" ?>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

<?php

}else{

    header('Location: ./index.php');
}

?>

</html>

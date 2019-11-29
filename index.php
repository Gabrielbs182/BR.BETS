<?php 

session_start();

?>

<?php

include './metodos/conexao.php';

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
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/Cad_estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>


    <?php 

    if(isset($_GET['inteiro'])){
        if($_GET['inteiro'] == 0){

            echo '<script>alert("Poxa não foi dessa vez :/");</script>';

        }else if ($_GET['inteiro'] == 1){

            echo '<script>alert("Parabens você venceu, ganhou 10 moedas !!!");</script>';

        }
    }
    ?>

    

    <script>

        function idJogo(ident){

            document.getElementById('idJogo').value = ident;

        }
        function chamar(link) {
            window.location.href = link;
        }

        function mensagem(inteiro){
            if inteiro == 1{
                alert("Parabens, você venceu a aposta e ganha 10 moedas !!!");
            }else{
                alert("Poxa não foi dessa vez, você perdeu 10 moedas !!!");
            }
        }

    </script>

    <input type="hidden" name="id" value='0' id="idJogo">

    <div id="Divmain" class="container-fluid">
        <div class="row">


            <div id="div1" class="col-sm-12">
                <!-- DIV do NAVBAR-->

                <header>

                    <?php include "./navbar/nav.php"; ?>

                </header>

                <?php include "./modais/login_popup.php"; ?>

                <?php include "./modais/register_popup.php"; ?>


            </div>

        </div>

        <div class="row" id="divCorpo">


            <div class="col-sm-12" id="div6">

                <!-- Inicio do corpo do site parte dinamica -->

                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="dota2-tab" data-toggle="tab" href="#dota2" role="tab" aria-controls="dota2" aria-selected="true" onclick="idJogo(0)">Dota 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lol-tab" data-toggle="tab" href="#lol" role="tab" aria-controls="lol" aria-selected="false" onclick="idJogo(1)">League of Legends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cs-tab" data-toggle="tab" href="#cs" role="tab" aria-controls="cs" aria-selected="false", onclick="idJogo(2)">CS: GO</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="dota2" role="tabpanel" aria-labelledby="dota2-tab">

                        <?php include './jogos/dota2.php' ?>

                    </div>

                    <div class="tab-pane fade" id="lol" role="tabpanel" aria-labelledby="lol-tab">

                        <?php include './jogos/lol.php' ?>

                    </div>

                    <div class="tab-pane fade" id="cs" role="tabpanel" aria-labelledby="cs-tab">

                        <?php include './jogos/cs.php' ?>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <script src="./validacoesjs/login.js"></script>
    <script src="./validacoesjs/Register.js"></script>
</body>

</html>

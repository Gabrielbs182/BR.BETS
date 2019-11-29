<?php 

    session_start();

?>

<?php

if(isset($_SESSION['logado']) and ($_SESSION['idUser'] == 1)){

    include "./metodos/combo.php";

    $nome = "";

    $id = "";

    if (isset($_REQUEST["id"])) {

        $bd = new Conexao();

        $reg =  $bd->verReg("jogo", "idJogo = " . $_REQUEST["id"]); 

        $nome = $reg["nome"];

        $id = $reg["idJogo"];

    }

    ?>

    <!DOCTYPE html>
    <html lang="pt-br">


    <head>
        <script src="https://kit.fontawesome.com/d372d112bf.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Apostas</title>
        <link href="../CSS/estilo.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

        <script>

            function mudarData($data){

            }

            $(function() {
                $("#calendario").datepicker({
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
                });
            });


        </script>

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

                <div id="cadastro" class="container-fluid">

                    <div class="row">

                        <div class="col-sm-12">

                            <h1 style="color:blue; text-align: center;">

                                Cadastro de partidas

                            </h1>

                            <div style="color:blue;">

                                <form action="./backend/cadastroParBend.php" method="post" name="f">

                                    <div class="form-group">

                                        <label for="exampleFormControlSelect1">Selecione selecione o jogo</label>

                                        <?php comboWhere ("jogo", "idJogo", "nome", "jogo", "", "", "") ?>
                                        <input type="hidden" name="id" id="id" value="">

                                        <br>

                                        <label for="exampleFormControlSelect1">Selecione as equipes</label>

                                        <?php 

                                        comboWhere ("EquipeA", "idEquipe", "nome", "equipe", "", "onchange='idEquipeA()'", "where idJogo = $id") 

                                        ?> 
                                        X
                                        <?php comboWhere ("EquipeB", "idEquipe", "nome", "equipe", "", "onchange='idEquipeB()'", "") ?>

                                        <br>

                                        <p>Data: <input type="text" class="form-control" id="calendario" name="calendario" autocomplete="off" required=""/></p>

                                        <br>

                                        <p>Hora de inicio: <input type="text" class="form-control" id="horaIni" name="Horaini" autocomplete="off" required=""/></p>

                                        <br>

                                        <p>Hora de termino: <input type="text" class="form-control" id="horaFim" name="Horafim" autocomplete="off" required=""/></p>

                                        <div>
                                            <button type="submit" class="btn btn-primary" >Cadastrar</button>
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

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

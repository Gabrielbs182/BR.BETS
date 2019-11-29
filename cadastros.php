<?php

session_start();

//Testamos se o usuario está logado e se tem a permissão necessaria para acessar a pagina.

if(isset($_SESSION['logado']) and ($_SESSION['idUser'] == 1)){

    include "./metodos/combo.php";

    $nome = "";

    $id = "";

    if (isset($_REQUEST["id"])) {

        $bd = new Conexao();

        $reg =  $bd->verReg("equipe", "idEquipe = " . $_REQUEST["id"]); 

        $nome = $reg["nome"];

        $id = $reg["idEquipe"];

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

    <body onload="document.f.nomeEquipe.focus();">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>

        <script>

            function page(){     
               window.location =  "./cadastros.php?id=" + f.comboNome.value;  
           }

           function validId(){
            document.getElementById("id").value = "";
        }

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

        <div class="row" id="divCorpo">

            <div id="cadastro" class="container-fluid">

                <div class="row">

                    <div class="col-sm-12">

                        <h1 style="color:blue; text-align: center;">

                            Cadastro de equipes

                        </h1>

                        <div style="color:blue;">

                            <form action="./backend/cadastrosbend.php" method="post" name="f">

                                <div class="form-group" id="cadastro">
                                    <input type="text" class="form-control" id="nomeEquipe" name="nomeEquipe" placeholder="Nome" autocomplete="off" required="" value="<?php echo $nome; ?>" onclick="validId()">
                                </div>

                                <label class="label">Jogos</label><br>
                                <input type="checkbox" name="dota2check" value="on"> Dota 2 <br>
                                <input type="checkbox" name="lolcheck" value="on"> Lol <br>
                                <input type="checkbox" name="cscheck" value="on"> Cs

                                <div>
                                    <button type="submit" class="btn btn-primary" >Cadastrar</button>
                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-12" id="comboform">

                            <h1 style="color:blue;">

                                Alterar

                            </h1>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Selecione a equipe</label>
                                <?php comboWhere ("comboNome", "idEquipe", "nome", "equipe", "", "onchange='page()'", "") ?>
                            </div>

                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

                        </form>

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
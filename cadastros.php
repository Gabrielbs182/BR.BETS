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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Apostas</title>
        <link href="../CSS/estilo.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body onload="document.f.nomeEquipe.focus();">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


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

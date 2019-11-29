<nav id="bar" class="navbar navbar fixed-top">

    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link active" href="./index.php"><i class="fas fa-dice fa-3x"></i></a>
        </li>

    </ul>

    <ul class="nav justify-content-center" >
        <li id="titulo" class = "titulobets">
            BR.BETS
        </li>
       
    </ul>

    <ul class="nav justify-content-end">
        <li class="nav-item">

        <?php 
            if(!isset($_SESSION['logado'])){
                
                session_destroy(); 
        ?>

            <!-- botão de login -->

                <button type="button" class="btn btn-primary" id="botao" name = "botaologar" data-target="#loginModal" data-toggle = "modal">

                    Login

                </button>
            
            <?php 
            
            } else if($_SESSION['logado'] == 'admin') {
            ?>

            <!-- dropdown admin -->
                <div class="dropdown" id = "droplarge">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             
                                <?php echo($_SESSION['logado']); ?>
                            
                        </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <span class="dropdown-item" href = "#"  .disabled > <?php echo "Coins: {$_SESSION['moedas']} "; ?> </span>  
                        <a class="dropdown-item" href="./index.php">Principal</a>    
                        <a class="dropdown-item" href="./cadastros.php">Cadastro de Time</a>
                        <a class="dropdown-item" href="./cadastroPar.php">Cadastro Partidas</a>
                        <a class="dropdown-item" href="./posPar.php">Processar Partidas</a>
                        <a class="dropdown-item" href="./navbar/destroy.php">Logout</a>

                    </div>

                </div>
            <?php } else { ?>
                <!-- dropdown admin -->
                
                <div class="dropdown" id = "droplarge_noadmin">
                        <button class="btn btn-secondary dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo($_SESSION['logado']);
                             ?>
                        </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <label class="dropdown-item" href = "#"  .disabled > <?php echo "Coins: {$_SESSION['moedas']} "; ?> </label>
                        <a class="dropdown-item" href="./navbar/destroy.php">Logout</a>
                    </div>

                </div>
            
            <?php } ?>
                

        </li>
    </ul>

</nav>
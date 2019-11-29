<?php

$id = (int)$_SESSION['idJogo'];

if(isset($_SESSION['logado'])){

    $idUser = $_SESSION['idUser'];

    $pSql = "
    SELECT e.idEquipe as idEquipeA, e.nome as nomeEquipeA, e2.idEquipe as idEquipeB, e2.nome as nomeEquipeB, dataFim, j.nome as nomeJogo, e3.nome as vencedor,e3.idEquipe as idVencedor, idPartida,estadoPartida, a.idAposta as idAposta, a.estadoAposta as estadoAposta
    FROM partida 
    inner join equipe e on fk_idEquipeA = idEquipe 
    inner join equipe e2 on fk_idEquipeB = e2.idEquipe
    inner join aposta a on idPartida = a.fk_idPartida
    inner join equipe e3 on a.fk_idEquipe = e3.idEquipe
    inner join jogo j on a.fk_idJogo = j.idJogo
    WHERE  estadoAposta = 0 and fk_idUsuario = " . $idUser . " " ;

    $consulta = $bd->sql_query($pSql);

    if (mysql_num_rows($consulta)>0){

        $i=1;

        echo '
        <table class="table table-dark">
        <thead>
        <tr>
        <th scope="col">Vencedor</th>
        <th scope="col">Perdedor</th>
        <th scope="col">Jogo</th>
        <th scope="col">Fim da partida</th>
        <th scope="col">Resultado</th>
        </tr>
        </thead>
        ';

        while($linha = mysql_fetch_array($consulta) and $i <= 3) {

            $idPartida = $linha['idPartida'];

            $idAposta = $linha['idAposta'];

            $estadoPartida = $linha['estadoPartida'];

            $dataFim = $linha['dataFim'];

            $vencedor = $linha['vencedor'];

            if ($linha['idVencedor'] == $linha['idEquipeA'] ){

                $perdedor = $linha['nomeEquipeB'];
            }else{
                $perdedor = $linha['nomeEquipeA'];
            }

            $nomeJogo = $linha['nomeJogo'];

            ?>

            <tr>

             <td><?php echo $vencedor ?></td>
             <td><?php echo $perdedor ?></td>
             <td><?php echo $nomeJogo ?></td>
             <td><?php echo $dataFim ?></td>

             <?php
             if ($estadoPartida == 1){
                ?> <td>

                    <a class="nav-link active" href="./backend/apostabBend.php?idPartida=<?php echo $idPartida?>&idAposta=<?php echo $idAposta ?>"><i class="far fa-check-square"></i></a>

                    </td>

                    <?php
                }

             ?>



         </tr>

         <?php
         $i++;
     }

 }else{
    echo "Faça já a sua aposta !!!";
}

?>

</table>

<?php 

}else{

    echo "Bem vindo ao BR.BET melhor site BR de apostas !!!";
    echo "<br>Faça já o seu cadastro !!!";
}

?>
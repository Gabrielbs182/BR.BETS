<?php

$pSql = "
SELECT idPartida, estadoPartida,dataFim,fk_idEquipeA, fk_idEquipeB,fk_idJogo, e.idEquipe as idEquipeA, e2.idEquipe as idEquipeB, e.nome as nomeEquipeA, e2.nome as nomeEquipeB, j.nome as nomeJogo
FROM partida
inner join jogo j on fk_idJogo = j.idJogo
inner join equipe e on fk_idEquipeA = e.idEquipe
inner join equipe e2 on fk_idEquipeB = e2.idEquipe
WHERE estadoPartida = 0 and dataFim < now()" 
;

echo '
<table class="table table-dark">
<thead>
<tr>
<th scope="col">Jogo</th>
<th scope="col">Data</th>
<th scope="col">Time Azul</th>
<th scope="col">Time Vermelho</th>
<th scope="col">Vitoria Azul</th>
<th scope="col">Vitoria Vermelho</th>
</tr>
</thead>
';

$consulta = $bd->sql_query($pSql);

while($linha = mysql_fetch_array($consulta)) {

    $nomeJogo = $linha['nomeJogo'];

    $data = $linha['dataFim'];

    list ($data,$hora) = preg_split ('[ ]', $data);

    list ($ano, $mes, $dia) = preg_split ('[-]', $data);

    $data = "$dia/$mes/$ano $hora" ;

    $equipeA = $linha['nomeEquipeA'];

    $equipeB = $linha['nomeEquipeB'];

    $idEquipeA = $linha['fk_idEquipeA'];

    $idEquipeB = $linha['fk_idEquipeB'];

    $idPartida = $linha['idPartida'];

    ?>

    <tr>
        <td><?php echo $nomeJogo ?></td>
        <td><?php echo $data?></td>
        <td><?php echo $equipeA ?></td>
        <td><?php echo $equipeB ?></td>

        <td><a class="nav-link active" href="./backend/posParBend.php?id=<?php echo $idPartida?>&idTime=<?php echo $idEquipeA ?>"><i class="far fa-check-square "  style="color:blue;"></i></a></td>

        <td><a class="nav-link active" href="./backend/posParBend.php?id=<?php echo $idPartida?>&idTime=<?php echo $idEquipeB ?>"><i class="far fa-check-square" style="color:red;"></i></a></td>
    </tr>

    <?php

}

?>

</table>
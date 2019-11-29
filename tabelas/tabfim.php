<?php

$id = (int)$_SESSION['idJogo'];

$pSql = "
SELECT idVencedor, e3.nome as nomeVencedor, estadoPartida,e.nome as nomeEquipeA, e2.nome as nomeEquipeB, idPartida, dataIni,dataFim, fk_idJogo, fk_idEquipeA as idEquipeA, fk_idEquipeB as idEquipeB
FROM partida 
inner join equipe e on fk_idEquipeA = idEquipe 
inner join equipe e2 on fk_idEquipeB = e2.idEquipe 
inner join equipe e3 on idVencedor = e3.idEquipe
WHERE estadoPartida = 1 and dataFim < now() and fk_idJogo = " . $id . " " ;

$consulta = $bd->sql_query($pSql);

echo '
<table class="table table-dark">
<thead>
<tr>
<th scope="col">Data</th>
<th scope="col">Começo</th>
<th scope="col">Fim</th>
<th scope="col">Vencedor</th>
<th scope="col">Perdedor</th>
</tr>
</thead>
';

while($linha = mysql_fetch_array($consulta)) {

    $dataIni = $linha['dataIni'];

    list ($dataIni,$horaIni) = preg_split ('[ ]', $dataIni);

    list ($ano, $mes, $dia) = preg_split ('[-]', $dataIni);

    $dataIni = "$dia/$mes/$ano" ;

    $dataFim = $linha['dataFim'];

    list ($dataFim,$horaFim) = preg_split ('[ ]', $dataFim);

    $vencedor = $linha['nomeVencedor'];

    if ($linha['idVencedor'] == $linha['idEquipeA'] ){

        $perdedor = $linha['nomeEquipeB'];
    }else{
        $perdedor = $linha['nomeEquipeA'];
    }

    ?>

    <tr>
        <td><?php echo $dataIni?></td>
        <td><?php echo $horaIni ?></td>
        <td><?php echo $horaFim ?></td>
        <td><?php echo $vencedor ?></td>
        <td><?php echo $perdedor ?></td>
    </tr>

    <?php

}

?>

</table>
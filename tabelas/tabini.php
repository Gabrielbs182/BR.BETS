<?php

// Buscando o id do jogo pela sessão ->

$id = $_SESSION['idJogo']; 

// Testando se o usuario está logado ->

if(isset($_SESSION['logado'])){

  // Buscando o id do usuario ->

  $idUser = $_SESSION['idUser'];

  $lista = [];

  // A seguir vou iniciar o processo para pegar informações das apostas do usuario ->

  // Criando query para buscar os id's das partidas que o usuario apostou ->

  $pSql =  "
  SELECT idPartida, a.fk_idPartida as fk_idPartida, dataFim,dataIni
  FROM partida 
  inner join aposta a on idPartida = a.fk_idPartida
  WHERE  fk_idUsuario = " . $idUser . " " ;

  // Executando ->

  $consulta = $bd->sql_query($pSql);

  // Testando se a consulta veio vazio ->

  if (mysql_num_rows($consulta)>0){

    // Se a consulta não estiver vazia eu percorro toda a consulta colocando os id's em uma lista.

    while($linha = mysql_fetch_array($consulta)) {

      array_push($lista, $linha['fk_idPartida']);

    }

  }

  // A seguir vou iniciar o processo para testar se o usuario já apostou na partida e alimentar a tabela

  $pSql = "SELECT fk_idJogo, e.idEquipe as idEquipeA, e2.idEquipe as idEquipeB, e.nome as nomeEquipeA, e2.nome as nomeEquipeB, idPartida, dataIni,dataFim 
  FROM partida 
  inner join equipe e on fk_idEquipeA = idEquipe 
  inner join equipe e2 on fk_idEquipeB = e2.idEquipe 
  WHERE fk_idJogo = " . $id . " " ;

  //dataIni < now() and

  echo '
  <table class="table table-dark">
  <thead>
  <tr>
  <th scope="col">Começo</th>
  <th scope="col">Fim</th>
  <th scope="col">Time A</th>
  <th scope="col">Time B</th>
  </tr>
  </thead>
  ';

  $consulta = $bd->sql_query($pSql);

  if (mysql_num_rows($consulta)>0){

    while($linha = mysql_fetch_array($consulta)) {

      // Criei um gatilho booleano

      $gatilho = False;

      // Aqui eu percorro a lista de id's de partidas na qual o usuario fez apostas.

      foreach($lista as $idPartidaA){

        // Aqui eu vou comparar se o id da partida em questão é igual a algum id que o usuario tenha feito aposta.

        if ($idPartidaA == $linha['idPartida']){
          $gatilho = True;
        }

        if ($gatilho == False){
          $gatilhoecho = 'falso';
        }else{
          $gatilhoecho = 'verdadeiro';
        }

      }

      // Caso falso então quer dizer que o usuario ainda não apostou nessa partida então ela estará visivel para ele.

      if ($gatilho == False){

        $idPartida = $linha['idPartida'];
        $dataIni = $linha['dataIni'];

        list ($dataIni,$horaIni) = preg_split ('[ ]', $dataIni);

        $dataFim = $linha['dataFim'];

        list ($dataFim,$horaFim) = preg_split ('[ ]', $dataFim);

        $timeA = $linha['nomeEquipeA'];
        $timeB = $linha['nomeEquipeB'];

        $idA = $linha['idEquipeA'];
        $idB = $linha['idEquipeB'];

        $idJogo = $linha['fk_idJogo'];

        ?>

        <tr>

          <td><?php echo $horaIni ?></td>

          <td><?php echo $horaFim ?></td>

          <td><?php echo $timeA?><a class="nav-link active" href="./backend/cadastrarApostas.php?id=<?php echo $idPartida?>&idUser=<?php echo $idUser?>&nomeVencedor=<?php echo $timeA?>&idVencedor=<?php echo $idA?>&idJogo=<?php echo $idJogo?>"><i class="fas fa-dice-three"  style="color:purple;"></i></a></td>

          <td><?php echo $timeB ?><a class="nav-link active" href="./backend/cadastrarApostas.php?id=<?php echo $idPartida?>&idUser=<?php echo $idUser?>&nomeVencedor=<?php echo $timeB?>&idVencedor=<?php echo $idB?>&idJogo=<?php echo $idJogo?>"><i class="fas fa-dice-three"  style="color:purple;"></i></a></td>

        </tr>

        <?php

      }
    }
  }
}else{

  // Nesse caso não há logado portanto eu simplesmente vou imprimir a tabela mas sem qualquer tipo de interação.



  $pSql = "SELECT fk_idJogo, e.idEquipe as idEquipeA, e2.idEquipe as idEquipeB, e.nome as nomeEquipeA, e2.nome as nomeEquipeB, idPartida, dataIni,dataFim, fk_idJogo  
  FROM partida 
  inner join equipe e on fk_idEquipeA = idEquipe 
  inner join equipe e2 on fk_idEquipeB = e2.idEquipe 
  WHERE fk_idJogo = " . $id . " " ;

  echo '
  <table class="table table-dark">
  <thead>
  <tr>
  <th scope="col">ID</th>
  <th scope="col">Começo</th>
  <th scope="col">Fim</th>
  <th scope="col">Time A</th>
  <th scope="col">Time B</th>
  </tr>
  </thead>
  ';

  $consulta = $bd->sql_query($pSql);

  if (mysql_num_rows($consulta)>0){

    while($linha = mysql_fetch_array($consulta)) {

      $id = $linha['idPartida'];
      $dataIni = $linha['dataIni'];

      list ($dataIni,$horaIni) = preg_split ('[ ]', $dataIni);

      $dataFim = $linha['dataFim'];

      list ($dataFim,$horaFim) = preg_split ('[ ]', $dataFim);

      $timeA = $linha['nomeEquipeA'];
      $timeB = $linha['nomeEquipeB'];

      $idA = $linha['idEquipeA'];
      $idB = $linha['idEquipeB'];

      $idJogo = $linha['fk_idJogo'];

      ?>

      <tr>

        <td><?php echo $id ?></td>

        <td><?php echo $horaIni ?></td>

        <td><?php echo $horaFim ?></td>

        <td><?php echo $timeA?></td>

        <td><?php echo $timeB ?></td>

      </tr>

      <?php

    }
  }
}

?>

</table>
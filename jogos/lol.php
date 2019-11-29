<?php

$id = 2;

$_SESSION['idJogo'] = $id;

?>

<div class="row">

	<div class="col-sm-8" id="div3">

		<!-- div do video -->
		<center>
			<iframe src="https://player.twitch.tv/?channel=roboolol" height="400" width="640" frameborder="0" scrolling="no" allowfullscreen="false">
			</iframe>
		</center>

	</div>

	<div class="col-sm-4" id="div4">

		<!-- tabela de apostas -->

		<?php include './tabelas/apostab.php'; ?>

	</div>
</div>

<div class="row">

	<div class="col-sm-6" id="div2">

		<!-- Botoes desativados cabeçalho das tabelas -->

		<center>
			<button type="button" class="btn btn-primary btn-lg btn-block" id="botao" disabled>Apostar</button>
		</center>

	</div>

	<div class="col-sm-6" id="div2">

		<!-- Botoes desativados cabeçalho das tabelas -->

		<center>
			<button type="button" class="btn btn-primary btn-lg btn-block" id="botao" disabled>Partidas Finalizadas</button>
		</center>

	</div>

</div>

<div class="row">

	<div class="col-sm-6" id="div2">

		<!-- tabela de inicios -->

		<?php include "./tabelas/tabini.php"; ?>

	</div>

	<div class="col-sm-6" id="div2">

		<!-- tabela final -->


		<?php include "./tabelas/tabfim.php"; ?>

	</div>

</div>

?>
<?php include './layout/header.php';  ?>
<?php include './layout/menu.php';  ?>
<?php 

include 'classes/RelatorioDAO.php';
$relatorioDAO = new RelatorioDAO();
$total_usuarios = $relatorioDAO->contar('usuario');
$total_filmes = $relatorioDAO->contar('filme');
$total_comentarios = $relatorioDAO->contar('comentario');
$total_avaliacoes = $relatorioDAO->contar('avaliacao');

?>

<div class="row col">
	<h1>Dashboard</h1>
</div>
<div class="row">
	<div class="col-3">
		<div class="card">
			<div class="card-header">Quantidade Usuários</div>
			<div class="card-body card-dashboard">
				<p class="total"><?= $total_usuarios['total'] ?? 0; ?></p>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="card">
			<div class="card-header">Quantidade Filmes</div>
			<div class="card-body card-dashboard">
				<p class="total filmes"><?= $total_filmes['total'] ?? 0; ?></p>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="card">
			<div class="card-header">Quantidade Comentários</div>
			<div class="card-body card-dashboard">
				<p class="total comentarios"><?= $total_comentarios['total'] ?? 0; ?></p>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="card">
			<div class="card-header">Quantidade Avaliações</div>
			<div class="card-body card-dashboard">
				<p class="total avaliacoes"><?= $total_avaliacoes['total'] ?? 0; ?></p>
			</div>
		</div>
	</div>
</div>


<?php include './layout/footer.php';  ?>




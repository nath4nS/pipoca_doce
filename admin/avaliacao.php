<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Avaliacao.php';
require 'classes/AvaliacaoDAO.php';
$avaliacaoDAO = new AvaliacaoDAO();
$avaliacoes = $avaliacaoDAO->listar();

require 'classes/Usuario.php';
require 'classes/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listar();

require 'classes/Filme.php';
require 'classes/FilmeDAO.php';
$filmeDAO = new FilmeDAO();
$filmes = $filmeDAO->listar();

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
	$avaliacoes = $avaliacaoDAO->listar($_GET['pesquisa']);
} else {
	$avaliacoes = $avaliacaoDAO->listar();
}

?>

<div class="row" style="margin-top:40px">
	<div class="col-6">
		<h2>Gerenciar Avaliações</h2>
	</div>

	<div class="col-4">
		<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Digite um avaliação" aria-label="Pesquisar" value="<?= (isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '') ?>">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
		      	<i class="fas fa-search"></i>	
		      </button>
		      <a href="./avaliacao.php" class="btn btn-outline-warning my-2 my-sm-0">
		      	<i class="fas fa-trash-alt"></i>
		      </a>
	    </form>
	</div>

<!-- 	<div class="col-2">
		<a href="form_avaliacao.php" class="btn btn-success">Novo Comentário</a>
	</div> -->

</div>
<div class="row">
	<table class="table table-hover table-responsive-lg">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Avaliação</th>
				<th>Data</th>
				<th>Usuário</th>
				<th>Filme</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($avaliacoes as $avaliacao) { 
				$usuario_id = $usuarioDAO->get($avaliacao->getUsuarioId());
				$filme_id = $filmeDAO->get($avaliacao->getFilmeId());
			?>
			
			<tr>
				<td><?= $avaliacao->getId() ?></td>
				<td>
					<img style="width: 100px" src="./assets/img/estrelas/<?= $avaliacao->getavaliacao() ?>.png">
				</td>
				<td><?= $avaliacao->getDataavaliacao() ?></td>
				<td><?= $usuario_id->getNome() ?></td>
				<td><?= $filme_id->getNome() ?></td>

				<td>
					<a href="form_avaliacao.php?id=<?= $avaliacao->getId() ?>" class="btn btn-warning">
						<i class="fas fa-edit"></i>
					</a>					
					<a href="controle_avaliacao.php?acao=deletar&id=<?= $avaliacao->getId() ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente exluir o avaliacao?')">
						<i class="fas fa-trash-alt"></i>
					</a>
				</td>

			</tr>
		
			<?php } ?>
		</tbody>
	</table>	
</div>

<?php include './layout/footer.php';?>
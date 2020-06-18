<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Genero.php';
require 'classes/Filme.php';
require 'classes/Diretor.php';
require 'classes/FilmeGenero.php';
require 'classes/GeneroDAO.php';
require 'classes/FilmeDAO.php';
require 'classes/DiretorDAO.php';
require 'classes/FilmeGeneroDAO.php';

$filmeDAO = new FilmeDAO();
$filmes = $filmeDAO->listar();
$generoDAO = new GeneroDAO();
$diretorDAO = new DiretorDAO();
$filmeGeneroDAO = new FilmeGeneroDAO();

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
	$filmes = $filmeDAO->listar($_GET['pesquisa']);
} else {
	$filmes = $filmeDAO->listar();
}

?>

	<div class="row" style="margin-top:40px">
		<div class="col-6">
			<h2>Gerenciar Filmes</h2>
		</div>

	<div class="col-4">
		<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Digite um filme" aria-label="Pesquisar" value="<?= (isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '') ?>">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
		      	<i class="fas fa-search"></i>	
		      </button>
		      <a href="./filme.php" class="btn btn-outline-warning my-2 my-sm-0">
		      	<i class="fas fa-trash-alt"></i>
		      </a>
	    </form>
	</div>

		<div class="col-2">
			<a href="form_filme.php" class="btn btn-success">Novo Filme</a>
	</div>

	<div class="container">	
		<ul id="filmeContainer">
		<?php foreach ($filmes as $filme) { 
			$diretor = $diretorDAO->get($filme->getDiretor());
		?>
			<li id="filme">
				<strong></strong>
				<img src="assets/img/filme/<?= ($filme->getImagem() != '' && file_exists('assets/img/filme/'.$filme->getImagem()) ? $filme->getImagem() : 'filme.png') ?>" alt="">

				<strong>ID:</strong>
				<p><?= $filme->getId() ?></p>

				<strong>Nome:</strong>
				<p><?= $filme->getNome() ?></p>

				<strong>Gênero:</strong>
				<p><?= $filme->nome_genero ?></p>
												
				<strong>Duração:</strong>
				<p><?= $filme->getDuracao() ?></p>
							
				<strong>Data de lançamento:</strong>
				<p><?= $filme->getDataLancamento() ?></p>

				<strong>URL do Trailer:</strong>
				<p><?= $filme->getUrl() ?></p>

				<strong>Tipo:</strong>
				<p><?= $filme->getTipo() ?></p>
							
				<strong>Sinopse:</strong>
				<p><?= $filme->getSinopse() ?></p>
							
				<strong>Elenco:</strong>
				<p><?= $filme->getElenco() ?></p>
							
				<strong>Diretor:</strong>
				<p><?= $diretor->getNome() ?></p>

				<a href="form_filme.php?id=<?= $filme->getId() ?>" data-toggle="tooltip" title="Editar Filme" class="btn btn-danger">
					<i class="fas fa-edit"></i>
				</a>					
				<a href="controle_filme.php?acao=deletar&id=<?= $filme->getId() ?>" class="btn btn-warning" onclick="return confirm('Deseja realmente exluir o filme?')">
					<i class="fas fa-trash-alt"></i>
				</a>
			</li>
		<?php } ?>
		</ul>
	</div>
	</div>
	
<!-- <div class="row">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Nome</th>
				<th>Gênero</th>
				<th>Duração</th>
				<th>Data de lançamento</th>
				<th>Sinopse</th>
				<th>Elenco</th>
				<th>Diretor</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($filmes as $filme) { 
				$genero = $generoDAO->get($filme->getGenero());
				$diretor = $diretorDAO->get($filme->getDiretor());
			?>

			<tr>
				<td><?= $filme->getId() ?></td>
				<td><?= $filme->getNome() ?></td>
				<td><?= $genero->getNome() ?></td>
				<td><?= $filme->getDuracao() ?></td>
				<td><?= $filme->getDataLancamento() ?></td>
				<td><?= $filme->getSinopse() ?></td>
				<td><?= $filme->getElenco() ?></td>
				<td><?= $diretor->getNome() ?></td> 

				<td>
					<a href="form_filme.php?id=<?= $filme->getId() ?>" data-toggle="tooltip" title="Editar Filme" class="btn btn-danger">
						Editar
					</a>					
					<a href="controle_filme.php?acao=deletar&id=<?= $filme->getId() ?>" class="btn btn-warning" onclick="return confirm('Deseja realmente exluir o gênero?')">
						Excluir
					</a>
				</td>
			</tr>		
			<?php } ?>
		</tbody>
	</table>	
</div> -->

<?php include './layout/footer.php';?>
<script type="text/javascript">
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
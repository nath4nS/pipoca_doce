<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Genero.php';
require 'classes/GeneroDAO.php';
$generoDAO = new GeneroDAO();
$generos = $generoDAO->listar();

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
	$generos = $generoDAO->listar($_GET['pesquisa']);
} else {
	$generos = $generoDAO->listar();
}

?>

<div class="row" style="margin-top:40px">
	<div class="col-6">
		<h2>Gerenciar Gêneros</h2>
	</div>

	<div class="col-4">
		<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Digite um gênero" aria-label="Pesquisar" value="<?= (isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '') ?>">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
		      	<i class="fas fa-search"></i>	
		      </button>
		      <a href="./genero.php" class="btn btn-outline-warning my-2 my-sm-0">
		      	<i class="fas fa-trash-alt"></i>
		      </a>
	    </form>
	</div>
	
	<div class="col-2">
		<a href="form_genero.php" class="btn btn-success">Novo Gênero</a>
	</div>

</div>
<div class="row">
	<table class="table table-hover ttable-responsive-lg">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($generos as $genero) { ?>
			
			<tr>
				<td><?= $genero->getId() ?></td>
				<td><?= $genero->getNome() ?></td>
				<td>
					<a href="form_genero.php?id=<?= $genero->getId() ?>" class="btn btn-danger">
						Editar
					</a>					
					<a href="controle_genero.php?acao=deletar&id=<?= $genero->getId() ?>" class="btn btn-warning" onclick="return confirm('Deseja realmente exluir o gênero?')">
						Excluir
					</a>
				</td>

			</tr>
		
			<?php } ?>
		</tbody>
	</table>	
</div>

<?php include './layout/footer.php';?>
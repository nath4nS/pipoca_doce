<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Diretor.php';
require 'classes/DiretorDAO.php';
$diretorDAO = new DiretorDAO();
$diretores = $diretorDAO->listar();

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
	$diretores = $diretorDAO->listar($_GET['pesquisa']);
} else {
	$diretores = $diretorDAO->listar();
}

?>

<div class="row" style="margin-top:40px">
	<div class="col-6">
		<h2>Gerenciar Diretor</h2>
	</div>

	<div class="col-4">
		<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Digite um diretor" aria-label="Pesquisar" value="<?= (isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '') ?>">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
		      	<i class="fas fa-search"></i>	
		      </button>
		      <a href="./diretor.php" class="btn btn-outline-warning my-2 my-sm-0">
		      	<i class="fas fa-trash-alt"></i>
		      </a>
	    </form>
	</div>

	<div class="col-2">
		<a href="form_diretor.php" class="btn btn-success">Novo Diretor</a>
	</div>

</div>
<div class="row">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($diretores as $diretor) { ?>
			
			<tr>
				<td><?= $diretor->getId() ?></td>
				<td><?= $diretor->getNome() ?></td>
				<td>
					<a href="form_diretor.php?id=<?= $diretor->getId() ?>" class="btn btn-danger">
						Editar
					</a>					
					<a href="controle_diretor.php?acao=deletar&id=<?= $diretor->getId() ?>" class="btn btn-warning" onclick="return confirm('Deseja realmente exluir o gênero?')">
						Excluir
					</a>
				</td>

			</tr>
		
			<?php } ?>
		</tbody>
	</table>	
</div>

<?php include './layout/footer.php';?>
<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Comentario.php';
require 'classes/ComentarioDAO.php';
$comentarioDAO = new ComentarioDAO();
$comentarios = $comentarioDAO->listar();

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
	$comentarios = $comentarioDAO->listar($_GET['pesquisa']);
} else {
	$comentarios = $comentarioDAO->listar();
}

?>

<div class="row" style="margin-top:40px">
	<div class="col-6">
		<h2>Gerenciar Comentário</h2>
	</div>

	<div class="col-4">
		<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Digite um Comentario" aria-label="Pesquisar" value="<?= (isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '') ?>">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
		      	<i class="fas fa-search"></i>	
		      </button>
		      <a href="./comentario.php" class="btn btn-outline-warning my-2 my-sm-0">
		      	<i class="fas fa-trash-alt"></i>
		      </a>
	    </form>
	</div>

<!-- 	<div class="col-2">
		<a href="form_comentario.php" class="btn btn-success">Novo Comentário</a>
	</div> -->

</div>
<div class="row">
	<table class="table table-hover table-responsive-lg">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Nome</th>
				<th>Data</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($comentarios as $comentario) { ?>
			
			<tr>
				<td><?= $comentario->getId() ?></td>
				<td><?= $comentario->getDescricao() ?></td>
				<td><?= $comentario->getdata() ?></td>
				<td>
					<a href="form_comentarios.php?id=<?= $comentario->getId() ?>" class="btn btn-danger">
						<i class="fas fa-edit"></i>
					</a>					
					<a href="controle_comentarios.php?acao=deletar&id=<?= $comentario->getId() ?>" class="btn btn-warning" onclick="return confirm('Deseja realmente exluir o comentario?')">
						<i class="fas fa-trash-alt"></i>
					</a>
				</td>

			</tr>
		
			<?php } ?>
		</tbody>
	</table>	
</div>

<?php include './layout/footer.php';?>
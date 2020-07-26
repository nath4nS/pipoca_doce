<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Comentario.php';
require 'classes/ComentarioDAO.php';
$comentarioDAO = new ComentarioDAO();
$comentarios = $comentarioDAO->listar();

require 'classes/Usuario.php';
require 'classes/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listar();

require 'classes/Filme.php';
require 'classes/FilmeDAO.php';
$filmeDAO = new FilmeDAO();
$filmes = $filmeDAO->listar();

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
	$comentarios = $comentarioDAO->listar($_GET['pesquisa']);
} else {
	$comentarios = $comentarioDAO->listar();
}

?>

<div class="row" style="margin-top:40px">
	<div class="col-6">
		<h2>Gerenciar Comentários</h2>
	</div>

	<div class="col-4">
		<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Digite um Comentário" aria-label="Pesquisar" value="<?= (isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '') ?>">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
		      	<i class="fas fa-search"></i>	
		      </button>
		      <a href="./comentario.php" class="btn btn-outline-warning my-2 my-sm-0">
		      	<i class="fas fa-trash-alt"></i>
		      </a>
	    </form>
	</div>

</div>
<div class="row">
	<table class="table table-hover table-responsive-lg">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Comentário</th>
				<th>Data</th>
				<th>Usuário</th>
				<th>Filme</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($comentarios as $comentario) { 
				$usuario_id = $usuarioDAO->get($comentario->getUsuarioId());
				$filme_id = $filmeDAO->get($comentario->getFilmeId());
			?>
			
			<tr>
				<td><?= $comentario->getId() ?></td>
				<td><?= $comentario->getComentario() ?></td> 
				<!-- <td data-toggle="tooltip" title="<?= ($comentario->getComentario() != '' ? $comentario->getComentario() : ''); ?>"><?= ($comentario->getComentario != '' ? substr($comentario->getComentario(),0,15).'...' : ''); ?></td>
				<td> -->
				<td><?= $comentario->getDataComentario() ?></td>
				<td><?= $usuario_id->getNome() ?></td>
				<td><?= $filme_id->getNome() ?></td>

				<td>			
					<a href="controle_comentarios.php?acao=deletar&id=<?= $comentario->getId() ?>" title="Excluir comentário" class="btn btn-danger" onclick="return confirm('Deseja realmente exluir o comentario?')">
						<i class="fas fa-trash-alt"></i>
					</a>
				</td>

			</tr>
		
			<?php } ?>
		</tbody>
	</table>	
</div>

<?php include './layout/footer.php';?>
<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Usuario.php';
require 'classes/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listar();

if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != '') {
	$usuarios = $usuarioDAO->listar($_GET['pesquisa']);
} else {
	$usuarios = $usuarioDAO->listar();
}

?>

<div class="row" style="margin-top:40px">
	<div class="col-6">
		<h2>Gerenciar Usuários</h2>
	</div>

	<div class="col-4">
		<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" name="pesquisa" type="search" placeholder="Digite um usuário" aria-label="Pesquisar" value="<?= (isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '') ?>">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
		      	<i class="fas fa-search"></i>	
		      </button>
		      <a href="./usuario.php" class="btn btn-outline-warning my-2 my-sm-0">
		      	<i class="fas fa-trash-alt"></i>
		      </a>
	    </form>
	</div>

	<div class="col-2">
		<a href="form_usuario.php" class="btn btn-success">Novo Usuário</a>
	</div>

</div>
<div class="row">
	<table class="table table-hover table-responsive-lg">
		<thead>
			<tr>
				<th></th>
				<th>#ID</th>
				<th>Nome</th>
				<th>Data de Nascimento</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($usuarios as $usuario) { ?>
			
			<tr>
				<td class="text-center">
					<img src="/assets/img/usuario/<?= ($usuario->getImagem() != '' && file_exists('assets/img/usuario/'.$usuario->getImagem()) ? $usuario->getImagem() : 'usuario.png') ?>" alt="" width="50" class="rounded-circle">
				</td>
				<td><?= $usuario->getId() ?></td>
				<td><?= $usuario->getNome() ?></td>
				<td><?= $usuario->getDataNascimento() ?></td>
				<td><?= $usuario->getEmail() ?></td>
				<td><?= $usuario->getTipo() ?></td>
				<td>
					<a href="form_usuario.php?id=<?= $usuario->getId() ?>" class="btn btn-danger">
						Editar
					</a>					
					<a href="controle_usuario.php?acao=deletar&id=<?= $usuario->getId() ?>" class="btn btn-warning" onclick="return confirm('Deseja realmente exluir o gênero?')">
						Excluir
					</a>
				</td>

			</tr>
		
			<?php } ?>
		</tbody>
	</table>	
</div>

<?php include './layout/footer.php';?>
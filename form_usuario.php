<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Usuario.php';
require 'classes/UsuarioDAO.php';

$usuario = new Usuario();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->get($id);
	}
?>

<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar Usuário</h2>
	</div>
</div>
	
	<form action="controle_usuario.php?acao=<?= ( $usuario->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-3 text-center">
				<img src="./assets/img/usuario/<?= ($usuario->getImagem() != '' && file_exists('assets/img/usuario/'.$usuario->getImagem()) ? $usuario->getImagem() : 'usuario.png') ?>" alt="" width="150" class="rounded-circle img-thumbnail" id="fotopreview">
				<br>
				<br>
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="imagem" id="imagem">
					<label class="custom-file-label" for="imagem">Escolher...</label>
				</div>
		</div>

		<div class="col-6">			
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($usuario->getId() != '' ? $usuario->getId() : '')?>" readonly>
			</div>

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" value="<?=($usuario->getNome() != '' ? $usuario->getNome() : '')?>">
			</div>
					
			<div class="form-group">
				<label for="dataNascimento">Data de nascimento</label>
				<input type="text" class="form-control" name="dataNascimento" value="<?=($usuario->getDataNascimento() != '' ? $usuario->getDataNascimento() : '')?>">
			</div>
					
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" value="<?=($usuario->getEmail() != '' ? $usuario->getEmail() : '')?>">
			</div>
					
			<div class="form-group">
				<label for="password">Senha</label>
				<input type="password" class="form-control" name="senha" value="<?=($usuario->getSenha() != '' ? $usuario->getSenha() : '')?>">
			</div>

			<div class="form-group">
				<label for="tipo">Tipo</label>
				<input type="text" class="form-control" name="tipo" value="<?=($usuario->getTipo() != '' ? $usuario->getTipo() : '')?>">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button type="reset" class="btn btn-warning">Resetar</button>
			</div>
		</div>
	</form>
	

<?php include './layout/footer.php';?>

<script type="text/javascript">
var uploadfoto = document.getElementById('imagem');
var fotopreview = document.getElementById('fotopreview');

uploadfoto.addEventListener('change', function(e) {
	fotopreview.src = '/assets/img/loading.gif';
    showThumbnail(this.files);
});

function showThumbnail(files) {
    if (files && files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
       fotopreview.src = e.target.result;
    }

        reader.readAsDataURL(files[0]);
    }
}

$('input[name="dataNascimento"]').mask('99/99/9999');
</script>
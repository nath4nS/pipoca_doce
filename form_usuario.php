<?php include 'layout/header.php';?>
<?php include 'layout/menu.php';?>
<?php

require 'admin/classes/Usuario.php';
require 'admin/classes/UsuarioDAO.php';

$usuario = new Usuario();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->get($id);
	}
?>
<div class="container">
	<p>&nbsp;</p>
	<div class="row">
		<div class="col" style=" margin-left: 90px;">
			<h2>Fazer Login da conta</h2>
		</div>
		<div class="col">
			<h2>Cadastrar-se</h2>
		</div>
	</div>
	<p>&nbsp;</p>
	<div class="row">
		<div class="col">
			<form action="logar.php" method="post">
				<div class="form-group row login">
					<input type="email" name="email" id="email" class="form-control" required onfocus="this.removeAttribute('readonly');" readonly autofocus placeholder="Email">
				</div>
				<div class="form-group row login">
							<!-- <label for="senha">Senha:</label> -->
					<input type="password" name="senha" id="senha" class="form-control col-10" required onfocus="this.removeAttribute('readonly');" readonly placeholder="Senha">
						<a href="#" class="btn-show-password btn btn-outline-secondary col-2" >
							<i class="far fa-eye olho"></i>
						</a>
				</div>
				<br>
				<div class="form-group row">
					<button type="submit" class="button-login btn btn-primary">Entrar</button>
				</div>
			</form>
		</div>

		<div class="col">
			<form action="controle_usuario.php?acao=cadastrar" method="post" enctype="multipart/form-data">
				<div class="row">
				<div>			
					<div class="form-group row login">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" name="nome" id="nome" required value="<?=($usuario->getNome())?>">
					</div>
							
					<div class="form-group row login">
						<label for="dataNascimento">Data de nascimento</label>
						<input type="date" class="form-control" name="dataNascimento" id="dataNascimento" value="<?=($usuario->getDataNascimentoBD())?>">
					</div>
							
					<div class="form-group row login">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" required value="<?=($usuario->getEmail())?>">
					</div>
							
					<div class="form-group row login">
						<label for="password">Senha</label>
						<input type="password" class="form-control" name="senha" id="senha" required>
					</div>

					<div class="form-group row login">
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include_once 'layout/footer.php';?>
<script>
$(document).ready(function(){
	$('.btn-show-password').on('click', function() {
        var campoPassword = $('#senha');
      	campoTipo = campoPassword.attr('type');

      	if(campoTipo == 'password') {
        	campoPassword.attr('type', 'text');
        	$('.btn-show-password').html('<i class="fas fa-eye-slash olho"></i>');
      	} else {
      		campoPassword.attr('type', 'password');
      		$('.btn-show-password').html('<i class="far fa-eye olho"></i>');
      	}

	});
});
</script>
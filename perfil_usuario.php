<?php 
include_once 'layout/header.php';
include_once 'layout/menu.php';
include_once 'admin/classes/RelatorioDAO.php';
include_once('admin/classes/Comentario.php');
include_once('admin/classes/ComentarioDAO.php');
require_once 'admin/classes/Usuario.php';
require_once 'admin/classes/UsuarioDAO.php';
include_once('admin/classes/Filme.php');
include_once('admin/classes/FilmeDAO.php');
include_once('admin/classes/Avaliacao.php');
include_once('admin/classes/AvaliacaoDAO.php');


$usuario = new Usuario();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$usuarioDAO = new UsuarioDAO();
		$usuario = $usuarioDAO->get($id);
	}
$filmeDAO = new FilmeDAO();
$avaliacaoDAO = new AvaliacaoDAO();
$avaliacoes = $avaliacaoDAO->mostrar($usuario->getId());
$comentarioDAO = new ComentarioDAO();
$comentarios = $comentarioDAO->mostrar($usuario->getId());
$relatorioDAO = new RelatorioDAO();
$total_avaliacao = $relatorioDAO->contarPerfil('avaliacao' , $usuario->getId());
$total_comentario = $relatorioDAO->contarPerfil('comentario', $usuario->getId());



?>
<div class="container">
	<div class="row ">
		<div class="col perfil">
			<h2>Perfil do usuário <?= ($usuario->getNome()) ?></h2>
		</div>
	</div>
	<form  action="controle_usuario.php?acao=editar" method="post" enctype="multipart/form-data">
		<div class="col text-center perfil">
			<img src="admin/assets/img/usuario/<?= (($usuario->getImagem()) != '' && file_exists('admin/assets/img/usuario/'.$usuario->getImagem()) ? $usuario->getImagem() : 'usuario.png') ?>" alt="" width="150" class="rounded-circle img-thumbnail" id="fotopreview">
			<br>
			<br>
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="imagem" id="imagem">
				<label class="custom-file-label" for="imagem">Trocar Imagem</label>
			</div>
		</div>
		<div class="col perfil">
			<div class="form-group">
				<input type="hidden" class="form-control" name="id" id="id" value="<?=($usuario->getId() != '' ? $usuario->getId() : '')?>">
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" name="tipo" id="tipo" value="<?=($usuario->getTipo() != '' ? $usuario->getTipo() : '')?>">
			</div>	
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" required value="<?=(($usuario->getNome()))?>">
			</div>		
			<div class="form-group">
				<label for="dataNascimento">Data de nascimento</label>
				<input type="date" class="form-control" name="dataNascimento" id="dataNascimento" value="<?=($usuario->getDataNascimentoBD())?>">
			</div>		
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" name="email" id="email" required value="<?=($usuario->getEmail() != '' ? $usuario->getEmail() : '')?>">
			</div>
						
			<div class="form-group">
				<label for="password">Senha</label>
				<input type="password" class="form-control" name="senha" id="senha" <?= ($usuario->getId() == '' ? ' required' : '' ) ?>>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button type="reset" class="btn btn-warning">Resetar</button>
			</div>
		</div>		
	</form>
	<p>&nbsp;</p>
	<div class="row">
		<div class="col-3 caixa">
			<div class="card">
				<strong>
					<div class="card-header">Nº de filmes Avaliados</div>
					<div class="card-body card-dashboard">
						<p class="total card-text"><?= $total_avaliacao['total'] ?? 0; ?></p>
						<?php include_once('perfil_avaliacao.php'); ?>
					</div>
				</strong>
			</div>
		</div>
		<div class="col-3 caixa2">
			<div class="card">
				<strong>
					<div class="card-header">Nº de filmes Comentados</div>
					<div class="card-body card-dashboard">
						<p class="total card-text"><?= $total_comentario['total'] ?? 0; ?></p>
						<?php include_once('perfil_comentarios.php'); ?>
					</div>
				</strong>
			</div>
		</div>
	</div>	
</div>

<?php  
	include_once('layout/footer.php');
?>
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

</script>
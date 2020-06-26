<?php 
	include_once('layout/header.php');
	include_once('layout/menu.php');
    include_once('admin/classes/Filme.php');
    include_once('admin/classes/FilmeDAO.php');
    include_once('admin/classes/Genero.php');
	include_once('admin/classes/GeneroDAO.php');
	include_once('admin/classes/Diretor.php');
	include_once('admin/classes/DiretorDAO.php');
	include_once('admin/classes/Avaliacao.php');
	include_once('admin/classes/AvaliacaoDAO.php');
	include_once('admin/classes/FilmeGenero.php');
	include_once('admin/classes/FilmeGeneroDAO.php');
	include_once('admin/classes/FilmeDiretor.php');
	include_once('admin/classes/FilmeDiretorDAO.php');
	include_once('admin/classes/Avaliacao.php');
	include_once('admin/classes/AvaliacaoDAO.php');
	include_once('admin/classes/Comentario.php');
	include_once('admin/classes/ComentarioDAO.php');
	include_once('admin/classes/Usuario.php');
	include_once('admin/classes/UsuarioDAO.php');


	$filme = new filme();
	$id = $_GET['id'];
	$filmeDAO = new FilmeDAO();
	$filme = $filmeDAO->get($id);
	$generos = $filmeDAO->getGeneros($id);
	$filmeGeneroDAO = new FilmeGeneroDAO();
	$generoDAO = new GeneroDAO();
	$diretorDAO = new DiretorDAO();
	$filmeDiretorDAO = new FilmeDiretorDAO();
	$diretores = $filmeDAO->getDiretor($id);
	$avaliacaoDAO = new AvaliacaoDAO();
	$avaliacoes = $avaliacaoDAO->listarAvaliacao($id);
	$comentarioDAO = new ComentarioDAO();
	$comentarios = $comentarioDAO->listarComentario($id);
	$usuarioDAO = new UsuarioDAO();
	$usuarios = $usuarioDAO->listar();
	

?>

<iframe src="<?= ($filme->getUrl()) ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<p>&nbsp;</p>
<div class="row">
	<div class="col-md-4">
		<img src="admin/assets/img/filme/<?= ($filme->getImagem()) ?>" class="filme_pag">

		<?php foreach($avaliacoes as $avaliacao): ?>
			<img class="estrela" src="admin/assets/img/estrelas/<?= ($avaliacao->getAvaliacao() != '' ? $avaliacao->getAvaliacao() : 0) ?>.png">
			(<?= ($avaliacao->getAvaliacao() != '' ? $avaliacao->getAvaliacao() : 0) ?> / 5)
		<?php 
			endforeach; 
			include('avaliacao.php');
		?>

	</div>
	<div class="col-md-8">
		<h1 class="filme_pag"><?= ($filme->getNome()) ?></h1>
		<p class="filme_pag" style="text-align: justify;"><?= ($filme->getSinopse()) ?></p>
		<h3 class="afasta_top">
			<strong>
				Elenco: 				
			</strong>
		</h3>
			<p id="elenco"><?= ($filme->getElenco()) ?></p>
		<h3>
			<strong>				
				Diretor(es):
			</strong>
			<p id="diretor">
			<?php foreach($diretores as $diretor): ?>
				<?= $diretor->getNome() ?>
				<br>
			<?php endforeach; ?>
			</p>
		</h3>
		<h3>
			<strong>
				Data de Estreia:
			</strong>
			<p id="elenco">
				<?= ($filme->getDataLancamento()) ?>
			</p>
		</h3>
		<h3>
			<strong>
				Tempo de Filme:
			</strong>
			<p id="elenco">
				<?= ($filme->getDuracao()) ?>
			</p>
		</h3>
	</div>
</div>
<div class="genero">
	<h3>
		<strong>	
			Gênero:
		</strong>
	</h3>
</div>
<div class="row">
	<div class="col-md-8 genero">
		<?php
		foreach($generos as $genero): 
		$cor = array('roxo', 'vermelho', 'verde', 'azul', 'laranja', 'marinho', 'marrom');
		$random = array_rand ( $cor, 2);
		?>
		<span class="badge <?php echo $cor[$random[0]]; ?>">
			<?= $genero->getNome() ?>
		</span>
		<?php endforeach; ?>
	</div>
</div>
<p>&nbsp;</p>	
<div class="row" id="fundo_cinza">
	<div class="col-6 offset-3">
		<?php include_once('comentario.php'); ?>
	</div>
</div> 
<?php  
	include_once('layout/footer.php');
?>
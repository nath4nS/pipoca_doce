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

	$generoDAO = new GeneroDAO();
	$generos = $generoDAO->listar();
	$diretorDAO = new DiretorDAO();
	$diretores = $diretorDAO->listar();
	$filme = new filme();
	$id = $_GET['id'];
	$filmeDAO = new FilmeDAO();
	$filme = $filmeDAO->get($id);
?>

<iframe src="<?= ($filme->getUrl()) ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<p>&nbsp;</p>
<div class="row">
	<div class="col-md-4">
		<img src="admin/assets/img/filme/<?= ($filme->getImagem()) ?>" class="filme_pag">
	</div>
	<div class="col-md-8">
		<h1 class="filme_pag"><?= ($filme->getNome()) ?></h1>
		<p class="filme_pag" style="text-align: justify;"><?= ($filme->getSinopse()) ?></p>
	</div>
</div>

<?php  
	include_once('layout/footer.php');
?>
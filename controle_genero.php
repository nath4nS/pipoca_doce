<?php
require 'classes/Genero.php';
require 'classes/GeneroDAO.php';

$genero = new Genero();
$generoDAO = new GeneroDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != '') {
	$id= $_GET['id'];
}

if($acao == 'deletar') {

	$generoDAO->deletar($id);
	$msg = 'Gênero excluído com sucesso';

	header("Location: genero.php?msg=$msg");

} else if($acao == 'cadastrar') {

	$genero->setNome($_POST['nome']);

	$id = $generoDAO->insereGenero($genero);
	$msg = 'Gênero cadastrado com sucesso';

	header("Location: form_genero.php?id=$id&msg=$msg");

} else if($acao == 'editar') {

	$id = $_POST['id'];
	$genero->setId($_POST['id']);
	$genero->setNome($_POST['nome']);

	$generoDAO->alteraGenero($genero);
	$msg = 'Gênero alterado com sucesso';

	header("Location: form_genero.php?id=$id&msg=$msg");
}
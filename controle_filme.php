<?php
require 'classes/Filme.php';
require 'classes/Genero.php';
require 'classes/Diretor.php';
require 'classes/FilmeDAO.php';
require 'classes/GeneroDAO.php';
require 'classes/DiretorDAO.php';

$filme = new Filme();
$filmeDAO = new FilmeDAO();
$generoDAO = new GeneroDAO();
$diretorDAO = new DiretorDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != '') {
	$id= $_GET['id'];
}

if($acao == 'deletar') {

	$filmeDAO->deletar($id);
	$msg = 'Filme excluído com sucesso';

	header("Location: filme.php?msg=$msg");

} else if($acao == 'cadastrar') {

	$genero = $generoDAO->get($_POST['genero']);
	$diretor = $diretorDAO->get($_POST['diretor']);

	$filme->setNome($_POST['nome']);
	$filme->setDuracao($_POST['duracao']);
	$filme->setDataLancamento($_POST['dataLancamento']);
	$filme->setSinopse($_POST['sinopse']);
	$filme->setElenco($_POST['elenco']);
	$filme->setGenero($genero);
	$filme->setDiretor($diretor);

	$id = $filmeDAO->insereFilme($filme);
	$msg = 'filme cadastrado com sucesso';

	header("Location: form_filme.php?id=$id&msg=$msg");

} else if($acao == 'editar') {

	$id = $_POST['id'];
	$genero = $generoDAO->get($_POST['genero']);
	$diretor = $diretorDAO->get($_POST['diretor']);
	
	$filme->setId($_POST['id']);
	$filme->setNome($_POST['nome']);
	$filme->setDuracao($_POST['duracao']);
	$filme->setDataLancamento($_POST['dataLancamento']);
	$filme->setSinopse($_POST['sinopse']);
	$filme->setElenco($_POST['elenco']);
	$filme->setGenero($genero);
	$filme->setDiretor($diretor);

	$filmeDAO->alteraFilme($filme);
	$msg = 'filme alterado com sucesso';

	header("Location: form_filme.php?id=$id&msg=$msg");
}
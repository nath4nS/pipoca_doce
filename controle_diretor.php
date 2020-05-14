<?php
require 'classes/Diretor.php';
require 'classes/DiretorDAO.php';

$diretor = new Diretor();
$diretorDAO = new DiretorDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != '') {
	$id= $_GET['id'];
}

if($acao == 'deletar') {

	$diretorDAO->deletar($id);
	$msg = 'Diretor excluído com sucesso';

	header("Location: diretor.php?msg=$msg");

} else if($acao == 'cadastrar') {

	$diretor->setNome($_POST['nome']);

	$id_diretor = $diretorDAO->insereDiretor($diretor);
	$msg = 'Diretor cadastrado com sucesso';

	header("Location: form_diretor.php?id=$id&msg=$msg");

} else if($acao == 'editar') {

	$id_diretor = $_POST['id'];
	
	$diretor->setId($_POST['id']);
	$diretor->setNome($_POST['nome']);

	$diretorDAO->alteraDiretor($diretor);
	$msg = 'Diretor alterado com sucesso';

	header("Location: form_diretor.php?id=$id&msg=$msg");
}
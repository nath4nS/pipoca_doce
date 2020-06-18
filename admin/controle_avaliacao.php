<?php
require 'classes/Avaliacao.php';
require 'classes/AvaliacaoDAO.php';

$avaliacao = new Avaliacao();
$avaliacaoDAO = new AvaliacaoDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != '') {
	$id= $_GET['id'];
}

if($acao == 'deletar') {

	$avaliacaoDAO->deletar($id);
	$msg = 'Avaliacao excluído com sucesso';

	header("Location: avaliacao.php?msg=$msg");

} else if($acao == 'cadastrar') {

	$avaliacao->setAvaliacao($_POST['avaliacao']);
	$avaliacao->setDataAvaliacao($_POST['data_avaliacao']);

	$id = $avaliacaoDAO->insereAvaliacao($avaliacao);
	$msg = 'avaliacao cadastrado com sucesso';

	header("Location: form_avaliacao.php?id=$id&msg=$msg");

} else if($acao == 'editar') {
	$id = $_POST['id'];
	
	$avaliacao->setId($_POST['id']);
	$avaliacao->setDataAvaliacao($_POST['data_avaliacao']);
	$avaliacao->setAvaliacao($_POST['avaliacao']);
	/*print_r($avaliacao);exit;*/

	$avaliacaoDAO->alteraAvaliacao($avaliacao);
	$msg = 'comentario alterado com sucesso';

	header("Location: form_avaliacao.php?id=$id&msg=$msg");
}
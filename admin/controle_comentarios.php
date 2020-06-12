<?php
require 'classes/Comentario.php';
require 'classes/ComentarioDAO.php';

$comentario = new Comentario();
$comentarioDAO = new ComentarioDAO();

$acao = $_GET['acao'];
$id = '';
if(isset($_GET['id']) && $_GET['id'] != '') {
	$id= $_GET['id'];
}

if($acao == 'deletar') {

	$comentario->deletar($id);
	$msg = 'Diretor excluído com sucesso';

	header("Location: diretor.php?msg=$msg");

} else if($acao == 'cadastrar') {

	$comentario->setDescricao($_POST['descricao']);
	$comentario->setData($_POST['data']);

	$id = $comentario->insereComentario($comentario);
	$msg = 'comentario cadastrado com sucesso';

	header("Location: form_comentario.php?id=$id&msg=$msg");

} else if($acao == 'editar') {

	$id = $_POST['id'];
	
	$comentario->setId($_POST['id']);
	$comentario->setDescricao($_POST['descricao']);
	$comentario->setData($_POST['data']);

	$comentario->alteraComentario($comentario);
	$msg = 'comentario alterado com sucesso';

	header("Location: form_diretor.php?id=$id&msg=$msg");
}
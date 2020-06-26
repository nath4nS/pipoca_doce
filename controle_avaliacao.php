<?php
session_start();
require 'admin/classes/Avaliacao.php';
require 'admin/classes/AvaliacaoDAO.php';

$avaliacao = new Avaliacao();
$avaliacaoDAO = new AvaliacaoDAO();


	$id_filme = $_GET['id'];

	$avaliacao->setAvaliacao($_POST['avaliacao']);
	$avaliacao->setDataAvaliacao(date('Y-m-d H:i:s')) ;
	$avaliacao->setUsuarioId($_SESSION['id_usuario']) ;
	$avaliacao->setFilmeId($id_filme) ; 

	

	$id = $avaliacaoDAO->insereAvaliacao($avaliacao);
	$msg = 'avaliacao cadastrado com sucesso';

	header("Location: filme.php?id=$id&msg=$msg");

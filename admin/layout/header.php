<?php require_once 'includes/validacao.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pipoca-Doce</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">

</head>
<body>
	<nav class="navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" href="home.php" style="margin-left: 17px;">
			<img src=./assets/img/logo1.png style="width: 160px"/>
		</a>

		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
        		<span class="navbar-text">
        			<a href="form_usuario.php?id=<?= $_SESSION['id_usuario'] ?>">
	              		<strong>
	               			Olá, <?= $_SESSION['nome'] ?>
	              		</strong>
              		<img src="./assets/img/usuario/<?= ($_SESSION['imagem'] != '' && file_exists('assets/img/usuario/'.$_SESSION['imagem']) ? $_SESSION['imagem'] : 'usuario.png' ) ?>" class="rounded-circle user-img-menu">
            		</a>
        			<small><a class="btn btn-outline-danger btn-sm" href="logout.php" onclick="return confirm('Deseja realmente sair?')">
        				Sair
        			</a>
        			</small>
      			</span>
			</ul>
		</div>
	</nav>

	<div class="d-flex">
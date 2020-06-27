<?php 
session_start();
if($_SESSION['tipo'] != 1){
	$msg = "Sessão finalizada.";
	header("Location: index.php?msg=$msg");
}
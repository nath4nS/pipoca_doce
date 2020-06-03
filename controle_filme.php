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

/**Configurações de upload de imagens*/

$upload['pasta_filme'] = 'assets/img/filme/';
$upload['extensoes'] = ['jpg', 'png', 'gif'];

$upload['erros'][0] = 'Não houve erro';
$upload['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$upload['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$upload['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$upload['erros'][4] = 'Não foi feito o upload do arquivo';

if($acao == 'deletar') {

	$filmeDAO->deletar($id);
	$msg = 'Filme excluído com sucesso';

	header("Location: filme.php?msg=$msg");

} else if($acao == 'cadastrar') {

		if($_FILES['imagem']['name'] != '') {

		if ($_FILES['imagem']['error'] != 0) {
		  $msg = "Não foi possível fazer o upload, erro:" . $upload['erros'][$_FILES['imagem']['error']];
		  header("Location: form_filme.php?msg=$msg");
		  exit;
		}

		$imagem = explode('.', $_FILES['imagem']['name']);
		$extensao = strtolower(end($imagem));
		if(array_search($extensao, $upload['extensoes']) === false) {
		  $msg = "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
		  header("Location: form_filme.php?msg=$msg");
		  exit;
		}
		$nome_final = $imagem[0] . '-' . date('YmdHmi') . '.' . $extensao;
		// Depois verifica se é possível mover o arquivo para a pasta escolhida
		if (move_uploaded_file($_FILES['imagem']['tmp_name'], $upload['pasta_filme'] . $nome_final)) {
			$filme->setImagem($nome_final);
		} else {
		  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
		  $msg = "Não foi possível enviar o arquivo, tente novamente";
		  header("Location: form_filme.php?msg=$msg");
		  exit;
		}
	}

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


	if($_FILES['imagem']['name'] != '') {

			if ($_FILES['imagem']['error'] != 0) {
			  $msg = "Não foi possível fazer o upload, erro:" . $upload['erros'][$_FILES['imagem']['error']];
			  header("Location: form_filme.php?id=$id&msg=$msg");
			  exit;
			}

			$imagem = explode('.', $_FILES['imagem']['name']);
			$extensao = strtolower(end($imagem));
			if(array_search($extensao, $upload['extensoes']) === false) {
			  $msg = "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
			  header("Location: form_filme.php?id=$id&msg=$msg");
			  exit;
			}
			$nome_final = $imagem[0] . '-' . date('YmdHmi') . '.' . $extensao;

			

			// Depois verifica se é possível mover o arquivo para a pasta escolhida
			if (move_uploaded_file($_FILES['imagem']['tmp_name'], $upload['pasta_filme'] . $nome_final)) {

				//incluindo a imagem nova no registro do filme
				$filme->setImagem($nome_final);

				//alimentando um filme temporário
				$filmeTemp = $filmeDAO->get($id);
				//montando link da imagem atual do filme, representado pelo filme temporario
				$imagem_a_remover = $upload['pasta_filme'] . $filmeTemp->getImagem();
				//removendo a imagem antiga
				if( $filmeTemp->getImagem() != '' AND file_exists($imagem_a_remover) ) {
					unlink($imagem_a_remover);
				}

			} else {
			  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
			  $msg = "Não foi possível enviar o arquivo, tente novamente";
			  header("Location: form_filme.php?id=$id&msg=$msg");
			  exit;
			}
		}
	
	$filme->setId($_POST['id']);
	$filme->setNome($_POST['nome']);
	$filme->setDuracao($_POST['duracao']);
	$filme->setDataLancamento($_POST['dataLancamento']);
	$filme->setSinopse($_POST['sinopse']);
	$filme->setElenco($_POST['elenco']);
	$filme->setGenero($genero);
	$filme->setDiretor($diretor);
	//print_r($filme); exit;

	$filmeDAO->alteraFilme($filme);
	$msg = 'filme alterado com sucesso';

	header("Location: form_filme.php?id=$id&msg=$msg");
} else if($acao == 'removeImagem') {
	$filme = $filmeDAO->get($id);

	$imagem_a_remover = $upload['pasta_filme'] . $filme->getImagem();
	//removendo a imagem antiga
	if( file_exists($imagem_a_remover) ) {
		unlink($imagem_a_remover);
	}
	$filme->setImagem('--');
	$filmeDAO->alterafilme($filme);

	$msg = 'Imagem removida com sucesso';
	
	header("Location: filme.php?msg=$msg");

}
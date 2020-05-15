<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Filme.php';
require 'classes/FilmeDAO.php';
require 'classes/GeneroDAO.php';
/*require 'classes/Diretor.php';*/
require 'classes/DiretorDAO.php';

$filme = new Filme();
$generoDAO = new GeneroDAO();
$generos = $generoDAO->listar();
$diretorDAO = new DiretorDAO();
$diretores = $diretorDAO->listar();
/*print_r($diretorDAO);*/

	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$filmeDAO = new FilmeDAO();
		$filme = $filmeDAO->get($id);
	}
?>

<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar Filme</h2>
	</div>
</div>

<div class="row">
	<div class="col-6 offset-3">
		<form action="controle_filme.php?acao=<?= ( $filme->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post">
			
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($filme->getId() != '' ? $filme->getId() : '')?>" readonly>
			</div>

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" value="<?=($filme->getNome() != '' ? $filme->getNome() : '')?>">
			</div>

			<div class="form-group">
				<label for="genero">Gênero</label>
				<select name="genero" id="genero" class="form-control" required>
					<option value="">Selecione um genero</option>
						<?php foreach($generos as $genero) : ?>
							<option value="<?= $genero['id']; ?>"><?= $genero['nome']; ?></option>
						<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="duracao">Duracao</label>
				<input type="text" class="form-control" name="duracao" value="<?=($filme->getDuracao() != '' ? $filme->getDuracao() : '')?>">
			</div>

			<div class="form-group">
				<label for="dataLancamento">Data de Lancamento</label>
				<input type="text" class="form-control" name="dataLancamento" value="<?=($filme->getDataLancamento() != '' ? $filme->getDataLancamento() : '')?>">
			</div>

			<div class="form-group">
				<label for="sinopse">Sinopse</label>
				<input type="text" class="form-control" name="sinopse" value="<?=($filme->getSinopse() != '' ? $filme->getSinopse() : '')?>">
			</div>

			<div class="form-group">
				<label for="elenco">Elenco</label>
				<input type="text" class="form-control" name="elenco" value="<?=($filme->getElenco() != '' ? $filme->getElenco() : '')?>">
			</div>

			<div class="form-group">
				<label for="diretor">Diretor</label>
				<select name="diretor" id="diretor" class="form-control" required>
					<option value="">Selecione um diretor</option>
						<?php foreach($diretores as $diretor) : ?>
							<?php print_r($diretor);  ?>
							<option value="<?= $diretor['id']; ?>"><?= $diretor['nome']; ?></option>
						<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button type="reset" class="btn btn-warning">Resetar</button>
			</div>

		</form>
	</div>
</div>	


<?php include './layout/footer.php';?>

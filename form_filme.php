<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Genero.php';
require 'classes/GeneroDAO.php';
require 'classes/Diretor.php';
require 'classes/DiretorDAO.php';

$generoDAO = new GeneroDAO();
$generos = $generoDAO->listar();
$diretorDAO = new DiretorDAO();
$diretores = $diretorDAO->listar();

require 'classes/Filme.php';
require 'classes/FilmeDAO.php';

$filme = new filme();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$filmeDAO = new FilmeDAO();
		$filme = $filmeDAO->get($id);
	}
?>

<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar um novo filme</h2>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form action="controle_filme.php?acao=<?= ( $filme->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post" enctype="multipart/form-data">

			<div class="row">
				<div class="col-3 text-center">
					<img src="./assets/img/filme/<?= ($filme->getImagem() != '' && file_exists('assets/img/filme/'.$filme->getImagem()) ? $filme->getImagem() : 'filme.png') ?>" alt="" width="160"  id="fotopreview">
					<br>
					<br>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="imagem" id="imagem">
						<label class="custom-file-label" for="imagem">Escolher...</label>
					</div>
			</div>
			
			<div class="col-6">
				
			
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($filme->getId() != '' ? $filme->getId() : '')?>" readonly>
			</div>

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" required value="<?=($filme->getNome() != '' ? $filme->getNome() : '')?>">
			</div>

			<div class="form-group">
				<label for="genero">Gênero</label>
				<select name="genero" id="genero" class="form-control" required>
					<option value="">Selecione um gênero</option>
						<?php foreach($generos as $genero) : ?>
							<option value="<?= $genero->getId(); ?>"
								<?= ($filme->getGenero() != '' && 
								$filme->getGenero() == $genero->getId() 
								? 'selected' : '') ?>>
								<?= $genero->getNome(); ?>	
							</option>
						<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="duracao">Duração</label>
				<input type="text" class="form-control" name="duracao" required value="<?=($filme->getDuracao() != '' ? $filme->getDuracao() : '')?>">
			</div>

			<div class="form-group">
				<label for="dataLancamento">Data de Lançamento</label>
				<input type="text" class="form-control" name="dataLancamento" required value="<?=($filme->getDataLancamento() != '' ? $filme->getDataLancamento() : '')?>">
			</div>

			<div class="form-group">
				<label for="sinopse">Sinopse</label>
				<textarea type="text" class="form-control" name="sinopse" required rows="6"><?=($filme->getSinopse() != '' ? $filme->getSinopse() : '')?></textarea>
			</div>

			<div class="form-group">
				<label for="elenco">Elenco</label>
				<input type="text" class="form-control" name="elenco" required value="<?=($filme->getElenco() != '' ? $filme->getElenco() : '')?>">
			</div>

			<div class="form-group">
				<label for="diretor">Diretor</label>
				<select name="diretor" id="diretor" class="form-control" required>
					<option value="">Selecione um diretor</option>
						<?php foreach($diretores as $diretor) : ?>
							<option value="<?= $diretor->getId(); ?>"
								<?= ($filme->getDiretor() != '' && 
								$filme->getDiretor() == $diretor->getId() 
								? 'selected' : '') ?>>
								<?= $diretor->getNome(); ?>	
							</option>
						<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button type="reset" class="btn btn-warning">Resetar</button>
			</div>
			</div>

		</form>
	</div>
</div>	


<?php include './layout/footer.php';?>

<script type="text/javascript">
var uploadfoto = document.getElementById('imagem');
var fotopreview = document.getElementById('fotopreview');

uploadfoto.addEventListener('change', function(e) {
	fotopreview.src = '/assets/img/loading.gif';
    showThumbnail(this.files);
});

function showThumbnail(files) {
    if (files && files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
       fotopreview.src = e.target.result;
    }

        reader.readAsDataURL(files[0]);
    }
}

</script>
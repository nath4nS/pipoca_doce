<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Diretor.php';
require 'classes/DiretorDAO.php';

$diretor = new Diretor();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$diretorDAO = new DiretorDAO();
		$diretor = $diretorDAO->get($id);
	}
?>

<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar Diretor</h2>
	</div>
</div>

<div class="row">
	<div class="col-6 offset-3">
		<form action="controle_diretor.php?acao=<?= ( $diretor->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post">
			
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($diretor->getId() != '' ? $diretor->getId() : '')?>" readonly>
			</div>

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" value="<?=($diretor->getNome() != '' ? $diretor->getNome() : '')?>">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button type="reset" class="btn btn-warning">Resetar</button>
			</div>

		</form>
	</div>
</div>	


<?php include './layout/footer.php';?>

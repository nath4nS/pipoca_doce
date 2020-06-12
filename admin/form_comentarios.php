<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Comentario.php';
require 'classes/ComentarioDAO.php';

$comentario = new Comentario();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$comentarioDAO = new ComentarioDAO();
		$comentario = $comentarioDAO->get($id);
	}
?>

<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar um novo comentario</h2>
	</div>
</div>

<div class="row">
	<div class="col-6 offset-3">
		<form action="controle_comentarios.php?acao=<?= ( $comentario->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post">
			
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($comentario->getId() != '' ? $comentario->getId() : '')?>" readonly>
			</div>

			<div class="form-group">
				<label for="descricao">Descrição</label>
				<input type="text" class="form-control" name="descricao" required value="<?=($comentario->getDescricao() != '' ? $comentario->getDescricao() : '')?>">
			</div>

			<div class="form-group">
				<label for="data">Data</label>
				<input type="text" class="form-control" name="data" required value="<?=($comentario->getData() != '' ? $comentario->getData() : '')?>">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button type="reset" class="btn btn-warning">Resetar</button>
			</div>

		</form>
	</div>
</div>	


<?php include './layout/footer.php';?>
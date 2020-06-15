<?php include './layout/header.php';?>
<?php include './layout/menu.php';?>
<?php

require 'classes/Avaliacao.php';
require 'classes/AvaliacaoDAO.php';

$avaliacao = new Avaliacao();
	if(isset($_GET['id']) && $_GET['id'] != '') {
		$id = $_GET['id'];
		$avaliacaoDAO = new AvaliacaoDAO();
		$avaliacao = $avaliacaoDAO->get($id);
	}
?>

<div class="row" style="margin-top:40px">
	<div class="col-6 offset-3">
		<h2>Cadastrar uma nova avaliacao</h2>
	</div>
</div>

<div class="row">
	<div class="col-6 offset-3">
		<form action="controle_avaliacao.php?acao=<?= ( $avaliacao->getId() != '' ? 'editar' : 'cadastrar' )?>" method="post">
			
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" id="id" value="<?=($avaliacao->getId() != '' ? $avaliacao->getId() : '')?>" readonly>
			</div>

			<div class="form-group">
<!-- 				<label for="avaliacao">Comentário</label>
				<input type="text" class="form-control" name="avaliacao" required value="<//?=($avaliacao->getAvaliacao() != '' ? $avaliacao->getAvaliacao() : '')?>"> -->
				<!-- <div class="form-group"> -->
					<label for="avaliacao">Avaliação</label>


				<div class="estrelas">
				  <input type="radio" id="cm_star-empty" name="avaliacao" value="" checked/>
				  <label for="cm_star-1"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-1" name="avaliacao" value="1"/ class="form-control">
				  <label for="cm_star-2"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-2" name="avaliacao" value="2"/>
				  <label for="cm_star-3"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-3" name="avaliacao" value="3"/>
				  <label for="cm_star-4"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-4" name="avaliacao" value="4"/>
				  <label for="cm_star-5"><i class="fa"></i></label>
				  <input type="radio" id="cm_star-5" name="avaliacao" value="5"/>
				</div>
				<!-- </div> -->
			</div>

			<div class="form-group">
				<label for="data_avaliacao">Data</label>
				<input type="text" class="form-control" name="data_avaliacao" required value="<?=($avaliacao->getDataAvaliacao() != '' ? $avaliacao->getDataAvaliacao() : '')?>">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button type="reset" class="btn btn-warning">Resetar</button>
			</div>

		</form>
	</div>
</div>	


<?php include './layout/footer.php';?>
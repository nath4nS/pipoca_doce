<p>&nbsp;</p>
	<table class="table table-sm table-dark">
		<thead>
		    <tr>
		      <th class="centraliza-tabela">
		      	<?php 
				    if(isset($_SESSION['nome'])) {
				    	$url = "controle_comentario.php?id=";
				    	$id_filme = $filme->getId();
				?>
				    <img src="admin/assets/img/usuario/<?= ($_SESSION['imagem'] != '' && file_exists('admin/assets/img/usuario/'.$_SESSION['imagem']) ? $_SESSION['imagem'] : 'usuario.png' ) ?>" class="rounded-circle user-img-menu menu-img coment-img">
				      <?= ($_SESSION['nome']) ?>
				<?php }else{ 
					$url = "form_usuario.php";
					$id_filme = '';
				?>
					<img src="admin/assets/img/usuario/usuario.png" class="rounded-circle user-img-menu menu-img coment-img">
				<?php } ?>

		      </th>
		      <th>
		      	<form action="<?= $url , $id_filme  ?>" method="post">
		 			<div>
		 				<p>&nbsp;</p>
						<textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
						
						
						<button class="btn btn-info">
							Enviar
						</button>
					</div>
				</form>
		      </th>
		    </tr>
		</thead>
		<tbody>
		<?php foreach($comentarios as $comentario): 
			$usuario_id = $usuarioDAO->get($comentario->getUsuarioId());
		?>
		    <tr>
		      <th  class="centraliza-tabela">
		      	<img src="admin/assets/img/usuario/<?= ($usuario_id->getImagem() != '' && file_exists('admin/assets/img/usuario/'.$usuario_id->getImagem()) ? $usuario_id->getImagem() : 'usuario.png') ?>" alt="" class="rounded-circle coment-img">
		      <?= ($usuario_id->getNome()) ?>
		      </th>
			    <td>
			   		<form>
		 				<div>
		 					<p>&nbsp;</p>
							<textarea class="form-control"readonly id="comentario" rows="3"><?= ($comentario->getComentario()) ?>
							</textarea>
							<?= ($comentario->getDataComentario()) ?>
						</div>
				   	</form>		      	
		      </td>
		    </tr>
		<?php endforeach; ?>
		</tbody>
	</table>
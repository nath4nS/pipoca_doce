 
<!-- Botão para acionar modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado">
		  Avaliar
		</button>
		<!-- Modal -->
		<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="TituloModalCentralizado"><strong>Avaliação</strong></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form class="centraliza" action="controle_avaliacao.php?id_filme=<?= $filme->getId() ?>" method="post">
			      <div class="modal-body">
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
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			        <button type="submit" class="btn btn-primary">Salvar</button>
			      </div>
			    </div>
		      </form>
		  </div>
		</div>
	</div>
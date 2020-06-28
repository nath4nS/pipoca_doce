<!-- Botão para acionar modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#coment" style="margin-left: 22px;">
  Mostrar Comentários
</button>

<!-- Modal -->
<div class="modal fade" id="coment" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="TituloModalLongoExemplo" style="color: black;">Meus comentarios</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-dark">
            <th>
              Filme
            </th>
            <th>
              Comentário
            </th>
            <?php foreach($comentarios as $comentario) :
              $filme_id = $filmeDAO->get($comentario->getFilmeId());
            ?>
            <tr>
              <td>
                <a href="filme.php?id=<?= $filme_id->getId() ?>" >
                  <img class="modal_coment" src="admin/assets/img/filme/<?= ($filme_id->getImagem()) ?>">
                </a>
              </td>
              <td class="text_coment">
                <p>
                  <?= $comentario->getComentario() ?>
                </p>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
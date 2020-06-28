<!-- Botão para acionar modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#aval" style="margin-left: 22px;">
  Mostrar Avaliação
</button>

<!-- Modal -->
<div class="modal fade" id="aval" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="TituloModalLongoExemplo" style="color: black;">Minhas Avaliações</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-dark">
            <th>
              Filme
            </th>
            <th style="text-align: center;">
              Avaliação
            </th>
            <?php foreach($avaliacoes as $avaliacao) :
              $filme_id = $filmeDAO->get($avaliacao->getFilmeId());
            ?>
            <tr>
              <td>
                <a href="filme.php?id=<?= $filme_id->getId() ?>" >
                  <img class="modal_aval" src="admin/assets/img/filme/<?= ($filme_id->getImagem()) ?>">
                </a>
              </td>
              <td style="vertical-align: middle;">
                <img class="estrela" src="admin/assets/img/estrelas/<?= ($avaliacao->getAvaliacao() != '' ? $avaliacao->getAvaliacao() : 0) ?>.png">
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
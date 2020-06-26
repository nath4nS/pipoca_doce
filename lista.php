<?php 
	include 'layout/header.php';
	include 'layout/menu.php';
	include_once('admin/classes/Filme.php');
    include_once('admin/classes/FilmeDAO.php');

	if (isset($_GET['pagina'])) {
	  $pagina = (int)$_GET['pagina'];
	} else {
	  $pagina = 1;
	}

    $limit = 2;
	$offset = ($pagina - 1) * $limit;
	$filmeDAO = new FilmeDAO();
	$total = $filmeDAO->paginacao();
	$paginas =  (($total->total % $limit) > 0) ? (int)($total->total / $limit) + 1 : ($total->total / $limit);
	$pagina = max(min($paginas, $pagina), 1);

	$filmes = $filmeDAO->listar('', $limit, $offset);
?>
	<div class="container">
	<table class="table table-hover">
		<tr>
			<td>
				#
			</td>
			<td>
				Filme
			</td>
		</tr>
		<?php foreach ($filmes as $key => $filme) { ?>
			<tr>
			<td>
				<img src="admin/assets/img/filme/<?= ($filme->getImagem()) ?>" class="filme_pag">
			</td>
			<td>
				<?= $filme->getNome(); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php 
		if ($total->total > 0) {
	?>
	<nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
   	<?php if($pagina > 1) : ?>
    	<li class="page-item"><a class="page-link" href="lista.php?pagina=<?= $pagina - 1 ?>">Anterior</a></li> 
	<?php endif; ?>
    <?php  
    	for ($n = 1; $n <= $paginas; $n++) {
		    
    ?>
    <li class="page-item <?= ($pagina == $n ? 'active' : '') ?>"><a class="page-link" href="lista.php?pagina=<?= $n ?>"><?= $n ?></a></li>

    <?php  
    	}
    ?>
     <li class="page-item"><a class="page-link" href="#">Próximo</a></li> 
  </ul>
</nav>
</div>
<?php 
	}
?>
<?php  
	include_once('layout/footer.php');
?>
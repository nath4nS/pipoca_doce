<?php 
	include_once('layout/header.php');
	include_once('layout/menu.php');
    include_once('admin/classes/Filme.php');
    include_once('admin/classes/FilmeDAO.php');

    $filmeDAO = new FilmeDAO();
    $filmesdestaque = $filmeDAO->trailer(3);
    shuffle($filmesdestaque);
    $filmes = $filmeDAO->listarPopulares('', 10, 0);
    $filmesbreve = $filmeDAO->listarBreve(10);
?>



<div id="trailer" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php  
            $t = 0;
            foreach ($filmesdestaque as $filme):
        ?>
            <div class="carousel-item <?php echo($t == 0 ? 'active' : '') ?>">
                <iframe src="<?= ($filme->getUrl()) ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <div class="carousel-caption d-none d-md-block">
                    <h3><?= ($filme->getNome()) ?></h3>
                    <p><?= ($filme->getSinopse()) ?></p>
                </div>
            </div>
        <?php
            $t++; 
            endforeach;
        ?>
    </div>
    <a class="carousel-control-prev" href="#trailer" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#trailer" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>

<p>&nbsp;</p>

<div class="row" > 
    <div class="col-9 offset-0">   
        <h1>Populares</h1>
    </div>
</div> 
    <div id="destaque" class="carousel slide" data-ride="carousel">
        <div class="owl-carousel owl-theme" id="listagem">
                <?php foreach ($filmes as $filme): ?>
            <div class="item">
                <a href="filme.php?id=<?= $filme->getId() ?>" >
                    <img src="admin/assets/img/filme/<?= ($filme->getImagem()) ?>" id="cartaz">
                </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>

<div class="row" > 
    <div class="col-9 offset-0">
        <h1>Em Breve...</h1>
    </div>
</div> 
    <div id="estreia" class="carousel slide" data-ride="carousel">    
            <div class="owl-carousel owl-theme" id="listagem">
                <?php foreach ($filmesbreve as $filme): ?>
            <div class="item">
                <a href="filme.php?id=<?= $filme->getId() ?>">
                    <img src="admin/assets/img/filme/<?= ($filme->getImagem()) ?>" id="cartaz">
                </a>
            </div>
            <?php endforeach; ?>
            </div>
    <p>&nbsp;</p>

<div class="row" id="fundo_cinza">
    <div class="col-4 offset-5">
        <h1>Projeto</h1>
    </div>
</div>
<div class="row" id="fundo_cinza">
    <p>&nbsp;</p>
    <p>O sistema onde conta com uma comunidade de usuários, cheia de fóruns para a indicação de filmes, com área de filmes mais votados, com a interação do usuário podendo avaliar as melhores filmes e comentários.</p>
</div>


<?php  
	include_once('layout/footer.php');
?>

<script type="text/javascript">
    $('.carousel').carousel({
        interval: 0
    })
</script>

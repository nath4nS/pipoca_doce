<?php 
	include_once('layout/header.php');
	include_once('layout/menu.php');
    include_once('admin/classes/Filme.php');
    include_once('admin/classes/FilmeDAO.php');

    $filmeDAO = new FilmeDAO();
    $filmes = $filmeDAO->listar();
?>



<div id="trailer" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php  
            $t = 0;
            foreach ($filmes as $filme):
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
                <a href="">
                    <img src="admin/assets/img/filme/<?= ($filme->getImagem()) ?>" id="cartaz">
                </a>
            </div>
        <?php endforeach; ?>
        </div>
        <!-- <div class="carousel-inner" id="listagem"> -->
            
            <!-- <?php
                $qtd = count($filmes);
                $qtd_slide = ceil($qtd / 4);
                $cont = 0;
                $lim = 4;  
                $n = 0;
                foreach ($filmes as $filme):
                if ($n % 4 == 0):
            ?>
            <div class="carousel-item <?php echo($n == 0 ? 'active' : '') ?>">
                <div class="row">
            <?php endif; ?>

                    <div class="col-lg-3">
                        <a href="">
                            <img src="admin/assets/img/filme/<?= ($filme->getImagem()) ?>" id="cartaz">
                        </a>
                    </div>
                <?php if($cont == 3 || $n == ($qtd - 1)): ?>
                </div>
            </div>
        <?php 
                endif;
                //echo $cont; 
                $n++;
                if ($n % 4 == 0){
                    $cont = 0;
                } else {
                    $cont++; 
                }
                endforeach;
            ?> -->
        <!-- </div> 
        <a class="carousel-control-prev" href="#destaque" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#destaque" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a> -->
    </div>

<div class="row" > 
    <div class="col-9 offset-0">
        <h1>Em Breve...</h1>
    </div>
</div> 
    <div id="estreia" class="carousel slide" data-ride="carousel">
        
            <div class="owl-carousel owl-theme" id="listagem">
                <?php foreach ($filmes as $filme): ?>
            <div class="item">
                <a href="">
                    <img src="admin/assets/img/filme/<?= ($filme->getImagem()) ?>" id="cartaz">
                </a>
            </div>
            <?php endforeach; ?>
            </div>
            <!-- <div class="carousel-item active">
                <div class="row">
                    <div class="col-lg-3">
                        <img id="cartaz" src="https://br.web.img3.acsta.net/pictures/20/02/04/19/08/4847130.jpg">
                    </div>
                    <div class="col-lg-3">
                        <img id="cartaz" src="https://br.web.img3.acsta.net/pictures/20/02/04/19/08/4847130.jpg">
                    </div>
                    <div class="col-lg-3">
                        <img id="cartaz" src="https://br.web.img3.acsta.net/pictures/20/02/04/19/08/4847130.jpg">
                    </div>
                    <div class="col-lg-3">
                        <img id="cartaz" src="https://br.web.img3.acsta.net/pictures/20/02/04/19/08/4847130.jpg">
                    </div>
                </div>
            </div>
            <div class="carousel-item ">
                <div class="row">
                    <div class="col-lg-3">
                        <img id="cartaz" src="https://i0.wp.com/pipocamoderna.com.br/wp-content/uploads/2020/03/wonder_woman_nineteen_eighty_four_ver7_xlg.jpg">
                    </div>
                    <div class="col-lg-3">
                        <img id="cartaz" src="https://i0.wp.com/pipocamoderna.com.br/wp-content/uploads/2020/03/wonder_woman_nineteen_eighty_four_ver7_xlg.jpg">
                    </div>
                    <div class="col-lg-3">
                        <img id="cartaz" src="https://i0.wp.com/pipocamoderna.com.br/wp-content/uploads/2020/03/wonder_woman_nineteen_eighty_four_ver7_xlg.jpg">
                    </div>
                    <div class="col-lg-3">
                        <img id="cartaz" src="https://i0.wp.com/pipocamoderna.com.br/wp-content/uploads/2020/03/wonder_woman_nineteen_eighty_four_ver7_xlg.jpg">
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#estreia" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#estreia" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a> -->
    
    <p>&nbsp;</p>

<div class="row" id="fundo_cinza">
    <div class="col-4 offset-5">
        <h1>Projeto</h1>
    </div>
</div>
<div class="row" id="fundo_cinza">
    <p>&nbsp;</p>
    <p>O sistema onde possamos ter uma comunidade, cheia de fóruns para a indicação de filmes, com área de filmes mais votados, com a interação do usuário podendo avaliar as melhores filmes e comentários.</p>
</div>
<div class="row" id="fundo_cinza">
    <a href="#" id="canto_direito">+Informações</a>
</div>

<?php  
	include_once('layout/footer.php');
?>

<script type="text/javascript">
    $('.carousel').carousel({
        interval: 0
    })
</script>

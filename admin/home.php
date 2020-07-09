<?php include './layout/header.php';  ?>
<?php include './layout/menu.php';  ?>
<?php 

include 'classes/RelatorioDAO.php';
$relatorioDAO = new RelatorioDAO();
$total_usuarios = $relatorioDAO->contar('usuario');
$total_filmes = $relatorioDAO->contar('filme');
$total_comentarios = $relatorioDAO->contar('comentario');
$total_avaliacoes = $relatorioDAO->contar('avaliacao');
$filmes_avaliacao = json_encode($relatorioDAO->contarFilmesAvaliacao('avaliacao'));
?>

<div class="row col">
	<h1>Dashboard</h1>
</div>
<div class="row">
	<div class="col-3">
		<div class="card">
			<div class="card-header"><strong>Quantidade de Usuários</strong></div>
			<div class="card-body card-dashboard">
				<p class="total"><?= $total_usuarios['total'] ?? 0; ?></p>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="card">
			<div class="card-header"><strong>Quantidade de Filmes</strong></div>
			<div class="card-body card-dashboard">
				<p class="total filmes"><?= $total_filmes['total'] ?? 0; ?></p>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="card">
			<div class="card-header"><strong>Quantidade de Comentários</strong></div>
			<div class="card-body card-dashboard">
				<p class="total comentarios"><?= $total_comentarios['total'] ?? 0; ?></p>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="card">
			<div class="card-header"><strong>Quantidade de Avaliações</strong></div>
			<div class="card-body card-dashboard">
				<p class="total avaliacoes"><?= $total_avaliacoes['total'] ?? 0; ?></p>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-12">
		<div class="card">
			<div class="card-body">
				<div id="filmeAvaliacao"></div>
				<p class="highcharts-description">
					
           		</p>
			</div>
		</div>
	</div>
</div>

<?php include './layout/footer.php';  ?>

	
<script>
	var dadosFilmAvaliacao = JSON.parse( '<?php echo $filmes_avaliacao ; ?>' );

	dataFilmAvaliacao = [];
	for (var x in dadosFilmAvaliacao) {
		dataFilmAvaliacao[x] = {
		  name: dadosFilmAvaliacao[x].nome,
		  y: parseInt(dadosFilmAvaliacao[x].total)
		}
	}

Highcharts.chart('filmeAvaliacao', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Filmes Destaques'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Percentual',
        colorByPoint: true,
        data: dataFilmAvaliacao,
    }]
});

</script>




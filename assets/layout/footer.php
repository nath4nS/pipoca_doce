
	<div class="row" id="footer">
		<div class="col-4 offset-5">
			<h1>Entre em contato</h1>
		</div>
	</div>
	<div class="row" id="footer">
		<form class="col-6 offset-3" action="envia_contato.php" method="post" accept-charset="utf-8">
		  <div class="form-group">
		    <label for="nome">Nome</label>
		    <input type="text" class="form-control" name="nome" id="nome" placeholder="Informe seu Nome" required>
		  </div>
		  <div class="form-group">
		    <label for="email">Endereço de email</label>
		    <input type="email" class="form-control" name="email" id="email" placeholder="nome@exemplo.com" required>
		  </div>
		  <div class="form-group">
		    <label for="mensagem">Mensagem</label>
		    <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required></textarea>
		  </div>
		  <button class="btn btn-info" type="submit">Enviar</button>
		</form>
	</div>
		    <div class="row" id="footer">
	         	<div class="col text-center direitos">
	           		<h5>&copy;Direitos reservados <?php echo date('Y'); ?></h5>
	          	</div>
	        </div>
</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                items:5
              })
            })
</script>
</body>
</html>
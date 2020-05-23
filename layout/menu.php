<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

	<div class="container">
		    <a class="navbar-brand" href="home.php">
      			<img src="../assets/img/logo.png" width="82" height="54" alt="">  
    		</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      	<span class="navbar-toggler-icon"></span>
    	</button>

	    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
	      	<ul class="navbar-nav mr-auto">

		        <li class="nav-item dropdown">
			        <a class="nav-link" href="filme.php" id="navbarDropdown">Filmes</a>
		        </li>

		        <li class="nav-item dropdown">
		         	<a class="nav-link" href="genero.php" id="navbarDropdown">Gênero</a>
		        </li>

	        	<li class="nav-item dropdown">
	          		<a class="nav-link" href="diretor.php" id="navbarDropdown">Diretor</a>
	        	</li>	        	

	        	<li class="nav-item dropdown">
	          		<a class="nav-link" href="usuario.php" id="navbarDropdown">Usuários</a>
	        	</li>

<!-- 	       	<li class="nav-item dropdown">
	          		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            	Usuários
	          		</a>
	          	<div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdown-menu">
	          		<a class="dropdown-item" href="usuarios.php">Listar Usuários</a>
	            	<a class="dropdown-item" href="perfis.php">Listar Perfis</a>
					<a class="dropdown-item" href="controles.php">Listar Controles</a>
	        	</div> -->
	        	</li>
<!--         <li class="nav-item align-self-end" >
          <a class="nav-link" href="#">
            
          </a>
        </li> -->
     		</ul>
        		<span class="navbar-text">
        			<a href="form_usuario.php?id=<?= $_SESSION['id_usuario'] ?>">
	              		<strong>
	               			<?= $_SESSION['nome'] ?>
	              		</strong>
              		<img src="/assets/img/usuarios/<?= ($_SESSION['imagem'] != '' && file_exists('assets/img/usuarios/'.$_SESSION['imagem']) ? $_SESSION['imagem'] : 'usuario.png' ) ?>" class="rounded-circle user-img-menu">
            		</a>
        			<small><a class="btn btn-outline-warning btn-sm" href="logout.php" onclick="return confirm('Deseja realmente sair?')">
        				Sair
        			</a>
        			</small>
      			</span>
	      	</ul>
	    </div>
	</div>
</nav>

<div class="container">
  <?php 
  if(isset($_GET['msg']) && $_GET['msg'] != '') {
   echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
  }
?>
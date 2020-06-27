
<nav class="sidebar">

	<div class="container">			
		<a href="home.php">
      		<img src="./assets/img/pipoca.png" alt="">  
    	</a>
	</div>

  <ul class="list-unstyled">
    <li>
			<a href="home.php"><i class="fas fa-chart-line"></i> Dashboard</a>
		</li>
        
    <li>
      <a href="usuario.php"><i class="fa fa-users"></i>  Usuários</a>
    </li>

    <li>
      <a href="filme.php"><i class="fa fa-film"></i></i>  Filmes</a>
    </li>

    <li>
      <a href="genero.php"><i class="fas fa-address-card"></i> Gênero</a>
    </li>

    <li>
      <a href="diretor.php"><i class="fa fa-user"></i> Diretor</a>
    </li>

    <li>
      <a href="comentarios.php"><i class="fas fa-comment"></i> Comentários</a>
    </li>

    <li>
      <a href="avaliacao.php"><i class="fa fa-star"></i></i> Avaliações</a>
    </li>
     </ul>
</nav>


<div class="container">
  <?php 
  if(isset($_GET['msg']) && $_GET['msg'] != '') {
   echo '<div class="alert alert-info">'.$_GET['msg'].'</div>';
  }
?>

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <a href="index.php"><img src="assets/img/pipoca-doce.png" class="menu-img"></a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <?php 
    if(isset($_SESSION['nome'])) {
  ?>
    <a href="perfil_usuario.php?id=$_SESSION['id_usuario']" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <img src="admin/assets/img/usuario/<?= ($_SESSION['imagem'] != '' && file_exists('admin/assets/img/usuario/'.$_SESSION['imagem']) ? $_SESSION['imagem'] : 'usuario.png' ) ?>" class="rounded-circle user-img-menu menu-img">
      <p><?= ($_SESSION['nome']) ?></p>
    </a>
  <?php }else{ ?>
    <a href="form_usuario.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-user w3-xxlarge"></i>
      <p>LOGIN</p>
    </a>
  <?php } ?>
  <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-film w3-xxlarge"></i>
    <p>FILMES</p>
  </a>
  <?php 
    if(isset($_SESSION['nome'])) {
  ?>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fas fa-door-open w3-xxlarge"></i>
      <p>Sair</p>
    </a>
<?php } ?>
</nav>

<div class="container-fluid">
  <?php 
  if(isset($_GET['msg']) && $_GET['msg'] != '') {
   echo '<div class="alert alert-info alert-dismissible fade show">'.$_GET['msg'].' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
  }
?>
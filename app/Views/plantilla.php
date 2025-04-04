<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
  html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}
  footer {
    margin-top: auto;
    width: 100%;
}
  .dropdown:hover .dropdown-content {
    display: block;
}
</style>
<body>
<header>
  <nav class="w3-bar w3-gray w3-card" style="display: flex; align-items: center; min-height: 60px;">
    <a href="/" class="w3-bar-item w3-button w3-gray">
      <img style="width: 45px;" src="<?= base_url('img/alpicat.png') ?>">
    </a>

    <!-- Menú desplegable -->
    <div class="w3-dropdown-hover">
      <button class="w3-button w3-gray">Sobre Nosaltres</button>
      <div class="w3-dropdown-content w3-bar-block w3-gray">
        <a href="/historia" class="w3-bar-item w3-button w3-hover-blue">Història</a>
        <a href="/club" class="w3-bar-item w3-button w3-hover-blue">Club</a>
      </div>
    </div>

    <a href="/noticies" class="w3-bar-item w3-button w3-gray">Noticies</a>
    <a href="/programes" class="w3-bar-item w3-button w3-gray">Programes</a>
    <a href="/galeria" class="w3-bar-item w3-button w3-gray">Galeria</a>
    <a href="/contacte" class="w3-bar-item w3-button w3-gray">Contacte</a>
  </nav>
</header>

<?php echo $this->renderSection('contingut'); ?>

<footer class="w3-container w3-gray w3-center w3-wide" style="margin-top:auto; width:100vw;">
    <p><strong>ALPICAT FC - PRIVAT</strong></p>
    <p>
        <a href="/crearNoticia" class="w3-button w3-white w3-hover-blue w3-round">Crear Noticia</a>
        <a href="/fcf" class="w3-button w3-white w3-hover-blue w3-round">FCF</a>
        <a href="#" class="w3-button w3-white w3-hover-blue w3-round">Contacte</a>
    </p>
</footer>

</body>
</html>
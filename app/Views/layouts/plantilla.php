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
      <button class="w3-button w3-gray">Sobre Nosaltres <span style="font-size:20px">&#9662;</span></button>
      <div class="w3-dropdown-content w3-bar-block w3-gray">
        <a href="/historia" class="w3-bar-item w3-button w3-hover-blue">Història</a>
        <a href="/club" class="w3-bar-item w3-button w3-hover-blue">Club</a>
      </div>
    </div>

    <a href="/noticies" class="w3-bar-item w3-button w3-gray">Noticies</a>
    <a href="/programes" class="w3-bar-item w3-button w3-gray">Programes</a>
    <a href="/galeria" class="w3-bar-item w3-button w3-gray">Galeria</a>
    <a href="/contacte" class="w3-bar-item w3-button w3-gray">Contacte</a>

    <!-- MENU ADMIN -->
    <div class="w3-dropdown-hover"style="margin-left: 15vw;">
      <button class="w3-button w3-gray">ADMIN <span style="font-size:20px">&#9662;</span></button>
      <div class="w3-dropdown-content w3-bar-block w3-gray">
        <a href="/crearNoticia" class="w3-bar-item w3-button w3-hover-blue">CRUD NOTICIES</a>
        <a href="/papeleraNoticies" class="w3-bar-item w3-button w3-hover-blue">PAPELERA NOTICIES</a>
        <a href="/gestioContacte" class="w3-bar-item w3-button w3-hover-blue">GESTIO CONTACTE</a>
      </div>
    </div>
  </nav>
</header>

<?php echo $this->renderSection('contingut'); ?>

<footer class="w3-container w3-gray w3-center" style="margin-top:auto; width:100vw;">
    <p><strong>© 2024 U.E.A. Tots els drets reservats.</strong></p>
    <p>
        <a href="#" class="w3-button w3-white w3-hover-blue w3-round">Privacitat</a>
        <a href="#" class="w3-button w3-white w3-hover-blue w3-round">Xarxes</a>
        <a href="#" class="w3-button w3-white w3-hover-blue w3-round">Contacte</a>
    </p>
</footer>

</body>
</html>
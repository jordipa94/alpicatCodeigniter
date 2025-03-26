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
  }
  .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
  }
</style>
<body>
<body>

<header class="w3-container w3-gray w3-padding-16">
  <nav class="w3-bar w3-white w3-card">
    <a href="/" class="w3-bar-item w3-button w3-hover-blue">Inici</a>
    <a href="/noticies" class="w3-bar-item w3-button w3-hover-blue">Noticies</a>
    <a href="/programes" class="w3-bar-item w3-button w3-hover-blue">Programes</a>
    <a href="/galeria" class="w3-bar-item w3-button w3-hover-blue">Galeria</a>
    <a href="/contacte" class="w3-bar-item w3-button w3-hover-blue">Contacte</a>
  </nav>
</header>

<?php echo $this->renderSection('contingut'); ?>

<footer class="w3-container w3-gray w3-center w3-padding-16 w3-wide" style="margin-top:auto; width:100%;">
    <p><strong>ALPICAT FC</strong></p>
    <p>
        <a href="#" class="w3-button w3-white w3-hover-blue w3-round">Privacitat</a>
        <a href="#" class="w3-button w3-white w3-hover-blue w3-round">Termes</a>
        <a href="#" class="w3-button w3-white w3-hover-blue w3-round">Contacte</a>
    </p>
</footer>

</body>
</html>
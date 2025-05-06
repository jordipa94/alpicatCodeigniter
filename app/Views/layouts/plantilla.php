<!DOCTYPE html>
<html>
<head>
  <title>Alpicat FC</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('css/plantilla.css') ?>">
</head>
<body class="w3-light-grey">

<div class="w3-top">
  <div class="w3-bar w3-theme w3-card" style="display: flex; align-items: center; justify-content: space-between;">

    <!-- Logo -->
    <a href="/" class="w3-bar-item w3-button w3-padding-large w3-theme w3-right">
      <img src="<?= base_url('img/alpicat.png') ?>" class="logo" alt="Logo">
      <span class="w3-hide-small"><b>ALPICAT FC</b></span>
    </a>

    <!-- LINKS PC -->
    <div class="w3-hide-small" style="display: flex; flex: 1; justify-content: flex-start;">
      <div class="w3-dropdown-hover">
        <button class="w3-button w3-padding-large w3-theme w3-hover-theme">
          <i class="fa fa-info-circle"></i> Sobre Nosaltres <i class="fa fa-caret-down"></i>
        </button>
        <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-theme-light">
          <a href="/historia" class="w3-bar-item w3-button w3-hover-theme">
            <i class="fa fa-history"></i> Història
          </a>
          <a href="/club" class="w3-bar-item w3-button w3-hover-theme">
            <i class="fa fa-users"></i> Club
          </a>
        </div>
      </div>
      <a href="/noticies" class="w3-bar-item w3-button w3-padding-large w3-hover-theme">
        <i class="fa fa-newspaper"></i> Notícies
      </a>
      <a href="/programes" class="w3-bar-item w3-button w3-padding-large w3-hover-theme">
        <i class="fa fa-calendar-alt"></i> Programes
      </a>
      <a href="/galeria" class="w3-bar-item w3-button w3-padding-large w3-hover-theme">
        <i class="fa fa-images"></i> Galeria
      </a>
      <a href="/contacte" class="w3-bar-item w3-button w3-padding-large w3-hover-theme">
        <i class="fa fa-envelope"></i> Contacte
      </a>
    </div>

    <!-- Menú mòbil -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large" onclick="toggleMobileMenu()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Menú per a dispositius mòbils -->
<div id="mobileMenu" class="w3-bar-block w3-theme w3-hide w3-hide-large w3-hide-medium w3-top w3-right" style="margin-top: 70px;">
  <div>
    <button onclick="toggleSubmenu()" class="w3-button w3-padding-large w3-block w3-left-align w3-theme w3-hover-theme">
      <i class="fa fa-info-circle"></i> Sobre Nosaltres <i class="fa fa-caret-down"></i>
    </button>
    <div id="submenu" class="w3-bar-block w3-gray w3-hide">
      <a href="/historia" class="w3-bar-item w3-button">
        <i class="fa fa-history"></i> Història
      </a>
      <a href="/club" class="w3-bar-item w3-button">
        <i class="fa fa-users"></i> Club
      </a>
    </div>
  </div>
  <a href="/noticies" class="w3-bar-item w3-button w3-padding-large">
    <i class="fa fa-newspaper"></i> Notícies
  </a>
  <a href="/programes" class="w3-bar-item w3-button w3-padding-large">
    <i class="fa fa-calendar-alt"></i> Programes
  </a>
  <a href="/galeria" class="w3-bar-item w3-button w3-padding-large">
    <i class="fa fa-images"></i> Galeria
  </a>
  <a href="/contacte" class="w3-bar-item w3-button w3-padding-large">
    <i class="fa fa-envelope"></i> Contacte
  </a>
</div>

<div class="main-content w3-container w3-padding-64">
  <?php echo $this->renderSection('contingut'); ?>
</div>

<footer class="w3-container w3-theme-dark w3-padding-32">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3 class="w3-border-bottom w3-border-white">ALPICAT FC</h3>
      <p>El club esportiu d'Alpicat, compromès amb el desenvolupament esportiu i personal dels nostres jugadors.</p>
      <div class="w3-padding">
        <a href="#" class="w3-button w3-round w3-white w3-margin-bottom w3-hover-accent"><i class="fa fa-facebook"></i></a>
        <a href="#" class="w3-button w3-round w3-white w3-margin-bottom w3-hover-accent"><i class="fa fa-twitter"></i></a>
        <a href="#" class="w3-button w3-round w3-white w3-margin-bottom w3-hover-accent"><i class="fa fa-instagram"></i></a>
        <a href="#" class="w3-button w3-round w3-white w3-margin-bottom w3-hover-accent"><i class="fa fa-youtube"></i></a>
      </div>
    </div>
    <div class="w3-third">
      <h3 class="w3-border-bottom w3-border-white">Enllaços Ràpids</h3>
      <ul class="w3-ul">
        <li><a href="/" class="w3-hover-text-theme">Inici</a></li>
        <li><a href="/noticies" class="w3-hover-text-theme">Notícies</a></li>
        <li><a href="/programes" class="w3-hover-text-theme">Programes</a></li>
        <li><a href="/galeria" class="w3-hover-text-theme">Galeria</a></li>
        <li><a href="/contacte" class="w3-hover-text-theme">Contacte</a></li>
      </ul>
    </div>
    <div class="w3-third">
      <h3 class="w3-border-bottom w3-border-white">Administració</h3>
      <a href="/admin/crearNoticia" class="w3-button w3-block w3-margin-bottom w3-theme-accent w3-hover-accent"><i class="fa fa-plus"></i> Crear Notícia</a>
      <a href="#" class="w3-button w3-block w3-margin-bottom w3-white w3-hover-theme"><i class="fa fa-external-link-alt"></i> FCF</a>
      <a href="#" class="w3-button w3-block w3-white w3-hover-theme"><i class="fa fa-envelope"></i> Contacte Admin</a>
    </div>
  </div>
  <div class="w3-center w3-padding-16">
    <p>&copy; 2025 Alpicat FC. Tots els drets reservats.</p>
  </div>
</footer>

<script>
function toggleMobileMenu() {
  var x = document.getElementById("mobileMenu");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function toggleSubmenu() {
  var submenu = document.getElementById("submenu");
  if (submenu.classList.contains("w3-hide")) {
    submenu.classList.remove("w3-hide");
  } else {
    submenu.classList.add("w3-hide");
  }
}
</script>

</body>
</html>
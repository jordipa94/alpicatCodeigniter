<!DOCTYPE html>
<html>
<head>
  <title>Alpicat FC</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    
    .w3-theme {
      color: #fff !important;
      background-color: #2e8b57 !important; 
    }
    
    .w3-theme-dark {
      background-color: #1e5c3a !important; 
    }
    
    .w3-theme-light {
      background-color: #f5f5f5 !important;
    }
    
    .w3-theme-accent {
      background-color: #e63946 !important; 
    }
    
    .w3-theme-text {
      color: #2e8b57 !important;
    }
    
    .w3-theme-accent-text {
      color: #e63946 !important;
    }
    
    .w3-hover-theme:hover {
      background-color: #1e5c3a !important;
      color: white !important;
    }
    
    .w3-hover-accent:hover {
      background-color: #c1121f !important;
      color: white !important;
    }
    
    .main-content {
      flex: 1;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      min-width: 160px;
      z-index: 1;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    .logo {
      height: 50px;
      transition: transform 0.3s;
    }
    
    .logo:hover {
      transform: scale(1.05);
    }
    
    @media (max-width: 992px) {
      .w3-dropdown-hover {
        width: 100%;
        text-align: left;
      }
      
      .dropdown-content {
        position: static;
        width: 100%;
      }
    }
  </style>
</head>
<body class="w3-light-grey">

<div class="w3-top">
  <div class="w3-bar w3-theme w3-card">
    <a href="/" class="w3-bar-item w3-button w3-padding-large w3-theme">
      <img src="<?= base_url('img/alpicat.png') ?>" class="logo" alt="Logo">
      <span class="w3-hide-small"><b>ALPICAT FC</b></span>
    </a>
    
    <div class="w3-right w3-hide-small">
      <a href="/" class="w3-bar-item w3-button w3-padding-large w3-hover-theme">
        <i class="fa fa-home"></i> Inici
      </a>
      
      <div class="w3-dropdown-hover">
        <button class="w3-button w3-padding-large w3-hover-theme">
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
    
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-medium w3-hide-large" onclick="toggleMobileMenu()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<div id="mobileMenu" class="w3-bar-block w3-theme w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="/" class="w3-bar-item w3-button w3-padding-large">
    <i class="fa fa-home"></i> Inici
  </a>
  
  <div class="w3-dropdown-hover">
    <button class="w3-button w3-padding-large w3-block w3-left-align">
      <i class="fa fa-info-circle"></i> Sobre Nosaltres <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block w3-theme-light">
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
        <a href="#" class="w3-button w3-round w3-white w3-margin-bottom w3-hover-accent">
          <i class="fa fa-facebook"></i>
        </a>
        <a href="#" class="w3-button w3-round w3-white w3-margin-bottom w3-hover-accent">
          <i class="fa fa-twitter"></i>
        </a>
        <a href="#" class="w3-button w3-round w3-white w3-margin-bottom w3-hover-accent">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="#" class="w3-button w3-round w3-white w3-margin-bottom w3-hover-accent">
          <i class="fa fa-youtube"></i>
        </a>
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
      <a href="/crearNoticia" class="w3-button w3-block w3-margin-bottom w3-theme-accent w3-hover-accent">
        <i class="fa fa-plus"></i> Crear Notícia
      </a>
      <a href="/fcf" class="w3-button w3-block w3-margin-bottom w3-white w3-hover-theme">
        <i class="fa fa-external-link-alt"></i> FCF
      </a>
      <a href="#" class="w3-button w3-block w3-white w3-hover-theme">
        <i class="fa fa-envelope"></i> Contacte Admin
      </a>
    </div>
  </div>
  
  <div class="w3-center w3-padding-16">
    <p>&copy; 2023 Alpicat FC. Tots els drets reservats.</p>
  </div>
</footer>

<script>
 //toogle del menu 
function toggleMobileMenu() {
    var x = document.getElementById("mobileMenu");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
  }
  
  // Close mobile menu when clicking outside
  window.onclick = function(event) {
    if (!event.target.matches('.w3-button')) {
      var dropdowns = document.getElementsByClassName("w3-dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('w3-show')) {
          openDropdown.classList.remove('w3-show');
        }
      }
    }
  }
</script>
</body>
</html>
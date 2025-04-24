<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Página de Administración</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>


<style>
    :root {
    --primary-color:rgb(7, 7, 7);
    --secondary-color: #0d152e;
    --accent-color:rgb(0, 0, 0);
    --light-color:rgb(0, 0, 0);
    --dark-color:rgb(255, 255, 255);
    --success-color:rgb(0, 0, 0);
}

/* Reseteo de estilos base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Estilos para el Body y la estructura general */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: var(--light-color);
}

/* Contenedor principal del login */
.login-container {
    background-color: white;
    width: 400px;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 0px 20px white;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: black;
}

/* Logo y título en la página de login */
.logo h1 {
    color: white;
    font-size: 32px;
    letter-spacing: 2px;
    margin-bottom: 20px;
}

/* Estilos para el formulario de login */
.form-group {
    width: 100%;
    margin-bottom: 20px;
}

.input-field {
    border: 2px solid var(--primary-color);
    border-radius: 5px;
    font-size: 16px;
    color: var(--dark-color);
    background-color: var(--light-color);
    width: 180px;
    padding: 12px;
    background-color: var(--primary-color);
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    box-shadow: 0px 0px 20px white;
}

.input-field:focus {
    border-color: var(--accent-color);
    outline: none;
    width: 100%;
    padding: 12px;
    background-color: var(--primary-color);
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    box-shadow: 0px 0px 20px white;
}

.submit-btn {
    width: 100%;
    padding: 12px;
    background-color: var(--primary-color);
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    box-shadow: 0px 0px 20px white;
    animation: submit alternate 2s infinite;
}
  @keyframes submit {
    from{background-color :black ;
          color: white;
    }to{background-color: white;
        color: black;
    }
  }

.submit-btn:hover {
    background-color: white;
    color:black;
}

/* Estilos para la carta de administradores */
.admin-card {
    background-color: var(--secondary-color);
    color: white;
    padding: 20px;
    margin-top: 30px;
    border-radius: 8px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 0px 20px white;
  
}

.admin-card .title {
    font-size: 18px;
    font-weight: bold;

}

.admin-card .number {
    font-size: 24px;
    font-weight: bold;
    color: var(--accent-color);
}

/* Responsive: Ajuste para pantallas más pequeñas */
@media (max-width: 500px) {
    .login-container {
        width: 90%;
    }
}


.language-selector {
    position: relative;
    display: inline-block;
  }

  .selected-language {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    background:rgb(255, 255, 255);
    cursor: pointer;
    transition: background 0.3s;
  }

  .selected-language:hover {
    background: #ddd;
  }

  .language-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0px 0px 20px white;

    overflow: hidden;
  }

  .language-menu a {
    display: flex;
    align-items: center;
    padding: 8px 12px;
    text-decoration: none;
    color: black;
    transition: background 0.3s;
  }

  .language-menu a:hover {
    background: #eee;
  }

  .language-selector:hover .language-menu {
    display: block;
  }

  .flag {
    width: 20px;
    height: 15px;
    margin-right: 8px;
  }


</style>
     

    <div class="login-container">
    <div class="language-selector">
<div class="selected-language">
    <img src="./img/mod.png" class="flag" alt="English">
  </div>
  <div class="language-menu">
  <a href="<?php echo base_url('administracio_log') ?>"><img src="./img/half-hour_16766449.png" class="flag" alt="normal"> Normal</a>
    <a href="<?php echo base_url('administracio_log_dark'); ?>"><img src="./img/moon_11811277.png" class="flag" alt="dark"> Oscuro</a>
   </div>
</div>  
    <br>
    <!-- Logo -->
        <div class="logo">
            <h1>ADMIN LOGIN</h1>
            <div class="admin-card">
            <div class="title">Número de Administradores  </div>
            <p> </p><div class="number" style="color: white;">5</div>
        </div>
        </div>
        <br>
        <!-- Formulario de login -->
        <form action="<?php base_url('/administracio_log_post'); ?>" method="POST">
            <div class="form-group">
                <input type="text" class="input-field" placeholder="Usuario" required />
            </div>
            <div class="form-group">
                <input type="password" class="input-field" placeholder="Contraseña" required />
            </div>
            <button type="submit" class="submit-btn" style="width: 100%;">log in</button>
        </form>

        <!-- Carta con el número de administradores -->
       
    </div>

</body>
</html>

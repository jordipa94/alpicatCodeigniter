<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Página de Administración</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        :root {
            --primary-color: #1a2a57;
            --secondary-color: #0d152e;
            --accent-color: #d4af37;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #28a745;
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
            perspective: 1000px; /* Necesario para el efecto 3D */
        }

        /* Contenedor principal del login */
        .login-container {
            background-color: white;
            width: 400px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.8s ease;
            transform-style: preserve-3d;
        }

        /* Efecto de giro cuando se agrega esta clase */
        .login-container.rotate {
            transform: rotateY(180deg);
        }

        /* Logo y título en la página de login */
        .logo h1 {
            color: var(--primary-color);
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
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--primary-color);
            border-radius: 5px;
            font-size: 16px;
            color: var(--dark-color);
            background-color: var(--light-color);
        }

        .input-field:focus {
            border-color: var(--accent-color);
            outline: none;
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
            margin-bottom: 10px;
        }

        .submit-btn:hover {
            background-color: var(--accent-color);
        }

        .submit-btn a {
            color: white;
            text-decoration: none;
            display: block;
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            background: #f0f0f0;
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
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
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
</head>
<body>
    <div class="login-container" id="loginContainer">
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
                <div class="title">Número de Administradores</div>
                <p> </p><div class="number">5</div>
            </div>
        </div>
        <br>
        <!-- Formulario de login -->
        <form action="#" method="POST">
            <div class="form-group">
                <input type="text" class="input-field" placeholder="Usuario" required />
            </div>
            <div class="form-group">
                <input type="password" class="input-field" placeholder="Contraseña" required />
            </div>
            <button type="submit" class="submit-btn">log in</button>
        </form>
        <button type="button" class="submit-btn" id="registerBtn"><a href="<?php echo base_url('/registrar'); ?>">Registrarse</a></button>
    </div>

    <script>
        document.getElementById('registerBtn').addEventListener('click', function() {
            const loginContainer = document.getElementById('loginContainer');
            
            // Agregar clase para iniciar la rotación
            loginContainer.classList.add('rotate');
            
            // Opcional: Redirigir después de completar la animación
            setTimeout(() => {
                window.location.href = "<?php echo base_url('/registrar'); ?>";
            }, 800); // 800ms coincide con la duración de la transición
        });
    </script>
</body>
</html>
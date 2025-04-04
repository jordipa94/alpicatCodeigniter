<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <style>
        :root {
            --primary-color: #1a2a57;
            --secondary-color: #0d152e;
            --accent-color: #d4af37;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #28a745;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        
        /* Sidebar - Estilo Athlantix */
        .sidebar {
            width: 280px;
            background-color: var(--secondary-color);
            color: white;
            padding: 20px 0;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .logo {
            text-align: center;
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        
        .logo h1 {
            color: var(--accent-color);
            font-size: 24px;
            letter-spacing: 1px;
        }
        
        .search-box {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        
        .search-box input {
            width: 100%;
            padding: 10px 15px;
            border-radius: 4px;
            border: none;
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        
        .search-box input::placeholder {
            color: rgba(255,255,255,0.5);
        }
        
        .menu-section {
            margin-bottom: 25px;
            padding: 0 20px;
        }
        
        .menu-section h3 {
            color: var(--accent-color);
            margin-bottom: 15px;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .menu-item {
            list-style: none;
            margin-bottom: 10px;
        }
        
        .menu-item a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 8px 10px;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .menu-item a:hover {
            background-color: rgba(255,255,255,0.1);
            color: var(--accent-color);
        }
        
        .submenu {
            margin-left: 20px;
            margin-top: 5px;
            display: none;
        }
        
        .menu-item:hover .submenu {
            display: block;
        }
        
        .divider {
            height: 1px;
            background-color: rgba(255,255,255,0.1);
            margin: 15px 0;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            background-color: var(--light-color);
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .header h2 {
            color: var(--dark-color);
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .card h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 14px;
        }
        
        .card p {
            font-size: 24px;
            font-weight: bold;
            color: var(--dark-color);
        }
        
        .main-card {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h1>Administracion</h1>
        </div>
        
        <div class="search-box">
            <input type="text" placeholder="Search...">
        </div>
        
        <div class="menu-section">
            <h3>Dashboard</h3>
            <ul>
                <li class="menu-item"><a href="#">anuncios</a>
                    <ul class="submenu">
                        <li><a href="<?php base_url('/crearNoticia') ?>">apartado para crear noticias o anuncios </a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="#">contatct</a>
                    <ul class="submenu">
                        <li><a href="#">Contact , lo que se guarda en la tabla contactos </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <div class="divider"></div>
        
        <div class="menu-section">
            <h3>Categorias</h3>
            <ul>
                <li class="menu-item"><a href="#">1er</a></li>
                <li class="menu-item"><a href="#">2sec</a></li>
                <li class="menu-item"><a href="#">3er</a></li>
                <li class="menu-item"><a href="#">4cua</a></li>
            </ul>
        </div>
        
        <div class="divider"></div>
        
        <div class="menu-section">
            <h3>Offensive Line Overall</h3>
            <ul>
                <li class="menu-item"><a href="#">Defensive Backs (DB) Overall</a></li>
                <li class="menu-item"><a href="#">Tight End (TE)</a></li>
                <li class="menu-item"><a href="#">Hybrid or Lt common Pos</a></li>
            </ul>
        </div>
        
        <div class="divider"></div>
        
        <div class="menu-section">
            <h3>Defensive Line (DL) Overall</h3>
            <ul>
                <li class="menu-item"><a href="#">Special Teams</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>Team Dashboard</h2>
            <div class="user-info">
                <img src="https://via.placeholder.com/40" alt="User">
                <span>Admin</span>
            </div>
        </div>
        
        <div class="stats-cards">
            <div class="card">
                <h3>Total Players</h3>
                <p>45</p>
            </div>
            <div class="card">
                <h3>Active Training</h3>
                <p>12</p>
            </div>
            <div class="card">
                <h3>Upcoming Games</h3>
                <p>3</p>
            </div>
            <div class="card">
                <h3>Injuries</h3>
                <p>2</p>
            </div>
        </div>
        
        <div class="main-card">
            <h2>Team Performance Overview</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
        </div>
    </div>
</body>
</html>
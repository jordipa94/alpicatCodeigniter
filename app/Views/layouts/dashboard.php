<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Alpicat FC</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <a href="/admin" style="font-family: 'Arial', sans-serif !important;">
            <h1>ALPICAT FC</h1>
            <small>Panel de Administración</small>
        </a>
    </div>

    <div class="menu-section">
        <h3>Noticies</h3>
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/noticies/crearNoticia') ?>">Crear Noticies</a></li>
            <li class="menu-item"><a href="<?php echo base_url('/admin/noticies/llistatNoticies') ?>">CRUD Noticies</a></li>
            <li class="menu-item"><a href="<?php echo base_url('/admin/noticies/papeleraNoticies') ?>">Papelera Noticies</a></li>
        </ul>
    </div>

    <div class="divider"></div>

    <div class="menu-section">
        <h3>Contacte</h3>
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/gestionarContacte') ?>">Gestionar Contacte</a></li>
        </ul>
    </div>

    <div class="divider"></div>

    <div class="menu-section">
        <h3>Contacte</h3>
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/gestionarContacte') ?>">Gestionar Contacte</a></li>
        </ul>
    </div>

    <div class="divider"></div>

    <div class="menu-section">
        <h3>Configuracio</h3>
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/gestionarConfig') ?>">Gestionar Configuracio</a></li>
        </ul>
    </div>

    <div class="divider"></div>

    <div class="menu-section">
        <?php $session = session(); ?>
        <?php if ($session->get('logged_in')): ?>
            <div style="padding: 0 20px; font-size: 14px; color: var(--primary-color); margin-top: 20px;">
                <p><strong>Usuari:</strong> <?= esc($session->get('username')) ?></p>
                <p><strong>Rol:</strong> <?= esc($session->get('role')) ?></p>
            </div>
        <?php endif; ?>
    </div>

    <div class="divider"></div>

    <div class="logo">
        <a href="/" style="font-family: 'Arial', sans-serif !important;">
            <h1>Tornar a inici</h1>
        </a>
        <div class="divider"></div>
        <a href="/logout" style="font-family: 'Arial', sans-serif !important;">
            <h1>Logout</h1>
        </a>
    </div>
</div>

<!-- Main Content -->
<div class="main-content w3-container">
    <?php echo $this->renderSection('contingut'); ?>
</div>

</body>
</html>
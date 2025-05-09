<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Alpicat FC</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/customRed.css') ?>">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <a href="/admin" style="font-family: 'Arial', sans-serif !important;">
            <h1 style="font-size:32px;">ALPICAT FC</h1>
            <small>Panel de Administración</small>
        </a>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/noticies/llistatNoticies') ?>"> <i class="fa fa-newspaper"></i> Gestionar Notícies</a></li>
        </ul>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/programes/llistatClassificacions') ?>"><i class="fa fa-calendar-alt"></i> Gestionar Classificació</a></li>
        </ul>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/users') ?>"><i class="fa fa-user"></i> Gestionar Usuaris</a></li>
        </ul>
    </div>

    <div class="divider"></div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/gestionarContacte') ?>"><i class="fa fa-envelope"></i> Gestionar Contacte</a></li>
        </ul>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/gestionarConfig') ?>"><i class="fa fa-gear"></i> Gestionar Configuracio</a></li>
        </ul>
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

        <?php if (session()->getFlashdata('success')): ?>
            <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="w3-panel w3-red w3-padding w3-round w3-margin-bottom w3-center">
                <?= session('error') ?>
            </div>
        <?php endif; ?>

        <?php echo $this->renderSection('contingut'); ?>
        
    </div>

</body>
</html>
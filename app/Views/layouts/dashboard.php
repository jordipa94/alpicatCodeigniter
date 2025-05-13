<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de Administració - Alpicat FC</title>
    <link rel="icon" type="image/png" href="<?= base_url('img/alpicat.png') ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/customRed.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">

    <!-- ICONO TORNAR A HOME PER MOBIL -->
    <div id="iconResponsive" class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin') ?>"> <i id="iconResponsive" class="fa fa-home"></i><span> ALPICAT FC</span></a></li>
        </ul>
    </div>

    <div class="logo">

        <a href="/admin" style="font-family: 'Arial', sans-serif !important;">
            <h1 style="font-size:24px;">ALPICAT FC</h1>
            <small>Panel de Administració</small>
        </a>

    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/noticies/llistatNoticies') ?>"> <i class="fa fa-newspaper"></i><span> Gestionar Notícies</span></a></li>
        </ul>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/programes/llistatClassificacions') ?>"><i class="fa fa-calendar-alt"></i> <span> Gestionar Classificació</span></a></li>
        </ul>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/users') ?>"><i class="fa fa-user-cog"></i><span> Gestionar Usuaris</span></a></li>
        </ul>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/gestionarCategoria') ?>"><i class="fa fa-layer-group"></i><span> Gestionar Categoria</span></a></li>
        </ul>
    </div>

    <div class="divider"></div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/gestionarContacte') ?>"><i class="fa fa-envelope"></i><span> Gestionar Contacte</span></a></li>
        </ul>
    </div>

    <div class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/admin/gestionarConfig') ?>"><i class="fa fa-gear"></i><span> Gestionar Configuracio</span></a></li>
        </ul>
    </div>

    <div class="divider"></div>

    <div id="iconResponsive" class="menu-section">
        <ul>
            <li class="menu-item"><a href="<?php echo base_url('/logout') ?>"><i style="color:#C10C18;" class="fa fa-sign-in-alt"></i><span> Tancar sessió</span></a></li>
        </ul>
    </div>

    <div class="logo">
        <a style="color:#C10C18;font-size:18px" href="<?php echo base_url('/logout') ?>">
            <i class="fa fa-sign-in-alt"></i><span style="font-size:22px"> Tancar sessió</span>
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
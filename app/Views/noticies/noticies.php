<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

<div class="w3-container">

    <h2>LLISTAT NOTÍCIES</h2>

    <!-- BUSCADOR DE NOTICIES -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('searchNoticia') ?>" method="GET" class="w3-center">

            <?= csrf_field(); ?>

            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar noticies..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-red w3-round w3-block">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- DIVS AMB NOTICIES -->
    <div class="w3-row-padding">
        <?php foreach($noticies as $noticia): ?>

        <div class="w3-third w3-margin-bottom">
            <div class="w3-card w3-padding w3-white">
                <h3><?= substr($noticia['nom'], 0, 20) . '...' ?></h3>
                <img src="../images/galeria.png" alt="">
                <p><?= substr($noticia['contingut'], 0, 50) . '...' ?></p>
                <a href="<?= base_url('noticies/readNoticia/' . esc($noticia['id'])) ?>" class="w3-button w3-red">Llegir Noticia</a>
            </div>
        </div>

        <?php endforeach; ?>
        
    </div>

</div>

    <div class="pagination-container" style="margin-left:1vw">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>
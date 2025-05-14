<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container" style="margin-top: 20px;">

    <!-- FILTRAR PER CATEGORIA -->
    <div style="max-width:200px">
        <form action="<?= base_url('/noticies') ?>" method="get" id="filtrarForm">
            <?= csrf_field(); ?>

            <label for="categoria">Filtrar per Categoria</label>
            <select id="categoria" name="categoria" class="w3-select w3-border w3-margin-bottom" onchange="document.getElementById('filtrarForm').submit()">
                <option value="" <?= (empty($categoriaSeleccionada)) ? 'selected' : '' ?>>Totes les Categories</option>
                
                <?php foreach ($categories as $categoria): ?>
                    <option value="<?= esc($categoria['name']) ?>" <?= ($categoriaSeleccionada == $categoria['name']) ? 'selected' : '' ?>>
                        <?= esc($categoria['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>

    <!-- BUSCADOR DE NOTICIES -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('searchNoticia') ?>" method="GET" class="w3-center">
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-round custom-button">Buscar</button>
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
                <p><?= substr($noticia['contingut'], 0, 50) . '...' ?></p>
                <div class="w3-center">
                    <a href="<?= base_url('noticies/readNoticia/' . esc($noticia['id'])) ?>">
                        <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                    </a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
        
    </div>

</div>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>
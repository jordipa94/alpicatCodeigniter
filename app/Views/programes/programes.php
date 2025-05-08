<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container w3-padding">

    <h1>Programes</h1>

    <a href="/classificacioPrimerEquip">Classificació Primer Equip</a>

    <!-- DIVS AMB NOTICIES -->
    <div class="w3-row-padding">
        <?php foreach($classifications as $classification): ?>

            <h3><?= esc($classification['nom'])?></h3>
            <a href="<?= base_url('programes/viewClassification/' . esc($classification['id'])) ?>" class="w3-button w3-red">Veure Classificació</a>

        <?php endforeach; ?>
        
    </div>

</div>
    
<?php echo $this->endSection(); ?>
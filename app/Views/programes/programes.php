<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container w3-padding">

    <h1>Programes</h1>

    <!-- DIVS AMB NOTICIES -->
    <div class="w3-row-padding">
        <?php foreach($classifications as $classification): ?>

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3><?= esc($classification['competitionName'])?></h3>
                    <a href="<?= base_url('programes/viewClassification/' . esc($classification['id'])) ?>" class="w3-button w3-red">Veure Classificació</a>
                </div>
            </div>

        <?php endforeach; ?>
        
    </div>

</div>
    
<?php echo $this->endSection(); ?>
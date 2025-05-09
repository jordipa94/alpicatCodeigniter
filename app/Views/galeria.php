<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <h2>GALERIA</h2>

    <main class="w3-container" style="margin-top: 20px;">
        <h2 class="w3-center">Últimes galeries</h2>

        <div class="w3-row-padding" style="overflow: auto;">

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Galeria 1</h3>
                    <div class="w3-center">
                        <a href="#">
                            <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                        </a>
                    </div>
                    <p>Detalls breus de la primera galeria. Pots afegir un text més llarg aquí.</p>
                </div>
            </div>

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Galeria 2</h3>
                    <div class="w3-center">
                        <a href="#">
                            <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                        </a>
                    </div>
                    <p>Detalls breus de la segona galeria. Pots afegir un text més llarg aquí.</p>
                </div>
            </div>

            
            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Galeria 3</h3>
                    <div class="w3-center">
                        <a href="#">
                            <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                        </a>
                    </div>
                    <p>Detalls breus de la tercera galeria. Pots afegir un text més llarg aquí.</p>
                </div>
            </div>
        </div>

        <div class="w3-row-padding">
            
            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Galeria 4</h3>
                    <div class="w3-center">
                        <a href="#">
                            <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                        </a>
                    </div>
                    <p>Detalls breus de la quarta galeria. Pots afegir un text més llarg aquí.</p>
                </div>
            </div>

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Galeria 5</h3>
                    <div class="w3-center">
                        <a href="#">
                            <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                        </a>
                    </div>
                    <p>Detalls breus de la quinta galeria. Pots afegir un text més llarg aquí.</p>
                </div>
            </div>

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Galeria 6</h3>
                    <div class="w3-center">
                        <a href="#">
                            <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                        </a>
                    </div>
                    <p>Detalls breus de la quinta galeria. Pots afegir un text més llarg aquí.</p>
                </div>
            </div>
        </div>

    </main>

</div>
    
<?php echo $this->endSection(); ?>
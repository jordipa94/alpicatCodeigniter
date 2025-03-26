<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contingut'); ?>
<style>
.imgNoticia{
    width: 360px;
    height: 150px;
}
</style>

    <h1 class="w3-padding">Noticies</h1>

    <main class="w3-container" style="margin-top: 20px;">
        <h2 class="w3-center">Últimes Notícies</h2>

        <div class="w3-row-padding" style="overflow: auto;">

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Notícia 1</h3>
                    <img class="imgNoticia" src="<?= base_url('img/logoAmbNom.png') ?>">
                    <p>Detalls breus de la primera notícia. Pots afegir un text més llarg aquí.</p>
                    <a href="#" class="w3-button w3-blue">Llegir més</a>
                </div>
            </div>

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Notícia 2</h3>
                    <img class="imgNoticia" src="<?= base_url('img/logoAmbNom.png') ?>">
                    <p>Detalls breus de la segona notícia. Pots afegir un text més llarg aquí.</p>
                    <a href="#" class="w3-button w3-blue">Llegir més</a>
                </div>
            </div>

            
            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Notícia 3</h3>
                    <img class="imgNoticia" src="<?= base_url('img/logoAmbNom.png') ?>">
                    <p>Detalls breus de la tercera notícia. Pots afegir un text més llarg aquí.</p>
                    <a href="#" class="w3-button w3-blue">Llegir més</a>
                </div>
            </div>
        </div>

        <div class="w3-row-padding">
            
            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Notícia 4</h3>
                    <img src="../images/escut.png" alt="">
                    <p>Detalls breus de la quarta notícia. Pots afegir un text més llarg aquí.</p>
                    <a href="#" class="w3-button w3-blue">Llegir més</a>
                </div>
            </div>

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Notícia 5</h3>
                    <img src="../images/escut.png" alt="">
                    <p>Detalls breus de la quinta notícia. Pots afegir un text més llarg aquí.</p>
                    <a href="#" class="w3-button w3-blue">Llegir més</a>
                </div>
            </div>

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3>Notícia 6</h3>
                    <img src="../images/escut.png" alt="">
                    <p>Detalls breus de la quinta notícia. Pots afegir un text més llarg aquí.</p>
                    <a href="#" class="w3-button w3-blue">Llegir més</a>
                </div>
            </div>
        </div>

    </main>
    
<?php echo $this->endSection(); ?>
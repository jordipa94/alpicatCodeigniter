<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>
<style>
.welcomeDiv, .teamDiv {
    text-align: center;
    padding: 30px;
    color: white;
}

.welcomeDiv {
    margin-top: 35px;
    background-color: green;
}

.teamDiv {
    background-color: rgb(33, 124, 33);
}

.imgNoticia {
    max-width: 100%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.w3-row-padding {
    margin-left: 0 !important;
    margin-right: 0 !important;
}
</style>
<body>

    <div class="welcomeDiv">
        <h2>"BENVINGUTS A U.E.A"</h2>
        <p>*foto nens jugant*</p>
        <a class="w3-button w3-white w3-hover-green w3-round" href="#">INSCRIU-TE ARA</a>
    </div>

    <div class="teamDiv">
        <h2>UNEIX-TE AL NOSTRE EQUIP</h2>
        <p>ENTRENEM FUTURS CAMPIONS</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nisi sit perferendis, sunt commodi eum et fugiat ipsa mollitia adipisci modi laudantium quam inventore quibusdam accusantium quas amet labore exercitationem.</p>
    </div>

    <main class="w3-container" style="margin-top: 20px;">
        <h2 class="w3-center">Últimes Notícies</h2>
        <div class="w3-row-padding">
            <?php foreach($noticies as $noticia): ?>
                <div class="w3-third w3-margin-bottom">
                    <div class="w3-card w3-padding">
                        <h3><?= substr($noticia['nom'], 0, 30) . '...' ?></h3>
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

    </main>

<?php echo $this->endSection(); ?>
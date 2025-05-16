<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<style>
.imgResponsive {
    max-width: 100%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>

<div class="w3-container" style="margin-top:20px;">
    <div class="w3-xlarge w3-margin-bottom">CLUB</div>
    <div class="w3-border w3-margin-bottom">
        L'Alpicat Futbol Club és una entitat esportiva compromesa amb la promoció del futbol entre nens, joves i adults del municipi d'Alpicat i rodalies. 
        El club ofereix una estructura esportiva que cobreix diferents categories, des d’escoles de futbol fins a equips de competició amateur. 
        Més enllà de la pràctica esportiva, l’Alpicat FC treballa per fomentar valors com la solidaritat, la inclusió i la integració social. 
        Amb una organització moderna i una clara aposta per la formació contínua dels seus entrenadors, el club aposta per la qualitat i el 
        benestar dels seus esportistes, i manté una estreta relació amb la comunitat local i les institucions esportives regionals.
    </div>
    <div class="w3-border w3-padding w3-center w3-light-grey">
        <img style="margin-top: 5%;margin-bottom: 5%;" class="imgResponsive" src="<?= base_url('img/club.png') ?>">
    </div>
</div>

<?php echo $this->endSection(); ?>
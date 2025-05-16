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
    <div class="w3-xlarge w3-margin-bottom">HISTORIA DEL CLUB</div>
    <div class="w3-border w3-margin-bottom">
        L'Alpicat Futbol Club va ser fundat l'any 1950 com a part de la iniciativa local per fomentar l'esport i la cohesió social al municipi d'Alpicat. 
        Al llarg dels anys, el club ha anat creixent tant en nombre de jugadors com en afició, consolidant-se com una entitat referent al futbol base de la comarca. 
        Durant les dècades, ha aconseguit diversos èxits en competicions locals i comarcals, sent sempre un lloc on la formació esportiva i els valors de treball 
        en equip, respecte i perseverança són prioritaris. El club ha superat moments difícils gràcies a l'esforç de la seva junta directiva, entrenadors, 
        jugadors i aficionats, mantenint sempre viu l’esperit de comunitat.
    </div>
    <div class="w3-border w3-padding w3-center w3-light-grey">
        <img style="margin-top: 5%;margin-bottom: 5%;" class="imgResponsive" src="<?= base_url('img/historia.jpeg') ?>">
    </div>
</div>

<?php echo $this->endSection(); ?>
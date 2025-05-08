<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<h1 class="w3-padding">Contacte</h1>

<div class="w3-container" style="margin-top:20px;">
    <div class="w3-row">
        <div class="w3-col l6 m6 s12 w3-border-right">
            <div class="w3-padding">

                <!-- MOSTRAR ERRORS DE VALIDACIO DEL FORMULARI -->
                <?php if (session()->has('errors')): ?>
                    <div class="w3-panel w3-red">
                        <ul>
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- MOSTRAR MISSATGE "SUCCESS" SI LA VALIDACIO ES CORRECTA -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <!-- FORMULARI DE CONTACTE -->
                <form action="enviarFormulariContacte" method="post" class="w3-container">

                    <?= csrf_field(); ?>

                    <label for="concepte" class="w3-text-black">CONCEPTE</label>
                    <input id="concepte" name="concepte" type="text" value="<?= old('concepte') ?>" class="w3-input w3-border w3-margin-bottom">

                    <label for="missatge" class="w3-text-black">MISSATGE</label>
                    <textarea id="missatge" name="missatge" class="w3-input w3-border w3-margin-bottom"><?= old('missatge') ?></textarea>

                    <label for="telefono" class="w3-text-black">TELEFONO</label>
                    <input id="telefono" name="telefono" value="<?= old('telefono') ?>" class="w3-input w3-border w3-margin-bottom"></input>

                    <label for="correu" class="w3-text-black">CORREU</label>
                    <input id="correu" name="correu" value="<?= old('correu') ?>" class="w3-input w3-border w3-margin-bottom"></input>

                    <!-- Dropdown Categoria -->
                    <label for="categoria" class="w3-text-black">CATEGORIA</label>
                    <select id="categoria" name="categoria" class="w3-select w3-border w3-margin-bottom">
                        <option value="" disabled selected>Selecciona una opció</option>
                        <option value="VETERANS">VETERANS</option>
                        <option value="JUVENIL">JUVENIL</option>
                        <option value="INFANTIL">INFANTIL</option>
                    </select>

                    <button type="submit" class="w3-button w3-red">ENVIAR</button>
                </form>
            </div>
        </div>

        <!-- MAPA DE GOOGLE MAPS -->
        <div class="w3-col l6 m6 s12">
            <div class="w3-padding">
                <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden; max-width:100%;">
                    <iframe 
                        src="<?= esc($googleMaps) ?>"
                        style="position:absolute; top:0; left:0; width:100%; height:100%; border:0;"
                        allowfullscreen="" loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="w3-row w3-margin-top">
        <div class="w3-col l6 m6 s12 w3-padding">
            <span>DIRECCION: <?= esc($direction) ?></span><br>
            <span>MAIL: <?= esc($mail) ?></span><br>
            <span>TELEFONO: <?= esc($telefon) ?></span>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
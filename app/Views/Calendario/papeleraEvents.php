<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/calendario/gestioCalendari') ?>">Tornar a inici</a></button>

    <h2>PAPELERA EVENTS</h2>

    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>Titol Event</th>
                <th>Descripcio event</th>
                <th>Data inici</th>
                <th>Data fi</th>
                <th>Data eliminacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($events as $event): ?>
            <tr>
                <td><?= character_limiter($event['titulo'], 20) ?></td>
                <td><?= character_limiter($event['descripcion'], 50) ?></td>
                <td><?= esc($event['fecha_inicio'])?></td>
                <td><?= esc($event['fecha_fin'])?></td>
                <td><?= esc($event['deleted_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('/admin/calendario/restaurarEvent/' . esc($event['id_evento'])) ?>">Restaurar Event</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>
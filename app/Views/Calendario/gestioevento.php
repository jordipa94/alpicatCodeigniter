
<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('contingut'); ?>
<div class="w3-container">
    <h2>Gestió d'Esdeveniments</h2>
    <table class="w3-table w3-bordered w3-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Data Inici</th>
                <th>Data Fi</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($eventos as $evento): ?>
                <tr>
                    <td><?= esc($evento['id_evento']) ?></td>
                    <td><?= esc($evento['titulo']) ?></td>
                    <td><?= character_limiter($evento['descripcion'], 50) ?></td>
                    <td><?= esc($evento['fecha_inicio']) ?></td>
                    <td><?= esc($evento['fecha_fin']) ?></td>
                    <td>
                        <a href="<?= base_url('eventos/read/'.$evento['id_evento']) ?>" class="w3-button w3-blue">Veure</a>
                        <a href="<?= base_url('eventos/edit/'.$evento['id_evento']) ?>" class="w3-button w3-yellow">Editar</a>
                        <a href="<?= base_url('eventos/delete/'.$evento['id_evento']) ?>" class="w3-button w3-red">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>


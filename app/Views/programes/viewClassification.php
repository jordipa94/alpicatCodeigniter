<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('contingut') ?>

<div class="w3-container w3-padding">
    
    <h2 class="w3-center">Classificació <?= esc($competitionName) ?> - FCF</h2>

    <div class="w3-card-4 w3-round w3-light-grey w3-padding">

        <p class="w3-text-dark-grey"><?= esc($contingut) ?></p>

        <!-- Mostrar la imatge si existeix -->
        <?php if (!empty($competition['imagen_path'])): ?>
            <img src="<?= base_url($competition['imagen_path']) ?>" alt="Imatge de la notícia" class="w3-image w3-margin-bottom" style="max-width:100%; max-height:400px; object-fit:cover;">
        <?php endif; ?>

    </div>

    <div class="w3-responsive w3-margin-top">
        <table class="w3-table-all w3-hoverable w3-centered">
            <thead>
                <tr class="w3-red">
                    <th>Posició</th>
                    <th>Logo</th>
                    <th>Equip</th>
                    <th>Punts</th>
                    <th>PJ</th>
                    <th>PG</th>
                    <th>PE</th>
                    <th>PP</th>
                    <th>GF</th>
                    <th>GC</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clasificacio as $equip): ?>
                    <tr>
                        <td><?= esc($equip['posicio']) ?></td>
                        <td>
                            <?php if ($equip['logo']): ?>
                                <img src="<?= esc($equip['logo']) ?>" alt="Logo" style="width:30px; height:30px;">
                            <?php else: ?>
                                No Logo
                            <?php endif; ?>
                        </td>
                        <td><?= esc($equip['equip']) ?></td>
                        <td><?= esc($equip['punts']) ?></td>
                        <td><?= esc($equip['pj']) ?></td>
                        <td><?= esc($equip['pg']) ?></td>
                        <td><?= esc($equip['pe']) ?></td>
                        <td><?= esc($equip['pp']) ?></td>
                        <td><?= esc($equip['gf']) ?></td>
                        <td><?= esc($equip['gc']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
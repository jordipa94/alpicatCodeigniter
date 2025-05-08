<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('contingut') ?>

<div class="w3-container w3-padding">
    
    <h2 class="w3-center">Classificació Primer Equip - FCF</h2>

    <div class="w3-responsive">
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
<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>DASHBOARD</h1>
            <div class="user-info">

                <?php $session = session(); ?>

                <?php if ($session->get('logged_in')): ?>
                    <div style="padding: 0 20px; font-size: 14px; margin-top: 20px;">
                        <p><strong>Usuari:</strong> <?= esc($session->get('username')) ?></p>
                        <p><strong>Rol:</strong> <?= esc($session->get('role')) ?></p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        
        <div class="stats-cards">
            <div class="card">
                <h3><a href="<?php echo base_url('/noticies'); ?>">Total noticias</a></h3>
                <p><?= esc($count_noticies) ?></p>
            </div>
        </div>

        <div class="stats-cards">
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/gestionarContacte'); ?>">Total contactes pendents</a></h3>
                <p><?= esc($count_contacte) ?></p>
            </div>
        </div>

    </div>

<?php echo $this->endSection(); ?>
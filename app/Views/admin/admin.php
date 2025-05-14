<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>DASHBOARD</h2>

                <?php $session = session(); ?>

                <?php if ($session->get('logged_in')): ?>
                    <div style="padding: 0 20px; font-size: 14px; margin-top: 20px;">
                        <p> <i class="fa fa-user"></i> <span><strong>Usuari: </strong></span><?= esc($session->get('username')) ?></p>
                        <p> <i class="fa fa-tag"></i> <span><strong>Rol: </strong></span><?= esc($session->get('role')) ?></p>
                    </div>
                <?php endif; ?>

        </div>
        
        <div class="stats-cards">
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/noticies/llistatNoticies'); ?>"> <i class="fa fa-newspaper"></i> Total noticies publicades</a></h3>
                <p><?= esc($count_noticies) ?></p>
            </div>
        </div>

        <div class="stats-cards">
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/programes/llistatClassificacions'); ?>"> <i class="fa fa-calendar-alt"></i> Total classificacions</a></h3>
                <p><?= esc($count_classifications) ?></p>
            </div>
        </div>

        <div class="stats-cards">
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/users'); ?>"> <i class="fa fa-user"></i> Total usuaris</a></h3>
                <p><?= esc($count_usuaris) ?></p>
            </div>
        </div>

        <div class="stats-cards">
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/gestionarContacte'); ?>"> <i class="fa fa-envelope"></i>  Total contactes pendents</a></h3>
                <p><?= esc($count_contacte) ?></p>
            </div>
        </div>

    </div>

<?php echo $this->endSection(); ?>
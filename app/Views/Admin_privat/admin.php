<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>DASHBOARD</h1>
            <div class="user-info">
                <img src="https://via.placeholder.com/40" alt="$User_name">
                <span>Admin</span>
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
<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>Team Dashboard</h2>
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
    </div>

<?php echo $this->endSection(); ?>
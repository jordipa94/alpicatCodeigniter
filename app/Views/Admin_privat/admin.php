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
                <p>45</p>
            </div>
            <div class="card">
                <h3>Active noticias</h3>
                <p>$num noticias
                <?php
                ?>
                
                </p>
            </div>
            <div class="card">
                <h3>noticas</h3>
                <p>$num_deleted_at</p>
            </div>
        
            <div class="card">
                <h3>Noticias</h3>
                <p>Option Categoria</p>
            </div>
            <div class="card">
                <h3>Contacts</h3>
                <p>Option Categoria</p>
            </div>
            <div class="card">
                <h3>Galeria </h3>
                <p>Option Categoria</p>
            </div>
            <div class="card">
                <h3>Programes Alpicat </h3>
                <p>Option Categoria</p>
            </div>

            <div class="card">
                <h3>Admins</h3>
                <p>2</p>
            </div>
        </div>
    </div>

<?php echo $this->endSection(); ?>
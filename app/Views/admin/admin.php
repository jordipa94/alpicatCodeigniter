<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</head>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>DASHBOARD</h2>

            <?php $session = session(); ?>

            <?php if ($session->get('logged_in')): ?>
                <div style="padding: 0 20px; font-size: 14px; margin-top: 20px;">
                    <p><i class="fa fa-user"></i> <span><strong>Usuari: </strong></span><?= esc($session->get('username')) ?></p>
                    <p><i class="fa fa-tag"></i> <span><strong>Rol: </strong></span><?= esc($session->get('role')) ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="stats-cards">
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/noticies/llistatNoticies'); ?>"> <i class="fa fa-newspaper"></i> Total noticies publicades</a></h3>
                <p><?= esc($count_noticies) ?></p>
            </div>
            
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/programes/llistatClassificacions'); ?>"> <i class="fa fa-calendar-alt"></i> Total classificacions</a></h3>
                <p><?= esc($count_classifications) ?></p>
            </div>
            
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/users'); ?>"> <i class="fa fa-user"></i> Total usuaris</a></h3>
                <p><?= esc($count_usuaris) ?></p>
            </div>

        </div>

        <div class="stats-cards">
            
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/galeria/viewLlistatGaleria'); ?>"> <i class="fa fa-images"></i> Total Galeries publicades</a></h3>
                <p><?= esc($count_galeries) ?></p>
            </div>
            
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/gestionarContacte'); ?>"> <i class="fa fa-envelope"></i>  Total contactes pendents</a></h3>
                <p><?= esc($count_contacte) ?></p>
            </div>
            
            <div class="card">
                <h3><a href="<?php echo base_url('admin/calendario/gestioCalendari'); ?>"> <i class="fa fa-ticket"></i>  Events totals</a></h3>
                <p><?= esc($count_eventos) ?></p>
            </div>

        </div>

    </div>

    <div class="w3-card w3-padding w3-light-grey w3-round-large">
        <h3 class="w3-center">Calendari d'Esdeveniments</h3>
        <div id="calendar" class="w3-white w3-round-large" style="padding: 10px;"></div>
    </div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        const isMobile = window.matchMedia("(max-width: 768px)").matches;

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ca', 
            headerToolbar: {
                left: 'prev,next',
                left2: isMobile ? '' : 'today',
                center: isMobile ? '' : 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: <?= json_encode(array_map(function($evento) {
                return [
                    'id'    => $evento['id_evento'],
                    'title' => $evento['titulo'],
                    'start' => $evento['fecha_inicio'],
                    'end'   => $evento['fecha_fin'],
                    'color' => $evento['color'],
                    'url'   => base_url('/admin/calendario/editEvent/' . $evento['id_evento'])
                ];
            }, $eventos), JSON_UNESCAPED_UNICODE) ?>
        });

        calendar.render();
    });
</script>

<?php echo $this->endSection(); ?>
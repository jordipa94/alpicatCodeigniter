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
                <h3><a href="<?php echo base_url('/admin/crearGaleria'); ?>"> <i class="fa fa-images"></i> Total Galeries publicades</a></h3>
                <p><?= esc($count_galeries) ?></p>
            </div>
        </div>

        <div class="stats-cards">
            <div class="card">
                <h3><a href="<?php echo base_url('/admin/gestionarContacte'); ?>"> <i class="fa fa-envelope"></i>  Total contactes pendents</a></h3>
                <p><?= esc($count_contacte) ?></p>
            </div>
        </div>

    </div>

    <div id="calendar" style="width: 500px;"></div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ca', 
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: <?= json_encode(array_map(function($evento) {
                return [
                    'id'    => $evento['id_evento'],
                    'title' => $evento['titulo'],
                    'start' => $evento['fecha_inicio'],
                    'end'   => $evento['fecha_fin'],
                    'color' => $evento['color'],
                    'url'   => base_url('calendario/editEvent/' . $evento['id_evento'])
                ];
            }, $eventos), JSON_UNESCAPED_UNICODE) ?>
        });

        calendar.render();
    });
</script>

<?php echo $this->endSection(); ?>
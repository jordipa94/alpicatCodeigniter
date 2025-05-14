<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

</head>
<div class="w3-padding">
    <h1>Calendari d'Esdeveniments</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
            <?= session('success') ?>
        </div>
    <?php endif; ?>


    <div id="calendar" style="width: 400px;"></div>
</div>

<script>
    //no lo he hecho yo 
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
                   // 'url'   => base_url('calendario/editEvent/' . $evento['id_evento'])
                ];
            }, $eventos), JSON_UNESCAPED_UNICODE) ?>
        });

        calendar.render();
    });
</script>

<?php echo $this->endSection(); ?>

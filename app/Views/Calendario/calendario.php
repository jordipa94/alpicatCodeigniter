?>
<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('contingut'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<div class="w3-container">
    <h2>Calendari d'Esdeveniments</h2>
    <div id="calendar"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ca',
            events: '/eventos/json',
        });
        calendar.render();
    });
</script>
<?= $this->endSection(); ?>

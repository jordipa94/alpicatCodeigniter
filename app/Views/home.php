<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</head>
<style>
a {
    text-decoration: none;
}

.banner {
    position: relative;
    width: 100%;
    height: 300px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-family: Arial, sans-serif;
}

.banner-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    filter: brightness(0.6);
}

.banner-content {
    position: relative;
    z-index: 2;
    color: white;
}

.banner-content h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
}

.banner-content button {
    padding: 12px 25px;
    font-size: 1em;
    border: none;
    background-color: #28a745;
    color: white;
    cursor: pointer;
    border-radius: 4px;
    box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    transition: background-color 0.3s ease;
}

.banner-content button:hover {
    background-color: #218838;
}

.banner::before {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

.imgNoticia {
    max-width: 100%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.w3-row-padding {
    margin-left: 0 !important;
    margin-right: 0 !important;
}
</style>
<body>

    <div class="banner">
        <img src="<?= base_url('img/home.jpeg') ?>" alt="Banner" class="banner-img">
        <div class="banner-content">
            <h1>BENVINGUTS A U.E.A</h1>
            <button><a href="<?= esc($linkBannerPrincipal) ?>">INSCRIU-TE ARA</a></button>
        </div>
    </div>

    <main class="w3-container" style="margin-top: 20px;">
        <h2 class="w3-center">Últimes Notícies</h2>
        <div class="w3-row-padding">
            <?php foreach($noticies as $noticia): ?>
                <div class="w3-third w3-margin-bottom">
                    <div class="w3-card w3-padding">
                        <h3><?= substr($noticia['nom'], 0, 30) . '...' ?></h3>
                        <p><?= substr($noticia['contingut'], 0, 50) . '...' ?></p>
                        <div class="w3-center">
                            <a href="<?= base_url('noticies/readNoticia/' . esc($noticia['id'])) ?>">
                                <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                            </a>
                        </div>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        </div>

    </main>

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
                //center: isMobile ? '' : 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: <?= json_encode(array_map(function($evento) {
                return [
                    'id'    => $evento['id_evento'],
                    'title' => $evento['titulo'],
                    'start' => $evento['fecha_inicio'],
                    'end'   => $evento['fecha_fin'],
                    'color' => $evento['color']
                ];
            }, $eventos), JSON_UNESCAPED_UNICODE) ?>
        });

        calendar.render();
    });
</script>

<?php echo $this->endSection(); ?>
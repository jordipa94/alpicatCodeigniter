<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</head>
<style>
.welcomeDiv, .teamDiv {
    text-align: center;
    padding: 30px;
    color: white;
}

.welcomeDiv {
    margin-top: 35px;
    background-color: green;
}

.teamDiv {
    background-color: rgb(33, 124, 33);
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

    <div class="welcomeDiv">
        <h2>"BENVINGUTS A U.E.A"</h2>
        <p>*foto nens jugant*</p>
        <a class="w3-button w3-white w3-hover-green w3-round" href="#">INSCRIU-TE ARA</a>
    </div>

    <div class="teamDiv">
        <h2>UNEIX-TE AL NOSTRE EQUIP</h2>
        <p>ENTRENEM FUTURS CAMPIONS</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nisi sit perferendis, sunt commodi eum et fugiat ipsa mollitia adipisci modi laudantium quam inventore quibusdam accusantium quas amet labore exercitationem.</p>
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
                center: isMobile ? '' : 'title',
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
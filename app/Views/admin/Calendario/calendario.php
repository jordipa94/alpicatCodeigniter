<!DOCTYPE html>
<html>
<head>
    <title>Calendario de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
</head>
<body class="p-3">
    <div class="container">
        <h2>Calendario de Eventos</h2>
        <div id="calendar"></div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                selectable: true,
                events: '/calendar/loadEvents',
                select: function(info) {
                    var title = prompt('Nombre del evento:');
                    if (title) {
                        fetch('/calendar/addEvent', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'title=' + encodeURIComponent(title) +
                                  '&start=' + info.startStr +
                                  '&end=' + info.endStr
                        })
                        .then(res => res.json())
                        .then(() => calendar.refetchEvents());
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>

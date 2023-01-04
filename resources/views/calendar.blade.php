<!DOCTYPE html>
<html>

<head>
    <title>روزنامة</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            background-color: #e8ebf4;
        }

        .calendar {
            margin-top: 30px;
        }

        .button {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="button">
            <a href="{{ route('home') }}" type="button" class="btn btn-outline-dark">الصفحة
                الرئسية</a>
        </div>


        <div class="calendar" id="calendar"></div>

    </div>

    <script>
        $(document).ready(function() {
            var reunion = @json($events);
            //console.log(events)
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay',
                },
                events: reunion


            })

        });
    </script>

</body>

</html>

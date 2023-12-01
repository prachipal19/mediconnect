<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <title>Dashboard</title>
    <style>
        .dashbord-tables {
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table, .anime {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="menu">
            @include('patient.menu')
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                <tr>
                    <td colspan="1" class="nav-bar">
                        <p style="font-size: 23px; padding-left: 12px; font-weight: 600; margin-left: 20px;">Home</p>
                    </td>
                    <td width="25%"></td>
                    <td width="15%">
                        <p style="font-size: 14px; color: rgb(119, 119, 119); padding: 0; margin: 0; text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0; margin: 0;">
                            <?php 
                                date_default_timezone_set('America/Toronto');
                                $today = date('Y-m-d');
                                echo $today;
                            ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label" style="display: flex; justify-content: center; align-items: center;">
                            <img src="{{ asset('assets/img/calendar.svg') }}" width="100%">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <center>
                            <table class="filter-container doctor-header patient-header" style="border: none; width:95%;" border="0">
                                <tr>
                                    <td>
                                        <h3>Welcome!</h3>
                                        <h1>{{ $patient->name}}</h1>
                                        <p>
                                            Haven't any idea about doctors? No problem, let's jump to 
                                            <a href="doctors.php" class="non-style-link"><b>"All Doctors"</b></a> section or 
                                            <a href="schedule.php" class="non-style-link"><b>"Sessions"</b></a>.<br>
                                            Track your past and future appointments history.<br>
                                            Also, find out the expected arrival time of your doctor or medical consultant.<br><br>
                                        </p>
                                    
                                        <br><br>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table border="0" width="100%">
                            <tr>
                                <td width="50%">
                                    <center>
                                        <table class="filter-container" style="border: none;" border="0">
                                            <tr>
                                                <td colspan="4">
                                                    <p style="font-size: 20px; font-weight:600; padding-left: 12px;">Today's sessions {{ $todayAppointmentsCount }}</p>
                                                </td>
                                            </tr>
                                          
                                        </table>
                                    </center>
                                </td>
    </tr><tr>
                                <td>
                                    <p style="font-size: 20px; font-weight:600; padding-left: 40px;" class="anime">Your Upcoming Booking</p>
                                    <center>
                                        <div class="abc scroll" style="height: 250px; padding: 0; margin: 0;">
                                            <table width="85%" class="sub-table scrolldown" border="0">
                                                <thead>
                                                    <tr>
                                                        <th class="table-headin">
                                                            Appoint. Number
                                                        </th>
                                                        <th class="table-headin">
                                                            Session Title
                                                        </th>
                                                        <th class="table-headin">
                                                            Doctor
                                                        </th>
                                                        <th class="table-headin">
                                                            Sheduled Date & Time
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($appointments as $appointment)
                <?php
                $scheduledDateTime = $appointment->schedule->schedule_date . ' ' . $appointment->schedule->schedule_time;
                $todayDateTime = date('Y-m-d H:i:s');
                if (strtotime($scheduledDateTime) >= strtotime($todayDateTime)) {
                ?>
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->schedule->title }}</td>
                        <td>{{ $appointment->schedule->doctor->name }}</td>
                        <td>{{ $appointment->schedule->schedule_date }} {{ $appointment->schedule->schedule_time }}</td>
                    </tr>
                <?php } ?>
            @endforeach
        </tbody>

                                            </table>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>

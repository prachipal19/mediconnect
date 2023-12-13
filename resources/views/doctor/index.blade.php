<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
        
    <title>Dashboard</title>
    <style>
        .dashbord-tables, .doctor-heade {
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container {
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table, #anim {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .doctor-heade {
            animation: transitionIn-Y-over 0.5s;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="menu">
            @include('doctor.menu')
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;" >
                <tr>
                    <td colspan="1" class="nav-bar" >
                        <p style="font-size: 23px; padding-left: 12px; font-weight: 600; margin-left: 20px;">Dashboard</p>
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
                            <img src="{{asset('assets/img/calendar.svg')}}" width="100%">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" >
                        <center>
                            <table class="filter-container doctor-header" style="border: none; width: 95%" border="0" >
                                <tr>
                                    <td>
                                        <h3>Welcome!</h3>
                                        <h1>{{ $doctor->name }}</h1>
                                        <p>Thanks for joining with us. We are always trying to get you a complete service<br>
                                        You can view your daily schedule, Reach Patients Appointment at home!<br><br>
                                        </p>
                                        <a href="{{ route('doctorappointment', ['email' => $doctor->email]) }}" class="non-style-link">
                                            <button class="btn-primary btn">View My Appointments</button>
                                        </a>
                                        <br>
                                        <br>
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
                                                    <p style="font-size: 20px; font-weight: 600; padding-left: 12px;">Today's sessions :  {{ $todaySessionsCount }}</p>
                                                </td>
                                            </tr>

                                          
                                        </table>
                                    </center>
                                </td>

                               
                </tr>
                <tr>
                <td>
                                    <p id="anim" style="font-size: 20px; font-weight: 600; padding-left: 40px;">Your Upcoming Sessions until Next week</p>
                                    <center>
                                        <div class="abc scroll" style="height: 250px; padding: 0; margin: 0;">
                                            <table width="85%" class="sub-table scrolldown" border="0" >
                                                <thead>
                                                    <tr>
                                                        <th class="table-headin">Session Title</th>
                                                        <th class="table-headin">Scheduled Date</th>
                                                        <th class="table-headin">Time</th>
                                                        <th class="table-headin">speciality</th>
                                                    </tr>
                                                </thead>
                                                <?php
// Get today's date
date_default_timezone_set('America/Toronto');
$today = date('Y-m-d');

// Calculate the date of the end of the next week
$nextWeek = date('Y-m-d', strtotime('+1 week', strtotime($today)));

// Convert the collection to an array
$schedulesArray = $schedules->toArray();

// Filter sessions that occur until the end of next week
$upcomingSessions = array_filter($schedulesArray, function ($schedule) use ($nextWeek, $today) {
    // Check if the schedule date is within the upcoming week range and greater than or equal to today's date
    return $schedule['schedule_date'] >= $today && $schedule['schedule_date'] <= $nextWeek;
});
?>

                                              <tbody>
                                              <tbody>
    @foreach($upcomingSessions as $schedule)
        <tr>
            <td>{{ $schedule['title'] }}</td>
            <td>{{ $schedule['schedule_date'] }}</td>
            <td>{{ $schedule['schedule_time'] }}</td>
            <td>{{ $doctor->specialty->name }}</td>
        </tr>
    @endforeach
</tbody>

</tbody>

                                            </table>
                                       
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

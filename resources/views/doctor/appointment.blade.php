<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
        
    <title>Appointments</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="menu">
            @include('doctor.menu')
        </div>
        <div class="container">
          
                <table border="0" width="100%">
                    <tr>
                       
                        <td width="15%">
                            <p style="font-size: 23px; padding-left: 12px; font-weight: 600;">Appointments</p>
                        </td>
                         <td width="800px">
                        
                         </td>
                      
                        <td >
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
                                <img src="{{asset('assets/img/calendar.svg')}}" width="100%" alt="Calendar Image">
                            </button>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Appointments( {{ $appointments->count() }})</p>
                    </td>
                    
                </tr>
                    <tr>
                        <td colspan="4">
                            <center>
                                <div class="abc scroll">
                                    <table width="100%" class="sub-table scrolldown" border="0">
                                        <thead>
                                            <tr>
                                                <th class="table-headin">Patient name</th>
                                                <th class="table-headin">Appointment number</th>
                                                <th class="table-headin">Session Title</th>
                                                <th class="table-headin">Session Date & Time</th>
                                             
                                                <th class="table-headin">Events</th>
                                            </tr>
                                        </thead>
            <!-- ... (other parts of your HTML) ... -->

<tbody>
    @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->patient->name }}</td>
            <td>{{ $appointment->appointment_number }}</td>
            <td>
                @if ($appointment->schedule)
                    {{ $appointment->schedule->title }}
                @else
                    No Schedule Available
                @endif
            </td>
            <td>
                @if ($appointment->schedule)
                    {{ $appointment->schedule->schedule_date }} {{ $appointment->schedule->schedule_time }}
                @else
                    N/A
                @endif
            </td>
            <td>
            <form action="{{ route('destroy-doctorappointment', ['email' => $doctor->email, 'appointment' => $appointment->id]) }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px; padding-top: 12px; margin-right: 20px; padding-bottom: 12px; margin-top: 10px;">
        <font class="tn-in-text">Cancel</font>
    </button>
</form>

            </td>
        </tr>
    @endforeach
</tbody>

<!-- ... (rest of your HTML) ... -->


                                    </table>
                                </div>
                            </center>
                        </td> 
                    </tr>
                </table>
         
        </div>
    </div>
</body>
</html>

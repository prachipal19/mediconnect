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
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
    
    
</head>
<body>

    <div class="container">
        <div class="menu">
        @include('admin.menu')
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                        <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Admin Portal</p>

                    </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                                  
                                <?php
date_default_timezone_set('America/Toronto');

$today = date('Y-m-d');
echo $today;
?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="{{asset('assets/img/calendar.svg')}}" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Hospital Information</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                                <div class="h1-dashboard">
                                                <span>{{ $doctorsCount }}</span>


                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Doctors 
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/img/icons/doctors-hover.svg')}}');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                <span>{{ $patientsCount }}</span>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    Patients 
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/img/icons/patients-hover.svg')}}');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                                <div class="h1-dashboard" >
                                                <span>{{ $newBookingCount }}</span>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    New Bookings  
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/img/icons/book-hover.svg')}}');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                <span>{{ $todaySessionsCount }}</span>
                                                </div ><br>
                                                <div class="h3-dashboard">
                                                    Today's Sessions 
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/img/icons/session-iceblue.svg')}}');"></div>
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>


                <tr>
                    <td colspan="4">
                        <table width="100%" border="0" class="dashbord-tables">
                            <tr>
                                <td>
                                    <p style="padding:10px;padding-left:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                        Upcoming Appointments until Next <?php  
                                        echo date("l",strtotime("+1 week"));
                                        ?>

                                    </p>
                                    <p style="padding-bottom:19px;padding-left:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                        Here's Quick access to Upcoming Appointments until 7 days<br>
                                        More details available in @Appointment section.
                                    </p>

                                </td>
                                <td>
                                    <p style="text-align:right;padding:10px;padding-right:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                        Upcoming Sessions  until Next <?php  
                                        echo date("l",strtotime("+1 week"));
                                        ?>
                                    </p>
                                    <p style="padding-bottom:19px;text-align:right;padding-right:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                        Here's Quick access to Upcoming Sessions that Scheduled until 7 days<br>
                                        Add,Remove and Many features available in @Schedule section.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <center>
                                        <div class="abc scroll" style="height: 200px;">
                                        <table width="85%" class="sub-table scrolldown" border="0">
                                        <thead>
                                        <tr>    
                                                <th class="table-headin" >
                                                        
                                                    Appointment number
                                                    
                                                </th>
                                                <th class="table-headin">
                                                    Patient name
                                                </th>
                                                <th class="table-headin">
                                                    
                                                
                                                    Doctor
                                                    
                                                </th>
                                                <th class="table-headin">
                                                    
                                                
                                                    Session
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                      

                                        @forelse ($upcomingAppointments as $appointment)
        <tr>
            <td style="text-align:center; font-size: 23px; font-weight: 500; color: var(--btnnicetext); padding: 20px;">
                {{ $appointment->apponum }}
            </td>
            <td style="font-weight: 600;"> &nbsp;{{ Str::limit($appointment->pname, 25) }}</td>
            <td style="font-weight: 600;"> &nbsp;{{ Str::limit($appointment->docname, 25) }}</td>
            <td>{{ Str::limit($appointment->title, 15) }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4">
                <br><br><br><br>
                <center>
                    <img src="{{ asset('assets/img/notfound.svg') }}" width="25%">
                    <br>
                    <p class="heading-main12" style="margin-left: 45px; font-size: 20px; color: rgb(49, 49, 49)">
                        We couldn't find anything related to your keywords!
                    </p>
                    <a class="non-style-link" href='adminappointment'>
                        <button class="login-btn btn-primary-soft btn" style="display: flex; justify-content: center; align-items: center; margin-left: 20px;">
                            &nbsp; Show all Appointments &nbsp;
                        </button>
                    </a>
                </center>
                <br><br><br><br>
            </td>
        </tr>
    @endforelse

     
 

                 
                                            </tbody>
                
                                        </table>
                                        </div>
                                        </center>
                                </td>
                                <td width="50%" style="padding: 0;">
                                    <center>
                                        <div class="abc scroll" style="height: 200px;padding: 0;margin: 0;">
                                        <table width="85%" class="sub-table scrolldown" border="0" >
                                        <thead>
                                        <tr>
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
                                        

 
                                        @forelse ($upcomingSessions as $session)
        <tr>
        <td style="text-align:center; font-size: 23px; font-weight: 500; color: var(--btnnicetext); padding: 20px;">{{ Str::limit($session->session_title, 15) }}</td>
            <td style="font-weight: 600;"> &nbsp;{{ Str::limit($session->docname, 25) }}</td>
            <td>{{($session->scheduledate) }}</td>
          
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <br><br><br><br>
                <center>
                    <img src="{{ asset('assets/img/notfound.svg') }}" width="25%">
                    <br>
                    <p class="heading-main12" style="margin-left: 45px; font-size: 20px; color: rgb(49, 49, 49)">
                        We couldn't find anything related to your keywords!
                    </p>
                    <a class="non-style-link" href='adminschedule'>
                        <button class="login-btn btn-primary-soft btn" style="display: flex; justify-content: center; align-items: center; margin-left: 20px;">
                            &nbsp; Show all Sessions &nbsp;
                        </button>
                    </a>
                </center>
                <br><br><br><br>
            </td>
        </tr>
    @endforelse

                 
                                            </tbody>
                
                                        </table>
                                        </div>
                                        </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <a href="adminappointment" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Appointments</button></a>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="adminschedule" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Sessions</button></a>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
                        </table>
                        </center>
                        </td>
                </tr>
            </table>
        </div>
    </div>


</body>
</html>
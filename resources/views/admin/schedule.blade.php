<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>Schedule</title>
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
            @include('admin.menu')
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr>
                    
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Schedule Manager</p>

                    </td>

                    <td>
                        
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
                        <button class="btn-label"
                            style="display: flex;justify-content: center;align-items: center;"><img
                                src="{{asset('assets/img/calendar.svg')}}" width="100%"></button>
                    </td>


                </tr>

                <tr>
                    <td colspan="4">
                        <div style="display: flex;margin-top: 40px;">
                            <div class="heading-main12"
                                style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49);margin-top: 5px;">Schedule
                                a
                                Session</div>
                                <a class="non-style-link">
    <button class="login-btn btn-primary btn button-icon" onclick="openAddPopup('{{ route('add-session') }}')" style="display: flex;justify-content: center;align-items: center;margin-left:75px;background-image: url('{{asset('assets/img/icons/add.svg')}}');">
        Add Session
    </button>

    <script>
    // Function to handle opening the add popup window
    function openAddPopup(url) {
        const width = 600;
        const height = 400;
        const left = (window.innerWidth - width) / 2;
        const top = (window.innerHeight - height) / 2;

        window.open(url, 'AddSessionWindow', `width=${width},height=${height},left=${left},top=${top},resizable=yes,scrollbars=yes`);
    }
</script>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;">

                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All
                            Sessions( {{ $scheduleCount }})</p>
                    </td>

                </tr>
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;">
                        <center>
                          
                          

<table width="93%" class="sub-table scrolldown" border="0">
    <tr>
        <th class="table-headin">Session Title</th>
        <th class="table-headin">Doctor</th>
        <th class="table-headin">Scheduled Date & Time</th>
        <th class="table-headin">Max patients that can be booked</th>
        <th class="table-headin">Events</th>
    </tr>

    @foreach ($schedules as $schedule)
    <tr>
        <td>{{ $schedule->title }}</td>
        <td>
            @if ($schedule->doctor) <!-- Check if doctor relationship exists -->
                {{ $schedule->doctor->name ?? 'No Name Available' }}
            @else
                No Doctor Assigned
            @endif
        </td>
        <td>{{ $schedule->schedule_date }} {{ $schedule->schedule_time }}</td>
        <td>{{ $schedule->number_of_patients }}</td>
        <td>

        <form action="{{ route('destroy-session', $schedule->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this session?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px; padding-top: 12px; margin-right: 20px; padding-bottom: 12px; margin-top: 10px;">
        <font class="tn-in-text">Cancel</font>
    </button>
</form>
        </td>
    </tr>
@endforeach

</table>



                        </center>
                    </td>

                </tr>





                </tbody>

            </table>
        </div>
        </center>
        </td>
        </tr>






        </table>

    </div>
    </div>



    </div>






</body>

</html>
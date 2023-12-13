<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <title>Doctors</title>
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
            @include('patient.menu')
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0; margin-top: 25px;">
                <tr>
                <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Doctor Details</p>

                    </td>
                
                   
                    <td width="15%">
                        <p style="font-size: 14px; color: rgb(119, 119, 119); padding: 0; margin: 0; text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0; margin: 0;">
                            <?php 
                                date_default_timezone_set('America/Toronto');
                                $date = date('Y-m-d');
                                echo $date;
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
                    <td colspan="4" style="padding-top: 10px;">
                        <p class="heading-main12" style="margin-left: 45px; font-size: 18px; color: rgb(49, 49, 49);">
                            All Doctors ({{ $doctorcount }})
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <table width="93%" class="sub-table scrolldown" border="0">
                                    <thead>
                                        <tr>
                                            <th class="table-headin">
                                                Doctor Name
                                            </th>
                                            <th class="table-headin">
                                                Email
                                            </th>
                                            <th class="table-headin">
                                                Specialties
                                            </th>
                                            <th class="table-headin">
                                                Events
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($doctors as $doctor)
        <tr height="50px">
            <td class="table-data">{{ $doctor->name }}</td>
            <td class="table-data">{{ $doctor->email }}</td>
            <td class="table-data">{{ $doctor->specialty->name }}</td>
       <td>
         <!-- View Button -->
<a  class="btn-primary-soft btn button-icon btn-view" onclick="openViewPopup('{{ route('view-patientdoctor', $doctor->id) }}')" style="padding-left: 40px; margin-right: 20px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">
    <font class="tn-in-text">View</font>
</a>

<!-- Script for the View Doctor Popup -->
<script>
    // Function to handle opening the view popup window
    function openViewPopup(url) {
        const width = 600;
        const height = 400;
        const left = (window.innerWidth - width) / 2;
        const top = (window.innerHeight - height) / 2;

        window.open(url, 'ViewWindow', `width=${width},height=${height},left=${left},top=${top},resizable=yes,scrollbars=yes`);
    }
</script>
       </td>
        </tr>
    @endforeach
</tbody>

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

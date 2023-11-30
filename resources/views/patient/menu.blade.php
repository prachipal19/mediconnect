<link rel="stylesheet" href="{{asset('assets/css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
<table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="{{asset('assets/img/user.png')}}" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Patient</p>
                                    <p class="profile-subtitle">{{ $patient->email}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="login" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home  menu-active menu-icon-appoinment-active" >
                        <a href="{{ route('patientindex', ['email' => $patient->email]) }}"  class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="{{ route('patientdoctors', ['email' => $patient->email]) }}"  class="non-style-link-menu "><div><p class="menu-text">All Doctors</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="{{ route('patientschedule', ['email' => $patient->email]) }}"  class="non-style-link-menu"><div><p class="menu-text">Scheduled Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn  menu-icon-appoinment">
                        <a href="{{ route('patientbooking', ['email' => $patient->email]) }}" class="non-style-link-menu"><div><p class="menu-text">My Bookings</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="{{ route('patientsettings', ['email' => $patient->email]) }}"  class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
                
            </table>
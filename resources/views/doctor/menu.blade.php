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
                                    <p class="profile-title">Doctor</p>
                                    <p class="profile-subtitle"> {{ $doctor->email }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="/login" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active" >
                        <a href="{{ route('doctorindex', ['email' => $doctor->email]) }}" class="non-style-link-menu non-style-link-menu-active" ><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn  menu-icon-appoinment">
                        <a href="{{ route('doctorappointment', ['email' => $doctor->email]) }}" class="non-style-link-menu "><div><p class="menu-text">My Appointments</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                        <a href="{{ route('doctorschedule', ['email' => $doctor->email]) }}" class="non-style-link-menu"><div><p class="menu-text">My Sessions</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="{{ route('doctorpatients', ['email' => $doctor->email]) }}" class="non-style-link-menu"><div><p class="menu-text">My Patients</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="{{ route('doctorsettings', ['email' => $doctor->email]) }}" class="non-style-link-menu"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>
</table>
        
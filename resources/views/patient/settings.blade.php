<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <title>Settings</title>
    <style>
        .dashbord-tables {
            animation: transitionIn-Y-over 0.5s;
        }

        .filter-container {
            animation: transitionIn-X 0.5s;
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
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                <tr>

                    <td>
                        <p style="font-size: 23px; padding-left:12px; font-weight: 600;">Settings</p>
                    </td>
                    <td width="15%">
                        <p
                            style="font-size: 14px; color: rgb(119, 119, 119); padding: 0; margin: 0; text-align: right;">
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
                    <td colspan="4">
                        <center>
                            <table class="filter-container" style="border: none;" border="0">
                                <tr>
                                    <td colspan="4">
                                        <p style="font-size: 20px">&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">
                                        <a href="?action=edit&id=<?php //echo $userid ?>&error=0"
                                            class="non-style-link">
                                            <div class="dashboard-items setting-tabs"
                                                style="padding:20px;margin:auto;width:95%;display: flex">
                                                <div class="btn-icon-back dashboard-icons-setting"
                                                    style="background-image: url(' {{asset('assets/img/icons/doctors-hover.svg')}}');">
                                                </div>
                                                <div>
                                                    <div class="h1-dashboard">
                                                       <!-- Edit Button -->
                                                       <a href=""
                                                            onclick="openEditPopup('{{ route('edit-patient', $patient->id) }}')"
                                                            style=" color: #0A76D8;text-decoration: none;">
                                                            Account settings
                                                        </a>

                                                        <!-- Add a script section -->
                                                        <script>
                                                            // Function to handle opening the popup window
                                                            function openEditPopup(url) {
                                                                // Define the dimensions and properties of the popup window
                                                                const width = 600;
                                                                const height = 400;
                                                                const left = (window.innerWidth - width) / 2;
                                                                const top = (window.innerHeight - height) / 2;

                                                                // Open the popup window with specified URL, dimensions, and properties
                                                                window.open(url, 'EditWindow', `width=${width},height=${height},left=${left},top=${top},resizable=yes,scrollbars=yes`);
                                                            }

                                                            // Add event listeners to handle clicks on the "Edit" buttons
                                                            document.addEventListener('DOMContentLoaded', function () {
                                                                const editButtons = document.querySelectorAll('.btn-edit');

                                                                editButtons.forEach(function (button) {
                                                                    button.addEventListener('click', function (event) {
                                                                        event.preventDefault(); // Prevent default link behavior (opening a new page)
                                                                        const editUrl = button.getAttribute('href'); // Get the URL from the button
                                                                        openEditPopup(editUrl); // Open the popup window with the edit URL
                                                                    });
                                                                });
                                                            });
                                                        </script>
                                                    </div><br>
                                                    <div class="h3-dashboard" style="font-size: 15px;">
                                                        Edit your Account Details & Change Password
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p style="font-size: 5px">&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">
                                        <a href="?action=view&id=<?php //echo $userid ?>" class="non-style-link">
                                            <div class="dashboard-items setting-tabs"
                                                style="padding:20px;margin:auto;width:95%;display: flex;">
                                                <div class="btn-icon-back dashboard-icons-setting "
                                                    style="background-image: url('{{asset('assets/img/icons/view-iceblue.svg')}}');">
                                                </div>
                                                <div>
                                                    <div class="h1-dashboard">

                                                     <!-- View Button -->
<a onclick="openViewPopup('{{ route('view-patient', $patient->id) }}')"  style=" color: #0A76D8;text-decoration: none;">
Account Details 
</a>

<!-- Script for the View Patient Popup -->
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
                                                    </div><br>
                                                    <div class="h3-dashboard" style="font-size: 15px;">
                                                        View Personal information About Your Account
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p style="font-size: 5px">&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">
                                        <a href="?action=drop&id=<?php //echo $userid.'&name='.$username ?>"
                                            class="non-style-link">
                                            <div class="dashboard-items setting-tabs"
                                                style="padding:20px;margin:auto;width:95%;display: flex;">
                                                <div class="btn-icon-back dashboard-icons-setting"
                                                    style="background-image: url('{{asset('assets/img/icons/delete-iceblue.svg')}}');">
                                                </div>
                                                <div>
                                                    <div class="h1-dashboard" style="color: #ff5050;">
                                                    <form action="{{ route('destroy-patient', $patient->id) }}"
                                                            method="post" style="display: inline;"
                                                            onsubmit="return confirm('Are you sure you want to delete this account?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="border: none; background: none;padding:0;margin:0">
                                                                <font    style=" color: red;font-size:25px;font-weight-bold;text-decoration: none;"  class="tn-in-text">  Delete Account</font>
                                                            </button>
                                                        </form>
                                                    </div><br>
                                                    <div class="h3-dashboard" style="font-size: 15px;">
                                                        Will Permanently Remove your Account
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
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
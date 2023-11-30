<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
        
    <title>Doctors</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
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
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Doctor Details</p>

                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                            
                          
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>

                       
<script>
 document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.querySelector('.header-search');
    const searchInput = document.querySelector('.header-searchbar');
    const doctorsTable = document.querySelector('.sub-table tbody');

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const searchTerm = searchInput.value.trim(); // Get the search query

        // Make an AJAX request to search-doctors route
        fetch(`{{ route('search-doctors') }}?search=${searchTerm}`)
            .then(response => response.json())
            .then(data => {
                // Process the received data and update the table with search results
                doctorsTable.innerHTML = ''; // Clear existing table rows

                data.doctors.forEach(doctor => {
                    // Create table rows for each doctor and append them to the table
                    const row = `
                        <tr>
                            <td class="table-data">${doctor.name}</td>
                            <td class="table-data">${doctor.email}</td>
                            <td class="table-data">${doctor.specialty ? doctor.specialty.name : 'No Specialty Assigned'}</td>
                            <td class="table-data">
                                <a  class="btn-primary-soft btn button-icon btn-edit" onclick="openEditPopup('{{ route('edit-doctor', ':doctorId') }}')" style="padding-left: 40px;margin-right: 20px; padding-top: 12px; padding-bottom: 12px; ma">
                                    <font class="tn-in-text">Edit</font>
                                </a>
                                <a   class="btn-primary-soft btn button-icon btn-view" onclick="openViewPopup('{{ route('view-doctor',':doctorId') }}')" style="padding-left: 40px; margin-right: 20px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">
    <font class="tn-in-text">View</font>
</a>

<form action="{{ route('destroy-doctor', ':doctorId') }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px; padding-top: 12px; margin-right: 20px; padding-bottom: 12px; margin-top: 10px;">
        <font class="tn-in-text">Remove</font>
    </button>
</form>
                            </td>
                        </tr>
                    `;
                    const doctorRow = row.replace(/:doctorId/g, doctor.id); // Replace all occurrences of :doctorId with actual ID
                    doctorsTable.innerHTML += doctorRow;
                });
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
            });
    });
});

</script>

                        
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php 
                      date_default_timezone_set('America/Toronto');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="{{asset('assets/img/calendar.svg')}}" width="100%"></button>
                    </td>


                </tr>
               
                <tr >
                    <td colspan="2" style="padding-top:30px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Add New Doctor</p>
                    </td>
                    <td colspan="2">
                    <a href="" class="non-style-link">
    <button class="login-btn btn-primary btn button-icon" onclick="openAddPopup('{{ route('add-doctor') }}')" style="display: flex;justify-content: center;align-items: center;margin-left:75px;background-image: url('{{asset('assets/img/icons/add.svg')}}');">
        Add New
    </button>
</a>

</td>
<script>
    // Function to handle opening the add popup window
    function openAddPopup(url) {
        const width = 600;
        const height = 400;
        const left = (window.innerWidth - width) / 2;
        const top = (window.innerHeight - height) / 2;

        window.open(url, 'AddDoctorWindow', `width=${width},height=${height},left=${left},top=${top},resizable=yes,scrollbars=yes`);
    }
</script>

                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Doctors ( {{ $doctorscount }} )</p>
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
                                <th class="table-headin" colspan="3">
                                    
                                    Events
                                    
                                </tr>
                        </thead>
                        <tbody>
                        @foreach ($doctors as $doctor)
    <tr>
        <td class="table-data">{{ $doctor->name }}</td>
        <td class="table-data">{{ $doctor->email }}</td>
        <td class="table-data">
            @if ($doctor->specialty)
                {{ $doctor->specialty->name }}
            @else
                No Specialty Assigned
            @endif
        </td>
        <td class="table-data">
   
   <!-- Edit Button -->
<a href="" class="btn-primary-soft btn button-icon btn-edit" onclick="openEditPopup('{{ route('edit-doctor', $doctor->id) }}')" style="padding-left: 40px;margin-right: 20px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">
    <font class="tn-in-text">Edit</font>
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

    </td>
    <td class="table-data">
   <!-- View Button -->
<a  class="btn-primary-soft btn button-icon btn-view" onclick="openViewPopup('{{ route('view-doctor', $doctor->id) }}')" style="padding-left: 40px; margin-right: 20px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">
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
<td class="table-data">
<form action="{{ route('destroy-doctor', $doctor->id) }}" method="post" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px; padding-top: 12px; margin-right: 20px; padding-bottom: 12px; margin-top: 10px;">
        <font class="tn-in-text">Remove</font>
    </button>
</form>
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
   
    


</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/animations.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
        
    <title>Patients</title>
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
                <tr>
                <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Patients Details</p>

                    </td>
                    <td>
                        
                    <form action="" method="post" class="header-search">

<input type="search" name="search" class="input-text header-searchbar" placeholder="Search Patients name or Email" list="doctors">&nbsp;&nbsp;


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
fetch(`{{ route('search-patients') }}?search=${searchTerm}`)
.then(response => response.json())
.then(data => {
// Process the received data and update the table with search results
doctorsTable.innerHTML = ''; // Clear existing table rows

data.doctors.forEach(doctor => {
// Create table rows for each doctor and append them to the table
const row = `
<tr >
            <td  > ${doctor.name} </td>
            <td  > ${doctor.nic} </td>
            <td  > ${doctor.telephone} </td>
            <td  > ${doctor.email} </td>
            <td  > ${doctor.date_of_birth} </td>
            <td  >
              
              <!-- View Button -->
           <a  class="btn-primary-soft btn button-icon btn-view" onclick="openViewPopup('{{ route('view-patient', ':doctorId') }}')" style="padding-left: 40px; margin-right: 20px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">
               <font class="tn-in-text">View</font>
           </a>
           
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
               
                
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Patients ( {{ $patientscount }})</p>
                    </td>
                    
                </tr>
              
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" height="150px"  class="sub-table scrolldown" border="0">
                        <thead>
                        <tr >
                                <th class="table-headin">
                                    
                                
                                Name
                                
                                </th>
                                <th class="table-headin">
                                    
                                
                                    NIC
                                    
                                </th>
                                <th class="table-headin">
                                
                            
                                Telephone
                                
                                </th>
                                <th class="table-headin">
                                    Email
                                </th>
                                <th class="table-headin">
                                    
                                    Date of Birth
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    Events
                                    
                                </tr>
                        </thead>
                       


<tbody>

    @foreach ($patients as $patient)
    <tr height="50px">
            <td  >{{ $patient->name }}</td>
            <td  >{{ $patient->nic }}</td>
            <td  >{{ $patient->telephone }}</td>
            <td  >{{ $patient->email }}</td>
            <td  >{{ $patient->date_of_birth }}</td>
         
            <td  >
              
   <!-- View Button -->
<a  class="btn-primary-soft btn button-icon btn-view" onclick="openViewPopup('{{ route('view-patient', $patient->id) }}')" style="padding-left: 40px; margin-right: 20px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">
    <font class="tn-in-text">View</font>
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
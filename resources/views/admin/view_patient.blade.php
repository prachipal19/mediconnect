<!-- show_patient.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View patient</title>
   <style>
    /* Add your CSS styles here */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

.dash-body {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h1 {
    font-size: 28px;
    margin-bottom: 20px;
}

p {
    font-size: 16px;
    line-height: 1.6;
}

strong {
    font-weight: bold;
}

/* Styling individual details */
p strong {
    display: inline-block;
    width: 120px;
}

/* Style the patient's details individually */
p:nth-child(odd) {
    background-color: #f9f9f9;
    padding: 8px;
    margin: 5px 0;
}

p:nth-child(even) {
    margin: 5px 0;
}

   </style>
</head>
<body>
    <div class="container">
        <div class="dash-body">
            <h1>Patient Details</h1>

            <div>
                <p><strong>Name:</strong> {{ $patient->name }}</p>
                <p><strong>NIC:</strong> {{ $patient->nic }}</p>
                <p><strong>Email:</strong> {{ $patient->email }}</p>
                <p><strong>Telephone:</strong> {{ $patient->telephone }}</p>
               
            </div>

          
        </div>
    </div>
</body>
</html>

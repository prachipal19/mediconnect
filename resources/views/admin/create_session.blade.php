<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Doctor</title>
    <style>
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
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .menu {
            /* Add styles for menu if needed */
        }

        .dash-body {
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .alert ul {
            margin-bottom: 0;
        }

        .alert li {
            list-style-type: none;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    
</head>
<body>

    <div class="container">
        <div class="menu">
            <!-- Include your menu content here -->
        </div>
        <div class="dash-body">
            <h1>Add Doctor</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('store-session') }}">
                @csrf
                @method('PUT')
              
                <label for="name">Session title:</label>
                <input type="text" name="title"  required/>

                
<select name="doctor_id" id="doctor_id" required style="width: 200px;font-size:15px">
    <option value="">Select Doctor</option>
    @foreach ($doctors as $doctor)
        <option value="{{ $doctor->id }}">
            {{ $doctor->name }}
        </option>
    @endforeach
</select>

<br>


                <label for="date">Date:</label>
                <input type="date" name="date"  required/>

                <label for="time">Time:</label>
                <input type="time" name="time"  required/>

                <label for="nop">No. of patients:</label>
                <input type="text" name="nop"  required/>
    
         


              

                <input type="submit" value="Add Session"  style="background-color: #007bff;"/>
            </form>
        </div>
    </div>

</body>
</html>

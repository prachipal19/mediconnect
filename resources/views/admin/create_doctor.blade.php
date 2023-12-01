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

            <form method="POST" action="{{ route('store-doctor') }}">
                @csrf
                @method('PUT')
              
                <label for="name">Name:</label>
                <input type="text" name="name"  required/>

                <label for="nic">NIC:</label>
                <input type="text" name="nic"  required/>

                <label for="email">Email:</label>
                <input type="email" name="email"  required/>

                <label for="telephone">Telephone:</label>
                <input type="text" name="telephone"  required/>
    
         

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#specialty_id').on('change', function() {
                var currentSpecialty = $(this).find(':selected').text();
                $('#current_specialty').val(currentSpecialty);
            });
        });
    </script>

<select name="specialty_id" id="specialty_id" required>
    <option value="">Select Specialty</option>
    @foreach ($specialties as $specialty)
        <option value="{{ $specialty->id }}">
            {{ $specialty->name }}
        </option>
    @endforeach
</select>


                <label for="password">Password:</label>
                <input type="password" name="password" required/>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" required/>

             

                <input type="submit" value="Add Doctor" />
            </form>
        </div>
    </div>

</body>
</html>

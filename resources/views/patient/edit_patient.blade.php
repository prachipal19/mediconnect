<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Doctor</title>
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
            <h1>Edit Details</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('update-patient', $patient->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ old('name', $patient->name) }}"  />
                @if ($errors->has('name'))
    <span style="color: red;">{{ $errors->first('name') }}</span>
@endif
                    <br />
                <label for="nic">NIC:</label>
                <input type="text" name="nic" value="{{ old('nic', $patient->nic) }}"  />
                @if ($errors->has('nic'))
    <span style="color: red;">{{ $errors->first('nic') }}</span>
@endif
                    <br />
                <label for="email">Email:</label>
                <input type="text" name="email" value="{{ old('email', $patient->email) }}"  />
                @if ($errors->has('email'))
    <span style="color: red;">{{ $errors->first('email') }}</span>
@endif
                    <br />
                <label for="telephone">Telephone:</label>
                <input type="text" name="telephone" value="{{ old('telephone', $patient->telephone) }}"  />
    
                @if ($errors->has('telephone'))
    <span style="color: red;">{{ $errors->first('telephone') }}</span>
@endif
                    <br />

                <label for="password">Password:</label>
                <input type="password" name="password"  />

                @if ($errors->has('password'))
    <span style="color: red;">{{ $errors->first('password') }}</span>
@endif
                    <br />

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password"  />

                @if ($errors->has('confirmpassword'))
    <span style="color: red;">{{ $errors->first('confirmpassword') }}</span>
@endif
                    <br />

                <input type="submit" style="background-color:#0A76D8;" value="Update" />
            </form>
        </div>
    </div>

</body>
</html>

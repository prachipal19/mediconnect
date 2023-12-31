<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">

    
    <title>MediConnect - Your Health, Your Way</title> 
   
</head>
<body>
@include('header')
    <div class="full-height">
        <center>
        
            <h1 style="font-size:40px" class="heading-text">Your Health, Your Way</h1>
            <p class="sub-text3">Worried about long waits and scheduling hassles? <br>Say goodbye to the hassle and take control of your health. <br> With MediConnect - Your Health, Your Way, you can book your preferred doctor online. <br> Discover the ease of our complimentary doctor appointment service. <br> Book your appointment today.</p>
            <center>
                <a href="login">
                    <input type="button" value="Make Appointment" class="login-btn btn-primary btn">
                </a>
                
            </center>
         
        </center>
    </div>
    @include('footer')
</body>
</html>

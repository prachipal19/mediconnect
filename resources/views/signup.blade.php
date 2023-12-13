<link rel="stylesheet" href="{{asset('assets/css/signup.css')}}">
@include('header')
<center>
        <div class="container full-height">
            <div class="form-body">
                <p class="header-text">Let's Get Started</p>
                <p class="sub-text">Add Your Personal Details to Continue</p>
                <form action="{{ route('store-patient') }}" method="POST">
                @csrf
                @method('PUT')
              
                    <label for="name" class="form-label">Name: </label>
                    <input type="text" name="name" value="<?= isset($fname) ? $fname : ''; ?>" class="input-text" placeholder="Name"  >
                    @if ($errors->has('name'))
    <span style="color: red;">{{ $errors->first('name') }}</span>
@endif
                    <br />
                    <label for="address" class="form-label">Address: </label>
                    <input type="text" name="address" value="<?= isset($address) ? $address : ''; ?>" class="input-text" placeholder="Address"  >
                    @if ($errors->has('address'))
    <span style="color: red;">{{ $errors->first('address') }}</span>
@endif
                    <br />
                    <label for="nic" class="form-label">NIC: </label>
                    <input type="text" name="nic" value="<?= isset($nic) ? $nic : ''; ?>" class="input-text" placeholder="NIC Number"  >
                    @if ($errors->has('nic'))
    <span style="color: red;">{{ $errors->first('nic') }}</span>
@endif
                    <br />
                    <label for="dob" class="form-label">Date of Birth: </label>
                    <input type="date" name="dob" value="<?= isset($dob) ? $dob : ''; ?>" class="input-text"  >
                    @if ($errors->has('dob'))
    <span style="color: red;">{{ $errors->first('dob') }}</span>
@endif
                    <br />

                  
            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" value="<?= isset($email) ? $email : ''; ?>" class="input-text"
                        placeholder="Email Address">


                        @if ($errors->has('email'))
    <span style="color: red;">{{ $errors->first('email') }}</span>
@endif
                    <br />


    
            <label for="telephone" class="form-label">Mobile Number:</label>
            <input type="text" name="telephone" value="<?= isset($tel) ? $tel : ''; ?>" class="input-text" placeholder="Phone Number">

            @if ($errors->has('telephone'))
    <span style="color: red;">{{ $errors->first('telephone') }}</span>
@endif
                    <br />
      
            <label for="password" class="form-label">Create New Password:</label>
            <input type="password" name="password"  class="input-text" placeholder="Password">
               
            @if ($errors->has('password'))
    <span style="color: red;">{{ $errors->first('password') }}</span>
@endif
                    <br />
 
    
            <label for="confirmpassword" class="form-label">Confirm Password:</label>
            <input type="password" name="confirmpassword" class="input-text" placeholder="Confirm Password">
           
                 
            @if ($errors->has('confirmpassword'))
    <span style="color: red;">{{ $errors->first('confirmpassword') }}</span>
@endif
                    <br />



                  
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">
                    <input type="submit" value="Signup" class="login-btn btn-primary btn"/>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login" class="hover-link1 non-style-link">Login</a>
                </form>
            </div>
        </div>
  
    </center>

 
@include('footer')
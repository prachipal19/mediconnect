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
                    <input type="text" name="fname" value="<?= isset($fname) ? $fname : ''; ?>" class="input-text" placeholder="Name"  >
                    <span style="color:red;">
                        <?= isset($nameerr) ? $nameerr : ''; ?>
                    </span>
                    <br />
                    <label for="address" class="form-label">Address: </label>
                    <input type="text" name="address" value="<?= isset($address) ? $address : ''; ?>" class="input-text" placeholder="Address"  >
                    <span style="color:red;">
                        <?= isset($addresserr) ? $addresserr : ''; ?>
                    </span>
                    <br />
                    <label for="nic" class="form-label">NIC: </label>
                    <input type="text" name="nic" value="<?= isset($nic) ? $nic : ''; ?>" class="input-text" placeholder="NIC Number"  >
                    <span style="color:red;">
                        <?= isset($nicerr) ? $nicerr : ''; ?>
                    </span>
                    <br />
                    <label for="dob" class="form-label">Date of Birth: </label>
                    <input type="date" name="dob" value="<?= isset($dob) ? $dob : ''; ?>" class="input-text"  >
                    <span style="color:red;">
                        <?= isset($doberr) ? $doberr : ''; ?>
                    </span>
                    <br />

                  
            <label for="newemail" class="form-label">Email:</label>
            <input type="email" name="newemail" value="<?= isset($email) ? $email : ''; ?>" class="input-text"
                        placeholder="Email Address">


                    <span style="color:red;">
                        <?= isset($emailerr) ? $emailerr : ''; ?>
                    </span>
                    <br />


    
            <label for="tele" class="form-label">Mobile Number:</label>
            <input type="text" name="tele" value="<?= isset($tel) ? $tel : ''; ?>" class="input-text" placeholder="Phone Number">

                    <span style="color:red;">
                        <?= isset($telerr) ? $telerr : ''; ?>
                    </span>
                    <br />
      
            <label for="newpassword" class="form-label">Create New Password:</label>
            <input type="password" name="newpassword"  class="input-text" placeholder="Password">
                    <span style="color:red;">
                        <?= isset($pwderr) ? $pwderr : ''; ?>
                    </span>
                    <br />
 
    
            <label for="cpassword" class="form-label">Confirm Password:</label>
            <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password">
           
                    <span style="color:red;">
                        <?= isset($conpwderr) ? $conpwderr : ''; ?>
                    </span>
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
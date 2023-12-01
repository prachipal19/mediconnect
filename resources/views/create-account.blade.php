<link rel="stylesheet" href="{{asset('assets/css/signup.css')}}">
@include('header')
<center>
    <div class="container full-height">
            <div class="form-body">
       
    <form action="" method="POST">
    <div class="form-container">
        <div>
            <p class="header-text">Let's Get Started</p>
            <p class="sub-text">It's Okay, Now Create User Account.</p>
        </div>

        <div>
            <label for="newemail" class="form-label">Email:</label>
            <input type="email" name="newemail" value="<?= isset($email) ? $email : ''; ?>" class="input-text"
                        placeholder="Email Address">


                    <span style="color:red;">
                        <?= isset($emailerr) ? $emailerr : ''; ?>
                    </span>
                    <br />
        </div>

        <div>
            <label for="tele" class="form-label">Mobile Number:</label>
            <input type="text" name="tele" value="<?= isset($tel) ? $tel : ''; ?>" class="input-text" placeholder="Phone Number">

                    <span style="color:red;">
                        <?= isset($telerr) ? $telerr : ''; ?>
                    </span>
                    <br />
        </div>

        <div>
            <label for="newpassword" class="form-label">Create New Password:</label>
            <input type="password" name="newpassword"  class="input-text" placeholder="Password">
                    <span style="color:red;">
                        <?= isset($pwderr) ? $pwderr : ''; ?>
                    </span>
                    <br />
 
        </div>

        <div>
            <label for="cpassword" class="form-label">Confirm Password:</label>
            <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password">
           
                    <span style="color:red;">
                        <?= isset($conpwderr) ? $conpwderr : ''; ?>
                    </span>
                    <br />
        </div>

        <div>
            <?php //echo $error ?>
        </div>

        <div class="form-buttons">
            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">
            <input type="submit" value="Sign Up" name="signup" class="login-btn btn-primary btn">
        </div>

        <div>
            <p class="sub-text" style="font-weight: 280;">Already have an account? <a href="login.php" class="hover-link1 non-style-link">Login</a></p>
        </div>
    </div>
</form>

</div>
    </div>
</center>
@include('footer')
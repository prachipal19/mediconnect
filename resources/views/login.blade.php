<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@include('header')
<center>
        <div class="container full-height">



            <div class="form-body">
                <p class="header-text">Welcome Back!</p>
                <p class="sub-text">Login with your details to continue</p>

                <form action="{{ route('login.post') }}" method="POST">
                @csrf
 

                    <label for="email" class="form-label">Email: </label>

                    <input type="email" name="email" value="<?= isset($email) ? $email : ''; ?>" class="input-text"
                        placeholder="Email Address">

                    <span style="color:red;">
                        <?= isset($emailerr) ? $emailerr : ''; ?>
                    </span>
                    <br />

                    <label for="password" class="form-label">Password: </label>

                    <input type="password" name="password" class="input-text" placeholder="Password">
                    <span style="color:red;">
                        <?= isset($pwderr) ? $pwderr : ''; ?>
                    </span>
                    <br />
 
                    <input type="submit" value="Login" name="login" class="login-btn btn-primary btn"><br>
                    <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label><br>
                    <a href="/signup" class="hover-link1 non-style-link">Sign Up</a>
            </div>


            </form>


        </div>
      
    </center>
@include('footer')
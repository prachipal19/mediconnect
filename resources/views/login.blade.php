<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@include('header')
<center>
        <div class="container full-height">



            <div class="form-body">
                <p class="header-text">Welcome Back!</p>
                <p class="sub-text">Login with your details to continue</p>
                @if(session('error'))
                    <span style="color: red;">{{ session('error') }}</span>
                @endif
                <form action="{{ route('login.post') }}" method="POST">
                @csrf
 

                    <label for="email" class="form-label">Email: </label>

                    <input type="email" name="email" value="<?= isset($email) ? $email : ''; ?>" class="input-text"
                        placeholder="Email Address">

                        @if ($errors->has('email'))
        <span style="color:red;">{{ $errors->first('email') }}</span>
    @endif
                    <br />

                    <label for="password" class="form-label">Password: </label>

                    <input type="password" name="password" class="input-text" placeholder="Password">
                    @if ($errors->has('password'))
        <span style="color:red;">{{ $errors->first('password') }}</span>
    @endif
                    <br />
 
                    <input type="submit" value="Login" name="login" class="login-btn btn-primary btn"><br>
                    <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label><br>
                    <a href="/signup" class="hover-link1 non-style-link">Sign Up</a>
            </div>


            </form>


        </div>
      
    </center>
@include('footer')
@extends('layouts.main')

@section('container')
<body class="bg-gradient-primary">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <div class="card w-75">
        <div class="card-header"><b>Tambah Member Kopti Salatiga</b></div>
        <div class="card-body">
            <div class="container">

                {{-- <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0"> --}}
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="p-5">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group form-outline w-50">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-outline w-50">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-outline w-50">
                                        <label for="avatar" class="text-md-right">Please upload avatar</label>
                                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                                        
                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group form-outline w-50">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                        
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    
                                    <div class="form-group form-outline w-50">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulang Password"/>
                                        {{-- <i class="bi bi-eye-slash" id="togglePassword"></i> --}}
                                    </div>
                                    <div class="btn btn-success btn-sm"><i class="bi bi-eye-slash" id="togglePassword"> Toggle Password </i></div>
                                    <br>

                                    
                                    {{-- <div class="form-group form-outline w-50">
                                        <input id="password-confirm" type="password" class="form-control bi bi-eye-slash" name="password_confirmation" required autocomplete="new-password" placeholder="Ulang Password"/>
                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                    </div> --}}
                                    <br>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Tambah') }}
                                    </button>
                                    
                                    
                                    {{-- <a href="#" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Register with Google
                                    </a>
                                    <a href="#" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                    </a> --}}
                                </form>
                                    <!--<div class="text-center">-->
                                    <!--    <a class="small" href="forgot-password.html">Forgot Password?</a>-->
                                    <!--</div>-->
                                {{-- <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    
        {{-- </div>
    </div> --}}

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    const passwordConfirm = document.querySelector("#password-confirm");

    togglePassword.addEventListener("click", function (e) {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    togglePassword.addEventListener("click", function (e) {
        // toggle the type attribute
        const type = passwordConfirm.getAttribute("type") === "password" ? "text" : "password";
        passwordConfirm.setAttribute("type", type);
        
        // toggle the icon
        // this.classList.toggle("bi-eye");
    });

    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
    });
</script>
</body>

@stop
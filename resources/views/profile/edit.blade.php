@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Profil</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile/' .$agen->id) }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method("PATCH")
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" id="name" name="name" aria-label="name" class="form-control" value="{{$agen->name}}">
                
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="text" id="email" name="email" aria-label="email" class="form-control" value="{{$agen->email}}">
                        </div>
                        <div class="input-group mb-3">
                        {{-- <label for="avatar" class="text-md-right">Please upload avatar</label> --}}
                        {{-- <br> --}}
                        <span class="input-group-text">Upload Avatar</span>
                        <input id="avatar" type="file" class="form-control" name="avatar">
                            
                                {{-- @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Old Password</span>
                            <input type="password" id="password" name="password" aria-label="password" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">New Password</span>
                            <input type="password" id="new_password" name="new_password" aria-label="password" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="btn btn-success btn-sm"><i class="bi bi-eye-slash" id="togglePassword"> Toggle Password </i></div>
                        </div>
                        
                        <button type="sumbit" class="btn btn-success" value="Update">Edit
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        const passwordConfirm = document.querySelector("#new_password");
    
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
@endsection
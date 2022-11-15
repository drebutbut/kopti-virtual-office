@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Profil</h2>
                    </div>
                    
                    @if (session('flash_message'))
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    @endif
                    @if (session('flash_message_error'))
                        <div class="alert alert-danger">
                            {{ session('flash_message_error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <img class="img-thumbnail rounded-circle" src="{{asset(Auth::user()->avatar)}}">
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" aria-label="First name" class="form-control" value="{{$agen->name}}" disabled>
                
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="text" aria-label="First name" class="form-control" value="{{$agen->email}}" disabled>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text">Password</span>
                            <input type="password" aria-label="First name" class="form-control" value="password123" disabled>
                        </div>
                        <a href="{{ url('/profile/' . $agen->id . '/edit') }}" class="btn btn-success">Edit
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
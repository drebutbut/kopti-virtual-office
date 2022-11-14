@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">Edit Agen</div>
        <div class="card-body">
            <form action="{{ url('agen/' .$agen->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$agen->id}}" id="id" />
                <label>Name</label><br>
                <input type="text" name="name" id="name" value="{{$agen->name}}" class="form-control">
                <label>Email</label><br>
                <input type="email" name="email" id="email" value="{{$agen->email}}" class="form-control">
                <label>Password</label><br>
                <input type="password" name="password" id="password" value="{{$agen->password}}" class="form-control">
                <input type="submit" value="Update" class="btn btn-success"><br>
            </form>
        </div>
    </div>
</div>
@stop
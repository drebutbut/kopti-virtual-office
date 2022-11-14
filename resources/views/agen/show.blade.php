@extends('layouts.main')

@section('container')
<div class="card">
    <div class="card-header">Lihat Agen</div>
  
        <div class="card-body">
            <div class="row">
                <div class="col-md-4"><b>Name</b></div>
                <div class="col-md-8">{{ $agen->name }}</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Email</b></div>
                <div class="col-md-8">{{ $agen->email }}</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Tanggal Buat</b></div>
                <div class="col-md-8">{{ $agen->created_at }}</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Tanggal Update</b></div>
                <div class="col-md-8">{{ $agen->updated_at }}</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Role</b></div>
                @if($agen->role =='1') 
                    <div class="col-md-8">Admin</div>
                @else
                    <div class="col-md-8">Member</div>
                
                @endif
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Back</a>
                </div>
                <div class="col-md-8"></div>
            </div>
        </div>
    </div>
</div>
@stop
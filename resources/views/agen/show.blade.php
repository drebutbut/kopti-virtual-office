@extends('layouts.main')

@section('container')
<div class="card">
    <div class="card-header">Lihat Agen</div>
  
        <div class="card-body">
            <h5 class="card-title">Name : {{ $agen->name }}</h5>
            <p class="card-text">Email : {{ $agen->email }}</p>
            <p class="card-text">Password : {{ $agen->password }}</p>
            <p class="card-text">Tanggal Dibuat :{{ $agen->created_at }}</p>
            <p class="card-text">Tanggal diUpdate :{{ $agen->updated_at }}</p>
            <p class="card-text">Role :{{ $agen->role }}</p>
        </div>
    </div>
</div>
@stop
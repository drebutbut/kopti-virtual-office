@extends('layouts.main')

@section('container')
    <h2>{{ $stock->id }}</h2>

    <table class="table table-striped">
        <tr>
            <th>ID Produk</th>
            <td>{{ $stock->user->id }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td>{{ $stock->nama }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $stock->harga }}</td>
        </tr>
        <tr>
            <th>Harga Member</th>
            <td>{{ $stock->harga_member }}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{ $stock->jumlah_barang }}</td>
        </tr>
    </table>
@endsection
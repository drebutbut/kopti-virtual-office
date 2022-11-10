@extends('layouts.main')

@section('container')
    <h2>{{ $product->nama }}</h2>

    <table class="table table-striped">
        <tr>
            <th>ID Produk</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td>{{ $product->nama }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $product->harga }}</td>
        </tr>
        <tr>
            <th>Harga Member</th>
            <td>{{ $product->harga_member }}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{ $product->stok }}</td>
        </tr>
    </table>
@endsection
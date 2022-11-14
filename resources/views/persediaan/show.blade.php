@extends('layouts.main')

@section('container')
    <h2>{{ $stock->produk->nama }}</h2>

    <table class="table table-striped">
        <tr>
            <th>ID Produk</th>
            <td>{{ $stock->produk->id }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $stock->produk->harga }}</td>
        </tr>
        <tr>
            <th>Harga Member</th>
            <td>{{ $stock->produk->harga_member }}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{ $stock->jumlah_barang }}</td>
        </tr>
    </table>
@endsection
@extends('layouts/main')

@section('container')
    <h2>Ketersediaan Barang</h2>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga Normal</th>
            <th scope="col">Harga Member</th>
            <th scope="col">Stock</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->harga }}</td>
                <td>{{ $product->harga_member }}</td>
                <td>{{ $product->stok }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
@endsection
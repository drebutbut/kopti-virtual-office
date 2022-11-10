@extends('layouts/main')

@section('container')
    <h2>Ketersediaan Barang</h2>

    <hr>

    <div class="card-body">
        <a href="/persediaan/create" class="btn btn-primary">Tambah Produk</a>
        <br>
        <br>
        @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Normal</th>
                <th scope="col">Harga Member</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->harga_member }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>
                      <a href="/persediaan/{{ $product->id }}" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                      <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                      <form action="/persediaan/{{ $product->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus produk?')"><i class="bi bi-trash"></i></button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

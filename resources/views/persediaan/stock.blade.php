@extends('layouts/main')

@section('container')
    <h2>Ketersediaan Barang</h2>

    <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Normal</th>
                <th scope="col">Harga Member</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $stock->produk->nama }}</td>
                    <td>{{ $stock->produk->harga }}</td>
                    <td>{{ $stock->produk->harga_member }}</td>
                    <td>{{ $stock->jumlah_barang }}</td>
                    <td>
                      <a href="/persediaan/{{ $stock->id }}" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                      <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                      <form action="/persediaan/{{ $stock->id }}" method="post" class="d-inline">
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

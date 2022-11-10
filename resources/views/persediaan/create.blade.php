@extends('layouts.main')

@section('container')
<h2>Tambah Produk</h2>

<div class="col-lg-5">
    <form method="post" action="/persediaan">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <br>
            <input type="text" name="nama" id="nama">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <br>
            <input type="number" name="harga" id="harga">
            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_member" class="form-label">Harga Member</label>
            <br>
            <input type="number" name="harga_member" id="harga_member">
            @error('harga_member')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stock</label>
            <br>
            <input type="number" name="stok" id="stok">
            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
</div>
@endsection
@extends('layouts.main')

@section('container')
    <h2>Tambah Produk</h2>

    <div class="col-lg-12">
        <form method="post" action="/produk">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <br>
                <input type="text" class="form-control w-25 @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <br>
                <input type="number" class="form-control w-25 @error('harga') is-invalid @enderror"
                    id="harga" name="harga" required value="{{ old('harga') }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_member" class="form-label">Harga Member</label>
                <br>
                <input type="number" class="form-control w-25 @error('harga_member') is-invalid @enderror"
                    id="harga_member" name="harga_member" required value="{{ old('harga_member') }}">
                @error('harga_member')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
@endsection
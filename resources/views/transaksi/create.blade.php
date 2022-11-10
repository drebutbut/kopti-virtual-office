@extends('layouts.main')


@section('container')
    <h2>Tambah Transaksi</h2>

    <div class="col-lg-5">
        <form method="post" action="/transaksi">
            @csrf
            <div class="mb-3">
                <label for="jenis_transaksi" class="form-label">Jenis Transaksi</label>
                <br>
                <select class="form-select form-select-sm @error('jenis_transaksi') is-invalid @enderror" name="jenis_transaksi" required>
                    <option selected disabled>Pilih Jenis Transaksi</option>
                    <option value="Pembelian">Pembelian</option>
                    <option value="Penjualan">Penjualan</option>
                </select>
                @error('jenis_transaksi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="produk" class="form-label">Nama Produk</label>
                <br>
                <select class="form-select form-select-sm @error('produk') is-invalid @enderror" name="produk_id" required>
                    <option selected disabled>Pilih Produk</option>
                    @foreach ($products as $product)
                        @if (old('produk_id') === $product->id)
                            <option value="{{ $product->id }}" selected>{{ $product->nama }}</option>
                        @else
                            <option value="{{ $product->id }}">{{ $product->nama }}</option>
                        @endif
                    @endforeach
                </select>
                @error('produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="hargaProduk" class="form-label">Harga Produk</label>
                <input type="text" class="form-control" id="hargaProduk" name="hargaProduk">
            </div> --}}
            <div class="mb-3">
                <label for="jumlah_transaksi" class="form-label">Jumlah Transaksi</label>
                <br>
                <input type="number" class="form-control w-25 @error('jumlah_transaksi') is-invalid @enderror"
                    id="jumlah_transaksi" name="jumlah_transaksi" required value="{{ old('jumlah_transaksi') }}">
                @error('jumlah_transaksi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
        </form>
    </div>
@endsection

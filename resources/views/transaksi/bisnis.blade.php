@extends('layouts.main')

@section('container')
    <h2>Perkembangan Bisnis</h2>

    <div class="card">
        <div class="card-header">
            Summary
        </div>
        <div class="summary d-flex justify-content-evenly">
            <div class="card-body">
                <h5 class="card-title">Saldo dalam bulan {{ $bulan }}</h5>
                <p class="card-text">Hasil pendapatan bersih dari pemasukan dan pengeluaran pada bulan {{ $bulan }}
                    adalah
                </p>
                <h2>
                    @if ($saldo < 0)
                        <strong>-Rp{{ $saldo * -1 }}</strong>
                    @else
                        <strong>Rp{{ $saldo }}</strong>
                    @endif
                </h2>
            </div>
            <div class="card text col-5">
                <div class="card-body">
                    <h5 class="card-title">Tambah Transaksi</h5>
                    <p class="card-text">Catat transaksi yang terjadi hari ini.</p>
                    <a href="/transaksi/create" class="btn btn-primary">Tambah Transaksi</a>
                </div>
            </div>
        </div>

    </div>

    <hr>

    <div class="card text-center">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session()->has('fail'))
            <div class="alert alert-danger" role="alert">
                {{ session('fail') }}
            </div>
        @endif
        <nav class="nav nav-pills nav-fill">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-transaksi-tab" data-bs-toggle="tab" data-bs-target="#nav-transaksi"
                type="button" role="tab" aria-controls="nav-transaksi" aria-selected="true">
                Transaksi
            </button>
            
            <button class="nav-link" id="nav-pemasukan-tab" data-bs-toggle="tab" data-bs-target="#nav-pemasukan"
            type="button" role="tab" aria-controls="nav-pemasukan" aria-selected="true">
                    Pemasukan
                </button>

                <button class="nav-link" id="nav-pengeluaran-tab" data-bs-toggle="tab" data-bs-target="#nav-pengeluaran"
                    type="button" role="tab" aria-controls="nav-pengeluaran" aria-selected="true">
                    Pengeluaran
                </button>
            </div>
        </nav>
        <div class="tab-content" id="new-tabContent">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active p-3" id="nav-transaksi" role="tabpanel"
                    aria-labelledby="nav-transaksi-tab">
                    <h4>Transaksi Penjualan</h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Jenis Transaksi</th>
                                <th scope="col">Jumlah Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->produk->nama }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->jenis_transaksi }}</td>
                                    <td>{{ $transaction->jumlah_transaksi }}</td>
                                    <td>{{ $transaction->total_harga }}</td>
                                    <td>
                                        <a href="/transaksi/{{ $transaction->id }}" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/transaksi/{{ $transaction->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade p-3" id="nav-pemasukan" role="tabpanel" aria-labelledby="nav-pemasukan-tab">
                    <h4>Pemasukan</h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Jumlah Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incomes as $income)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $income->id }}</td>
                                    <td>{{ $income->created_at }}</td>
                                    <td>{{ $income->produk->nama }}</td>
                                    <td>{{ $income->user->name }}</td>
                                    <td>{{ $income->jumlah_transaksi }}</td>
                                    <td>{{ $income->total_harga }}</td>
                                    <td>
                                        <a href="/transaksi/{{ $income->id }}" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/transaksi/{{ $income->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade p-3" id="nav-pengeluaran" role="tabpanel" aria-labelledby="nav-pengeluaran-tab">
                    <h4>Pengeluaran</h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Jumlah Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $expense->id }}</td>
                                    <td>{{ $expense->created_at }}</td>
                                    <td>{{ $expense->produk->nama }}</td>
                                    <td>{{ $expense->user->name }}</td>
                                    <td>{{ $expense->jumlah_transaksi }}</td>
                                    <td>{{ $expense->total_harga }}</td>
                                    <td>
                                        <a href="/transaksi/{{ $expense->id }}" role="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                        <a href="#" role="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/transaksi/{{ $expense->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

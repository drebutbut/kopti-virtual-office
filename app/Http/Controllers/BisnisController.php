<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Transaksi;

class BisnisController extends Controller
{
    public function index() {
        $date = Carbon::now();
        $bulan = $date->format('F');

        // $masuk = \DB::select('SELECT SUM(total_harga) FROM transaksis WHERE jenis_transaksi = "Pembelian"');
        // $keluar = \DB::select('SELECT SUM(total_harga) FROM transaksis WHERE jenis_transaksi = "Penjualan"');
        $masuk = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->sum('total_harga');
        $keluar = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->sum('total_harga');
        
        $saldo = $masuk - $keluar;

        return view('bisnis', [
            'transactions' => Transaksi::all(),
            'incomes' => Transaksi::all()->where('jenis_transaksi', 'Penjualan'),
            'expenses' => Transaksi::all()->where('jenis_transaksi', 'Pembelian'),
            'bulan' => $bulan,
            'saldo' => $saldo
        ]);
    }

    public function stock() {
        return view('stock', [
            'products' => Produk::all()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userData = auth()->user()->id;

        $date = Carbon::now();
        $bulan = $date->format('F');
        $tahun = $date->format('Y');

        $masuk = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->month)->get()->sum('total_harga');
        $keluar = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->month)->get()->sum('total_harga');
        
        $masukTahunan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->year)->get()->sum('total_harga');
        $keluarTahunan = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->year)->get()->sum('total_harga');

        $saldo = $masuk - $keluar;
        $saldoTahunan = $masukTahunan - $keluarTahunan;

        return view('welcome', [
            'user' => User::find($userData),
            'bulan' => $bulan,
            'tahun' => $tahun,
            'masuk' => $masuk,
            'masukTahunan' => $masukTahunan,
            'saldo' => $saldo,
            'saldoTahunan' => $saldoTahunan
        ]);
    }
}

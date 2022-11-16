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

        $satuBulanPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(0))->get();
        $duaBulanPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(1))->get();
        $tigaBulanPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(2))->get();
        $empatBulanPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(3))->get();
        $limaBulanPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(4))->get();
        $enamBulanPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(5))->get();
        
        $satuBulanPengeluaran = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(0))->get();
        $duaBulanPengeluaran = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(1))->get();
        $tigaBulanPengeluaran = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(2))->get();
        $empatBulanPengeluaran = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(3))->get();
        $limaBulanPengeluaran = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(4))->get();
        $enamBulanPengeluaran = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->subMonths(5))->get();

        $saldoSatuBulan = $satuBulanPemasukan->sum('total_harga') - $satuBulanPengeluaran->sum('total_harga');
        $saldoDuaBulan = $duaBulanPemasukan->sum('total_harga') - $duaBulanPengeluaran->sum('total_harga');
        $saldoTigaBulan = $tigaBulanPemasukan->sum('total_harga') - $tigaBulanPengeluaran->sum('total_harga');
        $saldoEmpatBulan = $empatBulanPemasukan->sum('total_harga') - $empatBulanPengeluaran->sum('total_harga');
        $saldoLimaBulan = $limaBulanPemasukan->sum('total_harga') - $limaBulanPengeluaran->sum('total_harga');
        $saldoEnamBulan = $enamBulanPemasukan->sum('total_harga') - $enamBulanPengeluaran->sum('total_harga');
        
        $satuTahunPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->subYears(0))->get();
        $duaTahunPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->subYears(1))->get();
        $tigaTahunPemasukan = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->subYears(2))->get();
        
        $satuTahunPenjualan = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->subYears(0))->get();
        $duaTahunPenjualan = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->subYears(1))->get();
        $tigaTahunPenjualan = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereYear('created_at', Carbon::now()->subYears(2))->get();

        $saldoSatuTahun = $satuTahunPemasukan->sum('total_harga') - $satuTahunPenjualan->sum('total_harga');
        $saldoDuaTahun = $duaTahunPemasukan->sum('total_harga') - $duaTahunPenjualan->sum('total_harga');
        $saldoTigaTahun = $tigaTahunPemasukan->sum('total_harga') - $tigaTahunPenjualan->sum('total_harga');

        $dataPembelian = [
            count($satuBulanPengeluaran), 
            count($duaBulanPengeluaran), 
            count($tigaBulanPengeluaran), 
            count($empatBulanPengeluaran), 
            count($limaBulanPengeluaran), 
            count($enamBulanPengeluaran)
        ];
        
        $dataPenjualan = [
            count($satuBulanPemasukan), 
            count($duaBulanPemasukan), 
            count($tigaBulanPemasukan), 
            count($empatBulanPemasukan), 
            count($limaBulanPemasukan), 
            count($enamBulanPemasukan)
        ];

        $saldoBulan = [$saldoSatuBulan, $saldoDuaBulan, $saldoTigaBulan, $saldoEmpatBulan, $saldoLimaBulan, $saldoEnamBulan];
        $masukBulan = [
            $satuBulanPemasukan->sum('total_harga'),
            $duaBulanPemasukan->sum('total_harga'),
            $tigaBulanPemasukan->sum('total_harga'),
            $empatBulanPemasukan->sum('total_harga'),
            $limaBulanPemasukan->sum('total_harga'),
            $enamBulanPemasukan->sum('total_harga')
        ];
        $keluarBulan = [
            $satuBulanPengeluaran->sum('total_harga') * -1,
            $duaBulanPengeluaran->sum('total_harga') * -1,
            $tigaBulanPengeluaran->sum('total_harga') * -1,
            $empatBulanPengeluaran->sum('total_harga') * -1,
            $limaBulanPengeluaran->sum('total_harga') * -1,
            $enamBulanPengeluaran->sum('total_harga') * -1
        ];

        $saldoTahun = [$saldoSatuTahun, $saldoDuaTahun, $saldoTigaTahun];
        $masukTahun = [
            $satuTahunPemasukan->sum('total_harga'),
            $duaTahunPemasukan->sum('total_harga'),
            $tigaTahunPemasukan->sum('total_harga'),
        ];
        $keluarTahun = [
            $satuTahunPenjualan->sum('total_harga') * -1,
            $duaTahunPenjualan->sum('total_harga') * -1,
            $tigaTahunPenjualan->sum('total_harga') * -1,
        ];

        $bulanPenjualan = [
            Carbon::now()->subMonths(0)->format('F'), 
            Carbon::now()->subMonths(1)->format('F'), 
            Carbon::now()->subMonths(2)->format('F'), 
            Carbon::now()->subMonths(3)->format('F'), 
            Carbon::now()->subMonths(4)->format('F'), 
            Carbon::now()->subMonths(5)->format('F')
        ];

        $tahunPenjualan = [
            Carbon::now()->subYears(0)->format('Y'),
            Carbon::now()->subYears(1)->format('Y'),
            Carbon::now()->subYears(2)->format('Y'),
        ];

        return view('welcome', [
            'user' => User::find($userData),
            'bulan' => $bulan,
            'tahun' => $tahun,
            'masuk' => $masuk,
            'masukTahunan' => $masukTahunan,
            'saldo' => $saldo,
            'saldoTahunan' => $saldoTahunan,
            'dataPenjualan' => $dataPenjualan,
            'bulanPenjualanSatu' => $bulanPenjualan[0],
            'bulanPenjualanDua' => $bulanPenjualan[1],
            'bulanPenjualanTiga' => $bulanPenjualan[2],
            'bulanPenjualanEmpat' => $bulanPenjualan[3],
            'bulanPenjualanLima' => $bulanPenjualan[4],
            'bulanPenjualanEnam' => $bulanPenjualan[5],
            'tahunPenjualanSatu' => $tahunPenjualan[0],
            'tahunPenjualanDua' => $tahunPenjualan[1],
            'tahunPenjualanTiga' => $tahunPenjualan[2],
            'penjualan' => json_encode($dataPenjualan, JSON_NUMERIC_CHECK),
            'pembelian' => json_encode($dataPembelian, JSON_NUMERIC_CHECK),
            'saldoBulan' => json_encode($saldoBulan, JSON_NUMERIC_CHECK),
            'masukBulan' => json_encode($masukBulan, JSON_NUMERIC_CHECK),
            'keluarBulan' => json_encode($keluarBulan, JSON_NUMERIC_CHECK),
            'saldoTahun' => json_encode($saldoTahun, JSON_NUMERIC_CHECK),
            'masukTahun' => json_encode($masukTahun, JSON_NUMERIC_CHECK),
            'keluarTahun' => json_encode($keluarTahun, JSON_NUMERIC_CHECK)
        ]);
    }
}

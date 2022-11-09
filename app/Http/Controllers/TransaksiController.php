<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now();
        $bulan = $date->format('F');

        // $masuk = \DB::select('SELECT SUM(total_harga) FROM transaksis WHERE jenis_transaksi = "Pembelian"');
        // $keluar = \DB::select('SELECT SUM(total_harga) FROM transaksis WHERE jenis_transaksi = "Penjualan"');
        $masuk = \DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->sum('total_harga');
        $keluar = \DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->sum('total_harga');
        
        $saldo = $masuk - $keluar;

        // Selanjutnya tambahkan user_id
            // Transaksi::where('user_id', auth()->user()->id)->get();

        return view('transaksi.bisnis', [
            'transactions' => Transaksi::all(),
            'incomes' => Transaksi::all()->where('jenis_transaksi', 'Penjualan'),
            'expenses' => Transaksi::all()->where('jenis_transaksi', 'Pembelian'),
            'bulan' => $bulan,
            'saldo' => $saldo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahtransaksi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id);

        return redirect('/bisnis')->with('success', 'Data telah berhasil dihapus!');
    }
}

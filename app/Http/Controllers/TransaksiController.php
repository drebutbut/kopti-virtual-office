<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Stock;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $masuk = DB::table('transaksis')->where('jenis_transaksi', 'Penjualan')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->month)->get()->sum('total_harga');
        $keluar = DB::table('transaksis')->where('jenis_transaksi', 'Pembelian')->where('user_id', auth()->user()->id)->whereMonth('created_at', Carbon::now()->month)->get()->sum('total_harga');
        
        $saldo = $masuk - $keluar;

        // Selanjutnya tambahkan user_id
            // Transaksi::where('user_id', auth()->user()->id)->get();

        return view('transaksi.bisnis', [
            'transactions' => Transaksi::where('user_id', auth()->user()->id)->get(),
            'incomes' => Transaksi::where('user_id', auth()->user()->id)->get()->where('jenis_transaksi', 'Penjualan'),
            'expenses' => Transaksi::where('user_id', auth()->user()->id)->get()->where('jenis_transaksi', 'Pembelian'),
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
        return view('transaksi.create', [
            'products' => Produk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_transaksi' => 'required',
            'produk_id' => 'required',
            'jumlah_transaksi' => 'required'
        ]);
        
        $validatedData['user_id'] = auth()->user()->id;
     
        $produk = Produk::where('id', $validatedData['produk_id'])->get('harga');
        $validatedData['total_harga'] = $validatedData['jumlah_transaksi'] * $produk[0]->harga;
        
        $stock = Stock::where('user_id', $validatedData['user_id'])->where('produk_id', $validatedData['produk_id'])->get();
        $stock = $stock[0]->jumlah_barang;

        if($stock < $validatedData['jumlah_transaksi'] && $validatedData['jenis_transaksi'] == 'Penjualan') {
            return redirect('/transaksi')->with('fail', 'Stock tidak mencukupi. Silahkan tambah stock produk anda.');
        }

        Transaksi::create($validatedData);
        

        if($validatedData['jenis_transaksi'] == 'Penjualan'){
            $stock = $stock - $validatedData['jumlah_transaksi'];
        } else {
            $stock = $stock + $validatedData['jumlah_transaksi'];
        }

        Stock::where('user_id', $validatedData['user_id'])->where('produk_id', $validatedData['produk_id'])->update(['jumlah_barang' => $stock]);
        $stock = Stock::where('user_id', $validatedData['user_id'])->where('produk_id', $validatedData['produk_id'])->get();

        return redirect('/transaksi')->with('success', 'Transaksi telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        // return $transaksi;

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

        return redirect('/transaksi')->with('success', 'Data telah berhasil dihapus!');
    }
}

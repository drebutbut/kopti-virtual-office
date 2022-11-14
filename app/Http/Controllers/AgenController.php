<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agen;
use App\Models\Stock;
use App\Models\Produk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Jakarta');

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('user.index', [
        //     'users' => DB::table('users')->paginate(15)
        // ]);
//         $cari = $request->query('cari');

//         if(!empty($cari)){
//             $datauser = Mahasiswa::where('nama','like',"%".$cari."%")
//                 ->sortable()
//                 ->paginate(5);
// //            dd($datauser);
//         }else{
//             $datauser = Mahasiswa::sortable()->paginate(5);
//         }
//         return view('mahasiswa.index')->with([
//             'siswa' => $datauser,
//             'cari' => $cari,
//         ]);

        $dataagen = Agen::paginate(5);
        return view ('agen.index')->with([
            'agen' => $dataagen,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // $waktu = date('H:i');
        // $request->created_at = $waktu;
        // $request->updated_at = $waktu;

        Agen::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->newPassword),
        ]);

        // $products = Produk::all();
        // $idBaru = Agen::latest('id')->first();
        
        // foreach($products as $product) {
        //     $stock = [
        //         'produk_id' => $product->id,
        //         'user_id' => $idBaru->id,
        //         'jumlah_barang' => 0
        //     ];


        //     Stock::create($stock);
        // }

        // Agen::create($input);
        return redirect('agen')->with('flash_message', 'Users Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agen = Agen::find($id);
        return view('agen.show')->with('agen', $agen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agen = Agen::find($id);
        return view('agen.edit')->with('agen', $agen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agen = Agen::find($id);
        $input = $request->all();
        $agen->update($input);
        return redirect('agen')->with('flash_message', 'Users Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agen::destroy($id);
        return redirect('agen')->with('flash_message', 'Users deleted!');
    }
}

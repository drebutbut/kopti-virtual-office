<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agen;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agen = Agen::find(auth()->user()->id);
        return view('profile.index')->with('agen', $agen);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('profile.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agen = Agen::find(auth()->user()->id);
        return view('profile.edit')->with('agen', $agen);
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
        $agen = Agen::find(auth()->user()->id);
        // $valipass = $request->query('password');
        $valipass = $request->password;
        // console.log($valipass);
        // console.log
        // if(Hash::check($valipass, $agen->password) == true) {
    
        if (Hash::check($valipass, $agen->password) == "true") {
            if ($valipass == $request->new_password) {
                return redirect('profile')->with('flash_message_error', 'Profil gagal diperbarui karena password lama dan baru sama!');
            } else {
                if(request()->has('avatar')){
                    $avataruploaded = request()->file('avatar');
                    $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
                    $avatarpath = public_path('/images/');
                    $avataruploaded->move($avatarpath, $avatarname);
                    $agen->name = $request->name;
                    $agen->email = $request->email;
                    $agen->password = Hash::make($request->new_password);
                    $agen->avatar = '/images/' . $avatarname;
                    $agen->save();
                    return redirect('profile')->with('flash_message', 'Profil berhasil diperbarui!');
                    
                } else {
                    $agen->name = $request->name;
                    $agen->email = $request->email;
                    $agen->password = Hash::make($request->new_password);
                    $agen->avatar = $request->avatar;
                    $agen->save();
                    return redirect('profile')->with('flash_message', 'Profil berhasil diperbarui!');
                }
            }
        } else {
        
            return redirect('profile')->with('flash_message_error', 'Profil gagal diperbarui karena password lama salah!');
        
        }
        
        return redirect('profile')->with('flash_message_error', 'Gagal memperbarui, kontak admin untuk masalah ini.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return view('profile.destroy');
    }
}

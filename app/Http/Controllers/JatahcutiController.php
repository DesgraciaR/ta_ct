<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JatahcutiModel;

use App\User;

class JatahcutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jatah = JatahcutiModel::all() ;
        return view('jatahcuti', compact('jatah'));

    }


    public function user()
    {
       
        // $user = User::all();
        // return view('jatahcuti')->with('user',$nip_baru);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $jatahcuti = new JatahcutiModel;
        $jatahcuti->nip_baru = $request->nip_baru ;
        $jatahcuti->tahun = $request->tahun ;
        $jatahcuti->jumlah_tahun_lalu = $request->jumlah_tahun_lalu;
        $jatahcuti->jumlah_tahun_ini = $request->jumlah_tahun_ini;
        
        $jatahcuti->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatejatah(Request $request, $id)
    {
        $editjatah=JatahcutiModel::find($id);
        $editjatah->nip_baru =$request->nip_baru;
        $editjatah->tahun =$request->tahun;
        $editjatah->jumlah_tahun_ini =$request->jumlah_tahun_ini;
        $editjatah->jumlah_tahun_lalu =$request->jumlah_tahun_lalu;
        $editjatah->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $hapus = JatahcutiModel::find($id);
        $hapus->delete();
        return back();

    }
}

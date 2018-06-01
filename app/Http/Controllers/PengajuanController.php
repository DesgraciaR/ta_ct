<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PermohonanCuti;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan=PermohonanCuti::where('nip_baru',session()->get("data")->nip_baru)->get();
        return view('pengajuan',compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatusbaca($id, $status_baca)
    {
         
        $pengajuan = PermohonanCuti::find($id);
        $pengajuan->status_baca=$status_baca;
        $pengajuan->save();
         return back();
         // return Redirect::to('permohonancuti');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PermohonanCuti::find($id)->delete();
        return redirect ('pengajuan')->with('sukses_hapus','yes');   
    }
}

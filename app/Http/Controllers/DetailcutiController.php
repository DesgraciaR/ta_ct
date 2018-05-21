<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DetailcutiModel;

class DetailcutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         // return view('detailcuti');

        $permohonancuti=PermohonanCuti::where('id_atasan',session()->get("data")->nip_baru)->get()->where('status','Diterima');
        return view('permohonancuti',compact('permohonancuti'));


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
    public function show($nip_baru)
    {
        $user = Userdata ::find($nip_baru);
        var_dump($user);
        die();
        return View('detailcuti');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip_baru)
    {
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDetail(Request $request, $nip_baru)
    {
        $permohonancuti= tbl_permohonan_cuti::find($nip_baru);
        $permohonancuti->tgl_mulai = Carbon::createFromFormat('d/m/Y', $request->tgl_mulai)->toDateString();
        $permohonancuti->tgl_selesai = Carbon::createFromFormat('d/m/Y', $request->tgl_selesai)->toDateString();

        $permohonancuti->save();

        // Alert::success('Data berhasil di kirim');
        return Redirect('detailcuti');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

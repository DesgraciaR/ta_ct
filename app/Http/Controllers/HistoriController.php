<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PermohonanCuti;



class HistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function histori()
    {
         $historicuti=PermohonanCuti::where('nip_baru',session()->get("data")->nip_baru)->get()->where('status_baca','0');
        return view('historicuti',compact('historicuti'));

    }



    public function cetak()
    {
          return view('print');
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
    // public function updateStatusBaca($id, $status_baca)
    // {
    //     //
    //     $historicuti = PermohonanCuti::find($id);
    //     $historicuti->status_baca=$status_baca;
    //     $historicuti->save();
    //      return back();
    //      // return Redirect::to('permohonancuti');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
         

    
}

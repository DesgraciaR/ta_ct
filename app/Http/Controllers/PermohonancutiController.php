<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PermohonanCuti;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Carbon\Carbon;

class PermohonancutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo session()->get('user')->ppk;
        if(session()->get('user')->ppk == '1'){
             $permohonancuti=PermohonanCuti::where('status','Diterima')->orWhere('status','Ditangguhkan')->get()->where('status_ppk',NULL);
             return view('permohonancuti',compact('permohonancuti'));


        }else{
            $permohonancuti=PermohonanCuti::where('id_atasan',session()->get("data")->nip_baru)->get()->where('status',NULL);
         return view('permohonancuti',compact('permohonancuti'));
        }
       
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
        $detailpermohonan = PermohonanCuti::find($id);
        return view('detailcuti',compact('detailpermohonan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updateDetail(Request $request, $id)
    {
         $editpermohonan = PermohonanCuti::find($id);
         $editpermohonan->tgl_mulai_ubah = Carbon::createFromFormat('d/m/Y', $request->tgl_mulai)->toDateString();
         $editpermohonan->tgl_selesai_ubah = Carbon::createFromFormat('d/m/Y', $request->tgl_selesai)->toDateString();
         $editpermohonan->save();
         return back();

        

    }

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
    public function updateStatus($id, $status)
    {
         if(session()->get('user')->ppk == '1'){
            if($status=='Ditolak'){
         $detailpermohonan = PermohonanCuti::find($id);
         $detailpermohonan->status_ppk=$status;

         $detailpermohonan->tgl_status_ppk=date('Y-m-d');
         $detailpermohonan->save();
         // return back();
         return Redirect::to('permohonancuti');

        }else {
         $detailpermohonan = PermohonanCuti::find($id);
         $detailpermohonan->status_ppk=$status;
         $detailpermohonan->tgl_status_ppk=date('Y-m-d');
         $detailpermohonan->save();
         // return back();
         return Redirect::to('permohonancuti');

     }

         }else{
            if($status=='Ditolak'){
         $detailpermohonan = PermohonanCuti::find($id);
         $detailpermohonan->status=$status;

         $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');
         $detailpermohonan->save();
         // return back();
         return Redirect::to('permohonancuti');

        }else {
         $detailpermohonan = PermohonanCuti::find($id);
         $detailpermohonan->status=$status;
         $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');
         $detailpermohonan->save();
         // return back();
         return Redirect::to('permohonancuti');

         }
        

            # code...
        }
        
        
    }

    public function updataStatus_ppk($id, $status_ppk){
        if($status=='diterima' || $status=='ditangguhkan'){

         $detailpermohonan = PermohonanCuti::find($id);
         $detailpermohonan->status=$status_ppk;
         $detailpermohonan->save();
         // return back();
         return Redirect::to('permohonancuti');
        

        }
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

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


    public function tambahAlasan(Request $request, $id)
    {
        $permohonancuti = PermohonanCuti::find($id) ;
        if(session()->get('user')->ppk == '1'){
            if($request->tindakan=='Ditolak'){
               $detailpermohonan = PermohonanCuti::find($id);
               $detailpermohonan->status_ppk=$request->tindakan;
               $detailpermohonan->alasan_acc_ppk = $request->pesan;

               $detailpermohonan->tgl_status_ppk=date('Y-m-d');
               $detailpermohonan->save();
             // return back();
               return Redirect::to('permohonancuti');

            }else {
               $detailpermohonan = PermohonanCuti::find($id);
               $detailpermohonan->status_ppk=$request->tindakan;
               $detailpermohonan->alasan_acc_ppk = $request->pesan;

               $detailpermohonan->tgl_status_ppk=date('Y-m-d');
               $detailpermohonan->save();
             // return back();
               return Redirect::to('permohonancuti');

             }
        }else{
            if($request->tindakan=='Ditolak'){
                $detailpermohonan = PermohonanCuti::find($id);
                $detailpermohonan->status=$request->tindakan;
                $detailpermohonan->alasan_acc_atasan = $request->pesan;

                $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');
                $detailpermohonan->save();
                 // return back();
                return Redirect::to('permohonancuti');

           }else {
               $detailpermohonan = PermohonanCuti::find($id);
               $detailpermohonan->status=$request->tindakan;
               $detailpermohonan->alasan_acc_atasan = $request->pesan;
               $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');
               $detailpermohonan->save();
                 // return back();
               return Redirect::to('permohonancuti');

             }

        }    
    }

public function updateStatus_ppk($id, $status_ppk){
    if($request->tindakan=='diterima' || $request->tindakan=='ditangguhkan'){

       $detailpermohonan = PermohonanCuti::find($id);
       $detailpermohonan->$request->tindakan =$status_ppk;
       $detailpermohonan->alasan_acc_ppk = $request->pesan;
       $detailpermohonan->save();
         // return back();
       return Redirect::to('permohonancuti');


   }
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
        $mulai = Carbon::parse(($request->tgl_mulai), 'Asia/Jakarta');
        $end = Carbon::parse(($request->tgl_selesai), 'Asia/Jakarta');
       $editpermohonan = PermohonanCuti::find($id);
       $editpermohonan->tgl_mulai_ubah = $mulai;
       $editpermohonan->tgl_selesai_ubah = $end;
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
//     public function updateStatus($id, $status)
//     {
//        if(session()->get('user')->ppk == '1'){
//         if($status=='Ditolak'){
//            $detailpermohonan = PermohonanCuti::find($id);
//            $detailpermohonan->status_ppk=$status;

//            $detailpermohonan->tgl_status_ppk=date('Y-m-d');
//            $detailpermohonan->save();
//          // return back();
//            return Redirect::to('permohonancuti');

//        }else {
//            $detailpermohonan = PermohonanCuti::find($id);
//            $detailpermohonan->status_ppk=$status;
//            $detailpermohonan->tgl_status_ppk=date('Y-m-d');
//            $detailpermohonan->save();
//          // return back();
//            return Redirect::to('permohonancuti');

//        }

//    }else{
//     if($status=='Ditolak'){
//        $detailpermohonan = PermohonanCuti::find($id);
//        $detailpermohonan->status=$status;

//        $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');
//        $detailpermohonan->save();
//          // return back();
//        return Redirect::to('permohonancuti');

//    }else {
//        $detailpermohonan = PermohonanCuti::find($id);
//        $detailpermohonan->status=$status;
//        $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');
//        $detailpermohonan->save();
//          // return back();
//        return Redirect::to('permohonancuti');

//    }


//             # code...
// }


// }




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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PermohonanCuti;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Carbon\Carbon;
use App\LiburModel;
use App\User;
use App\JatahcutiModel;

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
          $user = User::where('ppk', '1')->first()->nip_baru;
          $permohonancuti=PermohonanCuti::where('status','Diterima')->orWhere('status','Ditangguhkan')->orWhere('id_atasan', $user)->get()->where('status_ppk',NULL);
          return view('permohonancuti',compact('permohonancuti'));
       }else{
          
        $permohonancuti=PermohonanCuti::where('id_atasan',session()->get('data')->nip_baru)->get()->where('status',NULL);
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

                $id_user = User::where('nip_baru','=',$detailpermohonan->nip_baru)->first();
                $jatahcuti = JatahcutiModel::find($id_user)->first();
                $jumlahCuti2 = $jatahcuti->jumlah_tahun_ini+$detailpermohonan->jumlah_cuti;
                if ($jumlahCuti2 > 12) {
                  $jatahcuti->jumlah_tahun_lalu = $jumlahCuti2-12;
                  $jatahcuti->jumlah_tahun_ini = 12;
                  $jatahcuti->save();
                }else{
                  $jatahcuti->jumlah_tahun_ini = $jumlahCuti2;
                  $jatahcuti->save();
                }


  

               $detailpermohonan->save();
               return Redirect::to('permohonancuti');

            }else {
                $jatah_cuti=JatahcutiModel::where('nip_baru',session()->get('user')->nip_baru)->first();


                if($permohonancuti->id_jenis_cuti == 1){
                  if($jatah_cuti->jumlah_tahun_lalu > 0){
                    if($permohonancuti->jumlah_cuti <= $jatah_cuti->jumlah_tahun_lalu){
                      $hasil = $jatah_cuti->jumlah_tahun_lalu - $permohonancuti->jumlah_cuti ;
                      echo $hasil;

                      $cuti1 =JatahcutiModel::where('nip_baru', session()->get('user')->nip_baru)->first();
                      $cuti = JatahcutiModel::find($cuti1->id_jatah);
                      $cuti->jumlah_tahun_lalu=$hasil;
                      $cuti->save();

                        $cekStatus = PermohonanCuti::where('id_permohonan_cuti', $id)
                        ->where('status', NULL)
                        ->orWhere('tgl_diusulkan_ppk', NULL)
                        ->first();

                       $detailpermohonan = PermohonanCuti::find($id);
                          //apabila id_permohonan_cuti memiliki status NULL atau tgl_diusulkan_ppk NULL
                          if(count($cekStatus) > 0) {
                              $detailpermohonan->status='Diterima';
                              $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');

                          }
                       $detailpermohonan->status_ppk=$request->tindakan;
                       $detailpermohonan->alasan_acc_ppk = $request->pesan;

                       $detailpermohonan->tgl_status_ppk=date('Y-m-d');
                       $detailpermohonan->save();
                     // return back();
                       return Redirect::to('permohonancuti');


                    }else{
                      if($jatah_cuti->jumlah_tahun_ini > 0){
                          $jumlah = $jumlah_cuti->jumlah_tahun_lalu + $jumlah_cuti->jumlah_tahun_ini;
                          if($permohonancuti->jumlah_cuti <= $jumlah){
                             $hasil = ($jumlah_cuti->jumlah_tahun_lalu - $permohonancuti->jumlah_cuti) + $jatah_cuti->jumlah_tahun_ini ;
                          echo $hasil ;   

                          $cuti1 =JatahcutiModel::where('nip_baru', session()->get('user')->nip_baru)->first();
                          $cuti = JatahcutiModel::find($cuti1->id_jatah);
                          $cuti->jumlah_tahun_lalu=0;
                          $cuti->jumlah_tahun_ini=$hasil;

                          $cuti->save();


                          $cekStatus = PermohonanCuti::where('id_permohonan_cuti', $id)
                            ->where('status', NULL)
                            ->orWhere('tgl_diusulkan_ppk', NULL)
                            ->first();

                           $detailpermohonan = PermohonanCuti::find($id);
                              //apabila id_permohonan_cuti memiliki status NULL atau tgl_diusulkan_ppk NULL
                              if(count($cekStatus) > 0) {
                                  $detailpermohonan->status='Diterima';
                                  $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');

                              }
                           $detailpermohonan->status_ppk=$request->tindakan;
                           $detailpermohonan->alasan_acc_ppk = $request->pesan;

                           $detailpermohonan->tgl_status_ppk=date('Y-m-d');
                           $detailpermohonan->save();
                         // return back();
                           return Redirect::to('permohonancuti');

                          }else{
                            return Redirect::to('pesan')->withErrors('Jumlah cuti yang diambil melebihi batas');

                          }

                      }else{
                            return Redirect::to('pesan')->withErrors('Jumlah cuti yang diambil melebihi batas');
                      }

                    }


                  }else{
                    if($jatah_cuti->jumlah_tahun_ini > 0){
                      if($permohonancuti->jumlah_cuti <= $jatah_cuti->jumlah_tahun_ini){
                         $hasil = $jatah_cuti->jumlah_tahun_ini - $permohonancuti->jumlah_cuti;
                          echo $hasil ; 

                          $cuti1 =JatahcutiModel::where('nip_baru', session()->get('user')->nip_baru)->first();
                          $cuti = JatahcutiModel::find($cuti1->id_jatah);
                          $cuti->jumlah_tahun_ini=$hasil;

                          $cuti->save();


                             $cekStatus = PermohonanCuti::where('id_permohonan_cuti', $id)
                              ->where('status', NULL)
                              ->orWhere('tgl_diusulkan_ppk', NULL)
                              ->first();

                             $detailpermohonan = PermohonanCuti::find($id);
                                //apabila id_permohonan_cuti memiliki status NULL atau tgl_diusulkan_ppk NULL
                                if(count($cekStatus) > 0) {
                                    $detailpermohonan->status='Diterima';
                                    $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');

                                }
                             $detailpermohonan->status_ppk=$request->tindakan;
                             $detailpermohonan->alasan_acc_ppk = $request->pesan;

                             $detailpermohonan->tgl_status_ppk=date('Y-m-d');
                             $detailpermohonan->save();
                           // return back();
                             return Redirect::to('permohonancuti');
                                    


                      }else{

                           return back()->withErrors(['Jumlah cuti tidak mencukupi ']);

                      }
                    }else{
                             return back()->withErrors(['Jumlah cuti tidak mencukupi ']);
                    }

                  }


                }else{

                $cekStatus = PermohonanCuti::where('id_permohonan_cuti', $id)
                ->where('status', NULL)
                ->orWhere('tgl_diusulkan_ppk', NULL)
                ->first();

               $detailpermohonan = PermohonanCuti::find($id);
                  //apabila id_permohonan_cuti memiliki status NULL atau tgl_diusulkan_ppk NULL
                  if(count($cekStatus) > 0) {
                      $detailpermohonan->status='Diterima';
                      $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');

                  }
               $detailpermohonan->status_ppk=$request->tindakan;
               $detailpermohonan->alasan_acc_ppk = $request->pesan;

               $detailpermohonan->tgl_status_ppk=date('Y-m-d');
               $detailpermohonan->save();
             // return back();
               return Redirect::to('permohonancuti');
                }

            }
        }else{
            if($request->tindakan=='Ditolak'){
                $detailpermohonan = PermohonanCuti::find($id);
                $detailpermohonan->status=$request->tindakan;
                $detailpermohonan->alasan_acc_atasan = $request->pesan;

                $detailpermohonan->tgl_diusulkan_ppk=date('Y-m-d');
                $id_user = User::where('nip_baru','=',$detailpermohonan->nip_baru)->first();
                $jatahcuti = JatahcutiModel::find($id_user)->first();
                // dd($jatahcuti->jumlah_tahun_ini);
                $jumlahCuti2 = $jatahcuti->jumlah_tahun_ini+$detailpermohonan->jumlah_cuti;
                // dd($jumlahCuti2);
                if ($jumlahCuti2 > 12) {
                  $jatahcuti->jumlah_tahun_lalu = $jumlahCuti2-12;
                  $jatahcuti->jumlah_tahun_ini = 12;
                  // dd($jatahcuti->jumlah_tahun_lalu.'****'.$jatahcuti->jumlah_tahun_ini);
                  $jatahcuti->save();
                }else{
                  $jatahcuti->jumlah_tahun_ini = $jumlahCuti2;
                  $jatahcuti->save();
                }
                // dd($jatahcuti->jumlah_tahun_ini);
                $detailpermohonan->save();
                $jatahcuti->save();
                 return back();
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
        $period = new \DatePeriod(
                                 new \DateTime($mulai),
                                 new \DateInterval('P1D'),
                                 new \DateTime(date('Y-m-d', strtotime('+1 days', strtotime($end))))
                            );
      $i = 0;
      $arrTgl = array();
      $libur = LiburModel::all();

        foreach ($period as $key => $value) {
          if($value->format('D') != 'Sat' && $value->format('D') != 'Sun') {
              $libur = LiburModel::where('tanggal', $value->format('Y-m-d'))->count();

              if($libur==0) {
                  $arrTgl[$i] = $value->format('Y-m-d');
                
              }

            
          }
          $i++;
}


       $editpermohonan = PermohonanCuti::find($id);
       $editpermohonan->tgl_mulai_ubah = $mulai;
       $editpermohonan->tgl_selesai_ubah = $end;
       $editpermohonan->jumlah_cuti = count($arrTgl);
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

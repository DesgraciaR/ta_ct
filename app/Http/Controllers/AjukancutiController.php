<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use App\PermohonanCuti;
use App\JatahcutiModel;
use App\JenisCuti;
use App\LiburModel;
use Alert;
use Illuminate\Contracts\Validation ;

class AjukancutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_cuti = JenisCuti::all();
        return view('ajukancuti')->with('jenis_cuti',$jenis_cuti);
    }


    public function jatahcuti()
    {



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

        // dd($request->id_jenis_cuti);
        $pengajuan = Carbon::parse(($request->tgl_pengajuan), 'Asia/Jakarta');
        $mulai = Carbon::parse(($request->tgl_mulai), 'Asia/Jakarta');
        $end = Carbon::parse(($request->tgl_selesai), 'Asia/Jakarta');

        // dd($pengajuan, $mulai, $end);

              $period = new \DatePeriod( //mengambil array dari anatara tgl_mulai dan tgl_selesai
               new \DateTime($mulai),
               new \DateInterval('P1D'),
               new \DateTime(date('Y-m-d', strtotime('+1 days', strtotime($end))))
           );
              $i = 0;
              $arrTgl = array();
              $libur = LiburModel::all();

                //mengurangi hari sabtu dan minggu
              foreach ($period as $key => $value) {
                  if($value->format('D') != 'Sat' && $value->format('D') != 'Sun') {
                      $libur = LiburModel::where('tanggal', $value->format('Y-m-d'))->count();

                      if($libur==0) {
                          $arrTgl[$i] = $value->format('Y-m-d');

                      }


                  }
                  $i++;
              }

        $this->cektahun();
        $jumlah_cuti=JatahcutiModel::where('nip_baru',session()->get('user')->nip_baru)->first();


        if(date('Y', strtotime($mulai)) == date('Y') || session()->get('data')->mk_tahun >= 1) {
          if($request->id_jenis_cuti==1){
            //apabila jumlah_cuti tahun lalu > 0 
            if($jumlah_cuti->jumlah_tahun_lalu > 0){
              if(count($arrTgl) <= $jumlah_cuti->jumlah_tahun_lalu ) {
                //apila jumlah cuti tahun lalu lebih besar / =  jumlah hari cuti yang diambil
                $hasil = $jumlah_cuti->jumlah_tahun_lalu - count($arrTgl) ;
                echo $hasil ; 

                // $cuti1 =JatahcutiModel::where('nip_baru', session()->get('user')->nip_baru)->first();
                // $cuti = JatahcutiModel::find($cuti1->id_jatah);
                // $cuti->jumlah_tahun_lalu=$hasil;
                // $cuti->save();

                $permohonancuti = new PermohonanCuti;
                $permohonancuti->id_jenis_cuti = $request->id_jenis_cuti;
                $permohonancuti->tgl_pengajuan = $pengajuan;
                $permohonancuti->tgl_mulai = $mulai;
                $permohonancuti->tgl_selesai = $end;
                $permohonancuti->alamat_cuti = $request->alamat;
                $permohonancuti->alasan_cuti = $request->alasan;
                $permohonancuti->jumlah_cuti = count($arrTgl);
                $permohonancuti->noTelepon = $request->noTelepon;
                $filename=time().'.'.request()->foto_bukti->getClientOriginalExtension();
                if(request()->foto_bukti->move(public_path('foto_bukti'),$filename)){
                      $permohonancuti->bukti_cuti = 'foto_bukti/'.$filename;     
                }

                $permohonancuti->nip_baru = $request->session()->get("data")->nip_baru;
                    if(session()->get("data")->jenis_jabatan==1){
                        $permohonancuti->id_atasan = $request->tujuan;
                    }else{
                        if( $request->tujuan==session()->get("data")->nip_atasan){
                            $permohonancuti->id_atasan = $request->tujuan;

                        }else{
                            $permohonancuti->id_atasan = $request->tujuan;
                        }

                    }
                      $permohonancuti->save();
                     
                      return Redirect::to('dashboard')->with(session()->flash('update', ''));   
              
              }else{
                    
                //apila jumlah cuti tahun lalu < jumlah hari cuti yang diambil
                if($jumlah_cuti->jumlah_tahun_ini > 0){
                  $jumlah = $jumlah_cuti->jumlah_tahun_lalu + $jumlah_cuti->jumlah_tahun_ini;
                  if(count($arrTgl) <= $jumlah) {
                    $hasil = ($jumlah_cuti->jumlah_tahun_lalu - count($arrTgl)) + $jumlah_cuti->jumlah_tahun_ini ;
                    echo $hasil ;   

                    // $cuti1 =JatahcutiModel::where('nip_baru', session()->get('user')->nip_baru)->first();
                    // $cuti = JatahcutiModel::find($cuti1->id_jatah);
                    // $cuti->jumlah_tahun_lalu=0;
                    // $cuti->jumlah_tahun_ini=$hasil;

                    // $cuti->save();
                      
                    $permohonancuti = new PermohonanCuti;
                    $permohonancuti->id_jenis_cuti = $request->id_jenis_cuti;
                    $permohonancuti->tgl_pengajuan = $pengajuan;
                    $permohonancuti->tgl_mulai = $mulai;
                    $permohonancuti->tgl_selesai = $end;
                    $permohonancuti->alamat_cuti = $request->alamat;
                    $permohonancuti->alasan_cuti = $request->alasan;
                    $permohonancuti->jumlah_cuti = count($arrTgl);
                    $permohonancuti->noTelepon = $request->noTelepon;
                    $filename=time().'.'.request()->foto_bukti->getClientOriginalExtension();
                      if(request()->foto_bukti->move(public_path('foto_bukti'),$filename)){
                            $permohonancuti->bukti_cuti = 'foto_bukti/'.$filename;     
                      }

                      $permohonancuti->nip_baru = $request->session()->get("data")->nip_baru;
                      if(session()->get("data")->jenis_jabatan==1){
                          $permohonancuti->id_atasan = $request->tujuan;
                      }else{
                        if( $request->tujuan==session()->get("data")->nip_atasan){
                              $permohonancuti->id_atasan = $request->tujuan;
                        }else{
                              $permohonancuti->id_atasan = $request->tujuan;
                        }
                      }
                      $permohonancuti->save();
                      Alert::success('Data berhasil di kirim');
                      return Redirect::to('dashboard');    

                  }else{
                      // echo 'Jumlah cuti yang diambil melebihi batas';
                      return Redirect::to('pesan')->withErrors('Jumlah cuti yang diambil melebihi batas');
                  }

                  }else{
                    // echo 'Jumlah cuti yang diambil melebihi batas';
                   return Redirect::to('pesan')->withErrors('Jumlah cuti yang diambil melebihi batas');

                  }
              }
            

              }else{
                if($jumlah_cuti->jumlah_tahun_ini > 0){
                  if(count($arrTgl) <= $jumlah_cuti->jumlah_tahun_ini){
                    $hasil = $jumlah_cuti->jumlah_tahun_ini - count($arrTgl);
                    echo $hasil ; 

                    // $cuti1 =JatahcutiModel::where('nip_baru', session()->get('user')->nip_baru)->first();
                    // $cuti = JatahcutiModel::find($cuti1->id_jatah);
                    // $cuti->jumlah_tahun_ini=$hasil;

                    // $cuti->save();
                      
                    $permohonancuti = new PermohonanCuti;
                    $permohonancuti->id_jenis_cuti = $request->id_jenis_cuti;
                    $permohonancuti->tgl_pengajuan = $pengajuan;
                    $permohonancuti->tgl_mulai = $mulai;
                    $permohonancuti->tgl_selesai = $end;
                    $permohonancuti->alamat_cuti = $request->alamat;
                    $permohonancuti->alasan_cuti = $request->alasan;
                    $permohonancuti->jumlah_cuti = count($arrTgl);
                    $permohonancuti->noTelepon = $request->noTelepon;
                    $filename=time().'.'.request()->foto_bukti->getClientOriginalExtension();
                  
                   if(request()->foto_bukti->move(public_path('foto_bukti'),$filename)){
                        $permohonancuti->bukti_cuti = 'foto_bukti/'.$filename;     
                   }

                   $permohonancuti->nip_baru = $request->session()->get("data")->nip_baru;
                  
                   if(session()->get("data")->jenis_jabatan==1){
                    $permohonancuti->id_atasan = $request->tujuan;
                   }else{
                    if( $request->tujuan==session()->get("data")->nip_atasan){
                        $permohonancuti->id_atasan = $request->tujuan;

                    }else{
                        $permohonancuti->id_atasan = $request->tujuan;
                    }
                   }

                   $permohonancuti->save();
                   Alert::success('Data berhasil di kirim');
                   return Redirect::to('dashboard');

                  }else{
                  return back()->withErrors(['Jumlah cuti tidak mencukupi ']);
                  }
                }else{
                return back()->withErrors(['Jatah cuti tidak mencukupi']);  
                }
              }
          
          }elseif ($request->id_jenis_cuti==2) {                               
          // dd($request->id_jenis_cuti);
           
            if(count($arrTgl) <= 14){
              $permohonancuti = new PermohonanCuti;
              $permohonancuti->id_jenis_cuti = $request->id_jenis_cuti;
              $permohonancuti->tgl_pengajuan = $pengajuan;
              $permohonancuti->tgl_mulai = $mulai;
              $permohonancuti->tgl_selesai = $end;
              $permohonancuti->alamat_cuti = $request->alamat;
              $permohonancuti->alasan_cuti = $request->alasan;
              $permohonancuti->jumlah_cuti = count($arrTgl);
              $permohonancuti->noTelepon = $request->noTelepon;
              $filename=time().'.'.request()->foto_bukti->getClientOriginalExtension();
              if(request()->foto_bukti->move(public_path('foto_bukti'),$filename)){
              $permohonancuti->bukti_cuti = 'foto_bukti/'.$filename;     
              }

              $permohonancuti->nip_baru = $request->session()->get("data")->nip_baru;
              if(session()->get("data")->jenis_jabatan==1){
              $permohonancuti->id_atasan = $request->tujuan;
              }else{
                if( $request->tujuan==session()->get("data")->nip_atasan){
                $permohonancuti->id_atasan = $request->tujuan;

                }else{
                 $permohonancuti->id_atasan = $request->tujuan;
                }

              }
                $permohonancuti->save();
                Alert::success('Data berhasil di kirim');
                return redirect('dashboard');


            }else{

                 return back()->withErrors(['Pengambilan cuti melebihi batas']);  
            }
            

          }elseif ($request->id_jenis_cuti==3) {
            if(count($arrTgl) <= 90){
              $permohonancuti = new PermohonanCuti;
              $permohonancuti->id_jenis_cuti = $request->id_jenis_cuti;
              $permohonancuti->tgl_pengajuan = $pengajuan;
              $permohonancuti->tgl_mulai = $mulai;
              $permohonancuti->tgl_selesai = $end;
              $permohonancuti->alamat_cuti = $request->alamat;
              $permohonancuti->alasan_cuti = $request->alasan;
              $permohonancuti->jumlah_cuti = count($arrTgl);
              $permohonancuti->noTelepon = $request->noTelepon;
              $filename=time().'.'.request()->foto_bukti->getClientOriginalExtension();
              if(request()->foto_bukti->move(public_path('foto_bukti'),$filename)){
              $permohonancuti->bukti_cuti = 'foto_bukti/'.$filename;     
              }

              $permohonancuti->nip_baru = $request->session()->get("data")->nip_baru;
              if(session()->get("data")->jenis_jabatan==1){
              $permohonancuti->id_atasan = $request->tujuan;
              }else{
                if( $request->tujuan==session()->get("data")->nip_atasan){
                  $permohonancuti->id_atasan = $request->tujuan;

                }else{
                  $permohonancuti->id_atasan = $request->tujuan;
                }

              }
                  $permohonancuti->save();
                  Alert::success('Data berhasil di kirim');
                  return Redirect('dashboard');

            }else{

                 return back()->withErrors(['Pengambilan cuti melebihi batas']);  
            }
            

          }elseif ($request->id_jenis_cuti==4){
            if(count($arrTgl) <= 30){ 
              $permohonancuti = new PermohonanCuti;
              $permohonancuti->id_jenis_cuti = $request->id_jenis_cuti;
              $permohonancuti->tgl_pengajuan = $pengajuan;
              $permohonancuti->tgl_mulai = $mulai;
              $permohonancuti->tgl_selesai = $end;
              $permohonancuti->alamat_cuti = $request->alamat;
              $permohonancuti->alasan_cuti = $request->alasan;
              $permohonancuti->jumlah_cuti = count($arrTgl);
              $permohonancuti->noTelepon = $request->noTelepon;
              $filename=time().'.'.request()->foto_bukti->getClientOriginalExtension();
              if(request()->foto_bukti->move(public_path('foto_bukti'),$filename)){
                    $permohonancuti->bukti_cuti = 'foto_bukti/'.$filename;     
                }

              $permohonancuti->nip_baru = $request->session()->get("data")->nip_baru;
              if(session()->get("data")->jenis_jabatan==1){
                $permohonancuti->id_atasan = $request->tujuan;
              }else{
                if( $request->tujuan==session()->get("data")->nip_atasan){
                  $permohonancuti->id_atasan = $request->tujuan;

                }else{
                  $permohonancuti->id_atasan = $request->tujuan;
                }

              }
                  $permohonancuti->save();
                  swal("Good job!", "You clicked the button!", "success");
                  return Redirect('dashboard');


            }else{
                return back()->withErrors(['Pengambilan cuti melebihi batas']);  

            }

            
        }else{

         return back()->withErrors(['Pengambilan cuti tidak boleh lintas tahun']);  

        }

                    
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
    public function update(Request $request, $id)
    {
        //
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

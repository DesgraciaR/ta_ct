<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use App\PermohonanCuti;
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
        
        // $validator =validator::make($request->all(), $this->validationRues);
            // if($validation->fails()){
            //     return redirect()->back()->withErrors($validation->error()) ;
            // }else{
        $pengajuan = Carbon::parse(($request->tgl_pengajuan), 'Asia/Jakarta');
        $mulai = Carbon::parse(($request->tgl_mulai), 'Asia/Jakarta');
        $end = Carbon::parse(($request->tgl_selesai), 'Asia/Jakarta');

        // dd($pengajuan, $mulai, $end);
                    
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
    }


    public function hitungCuti($tgl_mulai, $tgl_selesai,$delimeter)
    {
        $period = new DatePeriod(
             new DateTime($tgl_mulai),
             new DateInterval('P1D'),
             new DateTime($tgl_selesai)
        );

        foreach ($period as $tgl ) {
            # code...
            echo  $tgl;
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

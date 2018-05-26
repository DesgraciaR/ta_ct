<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use App\PermohonanCuti;
use App\JenisCuti;


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
        // dd(session()->all());
        $permohonancuti = new PermohonanCuti;
        // echo $permohonancuti;
        // exit();
        $permohonancuti->id_jenis_cuti = $request->id_jenis_cuti;
        // $permohonancuti->nip_baru = $request->nip_baru;
        $permohonancuti->tgl_pengajuan =  Carbon::createFromFormat('d/m/Y', $request->tgl_pengajuan)->toDateString();
        $permohonancuti->tgl_mulai = Carbon::createFromFormat('d/m/Y', $request->tgl_mulai)->toDateString();
        $permohonancuti->tgl_selesai = Carbon::createFromFormat('d/m/Y', $request->tgl_selesai)->toDateString();
        $permohonancuti->alamat_cuti = $request->alamat;
        $permohonancuti->alasan_cuti = $request->alasan;
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

        // Alert::success('Data berhasil di kirim');
        return Redirect::to('dashboard');

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

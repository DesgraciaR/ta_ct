<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\PermohonanCuti;

use App\LiburModel;

use Carbon\Carbon;

use Auth;

use Hash;
use DB;

class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarUser =User::all();
        return view('daftarUser',compact('daftarUser'));
     }


     public function libur()
    {
        $daftarLibur =LiburModel::all();
        return view('harilibur',compact('daftarLibur'));
     }



      public function profileuser()
    {
        
        return view('profil');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function resetpassword($nip){

        $user = DB::table('tbl_user')
        ->where('nip_baru', $nip)
        ->update(['password' => bcrypt($nip)]);
        return redirect('daftarUser')->with('sukses');
     
    }

    public function ubahpassword(){

         return view('ubahpassword');
     }

    public function updatepassword(Request $request){
        $user = DB::table('tbl_user')
        ->where('nip_baru','=',session()->get('user')->nip_baru)
        ->select('*')
        ->get();

        // echo $user;
        // exit();
        // session()->get('user')->password;
        if(Hash::check($request->old_password, session()->get('user')->password)){
            DB::table('tbl_user')
            ->where('nip_baru','=',session()->get('user')->nip_baru)
            ->update(['password' => bcrypt($request->new_password)]);
            return view('ubahpassword')->with('sukses','yes');
        } else {
            return view('ubahpassword')->with('gagal','yes');
        }
     }
    



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
        $liburnasional = new LiburModel;
        $tgl = Carbon::parse(($request->tgl_libur), 'Asia/Jakarta');
        $liburnasional->tanggal = $tgl;
        $liburnasional->ket_libur = $request->keterangan ;
        $liburnasional->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function profil()
    {
        return view('profil');
     }

    public function show($id)
    {
        $prof = User::find($id);
        return view('profil',compact('prof'));
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
        LiburModel::find($id)->delete();
        return back();
    }

     public function hapuslibur($id)
    {
        LiburModel::All()->delete();
        return back();
    }
}

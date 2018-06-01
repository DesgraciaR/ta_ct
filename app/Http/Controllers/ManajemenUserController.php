<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\PermohonanCuti;

use App\LiburModel;

use Carbon\Carbon;




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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function resetpassword(Request $request, $id){

         $validator = validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed'
         ]);

         $reset =User::find($id);
         if($validator->fails()) {
            return redirect('daftarUser'.$user->id)->withError($valiator)->withInput();
         }

         $User->password = bcrypt(Input::get('password'));
         $User->save();
         return back();
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
        LiburModel::find($id)->delete();
        return back();
    }

     public function hapuslibur($id)
    {
        LiburModel::All()->delete();
        return back();
    }
}

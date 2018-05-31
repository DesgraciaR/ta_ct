<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\PermohonanCuti;




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

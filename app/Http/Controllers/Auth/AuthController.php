<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Alert;
use Hash;
use DB;

class AuthController extends Controller
{


	protected $username = 'nip_baru';
	public function showLoginForm(){
		return view('include.login');
	}
    public function login(Request $request){
   
       // dd($request);
                    $admin = User::where('level','=',null)->first();
                    // dd($admin->nip);
                   
                    if($request->nip_baru == $admin->nip_baru && $request->password == 'admin'){
                        return redirect('halamanAdmin');
                    }


                    $data = \GlobalHelper::accessdata($request->nip_baru);
                    if(!isset($data->status)){
                        $cek = User::find($data->nip_baru);
                        // dd($data);
                          // dd($data->jab_olah);
                        if(count($cek)==0){
                               if($data->jab_olah =="KEPALA BAGIAN UMUM"){
                                $user = User::create([
                                    'nip_baru'=>$data->nip_baru,
                                    'password'=>bcrypt($data->nip_baru),
                                    'nama'=>$data->nama,
                                    'level'=>$data->jenis_jabatan,
                                    'ppk'=>'1'
                                ]);
                                }else{
                                    
                                        
                                      $user = User::create([
                                            'nip_baru'=>$data->nip_baru,
                                            'password'=>bcrypt($data->nip_baru),
                                            'nama'=>$data->nama,
                                            'level'=>$data->jenis_jabatan,
                                            'ppk'== NULL
                                        ]);

                                }

                        }else{
                            if(!\Hash::check($request->password,$cek->password)) {
                                return back()->withErrors(['error','NIP / Password salah']);

                            }

                            $user=$cek;
                        }

                            \Session::put('user',$user);
                            \Session::put('data',$data);
                            if($user->level=='1'){
                                return redirect('halamanKepala');//direct ke route
                             } else {
                                return redirect('halamanPegawai');
                             } 

                    }else{
                        return back()->withErrors(['error','NIP / Password salah']);        
                    }     
        
                
    }

    public function logout(){
        \Session::flush();
        return redirect('login');
    }

    public function update(Request $request){

         //
     }

     public function index()
    {
        $this->cektahun();
    
    }




}

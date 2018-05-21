<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Alert;

class AuthController extends Controller
{
	protected $username = 'nip_baru';
	public function showLoginForm(){
		return view('include.login');
	}
    public function login(Request $request){
        $data = \GlobalHelper::accessdata($request->nip_baru);
        if(!isset($data->status)){
            $cek = User::find($data->nip_baru);
            if(count($cek)==0){
               if($data->jab_olah ="KEPALA SUB BAGIAN TATA USAHA DAN RUMAH TANGGA"){
                $user = User::create([
                    'nip_baru'=>$data->nip_baru,
                    'password'=>bcrypt($data->nip_baru),
                    'nama'=>$data->nama,
                    'level'=>$data->jenis_jabatan,
                    'ppk'=>'1'

                ]);
             }else
                {
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
            } else{
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

    // public update(Request $request, $nip_baru){
    //     $data_user = User::find($request->nip_baru);
    //     if ($request->password){
    //         $data_user->password = bcrypt($request->passwrd);
    //     }

    // }
}

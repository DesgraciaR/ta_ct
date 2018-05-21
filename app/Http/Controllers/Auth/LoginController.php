<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $username = "nip_baru";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

/*    public function login(Request $request){
        $data = \GlobalHelper::accessdata($request->nip_baru);
        if(!isset($data->status)){
            $cek = User::find($request->nip_baru);
            if(count($cek)==0){
                $user = User::create([
                    'nip_baru'=>$data->nip_baru,
                    'password'=>bcrypt($data->nip_baru),
                    'nama'=>$data->nama,
                    'level'=>$data->jenis_jabatan
                ]);
            }else{
                if(!\Hash::check($request->password,$cek->password)) {
                    return back()->withErrors(['error','NIP / Password salah']);
                }
                $user=$cek;
            }
            \Auth::login($user);

            if($user->level=='1'){
                return redirect('halamanKepala');//direct ke route
            } else{
                return redirect('halamanPegawai');
            } 
    
        }else{
            return back()->withErrors(['error','NIP / Password salah']);        
        }

    }
*/
     public function logout()
    {
        session()->flush();
        return redirect ('login');
    }

}

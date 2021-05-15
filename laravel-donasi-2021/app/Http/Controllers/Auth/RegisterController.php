<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SignUpEmail;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Relawan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function redirectTo(){
        return $this->redirectTo = '/login';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verification_code' => sha1(time()),
        ]);

        $roleChoosed = Role::where('id', $data['role'])->first();
        $user->roles()->attach($roleChoosed);

        Mail::to($user->email)->send(new SignUpEmail($user));

        return $user;
    }

    public function showRegistrationForm()
    {
        $rolesForReg = [Role::where('name', 'relawan')->first(), Role::where('name', 'fundraiser')->first()];

        return view('auth.register')->with([
            'rolesForReg' => $rolesForReg,
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect()->route('login')
                                ->with(session()->flash('alert-success', 'Silahkan cek inbox email Anda untuk memverifikasi akun'));
    }

    protected function verifyUser($token)
    {
        $user = User::where('verification_code', $token)->first();

        if($user != null){
            $user->is_verified = 1;
            $user->email_verified_at = Carbon::now();
            $user->save();

            $newRelawan = new Relawan();
            $newRelawan->id_user = $user->id;
            $newRelawan->nama_depan = $user->nama;
            $newRelawan->remember_token = $user->verification_code;
            $newRelawan->email = $user->email;
            $newRelawan->is_verified = true;
            $newRelawan->inserted_at = Carbon::now();
            $newRelawan->inserted_by = $user->id;
            $newRelawan->save();

            return redirect()->route('login')->with(session()->flash('alert-success', 'Akun anda sudah terverifikasi. Silahkan login.'));
        }
    }
}

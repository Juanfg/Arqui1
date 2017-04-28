<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Direccion;
use App\DatosCli;
use App\CliSistema;
use App\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;

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
    protected $redirectTo = '/home';

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
            'nombre'            => 'required|max:255',
            'email'             => 'required|email|max:255|unique:users',
            'password'          => 'required|min:6',
            'rfc'               => 'required|rfc',
            'direccion'         => 'required|string',
            'exterior'          => 'required|numeric',
            'colonia'           => 'required|string',
            'cp'                => 'required|numeric',
            'delegacion'        => 'required|string',
            'municipio'         => 'required|string',
            'estados'           => 'required|numeric',
            'password-factura'  => 'required|string'
        ]);
    }

    public function showRegistrationForm()
    {

        $estados = Estado::pluck('nombre', 'id');
        $data = ['estados' => $estados];

        return view('auth.register', $data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $direccionAlreadyExists = Direccion::where('calle', $data['direccion'])->where('num_ext', $data['exterior'])
                                                ->where('num_int', $data['interior'])->where('colonia', $data['colonia'])
                                                ->where('cp', $data['cp'])->where('delegacion', $data['delegacion'])
                                                ->where('municipio', $data['municipio'])->where('estado', $data['estados'])->first();

        $direccion = $direccionAlreadyExists ? $direccionAlreadyExists :
        Direccion::create([
            'calle'     => $data['direccion'],
            'num_ext'   => $data['exterior'],
            'num_int'   => $data['interior'],
            'colonia'   => $data['colonia'],
            'cp'        => $data['cp'],
            'delegacion'=> $data['delegacion'],
            'municipio' => $data['municipio'],
            'estado'    => $data['estados']        
        ]);

        $datos_cli = DatosCli::create([
            'razon_social'  => $data['nombre'],
            'rfc'           => $data['rfc'],
            'direccion'     => $direccion->id,
            'email'         => $data['email']
        ]);

        return User::create([
            'email'             => $data['email'],
            'password'          => bcrypt($data['password']),
            'timbres'           => 0,
            'datos_facturacion' => $datos_cli->id,
            'key'               => str_random(20),
            'cer'               => str_random(20),
            'password_cer'      => Crypt::encryptString($data['password-factura'])
        ]);
    }
}

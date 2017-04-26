<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CliSistema;
use App\User;
use App\Estado;

class PerfilController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idCliSistema = Auth::id();
        $perfil = User::where('id', $idCliSistema)->first();
        $datosGenerales = $perfil->datos_facturacion();
        $estados = Estado::pluck('nombre', 'id');
        
        return view('perfil', [
            'perfil' => $perfil,
            'datosGenerales' => $datosGenerales,
            'direccion' => $datosGenerales->direccion(),
            'estados' => $estados,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id, $request)
    {

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
        $current_user = Auth::user();
        $user = User::where('id' , $id)->where('duenio', $current_user->id);  

        $rules = [
            'users.email' => 'email',
            'users.password' => 'string|min:6',
            'users.password_confirm' => 'string|min:6',
            'users.password_cer' => 'string|min:6',
            'users.picture' => 'image',
            'datos_cli.razon_social' => 'string',
            'datos_cli.rfc' => 'rfc',
            'datos_cli.email' => 'email',
            'direccion.calle' => 'string',
            'direccion.num_ext' => 'numeric',
            'direccion.num_int' => 'numeric',
            'direccion.colonia' => 'string',
            'direccion.delegacion' => 'string',
            'direccion.municipio' => 'string',
            'direccion.cp' => 'numeric|digits:5',
            'direccion.estado' => 'numeric|exists:estado,id',
        ];

        if($request->users){
            $users = $request->users;

            if(isset($users['password']) || isset($users['password_confirm'])){
                if( !isset($users['password']) || 
                    !isset($users['password_confirm']) || 
                    $users['password'] != $users['password_confirm']){

                    return back()->withErrors(['passwords' => 'Los password no coinciden']);
                }
            }
        }

        $this->validate($request, $rules);
        
        // Todo parece ser valido. Empecemos a ver que cambio mediante arreglos auxiliares
        $users_columns = ['email', 'password', 'password_cer'];
        $datos_cli_columns = ['razon_social', 'rfc', 'email'];
        $direccion_columns = ['calle', 'num_ext', 'num_int','colonia', 'delegacion', 'municipio', 'cp', 'estado'];

        // Obtengamos los modelos actuales, $current_user ya lo tenemos
        $current_datos_cli = $current_user->datos_facturacion();
        $current_direccion = $current_datos_cli->direccion();

        if(isset($request->users)){
            foreach ($users_columns as $key => $value) {
                if(isset($request->users[$value])){
                    $current_user->{$value} = $request->users[$value];
                    if (strpos($value, 'password') !== false) 
                        $current_user->{$value} = bcrypt($current_user->{$value});
                }
            }

            if(isset($request->users['picture'])){
                $path = $request->file('users.picture')->store('img');
                $current_user->picture_path = $path;
            }
        }
        
        if(isset($request->datos_cli))
            foreach ($datos_cli_columns as $key => $value) 
                if(isset($request->datos_cli[$value]))
                    $current_datos_cli->{$value} = $request->datos_cli[$value];
        
        if(isset($request->direccion))
            foreach ($direccion_columns as $key => $value) 
                if(isset($request->direccion[$value]))
                    $current_direccion->{$value} = $request->direccion[$value];    


        // El orden es importante por las dependencias
        if($current_direccion->isDirty()){
            $saving = $current_direccion->replicate();
            $saving->save();
            $current_direccion = $saving;
        }

        $current_datos_cli->direccion = $current_direccion->id;
        
        if($current_datos_cli->isDirty()){
            $saving = $current_datos_cli->replicate();
            $saving->save();
            $current_datos_cli = $saving;
        }

        $current_user->datos_facturacion = $current_datos_cli->id;

        // Nunca hay problemas con el usuario
        $current_user->save();

        return redirect()->route('perfil.index')->with('success', 'perfil actualizado');
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

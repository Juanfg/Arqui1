<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cliente;
use App\Estado;
use App\Direccion;

class ClientesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userId = Auth::id();
        $clientes = Cliente::where('visible', 1)->where('duenio', $userId)->get();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create', ['cliente' => null, 'estados' => Estado::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'    => 'required|string',
            'rfc'       => 'required|string',
            'direccion' => 'required|string',
            'exterior'  => 'required|numeric',
            'interior'  => 'numeric',
            'colonia'   => 'required|string',
            'cp'        => 'required|numeric',
            'delegacion'=> 'required|string',
            'municipio' => 'required|string',
            'estados'   => 'required|string',
            'email'     => 'required|email'
        ]);

        $clienteAlreadyExists = Cliente::where('rfc', $request->rfc)->where('visible', true)->count();
        if ($clienteAlreadyExists == 0)
        {
            $direccionAlreadyExists = Direccion::where('calle', $request->direccion)->where('num_ext', $request->exterior)
                                                ->where('num_int', $request->interior)->where('colonia', $request->colonia)
                                                ->where('cp', $request->cp)->where('delegacion', $request->delegacion)
                                                ->where('municipio', $request->municipio)->where('estado', $request->estados)->first();
            
            $direccion = $direccionAlreadyExists ? $direccionAlreadyExists : 
            Direccion::create([
                'calle'     => $request->direccion,
                'num_ext'   => $request->exterior,
                'num_int'   => $request->interior,
                'colonia'   => $request->colonia,
                'cp'        => $request->cp,
                'delegacion'=> $request->delegacion,
                'municipio' => $request->municipio,
                'estado'    => $request->estados,
                'visible'   => true
            ]);

            Cliente::create([
                'razon_social'  => $request->nombre,
                'rfc'           => $request->rfc,
                'direccion'     => $direccion->id,
                'duenio'        => Auth::id(),
                'email'         => $request->email,
                'visible'       => true
            ]);
        }
        else
        {
            $request->session()->flash('error', 'El RFC de este cliente ya ha sido registrado por otro cliente');
            return back()->withInput();
        }

        $request->session()->flash("message", "Cliente creado con exito");
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::id();
        $cliente = Cliente::where('id',$id)->where('duenio', $user)->firstOrFail();
        $cliente->direccion = $cliente->direccion();
        $cliente->direccion->estado = $cliente->direccion->estado()->first()->nombre;
        return $cliente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::where('id', $id)->firstOrFail();
        return view('clientes.create', ['cliente' => $cliente, 'direccion' => $cliente->direccion(), 'estados' => Estado::all()]);
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
        $this->validate($request, [
            'nombre'    => 'required|string',
            'rfc'       => 'required|string',
            'direccion' => 'required|string',
            'exterior'  => 'required|numeric',
            'interior'  => 'numeric',
            'colonia'   => 'required|string',
            'cp'        => 'required|numeric',
            'delegacion'=> 'required|string',
            'municipio' => 'required|string',
            'estados'   => 'required|string',
            'email'     => 'required|email'
        ]);


        $clienteAlreadyExists = Cliente::where('rfc', $request->rfc)->where('visible', true)->where('id', '<>', $id)->count();
        if ($clienteAlreadyExists == 0)
        {
            $direccionAlreadyExists = Direccion::where('calle', $request->direccion)->where('num_ext', $request->exterior)
                                                ->where('num_int', $request->interior)->where('colonia', $request->colonia)
                                                ->where('cp', $request->cp)->where('delegacion', $request->delegacion)
                                                ->where('municipio', $request->municipio)->where('estado', $request->estados)->first();

            $direccion = $direccionAlreadyExists ? $direccionAlreadyExists : 
            Direccion::create([
                'calle'     => $request->direccion,
                'num_ext'   => $request->exterior,
                'num_int'   => $request->interior,
                'colonia'   => $request->colonia,
                'cp'        => $request->cp,
                'delegacion'=> $request->delegacion,
                'municipio' => $request->municipio,
                'estado'    => $request->estados,
                'visible'   => true
            ]);

            $clienteIsTheSame = Cliente::where('razon_social', $request->nombre)->where('rfc', $request->rfc)
                                        ->where('direccion', $direccion->id)->where('duenio', Auth::id())
                                        ->where('email', $request->email)->where('visible', true)->count();

            if ($clienteIsTheSame == 0)
            {
                Cliente::create([
                    'razon_social'  => $request->nombre,
                    'rfc'           => $request->rfc,
                    'direccion'     => $direccion->id,
                    'duenio'        => Auth::id(),
                    'email'         => $request->email,
                    'visible'       => true
                ]);
            }
            else
            {
                $request->session()->flash('error', 'No se cambi&oacute; ning&uacute;n dato del cliente');
                return back()->withInput();
            }
        }
        else
        {
            $request->session()->flash('error', 'El RFC de este cliente ya ha sido registrado por otro cliente');
            return back()->withInput();
        }
        
        $request->session()->flash("message", "Cliente actualizado con exito");
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::id();
        $cliente = Cliente::where('id', $id)->where('duenio', $user)->firstOrFail();
        $cliente->visible = 0;
        $cliente->save();
        return ['success' => true];
    }
}

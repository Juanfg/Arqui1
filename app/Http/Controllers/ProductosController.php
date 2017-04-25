<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Producto;

class ProductosController extends Controller
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
        return view('productos.index', ['productos' => Producto::where('duenio', $userId)->where('visible', 1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
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
            'nombre' => 'required|string',
            'unidad' => 'required|string',
            'precio' => 'required|numeric',
            'ieps' => 'boolean',
            'iva' => 'boolean',
        ]);

        $array = $request->all();

        if(!isset($array['ieps']))
            $array['ieps'] = 0;

        if(!isset($array['iva']))
            $array['iva'] = 0;
        

        $user = Auth::id();

        $exists = Producto::where('nombre', $request->nombre)->where('duenio', $user)->where('visible', 1)->count();
        if($exists != 0){
            return back()->withInput()->withErrors(['nombre' => 'El nombre ya existe. Por favor elige otro']);
        }

        $array['duenio'] = $user;
        Producto::create($array);
        return redirect()->route('productos.index')->with('success', 'Producto creado con &eacute;xito');
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
        $producto = Producto::where('id', $id)->firstOrFail();
        return view('productos.create', ['producto' => $producto]);
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

        $actual = Producto::where('id', $id)->firstOrFail();

        $this->validate($request, [
            'nombre' => 'required|string',
            'unidad' => 'required|string',
            'precio' => 'required|numeric',
            'ieps' => 'boolean',
            'iva' => 'boolean',
        ]);

        $array = $request->all();

        if(!isset($array['ieps']))
            $array['ieps'] = 0;

        if(!isset($array['iva']))
            $array['iva'] = 0;
        

        $user = Auth::id();

        $exists = Producto::where('nombre', $request->nombre)->where('duenio', $user)->where('visible', 1)->where('id', '<>', $id)->count();
        if($exists != 0){
            return back()->withInput()->withErrors(['nombre' => 'El nombre ya existe. Por favor elige otro']);
        }

        if($actual->facturas()->count() == 0){
            // Protegemos el duenio contra modifcacion
            unset($array['duenio']);
            $actual->update($array);
        }
        else{
            $array['duenio'] = $user;
            $actual->update(['visible' => 0]);
            $actual->create($array);
        }

        return redirect()->route('productos.index')->with('success', 'Producto editado con &eacute;xito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actual = Producto::where('id', $id)->firstOrFail();
        if($actual->facturas()->count() == 0)
            $actual->delete();
        else{
            $actual->visible = 0;
            $actual->save();
        }
        return ['success' => true];
    }
}

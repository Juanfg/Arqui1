<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\CliSistema;
use App\Producto;
use App\Factura;
use App\Cliente;
use App\FacturaProducto;

class FacturasController extends Controller
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
        $id =  Auth::id();
        $facturas = CliSistema::where('id', $id)->first()->facturas();
        return view('facturas.index', ['facturas' => $facturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $productos = Producto::where('duenio', $id)->where('visible', 1)->get();
        $clientes = Cliente::where('duenio', $id)->where('visible', 1)->get();
        return view('facturas.create', ['productos'=>$productos, 'clientes'=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cliente' => 'required|int',
            'cantidad' => 'required|array|min:1',
            'descuento' => 'required|array|min:1',
            'producto' => 'required|array|min:1',
            'descuento.*' => 'required|numeric|between:0,100',
            'producto.*' => 'required|int',
            'cantidad.*' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return ["success" => false, "errors" => $validator->errors()];
        }

        // El resto de errores se dan cuando se manda informacion no valida. 
        $user = Auth::id();
        $cliente = Cliente::where('duenio', $user)->where('id', $request->cliente)->where('visible', 1)->first();

        if($cliente == null)
            return ["success" => false, "errors" => ['cliente'=>"No pudimos encontrar el cliente en la base."]];

        $productos = [];
        foreach ($request->producto as $value) {
            $actual = Producto::where('duenio', $user)->where('id', $value)->where('visible', 1)->first();
            if($actual == null)
                return ["success" => false, 
                    "errors" => ['producto'=>"No pudimos encontrar el producto en la base."]
                ];

            $productos[] = $actual;
        }

        $model = Factura::create([
            'duenio' => $user,
            'folio' => str_random(10),
            'certificado' => str_random(30),
            'fecha_creacion' => Carbon::now(),
            'sello_cfdi' => str_random(30),
            'sello_sat' => str_random(50),
            'complemento_sat' => str_random(50),
            'datos_cli' => Auth::user()->datos_facturacion()->id,
            'cliente' => $cliente->id,
        ]);

        foreach ($productos as $key => $value) {
            FacturaProducto::create([
                'factura'   => $model->id,
                'producto'  => $value->id,
                'cantidad'  => $request->cantidad[$key],
                'descuento' => $request->descuento[$key],
            ]);
        }

        // Creamos la factura

        return ["success" => true];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::where('duenio', Auth::id())->where('id', $id)->firstOrFail();

        return view('facturas.show', [
            'factura' => $factura,
            'cliente' => $factura->cliente(),
            'direccion_cliente' => $factura->cliente()->direccion(),
            'facturador' => $factura->facturador(),
            'direccion_facturador' => $factura->facturador()->direccion(),
            'productos' => []
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
        abort(400);
        $factura = Factura::where('duenio', Auth::id())->where('id', $id)->firstOrFail();
        $factura->cancelada = 1;
        $factura->save();
        return "cancelada con exito";
    }
}

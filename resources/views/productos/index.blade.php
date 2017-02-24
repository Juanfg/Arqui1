@extends('layouts.blank')

@section('title')
    Mis Productos
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Unidad</th>
                    <th>Precio</th>
                    <th>IVA</th>
                    <th>IEPS</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td class="center">{{ $producto->nombre }}</td>
                        <td class="center">{{ $producto->unidad }}</td>
                        <td class="center">{{ $producto->precio }}</td>
                        <td class="center">
                            @if ($producto->iva === 1)
                                SI
                            @else
                                NO
                            @endif
                        </td>
                        <td class="center">
                            @if ($producto->ieps === 1)
                                SI
                            @else
                                NO
                            @endif
                        </td>
                        <td class="col-xs-1 col-xs-offset-1">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div align="left">
            <button class="btn btn-success">Añadir Product</button>
        </div>
    </div>
@endsection
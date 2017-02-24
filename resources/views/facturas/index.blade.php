@extends('layouts.blank')

@section('title')
    Mis Facturas
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Facturado a</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($facturas as $factura)
                    <tr data-id="{{$factura->id}}">
                        <td class="center">{{ $factura->cliente()->razon_social }}</td>
                        <td class="center">{{ $factura->created_at }}</td>
                        <td class="center">{{ $factura->monto() }}</td>
                        <td class="col-xs-1 col-xs-offset-1">
                            <button class="btn btn-primary btn-xs mostrar"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-danger btn-xs borrar"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div align="left">
            <button class="btn btn-success" id="crear">Facturar</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/facturas.js') }}"></script>
@endpush
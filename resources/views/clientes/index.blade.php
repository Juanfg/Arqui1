@extends('layouts.blank')

@section('title')
    Mis Clientes
@endsection

@section('content')

@if (session('message'))
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
@endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Raz&oacute;n social</th>
                    <th>RFC</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clientes as $cliente)
                <tr data-id="{{$cliente->id}}">
                    <td class="center">{{ $cliente->razon_social }}</td>
                    <td class="center">{{ $cliente->rfc }}</td>
                    <td class="center">{{ $cliente->email }}</td>
                    <td class="col-xs-1 col-xs-offset-1">
                        <button class="btn btn-primary btn-xs editar"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btn-xs borrar"><i class="fa fa-trash-o "></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div align="left">
            <button class="btn btn-success" id="crear">Crear cliente</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/clientes.js') }}"></script>
@endpush
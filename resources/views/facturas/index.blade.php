@extends('layouts.blank')

@section('title')
    Mis Facturas
@endsection

@section('content')
    <div class="table-responsive">

        <div id="options"></div>

        <table class="table table-striped table-bordered table-hover" id="tabla-facturas">
            <thead>
                <tr>
                    <th>Facturado a</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Cancelada</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($facturas as $factura)
                    <tr data-id="{{$factura->id}}">
                        <td class="center">{{ $factura->cliente()->razon_social }}</td>
                        <td class="center">{{ $factura->fecha_creacion }}</td>
                        <td class="center">$ {{ number_format($factura->monto(), 2, '.', ' ') }}</td>
                        <td class="center cancelada">{{ $factura->cancelada ? "Si" : "No" }}</td>
                        <td class="col-xs-1 col-xs-offset-1">
                            <button class="btn btn-primary btn-xs mostrar"><i class="fa fa-eye"></i></button>
                            @if(!$factura->cancelada)
                            <button class="btn btn-danger btn-xs borrar"><i class="fa fa-trash-o"></i></button>
                            @endif
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
    <script type="text/javascript" src="/js/datatables.min.js"></script>
    <script src="{{ asset('js/facturas.js') }}"></script>
    <script type="text/javascript">

        function createDataTable(){
            var table = $('#tabla-facturas').DataTable({
                dom: "<'options'B><'col-sm-6'l><'col-sm-6'fr><'col-sm-12't><'col-sm-6'i><'col-sm-6'p>",
                buttons: [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'copyHtml5'
                ],
                "language": {
                    "url": "/js/data_tables_spanish.json"
                },
            });

            var buttons = table.buttons().container();
            $('#options').append( buttons );
        }

        createDataTable();
        
    </script>
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="/css/datatables.css"/>
@endpush
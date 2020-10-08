@extends('layouts.app')
@section('title','Orden de compra')
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Dasboard</h2>
            </div>
            <div class="panel-body">
                <h3 class="text-center">Estadicticas</h3>
                <div class="row top-space">
                    <div class="col-xs-4 col-md-3 col-lg-2" style="border-right: solid 1px #222">
                        <span style="display: block; font-size:2.2em;color:#3f51b5;" >{{$totalMonth}} USD</span> Ingresos del mes
                    </div>
                    <div class="col-xs-4 col-md-3 col-lg-2">
                        <span style="display: block; font-size:2.2em;color:#3f51b5;">{{$totalMonthCount}}</span> Número de ventas
                    </div>
                </div>
                <h3 class="text-center">Ventas</h3>
                <table class="table table-bordered">
                    <thead>
                        <td>ID Venta</td>
                        <td>Comprador</td>
                        <td>Dirección</td>
                        <td>No. Guía</td>
                        <td>Status</td>
                        <td>Fecha de venta</td>
                        <td>Acciones</td>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order )
                            <tr>
                                <td>{{$order->id }}</td>
                                <td>{{$order->recipient_name}}</td>
                                <td>{{$order->address()}}</td>
                                <td><a href="#" 
                                        data-type="text"
                                        data-pk="{{$order->id}}"
                                        data-url="{{url("/orders/$order->id")}}"
                                        data-title='Número de guía'
                                        data-value="{{$order->guide_number}}"
                                        class="set-guide-number"
                                        data-name="guide_number"></a>
                                </td>
                                <td><a href="#" 
                                    data-type="select"
                                    data-pk="{{$order->id}}"
                                    data-url="{{url("/orders/$order->id")}}"
                                    data-title="Número de guía"
                                    data-value="{{$order->status}}"
                                    class="select-status"
                                    data-name="status"></a>
                                </td>
                                <td>{{$order->created_at}}</td>
                                <td>Acciones</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
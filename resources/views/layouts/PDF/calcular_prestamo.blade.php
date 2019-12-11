@extends('layouts.PDF.master')

@section('title')
    Ventas
@endsection

@section('folio')
{{$data[0]->id}}
@endsection

@section('reference')
{{$data[0]->nombre . ' ' .$data[0]->ap_paterno.' '.$data[0]->ap_materno}}
@endsection

@section('content')
<div style="width:100%; margin-top:20px">
    <hr>
    <div style="display:table">
        <div style="display:table-row">
            <div style="display:table-cell;">
                Fecha: {{date('d-m-Y')}}<br>
                Nombre: {{$data[0]->nombre . ' ' .$data[0]->ap_paterno.' '.$data[0]->ap_materno}}<br>
                Dirección: {{$data[0]->direccion->calle.', '.$data[0]->direccion->ciudad . ' ' .$data[0]->direccion->estado}}<br>
                RFC: {{$data[0]->rfc}}<br>
            </div>
        </div>
    </div>
    <hr>
</div>
<div style="width:100%;margin-top:20px;">
    <table style="width:100%;text-align:center">
        <thead>
            <tr style="text-transform:uppercase;">
                <th>Folio</th>
                <th>Fecha para pago</th>
                <th>Años a pagar</th>
                <th>Interes</th>
                <th>Monto</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($data as $dato)
            @php
                $total += (($dato->prestamo->monto * ($dato->prestamo->interes / 100) *$dato->prestamo->tiempo_anios ) + $dato->prestamo->monto)
            @endphp
                <tr>
                    <td>{{$dato->prestamo->id}}</td>
                    <td>{{$dato->prestamo->fecha_pago}}</td>
                    <td>{{$dato->prestamo->tiempo_anios}}</td>
                    <td>{{$dato->prestamo->interes."%"}}</td>
                    <td>{{$dato->prestamo->monto}}</td>
                    <td>{{'$'.(($dato->prestamo->monto * ($dato->prestamo->interes / 100) *$dato->prestamo->tiempo_anios ) + $dato->prestamo->monto)}}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr>
<div style="width:96%;margin-top:20px;">
    <div style="float:right">
        <strong style="text-transform:uppercase">Total a pagar:</strong> ${{$total}}
    </div>
</div>
@endsection
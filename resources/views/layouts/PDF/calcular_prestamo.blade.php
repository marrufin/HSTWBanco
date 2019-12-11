@extends('layouts.PDF.master')

@section('title')
    Ventas
@endsection

@section('folio')
 
@endsection

@section('reference')

@endsection

@section('content')
<div style="width:100%; margin-top:20px">
    <hr>
    <div style="display:table">
        <div style="display:table-row">
            <div style="display:table-cell;">
                Fecha: <br>
                Nombre: <br>
                Dirección: <br>
                Teléfono: <br>
            </div>
            <div style="display:table-cell;padding-left:10px">
                Koala <br>
                Hola <br>
                Montes <br>
                Montes
            </div>
        </div>
    </div>
    <hr>
</div>
<div style="width:100%;margin-top:20px;">
    <table style="width:100%;text-align:center">
        <thead>
            <tr style="text-transform:uppercase;">
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Costo</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dato)
                <tr>
                    <td>mONTES</td>
                    <td>gILIPOLLAS</td>
                    <td>aCZINO</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr>
<div style="width:96%;margin-top:20px;">
    <div style="float:right">
        <strong style="text-transform:uppercase">Total a pagar:</strong> 9000
    </div>
</div>
@endsection
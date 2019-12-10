@extends('layouts.panel')

@section('content-menu')
    @if(Auth::check())
    
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/panel/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->username}}</p> 
                <p><i class="fa fa-circle text-success"></i> Online</p>
            </div>
        </div>

        {{-- sidebar menu: : style can be found in sidebar.less --}}
        <ul class="sidebar-menu" data-widget="tree" id="wrapper-aside">
            <li class="header">Menú Principal</li>
    
            <li>
                <a href="/">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            @php
                $roleUser = \Auth::user()->username
            @endphp
            <li>
                <a href="/{{$roleUser}}/clientes">
                    <i class="fa fa-users"></i>
                    <span>Gestionar Clientes</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Calcular Préstamos</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bank"></i>
                    <span>Verificar Buró</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span>Reportes</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>Asignar Préstamos</span>
                </a>
            </li>
            <li>
                <a href="/{{$roleUser}}/tarjetas">
                    <i class="fa fa-credit-card"></i>
                    <span>Tarjetas de crédito</span>
                </a>
            </li>
            <li>
                <a href="/{{$roleUser}}/cobranza">
                    <i class="fa fa-money"></i>
                    <span>Área de Cobranza</span>
                </a>
            </li>
        </ul>
    @endif
@endsection


@section('content')
    <dashboard-component></dashboard-component>
@endsection

@section('js')

@endsection
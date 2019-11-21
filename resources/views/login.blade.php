<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Proyect') }}</title>
        
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="{{ mix('/panel.css') }}" >
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('/panel/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/panel/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('/panel/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        {{-- <link rel="stylesheet" href="{{ asset('/panel/dist/css/AdminLTE.min.css') }}"> --}}
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('/panel/plugins/iCheck/square/blue.css') }}">
    </head>
    <body id="slider">
        <div id="app">
            <main class="py-4">
                <div style="position:absolute;left:50%;top:50%;transform:translate(-50%, -50%)">
                    <div class="login-box">
                        <div class="login-logo" style="margin-bottom:5;">
                            <img src="/panel/plugins/vegas/img/logo3.png" width="200px">
                            
                        </div>
                        <!-- /.login-logo -->
                        <div class="login-box-body">
                            <p class="login-box-msg">Ingresa los datos para iniciar sesión</p>
                
                            <form id="form-login" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group has-feedback">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Usuario">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                                <div class="form-group has-feedback">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" >
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-md-8">
                
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-block btn-flat" style="background-color: #3b83bd">{{ __('Iniciar Sesión') }}</button>    
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                        <!-- /.login-box-body -->
                        @if (session('status'))
                            <div class="alert" style="background-color: #3b83bd;color:white;font-size:2em;text-align:center" role="alert">
                                {{session('status')}}
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>    
    </body>
        
    <script src="{{ mix('/panel.js') }}"></script>

    @yield('js')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });

            $("#slider, body").vegas({
                slides: [
                    { src: "/panel/plugins/vegas/img/wallpaper1.jpg" },
                    { src: "/panel/plugins/vegas/img/wallpaper2.jpg" },
                    { src: "/panel/plugins/vegas/img/wallpaper3.png" },
                ],
                overlay: '/panel/plugins/vegas/img/08.png'
            });

        });
    </script>
</html>

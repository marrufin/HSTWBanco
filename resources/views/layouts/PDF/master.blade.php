<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <div style="display:table;">
        <div style="display:table-row">
            <div style="display:table-cell">
                <img style="margin:0;padding:0;" src="panel/plugins/vegas/img/logo3.png" width="200px" alt="">
            </div>
        </div>
        <div style="display:table-row">
            <div style="display:table-cell">
                 <br>
                Banco HSTW <br>
                Universidad Tecnologica de Torreón <br>
                Torreón Coahuila, México <br>
                N°: @yield('folio')<br>
                Ref: @yield('reference')<br>
                Calculo de préstamos<br>
            </div>
        </div>
    </div>
    @yield('content')
</body>
</html>
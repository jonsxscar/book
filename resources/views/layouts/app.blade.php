<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Aplicación</title>
    <!-- Aquí puedes incluir tus hojas de estilo CSS -->
    @stack('styles') <!-- Agrega esta línea -->
</head>

<body style="background-color: #212129;">
    <div class="container">
        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
    <!-- Aquí puedes incluir tus scripts de JavaScript -->
</body>

</html>

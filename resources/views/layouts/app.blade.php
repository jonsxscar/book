<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Aplicación</title>
    <!-- Aquí puedes incluir tus hojas de estilo CSS -->
    @stack('styles') <!-- Agrega esta línea -->
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- Aquí puedes incluir tus scripts de JavaScript -->
</body>

</html>

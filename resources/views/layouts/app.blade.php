<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Aplicación</title>
    <!-- Aquí puedes incluir tus hojas de estilo CSS -->
    @stack('styles') <!-- Agrega esta línea -->
    <style>
        #message {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 49%;
            bottom: 30px;
            font-size: 17px;
            opacity: 0;
            transition: opacity 0.6s;
        }

        #message.show {
            visibility: visible;
            opacity: 1;
            transition: opacity 0.6s;
        }
    </style>
</head>

<body style="background-color: #212129;">
    <div class="container">
        @yield('content')
    </div>

    <!-- Notificación para los mensajes de éxito y error -->
    <div id="message">{{ session('success') ?? session('error') }}</div>

    <!-- Aquí puedes incluir tus scripts de JavaScript -->
    <script>
        window.onload = function() {
            var message = document.getElementById('message');
            if (message.innerHTML.trim() !== '') {
                message.className = 'show';
                setTimeout(function(){ message.className = message.className.replace('show', ''); }, 3000);
            }
        };
    </script>
</body>

</html>

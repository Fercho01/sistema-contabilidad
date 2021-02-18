<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

    <div class="section">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="title">
                <h2>Bienvenido</h2>
            </div>
            <div class="line"></div>
            <div class="imputs">
                <div class="user">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div class="pass">
                    <div class="icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required autocomplete="current-password">
                </div>

                <div class="btn-entrar">
                    <button type="submit">Entrar</button>
                </div>
                <a href="{{ route('register') }}" style="margin: 10px;display: block; color: #fff;text-align: center;text-decoration: none">Crear Cuenta <i class="fas fa-user-plus"></i></a>
            </div>
        </form>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</body>
</html>

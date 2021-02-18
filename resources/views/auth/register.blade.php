<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    <div class="section">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="title">
                <h2>Registrar</h2>
            </div>
            <div class="line"></div>
            <div class="imputs">
                <div class="user">
                    <div class="icon">
                        <i class="far fa-building"></i>
                    </div>
                    <input id="namee" type="name" name="namee" placeholder="Nombre de la empresa" value="{{ old('namee') }}" required autocomplete="namee" autofocus>
                </div>
                {{-- Carnet Identidad --}}
                <div class="user">
                    <div class="icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <input id="ci" type="number" name="ci" placeholder="Carnet Identidad" value="{{ old('ci') }}" required autocomplete="ci">
                </div>

                {{-- Nombre --}}
                <div class="user">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input id="name" type="text" name="name" placeholder="Nombre..." value="{{ old('name') }}" required autocomplete="name">
                </div>
                {{-- Email --}}
                <div class="user">
                    <div class="icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>


                <div class="user">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input id="password" type="password" placeholder="Contraseña" name="password" required autocomplete="new-password">
                </div>

                <div class="pass">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input id="password-confirm" type="password" placeholder="Confirmar Contraseña" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="btn-entrar">
                    <button type="submit">Crear Cuenta</button>
                </div>
                <a href="{{ url('/') }}" style="margin: 7px;display: block; color: #fff;text-align: center;text-decoration: none">Tienes Cuenta? <i class="fas fa-sign-in-alt"></i></a>
            </div>
        </form>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</body>
</html>

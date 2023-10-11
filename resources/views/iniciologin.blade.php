<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/iniciologin.css') }}">
</head>

<body>
    <div class="container">
        <span></span>
        <span></span>
        <span></span>

        <!-- Inicio de Sesión -->
        <form id="signinform" action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Iniciar sesión</h2>
            <div class="inputBox">
                <input type="text" placeholder="Correo Electrónico" name="email">
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Contraseña" name="password">
            </div>
            <div class="inputBox">
                <button type="submit">Iniciar sesión</button>
            </div>
            <div class="inputBox">
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                <a href="#" id="signup">Regístrate</a>
            </div>

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </form>

        <!-- Registro -->
        <form id="signupform" action="{{ route('register') }}" method="POST">
            @csrf
            <h2>Regístrate</h2>
            <div class="inputBox">
                <input type="text" placeholder="Nombre de usuario" name="name">
            </div>
            <div class="inputBox">
                <input type="email" placeholder="Correo electrónico" name="email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Crear contraseña" name="password">
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Confirmar contraseña" name="password_confirmation">
            </div>
            <div class="inputBox">
                <button type="submit">Registrar cuenta</button>
            </div>
            <div class="inputBox group">
                <a href="#" id="signin">¿Ya tienes una cuenta? Iniciar sesión</a>
            </div>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </form>
    </div>

    <script>
        let signup = document.getElementById('signup');
        let signin = document.getElementById('signin');
        let body = document.querySelector('body');
        signup.onclick = function() {
            body.classList.add('signup');
        }
        signin.onclick = function() {
            body.classList.remove('signup');
        }
    </script>
</body>

</html>

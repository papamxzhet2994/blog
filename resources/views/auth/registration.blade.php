<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;

        }

        label {
            display: block;
            margin-bottom: 20px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        button[type="submit"] {
            width: 50%;
            padding: 10px;
            background-color: #800080;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin: 0 auto;
            display: block;
        }

        button[type="submit"]:hover {
            background-color: #6a0080;
        }

        .error {
            color: #ff0000;
            margin-top: 5px;
        }

        .link-to-login {
            margin-top: 20px;
            text-align: center;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .link-to-login a {
            text-decoration: none;
            color: #800080;
        }

        .link-to-login a:hover {
            text-decoration: underline;
            color: #6a0080;
        }
    </style>
</head>
<body>
@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}></p>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('registration.create') }}" method="post">
    <h1>Регистрация</h1>
    @csrf
    <label for="last_name">
        Фамилия
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
    </label>
    <label for="first_name">
        Имя
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
    </label>
    <label for="nickname">
        Nickname
        <input type="text" name="nickname" id="nickname" value="{{ old('nickname') }}">
    </label>
    <label for="email">
        Почта
        <input type="email" name="email" id="email" value="{{ old('email') }}">
    </label>
    <label for="password">
        Пароль
        <input type="password" name="password" id="password">
    </label>
    <label for="password_confirmation">
        Подтвердите пароль
        <input type="password" name="password_confirmation" id="password_confirmation">
    </label>
    <button type="submit">Зарегистрироваться</button>

    <div class="link-to-login">
        <p>Уже есть аккаунт?<a href="/login"> Войти</a></p>
    </div>
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
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
            height: auto;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #800080;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 50%;
        }

        button[type="submit"]:hover {
            background-color: #6a0080;
        }

        .link-to-register {
            margin-top: 20px;
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .link-to-register a {
            color: #800080;
            text-decoration: none;
            transition: text-decoration 0.3s ease;
        }

        .link-to-register a:hover {
            text-decoration: underline;
            color: #6a0080;
        }
    </style>
</head>
<body>
<form action="{{ route('auth') }}" method="post">
    <h1>Авторизация</h1>
    @csrf
    <label for="email">
        Почта
        <input type="email" name="email" id="email" placeholder="Введите свою почту">
    </label>
    <label for="password">
        Пароль
        <input type="password" name="password" id="password" placeholder="Введите свой пароль">
    </label>
    <button type="submit">Войти</button>

    <div class="link-to-register">
        <p>Нет аккаунта?<a href="/registration"> Зарегистрироваться</a></p>
    </div>
</form>
</body>
</html>

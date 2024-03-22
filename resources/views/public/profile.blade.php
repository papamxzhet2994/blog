<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ auth()->user()->nickname }}</title>
    <script src="https://kit.fontawesome.com/ac5a05e218.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f5f5fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile {
            padding: 20px;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            background-color: #ccc;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: auto;
        }

        .username {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .email {
            color: #666;
            margin-bottom: 20px;
        }

        .links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .link-item {
            margin-right: 20px;
        }

        a i {
            margin-right: 5px;
        }

        a {
            color: #800080;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #6a0080;
        }

        a.back {
            display: inline-block;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
{{--<a href="{{ route('home') }}" class="back"><i class="fas fa-arrow-left"></i> Назад</a>--}}
<div class="container">
    <div class="profile">
        <div class="avatar">
            <img src="https://via.placeholder.com/120" alt="Avatar">
        </div>
        <div class="username">{{ auth()->user()->nickname }}</div>
        <div class="email">{{ auth()->user()->email }}</div>
        <div class="registration-date">
            <p>Дата регистрации: {{ auth()->user()->created_at->format('d.m.Y') }}</p>
        </div>
        <div class="links">
            <div class="link-item">
                <a href="/posts"><i class="fas fa-newspaper"></i> Посмотреть посты</a>
            </div>
            <div class="link-item">
{{--                <a href="{{ route('profile.update', auth()->user()) }}"><i class="fas fa-edit"></i> Редактировать профиль</a>--}}
            </div>
            <div class="link-item">
                <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Выход из аккаунта</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

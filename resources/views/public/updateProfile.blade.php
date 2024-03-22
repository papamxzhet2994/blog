<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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

        .edit-profile-form {
            text-align: left;
            margin-top: 20px;
        }

        .edit-profile-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .edit-profile-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 20px;
            background-color: #800080;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background-color: #6a0080;
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

        input[type="text"], input[type="password"], input[type="email"], textarea {
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }


    </style>
</head>
<body>
    <i class="fas fa-arrow-left"><a href="{{ route('profile', ['user' => $user->id]) }}" class="back">Назад</a></i>
    <div class="container">
    <h1>Редактирование профиля</h1>
    <div class="edit-profile-form">
        <form action="{{ route('profile.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nickname">Новый никнейм:</label><br>
            <input type="text" id="nickname" name="nickname" value="{{ auth()->user()->nickname }}"><br>
            <label for="email">Новый Email:</label><br>
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"><br>
            <label for="password">Новый пароль:</label><br>
            <input type="password" id="password" name="password"><br>
            <label for="password_confirmation">Подтвердите новый пароль:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation"><br>
            <button type="submit" class="btn">Сохранить изменения</button>
        </form>
    </div>
</div>
</body>
</html>

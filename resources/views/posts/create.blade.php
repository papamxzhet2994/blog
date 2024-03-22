<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание поста</title>
    <script src="https://kit.fontawesome.com/ac5a05e218.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f5f5fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        button {
            padding: 10px 20px;
            background-color: #800080;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #6a0080;
        }

        a {
            color: #800080;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 16px;
        }

        a:hover {
            color: #6a0080;
        }

        .fa-arrow-left {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<a href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i>Назад</a>
<div class="container">
    <h1>Создание поста</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="text" id="user_id" name="user_id" class="form-control" value="{{ $user_id }}" hidden="hidden">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
</body>
</html>

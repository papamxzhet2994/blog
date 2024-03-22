<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
    <script src="https://kit.fontawesome.com/ac5a05e218.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f2f2f2;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-top: 50px;
            text-align: center;
            margin-bottom: 20px;
        }

        .home {
            text-align: center;
            padding: 20px;
        }

        .post-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
            padding: 0;
        }

        .post-item {
            width: 300px;
            margin: 10px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: left;
            position: relative; /* Добавляем позиционирование */
        }

        .post-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .post-item p {
            font-size: 16px;
            margin-bottom: 15px;
            word-break: break-word;
        }

        .post-item strong {
            font-size: 18px;
            color: #800080;
        }

        .post-item time {
            font-size: 14px;
            color: #666;
            display: block;
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
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #6a0080;
        }

        .like-count {
            display: flex;
            flex-direction: row;
            margin-top: 10px;
        }

        .like-count i {
            margin-right: 5px;
            color: #800080;
            font-size: 24px;
            vertical-align: middle;
        }

        .like-count p {
            padding: 0;
            display: inline;
            font-size: 12px;
            vertical-align: middle;
            margin: 0 0 0 5px;
        }

        hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        /*.post-data {*/
        /*    position: absolute;*/
        /*    bottom: 20px; !* Указываем желаемый отступ снизу *!*/
        /*    left: 20px; !* Указываем желаемый отступ слева *!*/
        /*    width: calc(100% - 40px); !* Занимаем всю ширину карточки с учетом отступов *!*/
        /*    display: flex;*/
        /*    justify-content: space-between;*/
        /*    align-items: center;*/
        /*    margin: auto;*/
        /*}*/
    </style>
</head>
<body>
@extends('layouts.app')
@section('content')
<h1>Добро пожаловать на наш блог!</h1>
<section class="home">
    <p>Посмотрите недавние посты:</p>
    <div class="post-list">
        @if(isset($posts))
            @foreach ($posts as $post)
                <div class="post-item">
                    <h3>{{ $post->title }}</h3>
                    <time>{{ $post->created_at }}</time>
                    <hr>
                    <p>{{ $post->description }}</p>
                    {{--                    <div class="post-data">--}}
                    {{--                        <strong>{{ $post->user->nickname }}</strong>--}}
                    {{--                        <div class="like-count">--}}
                    {{--                            <i class="fas fa-heart">--}}
                    {{--                                <p>{{ $post->likes->count() }}</p>--}}
                    {{--                            </i>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            @endforeach
        @else
            <p>Нет постов</p>
        @endif
    </div>
    <a href="{{ route('posts.index') }}" class="btn">Все посты</a>
</section>
@endsection
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Посты</title>
    <script src="https://kit.fontawesome.com/ac5a05e218.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;

        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .post {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-bottom: 20px;
        }

        .post h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .post p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .post strong {
            font-size: 18px;
            color: #800080;
        }

        .post time {
            font-size: 14px;
            color: #666;
            display: block;
        }

        .post:last-child {
            margin-bottom: 0;
        }

        .like-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #ccc;
            transition: color 0.3s ease;
        }

        .like-button:focus {
            outline: none;
        }

        .like-button:hover {
            color: #800080;
        }

        .like-button.liked {
            color: #800080;
        }

        .like-button p {
            padding: 0;
            display: inline;
            font-size: 12px;
            vertical-align: middle;
            margin: 0 0 0 5px;
        }

        .comments {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-bottom: 20px;
        }

        .comments h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .comments p {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .comment {
            background-color: #f2f2f2;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;

        }

        .toggle-comments {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #ccc;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .toggle-comments:focus {
            outline: none;
        }

        .toggle-comments:hover {
            color: #800080;
        }

        .comment-count {
            padding: 0;
            display: inline;
            font-size: 14px;
            vertical-align: middle;
            margin: 0 0 0 10px;
        }

        form {
            margin-top: 10px;
        }

        form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            resize: none;
            margin-bottom: 10px;
        }

        form button {
            background-color: #800080;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #fff;
            padding: 10px;
        }

        .comment-header {
            position: relative;
        }

        .comment-options-container {
            position: absolute;
            top: 5px;
            right: 5px;
        }

        .comment-options-container i {
            color: #999;
            font-size: 18px;
            cursor: pointer;
            background-color: #d9dbdc;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .comment-options-container i:hover {
            background-color: #ccc;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 120px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: 100%; /* Располагаем меню под иконкой */
            right: 0; /* Располагаем меню справа */
        }

        .dropdown-content form {
            margin: 0;
            padding: 0;
        }

        .delete-button {
            background-color: transparent;
            border: none;
            color: #333;
            padding: 8px 12px;
            cursor: pointer;
            display: block;
            width: 100%;
            text-align: left;
            transition: background-color 0.3s ease;
        }

        .delete-button:hover {
            background-color: #f2f2f2;
        }

        .post-options-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .post-options-container i {
            color: #999;
            font-size: 18px;
            cursor: pointer;
            background-color: #d9dbdc;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .post-options-container i:hover {
            background-color: #ccc;
        }

        .post-header {
            position: relative;
        }

        .dropdown-content-container {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 120px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: 100%;
            right: 0;
        }

        .edit-button {
            background-color: transparent;
            border: none;
            color: #333;
            padding: 8px 12px;
            cursor: pointer;
            display: block;
            width: 100%;
            text-align: left;
            transition: background-color 0.3s ease;
        }

        .edit-button:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
@extends('layouts.app')
@section('content')
@foreach ($posts as $post)
    <div class="container">
        <div class="post" data-post="{{ $post->id }}">
            <div class="post-header">
                <div class="post-options-container">
                    <i class="fas fa-ellipsis-v"></i>
                    <div class="dropdown-content-container">
                        @if(auth()->check() && $post->user_id == auth()->user()->id)
                            <form action="{{ route('posts.edit', $post) }}" method="GET">
                                @csrf
                                <button type="submit" class="edit-button">Редактировать</button>
                            </form>
                            <form action="{{ url('indev') }}" method="GET">
                                @csrf
                                {{--                                @method('DELETE')--}}
                                <button type="submit" class="delete-button">Удалить</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
            <strong>{{ $post->user->nickname }}</strong>
            <div class="comments" style="display: none;">
                <h3>Комментарии</h3>
                @if ($post->comments)
                    @foreach ($post->comments as $comment)
                        <div class="comment">
                            <div class="comment-header">
                                <div class="comment-options-container">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <div class="dropdown-content">
                                        @if(auth()->check() && $comment->user_id == auth()->user()->id)
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-button">Удалить</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <strong>{{ $comment->user->nickname }}</strong>
                            </div>
                            <div class="comment-body">
                                <p>{{ $comment->content }}</p>
                                <time>{{ $comment->created_at }}</time>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Нет комментариев</p>
                @endif
                @auth
                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        <textarea name="content" rows="3" placeholder="Введите ваш комментарий"></textarea>
                        <button type="submit">Добавить комментарий</button>
                    </form>
                @else
                    <p>Чтобы добавить комментарий, пожалуйста, <a href="{{ route('login') }}">войдите</a>.</p>
                @endauth
            </div>
            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST" style="display: none;">
                    @csrf
                    <textarea name="content" rows="3" placeholder="Введите ваш комментарий"></textarea>
                    <button type="submit">Добавить комментарий</button>
                </form>
            @endauth
            @auth
                @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('posts.like', $post) }}" method="POST">
                        @csrf
                        <button type="submit" class="like-button" data-post="{{ $post->id }}"><i class="fas fa-heart">
                                <p>{{ $post->likes()->count() }}</p></i></button>
                    </form>
                @else
                    <form action="{{ route('posts.unlike', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="like-button liked" data-post="{{ $post->id }}"><i
                                    class="fas fa-heart"><p>{{ $post->likes()->count() }}</p></i></button>
                    </form>
                @endif
            @endauth
            <button class="toggle-comments" data-post="{{ $post->id }}"><i class="fa-solid fa-comment"></i><span
                        class="comment-count">{{ $post->comments->count() }}</span></button>
        </div>
    </div>

@endforeach

<script>
    document.querySelectorAll('.toggle-comments').forEach(button => {
        button.addEventListener('click', function () {
            const postId = this.getAttribute('data-post');
            const commentsSection = document.querySelector(`.post[data-post="${postId}"] .comments`);
            const commentForm = document.querySelector(`.post[data-post="${postId}"] form`);

            if (commentsSection.style.display === 'none') {
                commentsSection.style.display = 'block';
                commentForm.style.display = 'block';
                this.innerHTML = '<i class="fa-solid fa-comment"></i><span class="comment-count">' + this.querySelector('.comment-count').innerText + '</span>';
            } else {
                commentsSection.style.display = 'none';
                commentForm.style.display = 'none';
                this.innerHTML = '<i class="fa-solid fa-comment"></i><span class="comment-count">' + this.querySelector('.comment-count').innerText + '</span>';
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const commentOptionsContainers = document.querySelectorAll(".comment-options-container");
        commentOptionsContainers.forEach(container => {
            const dropdownContent = container.querySelector(".dropdown-content");
            const threeDotsIcon = container.querySelector("i");
            threeDotsIcon.addEventListener("click", function (event) {
                event.stopPropagation();
                dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
            });
        });

        const postOptionsContainers = document.querySelectorAll(".post-options-container");
        postOptionsContainers.forEach(container => {
            const dropdownContent = container.querySelector(".dropdown-content-container");
            const threeDotsIcon = container.querySelector("i");
            threeDotsIcon.addEventListener("click", function (event) {
                event.stopPropagation();
                dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
            });
        });

        document.addEventListener("click", function (event) {
            commentOptionsContainers.forEach(container => {
                const dropdownContent = container.querySelector(".dropdown-content");
                if (!container.contains(event.target)) {
                    dropdownContent.style.display = "none";
                }
            });
            postOptionsContainers.forEach(container => {
                const dropdownContent = container.querySelector(".dropdown-content-container");
                if (!container.contains(event.target)) {
                    dropdownContent.style.display = "none";
                }
            });
        });
    });


</script>
@endsection
</body>
</html>

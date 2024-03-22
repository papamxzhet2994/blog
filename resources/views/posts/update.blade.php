<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    form {
        margin-top: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    textarea {
        resize: vertical;
    }

    button[type="submit"] {
        background-color: #800080;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #6a006a;
    }

    a {
        display: inline-block;
        margin-bottom: 20px;
        color: #800080;
        text-decoration: none;
    }

    a i {
        margin-right: 5px;
    }
</style>


<script src="https://kit.fontawesome.com/ac5a05e218.js" crossorigin="anonymous"></script>
<a href="{{ route('posts.index') }}"><i class="fas fa-arrow-left"></i>Назад</a>

<h1>Редактирование поста</h1>
<section class="container">
<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title" class="form-label">
        Заголовок
        <input type="text" name="title" value="{{ $post->title }}">
    </label>
    <label for="description" class="form-label">
        Описание
        <textarea name="description" rows="5">{{ $post->description }}</textarea>
    </label>
    <button type="submit">Сохранить</button>
</form>
</section>

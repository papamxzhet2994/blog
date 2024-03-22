<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .navbar {
        background-color: #800080;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 60px;
    }

    .navbar-brand {
        font-size: 24px;
        font-weight: bold;
        margin-left: 20px;
        text-decoration: none;
        color: white;
    }

    .container-header {
        width: 80%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-nav {
        list-style: none;
        display: flex;
    }

    .nav-item {
        margin-right: 20px;
    }

    .nav-link {
        text-decoration: none;
        color: white;
        font-size: 18px;
    }

    .nav-link:hover {
        color: #f0f0f0;
    }

    h4 {
        margin-right: 20px;
    }

    .nav {
        list-style: none;
        display: flex;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info h4 {
        border: 2px solid white;
        padding: 5px;
        border-radius: 10px;
    }

    .user-info ul {
        margin-left: 10px;
    }

    .nav-link {
        border-bottom: 2px solid transparent;
    }

    .nav-link:hover {
        border-bottom: 2px solid white;
    }
</style>
<header>
    <nav class="navbar">
        <div class="container-header">
            <a class="navbar-brand" href="/">Blog</a>
            @if (auth()->check())
                <div class="user-info">
                    <h4>{{ auth()->user()->nickname }}</h4>
                    <ul class="header-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Профиль</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.create') }}">Создать пост</a>
                        </li>
                    </ul>
                </div>
            @else
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registration') }}">Зарегистрироваться</a>
                    </li>
                </ul>
            @endif
        </div>
    </nav>
</header>

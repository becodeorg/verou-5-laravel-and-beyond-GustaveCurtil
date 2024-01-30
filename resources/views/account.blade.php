<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>FUfbCK</title>
</head>
<body>
    @auth
    <header>
        <h1><a href="/">FUfbCK</a></h1>
        <a href="/account">Account</a>
    </header>
    <main>
        <a href="/create-event">Create an event</a>
        <h2>Your events</h2>
        @foreach ($events as $event)
            <p>{{$event['title']}}</p>
        @endforeach
    </main>
    <footer>
        <form action="/account/logout" method="post">
            @csrf
            <button>Log out</button>
        </form>
    </footer>

    @else

    <header>
        <h1><a href="/">FUfbCK</a></h1>
    </header>
    <main>
        <h2>Login</h2>
        <form action="/account/login" method="post">
            @csrf
            <label for="name">Username</label>
            <input type="text" name="name" id="name" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <button>Login</button>
        </form>
        <h2>Create account - it's free and always will be!</h2>
        <form action="/account/create" method="post">
            @csrf
            <label for="name">Username</label>
            <input type="text" name="name" id="name" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <label for="password-check">Password Check</label>        
            <input type="password" name="password-check" id="password-check" required>
            <button>Create account</button>
        </form>
    </main>

        @endauth

</body>
</html>
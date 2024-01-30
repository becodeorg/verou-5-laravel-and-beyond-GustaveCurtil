<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <h1><a href="/">FUfbCK</a></h1>
    </header>
    <main>
        <form action="/login" method="post">
            <label for="name"></label>
            <input type="text" name="name" id="name" required>
            <label for="password"></label>
            <input type="password" name="password" id="password" required>
            <button>Log in</button>
        </form>
    
        <form action="/register" method="post">
            <label for="name"></label>
            <input type="text" name="name" id="name" required>
            <label for="password"></label>
            <input type="password" name="password" id="password" required>
            <input type="password" name="password2" id="password" required>
            <button>Log in</button>
        </form>
    </main>
</body>
</html>
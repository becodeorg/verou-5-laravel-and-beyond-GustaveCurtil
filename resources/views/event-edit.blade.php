<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Intentionz</title>
</head>
<body>
    <header>
        <h1><a href="/">Intentionz</a></h1>
        <a href="/account">Account</a>
    </header>
    <main>
        <h2>Edit event</h2>
        <form action="/account/edit-event/{{$event->id}}" method="post">
            @csrf
            @method('PUT')
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{$event->date}}" required>
            <label for="time">Time</label>
            <input type="time" name="time" id="time" value="{{$event->time}}" required>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{$event->title}}" required>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{$event->description}}" required>
            <button>Save changes</button>
        </form>
    </main>
    <footer>
        <form action="/account/logout" method="post">
            @csrf
            <button>Log out</button>
        </form>
    </footer>
</body>
</html>
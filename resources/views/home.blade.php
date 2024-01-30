<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <title>Intentionz</title>
    </head>
    <body>
        <header>
            <h1><a href="/">Intentionz</a></h1>
            <a href="/account">Account</a>
        </header>
        <main>
            <a href="/create-event">Create an event</a>
            <ul>
                @foreach ($events as $event)
                    <li>
                        <strong>Date:</strong> {{ $event->date ?? 'N/A' }}<br>
                        <strong>Time:</strong> {{ $event->time ?? 'N/A' }}<br>
                        <strong>Title:</strong> {{ $event->title }} by {{$event->user->name}}<br>
                        <strong>Description:</strong> {{ $event->description }}<br>
                        <hr>
                    </li>
                @endforeach
            </ul>
        </main>
        @auth
        <footer>
            <form action="/account/logout" method="post">
                @csrf
                <button>Log out</button>
            </form> 
        </footer> 
        @endauth
    </body>
</html>

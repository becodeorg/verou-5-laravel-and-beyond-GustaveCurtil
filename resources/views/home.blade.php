<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FUfbCK</title>
    </head>
    <body>
        <header>
            <h1><a href="/">FUfbCK</a></h1>
            <a href="/account">Account</a>
        </header>
        <main>
            <ul>
                @foreach ($events as $event)
                    <li>
                        <strong>Date:</strong> {{ $event->date ?? 'N/A' }}<br>
                        <strong>Time:</strong> {{ $event->time ?? 'N/A' }}<br>
                        <strong>Title:</strong> {{ $event->title }}<br>
                        <strong>Description:</strong> {{ $event->description }}<br>
                        <hr>
                    </li>
                @endforeach
            </ul>
        </main>
        <footer>
            <a href="/create-event">Create an event</a>
        </footer>
    </body>
</html>

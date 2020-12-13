<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Cornell van der Straaten">
    <title>Portfolio Cornell van der Straaten</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        Dit is de nav in de layout
    </nav>

    <main>
        @section('content')

        @show
    </main>

    <footer>
        Dit is de footer in de layout
    </footer>

</body>
</html>

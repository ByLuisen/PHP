<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Document</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
    <h1>Aqui se mostrará el LISTADO DE POSTS</h1>
    <p><?php echo $prueba ?></p>

    <ul>
        <li>
            <a href="{{ route('posts.index') }}">Inicio</a>
        </li>
        <li>
            <a href="{{ route('posts.create') }}">Create</a>
        </li>
        <li>
            <a href="{{ route('posts.show', 1) }}">Show</a>
        </li>
        <li>
            <a href="{{ route('posts.edit', 10) }}">Edit</a>
        </li>
    </ul>

</body>

</html>

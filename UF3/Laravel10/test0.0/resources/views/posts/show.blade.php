<x-layouts.app>

    <x-slot name="title">
        Show
    </x-slot>

    <br>
    <h1>{{ $frase }}</h1>
    <br>

    <div class="container mx-auto py-12">
        <h1>{{ $post->title }}</h1>

        <p>{{ $post->body }}</p>

        <a href="{{ route('posts.edit', $post) }}">Editar post</a>

        <form action="{{ route('posts.destroy', $post) }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar post
            </button>
        </form>
    </div>

</x-layouts.app>

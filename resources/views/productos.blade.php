<div>
    <h1>Posts</h1>
    <a href="{{ route('productos.create') }}">Crear Post</a>
    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->title }}
                <a href="{{ route('productos.edit', $post) }}">Editar</a>
                <form action="{{ route('productos.destroy', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

</div>

<ul>
    @foreach ($clientes as $c)
        <li>{{ $c['nome'] }}   /  <a href="{{ route('clientes.show',$c['id'])}}">Info</a></li>
    @endforeach
</ul>
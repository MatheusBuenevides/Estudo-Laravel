<ul>
    <a href="{{ route('clientes.create')}}">NOVO CLIENTE</a>
    <br>
    @foreach ($clientes as $c)
        <li>{{ $c['nome'] }}   /  <a href="{{ route('clientes.show',$c['id'])}}">Info</a></li>
    @endforeach
</ul>
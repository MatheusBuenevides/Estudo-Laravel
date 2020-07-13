<ul>
    <a href="{{ route('clientes.create')}}">NOVO CLIENTE</a>
    <br>
    <br>
    <table>
            @foreach ($clientes as $c)
                <tr>
                    <td>{{ $c['nome'] }}</td>
                    <td><a href="{{ route('clientes.show',$c['id'])}}">Visualizar</a></td>
                    <td><a href="{{ route('clientes.edit',$c['id'])}}">Editar</a></td>
                    <td><a href="{{ route('clientes.show',$c['id'])}}">Excluir</a></td>
                </tr>
            @endforeach
    </table>
</ul>
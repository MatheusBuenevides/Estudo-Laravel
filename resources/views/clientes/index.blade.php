<ul>
    <a href="{{ route('clientes.create')}}">NOVO CLIENTE</a>
    <br>
    <br>
    <table>
            @foreach ($clientes as $c)
                <tr>
                    <td>{{ $c['nome'] }}</td>
                    <td>
                        <a href="{{ route('clientes.show',$c['id'])}}">Visualizar</a>
                    </td>
                    <td>
                        <a href="{{ route('clientes.edit',$c['id'])}}">Editar</a>
                    </td>
                    <form action="{{ route('clientes.destroy',$c['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <td>
                            <button type="submit">Excluir</button>
                        </td>
                    </form>
                </tr>
            @endforeach
    </table>
</ul>
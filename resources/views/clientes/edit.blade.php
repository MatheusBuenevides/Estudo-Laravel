<h1>Editar Cliente</h1>
<form action="{{ route('clientes.update',$cliente['id'])}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="client_name" required value="{{ $cliente['nome'] }}">
    <button type="submit">Enviar</button>
</form>
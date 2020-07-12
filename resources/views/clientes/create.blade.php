<h1>Novo Cliente</h1>
<form action="{{ route('clientes.store')}}" method="POST">
    @csrf
    <input type="text" name="client_name" required>
    <button type="submit">Enviar</button>
</form>
<html>
<head></head>
<body>
    <h1>Lista de Carros</h1>

    <a href="{{ route('carros.create') }}">Adicionar Novo Carro</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Cor</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>
        @foreach($carros as $carro)
        <tr>
            <td>{{ $carro->id }}</td>
            <td>{{ $carro->marca }}</td>
            <td>{{ $carro->modelo }}</td>
            <td>{{ $carro->ano }}</td>
            <td>{{ $carro->cor }}</td>
            <td>{{ $carro->preco }}</td>
            <td>{{ $carro->estoque }}</td>
            <td>
                <a href="{{ route('carros.show', $carro) }}">Visualizar</a>
                <a href="{{ route('carros.edit', $carro) }}">Editar</a>
                <form action="{{ route('carros.destroy', $carro) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Deseja excluir este carro?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>

<html>
<head></head>
<body>
    <h1>Editar Carro</h1>

    <form action="{{ route('carros.update', $carro) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" value="{{ $carro->marca }}" required>
        </div>

        <div>
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" value="{{ $carro->modelo }}" required>
        </div>

        <div>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" value="{{ $carro->ano }}" required>
        </div>

        <div>
            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" value="{{ $carro->cor }}" required>
        </div>

        <div>
            <label for="preco">Preço:</label>
            <input type="number" step="0.01" id="preco" name="preco" value="{{ $carro->preco }}" required>
        </div>

        <div>
            <label for="estoque">Estoque:</label>
            <input type="number" id="estoque" name="estoque" value="{{ $carro->estoque }}" required>
        </div>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>

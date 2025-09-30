<html>
<head></head>
<body>
    <h1>Adicionar Novo Carro</h1>

    <form action="{{ route('carros.store') }}" method="POST">
        @csrf

        <div>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
        </div>

        <div>
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>
        </div>

        <div>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" required>
        </div>

        <div>
            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" required>
        </div>

        <div>
            <label for="preco">Preço:</label>
            <input type="number" step="0.01" id="preco" name="preco" required>
        </div>

        <div>
            <label for="estoque">Estoque:</label>
            <input type="number" id="estoque" name="estoque" required>
        </div>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>

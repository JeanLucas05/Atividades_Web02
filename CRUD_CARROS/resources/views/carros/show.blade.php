<html>
<head></head>
<body>
    <h1>Detalhes do Carro</h1>

    <p><strong>ID:</strong> {{ $carro->id }}</p>
    <p><strong>Marca:</strong> {{ $carro->marca }}</p>
    <p><strong>Modelo:</strong> {{ $carro->modelo }}</p>
    <p><strong>Ano:</strong> {{ $carro->ano }}</p>
    <p><strong>Cor:</strong> {{ $carro->cor }}</p>
    <p><strong>Preço:</strong> {{ $carro->preco }}</p>
    <p><strong>Estoque:</strong> {{ $carro->estoque }}</p>

    <a href="{{ route('carros.edit', $carro) }}">Editar</a>
    <a href="{{ route('carros.index') }}">Voltar</a>
</body>
</html>

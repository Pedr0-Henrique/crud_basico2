<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar um Produto</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous">
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Editar Produto</h2>
        
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf <!-- Token CSRF -->
            @method('PUT') <!-- Método PUT para atualização -->

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ $produto->nome }}" required>
            </div>

            <div class="mb-3">
                <label for="custo" class="form-label">Custo</label>
                <input type="number" id="custo" name="custo" class="form-control" value="{{ $produto->custo }}" required>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" id="preco" name="preco" class="form-control" value="{{ $produto->preco }}" required>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade" class="form-control" value="{{ $produto->quantidade }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Scripts do Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb6M9q64OjXLBHf0+Q9Hp2G/24U8H+WZoCD+pXkfU0DkwjDka" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha384-q0rT1tVxsL+DBYkhZ5NAl9yzbO/05kqcd3oDp10hsN3HcnDE7I+pe9FDgP4OU7/6" crossorigin="anonymous"></script>
</body>
</html>

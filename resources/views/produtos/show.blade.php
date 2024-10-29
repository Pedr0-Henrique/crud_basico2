<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver um Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Ver Produto</h2>
        <form>
            <div class="form-group">
                <label for="nome">Nome</label><br/>
                <input type="text" id="nome" class="form-control" name="nome" value="{{ $produto->nome }}" readonly><br/>
            </div>
            <div class="form-group">
                <label for="custo">Custo</label><br/>
                <input type="text" id="custo" class="form-control" name="custo" value="{{ $produto->custo }}" readonly><br/>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label><br/>
                <input type="text" id="preco" class="form-control" name="preco" value="{{ $produto->preco }}" readonly><br/>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label><br/>
                <input type="text" id="quantidade" class="form-control" name="quantidade" value="{{ $produto->quantidade }}" readonly><br/>
            </div>
            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">voltar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

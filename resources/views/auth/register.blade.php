<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #007bff, #6610f2);
            color: white;
        }
        .register-container {
            max-width: 400px;
            margin: auto;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
            margin-top: 100px;
        }
        .register-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .alert {
            text-align: center;
        }
    </style>
    <title>Registrar</title>
</head>
<body>
    <div class="register-container">
        <h1><i class="fas fa-user-plus"></i> Registrar</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro!</strong> Verifique os campos abaixo:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Senha">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Senha:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Confirmar Senha">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <br>
        <div class="footer">
            <a href="{{ route('login') }}" class="text-white">Já tem uma conta? Faça login</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

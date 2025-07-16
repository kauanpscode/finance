<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, #1a1a2e, #0B1D51);
            /* Gradiente de fundo escuro */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #e0e0e0;
            /* Cor do texto padrão para o corpo */
        }

        .login-container {
            background-color: rgba(26, 26, 46, 0.9);
            /* Fundo do container mais escuro e semitransparente */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            /* Sombra mais intensa */
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-out;
            border: 1px solid rgba(70, 70, 100, 0.5);
            /* Borda sutil */
        }

        .login-container h2 {
            margin-bottom: 30px;
            color: #f0f0f0;
            /* Cor do título mais clara */
            font-weight: 700;
        }

        .form-control {
            background-color: #2c2c4d;
            /* Fundo dos inputs mais escuro */
            color: #e0e0e0;
            /* Cor do texto dos inputs */
            border: 1px solid #4a4a6e;
            /* Borda dos inputs */
        }

        .form-control::placeholder {
            color: #b0b0c0;
            /* Cor do placeholder */
            opacity: 0.8;
            /* Ajuste para melhor visibilidade */
        }

        .form-control:focus {
            background-color: #3a3a5e;
            /* Fundo dos inputs ao focar */
            border-color: #6a5acd;
            /* Cor da borda ao focar (roxo mais claro) */
            box-shadow: 0 0 0 0.25rem rgba(106, 90, 205, 0.25);
            /* Sombra ao focar */
            color: #f0f0f0;
            /* Cor do texto ao focar */
        }

        .btn-primary {
            background-color: #6a5acd;
            /* Cor principal do botão (roxo mais claro) */
            border-color: #6a5acd;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            color: #fff;
            /* Cor do texto do botão */
        }

        .btn-primary:hover {
            background-color: #7b68ee;
            /* Cor do botão ao passar o mouse */
            border-color: #7b68ee;
        }

        .form-text a {
            color: #8a7acd;
            /* Cor dos links (roxo suave) */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .form-text a:hover {
            color: #9b8de0;
            /* Cor dos links ao passar o mouse */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Entrar</h2>
        <form>
            <div class="mb-3">
                <input type="email" class="form-control" id="emailInput" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="passwordInput" placeholder="Senha" required>
            </div>
            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="form-text">
                <a href="#">Esqueceu sua senha?</a>
            </div>
            <div class="form-text mt-2">
                <a href="#">Não tem uma conta? Cadastre-se</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
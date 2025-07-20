<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Entrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <style>
        body {
            background: linear-gradient(to right, #1a1a2e, #0B1D51);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #e0e0e0;
        }

        .login-container {
            background-color: rgba(26, 26, 46, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-out;
            border: 1px solid rgba(70, 70, 100, 0.5);
        }

        .login-container h2 {
            margin-bottom: 30px;
            color: #f0f0f0;
            font-weight: 700;
        }

        .form-control {
            background-color: #2c2c4d;
            color: #e0e0e0;
            border: 1px solid #4a4a6e;
        }

        .form-control::placeholder {
            color: #b0b0c0;
            opacity: 0.8;
        }

        .form-control:focus {
            background-color: #3a3a5e;
            border-color: #6a5acd;
            box-shadow: 0 0 0 0.25rem rgba(106, 90, 205, 0.25);
            color: #f0f0f0;
        }

        .btn-primary {
            background-color: #6a5acd;
            border-color: #6a5acd;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #7b68ee;
            border-color: #7b68ee;
        }

        .form-text a {
            color: #8a7acd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .form-text a:hover {
            color: #9b8de0;
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

        /* Toast container fix */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1055;
        }
    </style>
</head>

<body>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="toast align-items-center text-white bg-danger border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="toast align-items-center text-white bg-success border-0 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="login-container">
        <h2>Entrar</h2>

        <form method="post" action="<?= base_url('access/login') ?>">
            <?= csrf_field() ?>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="E-mail" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Senha" required>
            </div>
            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
            <div class="form-text">
                <a href="#">Esqueceu sua senha?</a>
            </div>
            <div class="form-text mt-2">
                <a href="<?= base_url('access/register') ?>">Não tem uma conta? Cadastre-se</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        // Inicializa e exibe os toasts automaticamente
        document.querySelectorAll('.toast').forEach(toastEl => {
            new bootstrap.Toast(toastEl, { delay: 5000 }).show();
        });
    </script>
</body>

</html>

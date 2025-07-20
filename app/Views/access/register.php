<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            animation: fadeIn 0.7s ease-in-out;
        }

        h2 {
            font-weight: 700;
            margin-bottom: 25px;
            color: #fff;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.08);
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.12);
            border: 1px solid #6a5acd;
            box-shadow: 0 0 5px #6a5acd;
            color: #fff;
        }

        .btn-primary {
            background-color: #6a5acd;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #7b68ee;
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

        /* Toast */
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
        <?= view('components/toast') ?>
    </div>

    <div class="login-container text-center">
        <h2>Bem-vindo</h2>
        <form method="post" action="<?= base_url('access/login') ?>">
            <?= csrf_field() ?>
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nome de usuário" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Senha" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirm" class="form-control" placeholder="Confirmação de senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toast auto-hide after 5 seconds
        const toasts = document.querySelectorAll('.toast');
        toasts.forEach(toastEl => {
            new bootstrap.Toast(toastEl, { delay: 5000 }).show();
        });
    </script>

</body>

</html>

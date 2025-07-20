<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> | Finance App</title>
    <!-- Incluindo Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Meta Tags para o Token CSRF - Essencial para AJAX -->
    <meta name="csrf-token-name" content="<?= csrf_token() ?>">
    <meta name="csrf-token-value" content="<?= csrf_hash() ?>">

    <style>
        /* Estilos globais para o tema escuro */
        body {
            background: linear-gradient(to right, #1a1a2e, #0B1D51);
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh; /* Garante que o body ocupe toda a altura da viewport */
            display: flex;
            flex-direction: column; /* Organiza o conteúdo em coluna */
        }
        main {
            flex: 1; /* Faz com que o conteúdo principal ocupe o espaço restante */
            padding: 20px 0;
        }
        .navbar {
            background-color: #16213e; /* Cor de fundo para o cabeçalho */
            border-bottom: 1px solid rgba(70, 70, 100, 0.5);
        }
        .navbar-brand, .nav-link {
            color: #f0f0f0 !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #8a7acd !important;
        }
        footer {
            background-color: #16213e; /* Cor de fundo para o rodapé */
            color: #b0b0c0;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid rgba(70, 70, 100, 0.5);
        }
        .alert {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            text-align: left;
        }
        .alert-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .alert-success {
            background-color: #28a745;
            color: #fff;
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>
    <!-- Header -->
    <?= $this->include('layouts/header') ?>

    <!-- Main Content -->
    <main>
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <!-- Footer -->
    <?= $this->include('layouts/footer') ?>

    <!-- Incluindo Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="<?= base_url('js/ajax_form_handler.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>

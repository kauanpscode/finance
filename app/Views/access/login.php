<!doctype html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pontes | Login</title>

  <!-- Metadados -->
  <meta name="description" content="Acesse sua conta na plataforma Pontes.">
  <meta name="color-scheme" content="dark">
  <meta name="theme-color" content="#0d1117">
  <meta name="csrf-token" content="<?= csrf_hash() ?>">
  <meta name="csrf-header" content="<?= csrf_header() ?>">
  <meta name="csrf-name" content="<?= csrf_token() ?>">

  <!-- AdminLTE / Bootstrap / Ícones -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap">

  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
      background: linear-gradient(135deg, #0d1117 0%, #0d1117 100%);
    }

    .login-logo a {
      color: #ffffff;
      font-weight: 600;
      font-size: 2rem;
    }

    .btn-primary {
      background-color: #3b657a;
      border: none;
      padding: 0.7rem;
      font-size: 1rem;
    }

    .btn-primary:hover {
      background-color: #2c4b5a;
    }

    .btn-success {
      padding: 0.7rem;
      font-size: 1rem;
    }

    .card-dark {
      background-color: #0d1117 !important;
    }

    label {
      color: #adb5bd;
      font-weight: 500;
      margin-bottom: 0.3rem;
      font-size: 0.9rem;
    }

    /* Ajustes de inputs */
    .form-control {
      height: 50px;
      font-size: 1rem;
      border-radius: 8px;
      border: 1px solid #21262d !important;
      color: #fff;
    }

    .form-control:focus {
      border-color: #3b657a !important;
      box-shadow: 0 0 0 0.2rem rgba(59, 101, 122, 0.25);
      background-color: #0d1117;
      color: #fff;
    }

    .mb-3,
    .mb-4 {
      margin-bottom: 0.9rem !important;
    }

    .login-card-body {
      padding: 1.8rem;
    }
  </style>
</head>

<body class="hold-transition login-page d-flex flex-column justify-content-start align-items-center pt-5">
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast"
      class="toast align-items-center text-bg-<?= session('toast_success') ? 'success' : 'danger' ?> border-0"
      role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <?= session('toast_error') ?: session('toast_success') ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
          aria-label="Fechar"></button>
      </div>
    </div>
  </div>

  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Pontes</b></a>
    </div>

    <div class="card card-dark">
      <div class="card-body login-card-body card-dark rounded-3">
        <?php if (isset($isRegister) && $isRegister): ?>
          <strong class="login-box-msg text-white d-block text-center mb-3">
            Crie sua conta
          </strong>
          <form action="<?= base_url('access/register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label for="username">Nome de Usuário</label>
              <input type="text" id="username" name="username" class="form-control bg-transparent" required>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control bg-transparent" required>
            </div>

            <div class="mb-4">
              <label for="password">Senha</label>
              <input type="password" id="password" name="password" class="form-control bg-transparent" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">
              <i class="bi bi-person-plus-fill me-1"></i> Criar conta
            </button>
          </form>

          <p class="mb-0 mt-3 text-center">
            Já tem uma conta?
            <a href="<?= base_url('access/index') ?>" class="text-light">Entrar</a>
          </p>

        <?php else: ?>
          <strong class="login-box-msg text-white d-block text-center mb-3">
            Entre com sua conta
          </strong>

          <form action="<?= base_url('access/login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label class="text-white" for="email">E-mail</label>
              <input type="email" id="email" name="email" class="form-control bg-transparent" required>
            </div>

            <div class="mb-4">
              <label class="text-white" for="password">Senha</label>
              <input type="password" id="password" name="password" class="form-control bg-transparent" required>
            </div>

            <button type="submit" class="btn btn-success btn-block">
              Entrar
            </button>
          </form>

          <p class="mb-0 mt-3 text-center">
            <span class="text-white">Não possui uma conta?</span>
            <a href="<?= base_url('access/index/true') ?>" class="text-primary">Cadastre-se</a>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const toastEl = document.getElementById('liveToast');
      const toastMsg = '<?= session('toast_error') ?: session('toast_success') ?>';
      if (toastMsg.trim() !== '') {
        new bootstrap.Toast(toastEl, { delay: 3500 }).show();
      }
    });
  </script>
</body>

</html>

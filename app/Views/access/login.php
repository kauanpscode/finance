<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hermes | Login</title>

  <!-- Metadados -->
  <meta name="description" content="Acesse sua conta na plataforma Hermes.">
  <meta name="color-scheme" content="light dark">
  <meta name="theme-color" content="#007bff">
  <meta name="csrf-token" content="<?= csrf_hash() ?>">
  <meta name="csrf-header" content="<?= csrf_header() ?>">
  <meta name="csrf-name" content="<?= csrf_token() ?>">

  <!-- Fonts e ícones -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="<?= base_url('css/adminlte.css') ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="login-page bg-body-secondary">
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if (session('errors')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <ul class="mb-0">
        <?php foreach (session('errors') as $error): ?>
          <li><?= esc($error) ?></li>
        <?php endforeach ?>
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
    <div id="liveToast"
      class="toast align-items-center text-bg-<?= session('toast_success') ? 'success' : 'danger' ?> border-0 shadow-lg"
      role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body fw-semibold">
          <?= session('toast_error') ?: session('toast_success') ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fechar"></button>
      </div>
    </div>
  </div>

  <?php if (isset($isRegister) && $isRegister): ?>
    <div class="register-box">
      <div class="card card-outline card-primary shadow">
        <div class="card-header text-center">
          <a href="../index2.html" class="h1 text-decoration-none text-dark">
            <b>Hermes</b>
          </a>
        </div>

        <div class="card-body">
          <p class="login-box-msg fs-5">Crie sua conta</p>

          <form action="<?= base_url('access/register') ?>" method="post" novalidate>
            <div class="form-floating mb-3">
              <input type="text" id="registerFullName" name="username" class="form-control" placeholder="Seu nome completo" required autocomplete="name">
              <label for="registerFullName"><i class="bi bi-person me-1"></i> Nome de Usuário</label>
            </div>

            <div class="form-floating mb-3">
              <input type="email" id="registerEmail" name="email" class="form-control" placeholder="nome@exemplo.com" required autocomplete="email">
              <label for="registerEmail"><i class="bi bi-envelope me-1"></i> Email</label>
            </div>

            <div class="form-floating mb-4">
              <input type="password" id="registerPassword" name="password" class="form-control" placeholder="Senha" required autocomplete="new-password">
              <label for="registerPassword"><i class="bi bi-lock-fill me-1"></i> Senha</label>
            </div>

            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-person-plus-fill me-1"></i> Registrar
              </button>
            </div>
          </form>

          <p class="text-center mb-0">
            Já tem uma conta? <a href="login.html" class="link-primary fw-semibold">Entre aqui</a>
          </p>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="login-box">
      <div class="card card-outline card-primary shadow">
        <div class="card-header text-center">
          <a href="<?= base_url('/') ?>" class="h1 text-decoration-none text-dark">
            <b>Hermes</b>
          </a>
        </div>

        <div class="card-body">
          <p class="login-box-msg fs-5">Acesse sua conta</p>

          <form action="<?= base_url('access/login') ?>" method="post" id="loginForm" novalidate>
            <div class="form-floating mb-3">
              <input type="email" id="loginEmail" name="email" class="form-control" placeholder="email@exemplo.com" required autocomplete="email">
              <label for="loginEmail"><i class="bi bi-envelope me-1"></i> Email</label>
            </div>

            <div class="form-floating mb-3">
              <input type="password" id="loginPassword" name="password" class="form-control" placeholder="Senha" required autocomplete="current-password">
              <label for="loginPassword"><i class="bi bi-lock-fill me-1"></i> Senha</label>
            </div>

            <div class="d-grid mb-4">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
              </button>
            </div>
          </form>

          <p class="text-center mb-0">
            Ainda não tem conta?
            <a href="<?= base_url('access/index/true') ?>" class="link-primary fw-semibold">Cadastre-se</a>
          </p>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('js/adminlte.js') ?>"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const sidebarWrapper = document.querySelector('.sidebar-wrapper');
      if (sidebarWrapper && window.OverlayScrollbarsGlobal?.OverlayScrollbars) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: 'os-theme-light',
            autoHide: 'leave',
            clickScroll: true
          },
        });
      }
    });

    document.addEventListener("DOMContentLoaded", () => {
      const csrfName = document.querySelector('meta[name="csrf-name"]').content;
      const csrfValue = document.querySelector('meta[name="csrf-token"]').content;

      document.querySelectorAll('form').forEach(form => {
        if (!form.querySelector(`input[name="${csrfName}"]`)) {
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = csrfName;
          input.value = csrfValue;
          form.appendChild(input);
        }
      });
    });

    const csrfHeader = document.querySelector('meta[name="csrf-header"]').content;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const originalFetch = window.fetch;
    window.fetch = function(url, options = {}) {
      options.headers = options.headers || {};
      options.headers[csrfHeader] = csrfToken;
      return originalFetch(url, options);
    };

    if (window.jQuery) {
      $.ajaxSetup({
        headers: {
          [csrfHeader]: csrfToken
        }
      });
    }

    document.addEventListener('DOMContentLoaded', function() {
      const toastEl = document.getElementById('liveToast');
      const toastMessage = '<?= session('toast_error') ?: session('toast_success') ?>';

      if (toastMessage.trim() !== '') {
        const toast = new bootstrap.Toast(toastEl, {
          delay: 4000
        });
        toast.show();
      }
    });
  </script>
</body>

</html>
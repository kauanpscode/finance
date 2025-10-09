<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Finance | Login</title>

  <!-- Metadados -->
  <meta name="description" content="Acesse sua conta na plataforma Finance.">
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
</head>

<body class="login-page bg-body-secondary">
  <div class="login-box">
    <div class="card card-outline card-primary shadow">
      <div class="card-header text-center">
        <a href="<?= base_url('/') ?>" class="h1 text-decoration-none text-dark">
          <b>Finance</b>
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

          <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Lembrar-me</label>
            </div> -->
            <!-- <a href="<?= base_url('forgot-password') ?>" class="link-primary">Esqueceu a senha?</a> -->
          </div>

          <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary btn-lg">
              <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
            </button>
          </div>
        </form>

        <p class="text-center mb-0">
          Ainda não tem conta?
          <a href="<?= base_url('access/register') ?>" class="link-primary fw-semibold">Cadastre-se</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('js/adminlte.js') ?>"></script>

  <script>
    // Configuração dos Scrollbars
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

      // adiciona automaticamente o campo hidden a todos os formulários
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

    // Monkey patch para fetch
    const originalFetch = window.fetch;
    window.fetch = function(url, options = {}) {
      options.headers = options.headers || {};
      options.headers[csrfHeader] = csrfToken;
      return originalFetch(url, options);
    };

    // jQuery
    if (window.jQuery) {
      $.ajaxSetup({
        headers: {
          [csrfHeader]: csrfToken
        }
      });
    }
  </script>
</body>

</html>
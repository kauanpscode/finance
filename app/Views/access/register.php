<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Finance | Registro</title>

  <!-- Metadados -->
  <meta name="description" content="Crie sua conta na plataforma Finance e comece a gerenciar suas finanças.">
  <meta name="color-scheme" content="light dark">
  <meta name="theme-color" content="#007bff">

  <!-- Fontes e ícones -->
  <link rel="preload" href="../css/adminlte.css" as="style">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="../css/adminlte.css">
</head>
  <style>
    body {
        background-color: black;
    }
  </style>

<body class="register-page bg-body-secondary">
  <div class="register-box">
    <div class="card card-outline card-primary shadow">
      <div class="card-header text-center">
        <a href="../index2.html" class="h1 text-decoration-none text-dark">
          <b>Finance</b>
        </a>
      </div>

      <div class="card-body">
        <p class="login-box-msg fs-5">Crie sua conta</p>

        <form action="<?= base_url('access/register')?>" method="post" novalidate>
          <div class="form-floating mb-3">
            <input type="text" id="registerFullName" name="fullname" class="form-control" placeholder="Seu nome completo" required autocomplete="name">
            <label for="registerFullName"><i class="bi bi-person me-1"></i> Nome completo</label>
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

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="../js/adminlte.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const sidebarWrapper = document.querySelector('.sidebar-wrapper');
      if (sidebarWrapper && window.OverlayScrollbarsGlobal?.OverlayScrollbars) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: { theme: 'os-theme-light', autoHide: 'leave', clickScroll: true },
        });
      }
    });
  </script>
</body>
</html>

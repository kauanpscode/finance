<!doctype html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pontes — Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.0.16/index.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">
  <style>
    :root {
      --bg-main: #010409;
      --bg-secondary: #0d1117;
      --bg-hover: #161b22;
      --border-color: #30363d;
      --text-color: #f0f6fc;
      --muted-color: #8b949e;
      --primary: #2f81f7;
      --primary-hover: #1f6feb;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--bg-main);
      color: var(--text-color);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Navbar */
    .app-header {
      background-color: var(--bg-secondary);
      border-bottom: 1px solid var(--border-color);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.25);
    }

    .navbar-brand {
      color: var(--text-color);
      font-weight: 600;
      font-size: 1.2rem;
    }

    .navbar .nav-link {
      color: var(--muted-color);
      border-radius: 8px;
      transition: all 0.2s ease;
      padding: 0.5rem 0.75rem;
    }

    .navbar .nav-link:hover,
    .navbar .nav-link.active {
      color: var(--text-color);
      background-color: var(--bg-hover);
    }

    /* Conteúdo */
    .app-content {
      flex: 1;
      background-color: var(--bg-main);
      padding: 2rem;
      animation: fadeIn 0.4s ease-in;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Cards principais */
    .dashboard-card {
      background-color: var(--bg-secondary);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 1.5rem;
      color: var(--text-color);
      transition: all 0.3s ease;
    }

    .dashboard-card:hover {
      background-color: var(--bg-hover);
      transform: translateY(-3px);
    }

    .dashboard-card i {
      font-size: 2rem;
      color: var(--primary);
    }

    .dashboard-card h5 {
      margin-top: 1rem;
      font-weight: 600;
    }

    /* Footer */
    .app-footer {
      background-color: var(--bg-secondary);
      border-top: 1px solid var(--border-color);
      color: var(--muted-color);
      padding: 1rem 1.5rem;
      font-size: 0.9rem;
      text-align: center;
    }

    .app-footer a {
      color: var(--primary);
      text-decoration: none;
    }

    .app-footer a:hover {
      color: var(--primary-hover);
    }
  </style>
</head>

<body>
  <nav class="app-header navbar navbar-expand-lg sticky-top py-2 px-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= base_url('/') ?>">Pontes</a>

      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="bi bi-list"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto align-items-center gap-1">
          <li class="nav-item">
            <a href="Video" class="nav-link active">
              <i class="bi bi-play me-1"></i> Videos
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto align-items-center gap-2">
          <li class="nav-item">
            <a class="nav-link text-danger fw-semibold" href="<?= base_url('Access/logout') ?>">
              <i class="bi bi-box-arrow-right"></i> Sair
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="app-content">
    <div class="container">
      <h2 class="mb-4">Bem-vindo, <?php echo $nome?>.</h2>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="dashboard-card text-center">
            <i class="bi bi-tools"></i>
            <h5>Ferramentas</h5>
            <p class="text-muted">Acesse utilitários e scripts administrativos.</p>
            <a href="<?= base_url('/tools') ?>" class="btn btn-primary btn-sm mt-2">
              Acessar
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="dashboard-card text-center">
            <i class="bi bi-bar-chart"></i>
            <h5>Relatórios</h5>
            <p class="text-muted">Visualize métricas e resultados das operações.</p>
            <button class="btn btn-primary btn-sm mt-2" disabled>
              Em breve
            </button>
          </div>
        </div>

        <div class="col-md-4">
          <div class="dashboard-card text-center">
            <i class="bi bi-gear"></i>
            <h5>Configurações</h5>
            <p class="text-muted">Gerencie preferências e integrações.</p>
            <button class="btn btn-primary btn-sm mt-2" disabled>
              Em breve
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="app-footer">
    <strong>
      Copyright &copy;
      2014–<?= date('Y') ?>&nbsp;
      <a href="https://adminlte.io">AdminLTE.io</a>.
    </strong>
    Todos os direitos reservados.
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
</body>

</html>

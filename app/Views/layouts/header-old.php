<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/home') ?>">Finance App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('/home') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Transações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Relatórios</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item">
                        <span class="nav-link">Olá, <?= session()->get('username') ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/access/logout') ?>">Sair</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/access') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cadastre-se</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

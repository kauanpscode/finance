<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="mb-4">Bem-vindo ao Finance App!</h1>
    <p class="lead">Sua plataforma completa para gerenciar suas finanças.</p>

    <!-- Exemplo de como exibir mensagens flashdata aqui, se não for global no layout -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success mt-3">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger mt-3">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card bg-dark text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">Visão Geral</h5>
                    <p class="card-text">Acompanhe suas receitas e despesas em tempo real.</p>
                    <a href="#" class="btn btn-primary">Ver Detalhes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">Transações</h5>
                    <p class="card-text">Registre e categorize todas as suas movimentações financeiras.</p>
                    <a href="#" class="btn btn-primary">Adicionar Transação</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">Relatórios</h5>
                    <p class="card-text">Gere relatórios detalhados para uma análise profunda.</p>
                    <a href="#" class="btn btn-primary">Gerar Relatórios</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

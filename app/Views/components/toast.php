<?php if (session()->getFlashdata('error') || session()->getFlashdata('success')) : ?>
    <div
        id="toast"
        class="position-fixed top-50 start-50 translate-middle p-3 border rounded shadow-lg bg-white z-3"
        style="min-width: 300px; z-index: 1055;"
    >
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="text-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="text-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.display = 'none';
            }
        }, 3000);
    </script>
<?php endif; ?>

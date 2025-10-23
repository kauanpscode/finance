<div class="container-fluid">
  <div class="card card-primary shadow-sm">
    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
      <h3 class="card-title mb-0"><i class="bi bi-upload"></i> Enviar Novo Vídeo</h3>
    </div>

    <form action="<?= base_url('VideoController/novo') ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>

      <div class="card-body">
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <div class="mb-3">
          <label for="titulo" class="form-label fw-semibold">Título do Vídeo</label>
          <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Digite um título para o vídeo" required>
        </div>

        <div class="mb-3">
          <label for="video" class="form-label fw-semibold">Arquivo de Vídeo</label>
          <input type="file" name="video" id="video" class="form-control" accept="video/mp4,video/mkv,video/webm" required>
        </div>

        <div id="preview-container" class="d-none mt-3">
          <label class="fw-semibold">Pré-visualização:</label>
          <video id="preview-video" class="rounded shadow-sm border" width="100%" height="auto" controls></video>
        </div>
      </div>

      <div class="card-footer d-flex justify-content-between">
        <a href="<?= base_url('VideoController') ?>" class="btn btn-secondary">
          <i class="bi bi-arrow-left"></i> Voltar
        </a>
        <button type="submit" class="btn btn-success">
          <i class="bi bi-save"></i> Salvar
        </button>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('video').addEventListener('change', function(e) {
  const file = e.target.files[0];
  const previewContainer = document.getElementById('preview-container');
  const previewVideo = document.getElementById('preview-video');

  if (file) {
    previewContainer.classList.remove('d-none');
    previewVideo.src = URL.createObjectURL(file);
  } else {
    previewContainer.classList.add('d-none');
    previewVideo.src = '';
  }
});
</script>

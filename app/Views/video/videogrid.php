<!-- app/Views/video/videogrid.php -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h3 class="card-title"><?= esc($page_head['title']) ?></h3>
        </div>
        <div class="card-body">
          <h5><?= esc($page_head['subtitle']) ?></h5>
          <?php if (!empty($grid)): ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($grid as $video): ?>
                  <tr>
                    <td><?= esc($video['id']) ?></td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <p>Nenhum vídeo encontrado.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</div>

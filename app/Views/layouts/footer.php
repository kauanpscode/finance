<script>
  document.addEventListener('DOMContentLoaded', () => {
    const sidebarWrapper = document.querySelector('.sidebar-wrapper');
    if (sidebarWrapper && window.OverlayScrollbarsGlobal?.OverlayScrollbars) {
      OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
        scrollbars: {
          theme: 'os-theme-light',
          autoHide: 'leave',
          clickScroll: true,
        },
      });
    }
    const csrfName = document.querySelector('meta[name="csrf-name"]')?.content;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    const csrfHeader = document.querySelector('meta[name="csrf-header"]')?.content || 'X-CSRF-TOKEN';

    if (csrfName && csrfToken) {
      document.querySelectorAll('form').forEach(form => {
        if (!form.querySelector(`input[name="${csrfName}"]`)) {
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = csrfName;
          input.value = csrfToken;
          form.appendChild(input);
        }
      });

      const originalFetch = window.fetch;
      window.fetch = (url, options = {}) => {
        options.headers = Object.assign({}, options.headers, { [csrfHeader]: csrfToken });
        return originalFetch(url, options);
      };
      if (window.jQuery) {
        $.ajaxSetup({
          headers: { [csrfHeader]: csrfToken }
        });
      }
    }
    const toastEl = document.getElementById('liveToast');
    const toastMessage = '<?= session('toast_error') ?: session('toast_success') ?>';
    if (toastEl && toastMessage.trim() !== '') {
      const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
      toast.show();
    }
  });
</script>
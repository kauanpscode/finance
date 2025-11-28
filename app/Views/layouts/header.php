  <script>
    $(function () {
      const csrfName = $('meta[name="csrf-name"]').attr('content');
      const csrfToken = $('meta[name="csrf-token"]').attr('content');
      const csrfHeader = $('meta[name="csrf-header"]').attr('content');

      $('form').each(function () {
        if (!$(this).find(`input[name="${csrfName}"]`).length) {
          $(this).prepend(`<input type="hidden" name="${csrfName}" value="${csrfToken}">`);
        }
      });

      $(document).ajaxSend(function (e, xhr) {
        xhr.setRequestHeader(csrfHeader, csrfToken);
      });
    });
  </script>
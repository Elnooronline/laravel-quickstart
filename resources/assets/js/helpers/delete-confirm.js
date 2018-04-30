const Swal = require('sweetalert2');

(function ($) {
  $(document).on('click', 'a.delete-confirm', (event) => {
    event.preventDefault();
    const el = $(event.target);

    Swal({
      title: el.data('confirm-title'),
      text: el.data('confirm-info'),
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: el.data('confirm-confirm'),
      cancelButtonText: el.data('confirm-cancel'),
    }).then((result) => {
      if (result.value) {
        $(`#${$(event.target).data('form')}`).submit();
        // For more information about handling dismissals please visit
        // https://sweetalert2.github.io/#handling-dismissals
      }
    });
  });
}(jQuery));

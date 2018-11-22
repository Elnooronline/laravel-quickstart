require('./app');

// Open sidebar dropdwon when active.
$('.treeview-menu').find('li.active').closest('.treeview-menu').css('display', 'block');

$(document).on('click', 'a[data-toggle="tab"]', event => {
  $(event.target).closest('div').find('.tab-pane').removeClass('show');
});

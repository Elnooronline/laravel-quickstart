require('./app');

// Open sidebar dropdwon when active.
$('.treeview-menu').find('li.active').closest('.treeview-menu').css('display', 'block');

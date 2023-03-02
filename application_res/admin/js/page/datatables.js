"use strict";

$("[data-checkboxes]").each(function () {
  var me = $(this),
  group = me.data('checkboxes'),
  role = me.data('checkbox-role');

  me.change(function () {
    var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
    checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
    dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
    total = all.length,
    checked_length = checked.length;

    if (role == 'dad') {
      if (me.is(':checked')) {
        all.prop('checked', true);
      } else {
        all.prop('checked', false);
      }
    } else {
      if (checked_length >= total) {
        dad.prop('checked', true);
      } else {
        dad.prop('checked', false);
      }
    }
  });
});

$("#table-1").dataTable({
  "columnDefs": [
  { "sortable": false, "targets": [0, 1, 2, 3] }
  ],
  order: [[4, "asc"]]
});
$("#table-2").dataTable({
  "columnDefs": [
  { "sortable": false, "targets": [0, 1, 2, 3,4,5,6] }
  ],
  order: [[6, "asc"]] //column indexes is zero based

});
$("#table-3").dataTable({
  "columnDefs": [
  { "sortable": false, "targets": [0, 1] }
  ],
  order: [[2, "asc"]] //column indexes is zero based

});

$("#table-4").dataTable({
  "columnDefs": [
  { "sortable": false, "targets": [0, 1] }
  ] //column indexes is zero based

});

$('#save-stage').DataTable({
  "scrollX": true,
  stateSave: true
});
$('#tableExport').DataTable({
  dom: 'Bfrtip',
  buttons: [
  'copy', 'csv', 'excel', 'pdf', 'print'
  ]
});

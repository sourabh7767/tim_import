$(document).on('click', '.delete-datatable-record', function(e){
    let url  = site_url + "/history/" + $(this).attr('data-id');
    let tableId = 'historyTable';
    deleteDataTableRecord(url, tableId);
});

$(document).ready(function() {
    console.log(site_url, '======site_url');
    $('#historyTable').DataTable({
        ajax: site_url + "/history/",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            { data: 'import_id', name: 'import_id' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at'},
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        ...defaultDatatableSettings
    });
});

$("#upload_file").change(function(event){
    $("#pageloader").addClass("pageloader");
    $("#import_users").submit();
});

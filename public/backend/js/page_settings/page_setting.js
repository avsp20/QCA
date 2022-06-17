$(function () {
    var table = $('#pages_table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: window.location.href,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'banner_image', name:'banner_image' },
            {data: 'page', name:'page' },
            {data: 'title', name: 'title' },
            {data: 'created_at', name:'created_at' },
            {data: 'action', name: 'action' },
        ]
    });
});
function deleteSetting(id, el) {
    swalInit({
        title: 'Are you sure?',
        text: 'You will not be able to recover this page settings!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
        if(result.value) {
            $.ajax({
                type: "GET",
                url: `delete-page-settings/${id}`,
                success: function(data) {
                    if (data) {
                        swalInit(
                            'Deleted!',
                            'Your page settings has been deleted.',
                            'success'
                        ).then((result) => {
                            $('#pages_table').DataTable().ajax.reload();
                        })
                    }
                }
            })
        }
        else if(result.dismiss === swal.DismissReason.cancel) {
            swalInit(
                'Cancelled',
                'Your page setting is safe :)',
                'error'
            );
        }
    });
}
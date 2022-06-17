$(function () {
    var cms_table = $('#cms_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: window.location.href,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name:'name' },
            {data: 'slug', name: 'slug' },
            {data: 'status', name: 'status' },
            {data: 'created_at', name:'created_at' },
            {data: 'action', name: 'action' },
        ]
    });
});
function deleteCMS(id, el) {
    swalInit({
        title: 'Are you sure?',
        text: 'You will not be able to recover this cms!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
        if(result.value) {
            $.ajax({
                type: "GET",
                url: `delete-cms/${id}`,
                success: function(data) {
                    if (data) {
                        swalInit(
                            'Deleted!',
                            'Your cms has been deleted.',
                            'success'
                        ).then((result) => {
                            $('#cms_table').DataTable().ajax.reload();
                        })
                    }
                }
            })
        }
        else if(result.dismiss === swal.DismissReason.cancel) {
            swalInit(
                'Cancelled',
                'Your page cms is safe :)',
                'error'
            );
        }
    });
}
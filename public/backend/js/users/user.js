$(function () {
    var users_table = $('#users_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: window.location.href,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user_fname', name:'user_fname' },
            {data: 'user_lname', name: 'user_lname' },
            {data: 'user_email', name: 'user_email' },
            {data: 'user_contact_main', name: 'user_contact_main' },
            {data: 'user_location', name: 'user_location', orderable: true },
            {data: 'created_at', name:'created_at' },
            {data: 'action', name: 'action' },
        ]
    });
    $('#search_location').on('change', function(){
       users_table.search(this.value).draw();   
    });
    $('#users_qna_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: {
            url: window.location.href,
            data: function (d) {
                d.qna_answer_date = $('#qna_answer_date').val()
                d.is_favorite = $('#is_favorite').val()
            }
        },
        columns: [
            {data: 'check', name: 'check', orderable: false},
            {data: 'qna_question_date', name:'qna_question_date' },
            {data: 'qna_question', name:'qna_question' },
            {data: 'location', name: 'location' },
            {data: 'qna_jurisdiction', name: 'qna_jurisdiction' },
            {data: 'is_favorite', name:'is_favorite', orderable: false },
            {data: 'qna_answer_date', name:'qna_answer_date' },
            {data: 'action', name: 'action' },
        ],
    });
    $('#search_qna_jurisdiction').on('change', function(){
       $('#users_qna_table').DataTable().columns([4]).search(this.value).draw();
    });
    $('#qna_answer_date').change(function(){
        $('#users_qna_table').DataTable().draw();
    });
     $('#is_favorite').change(function(){
        $('#users_qna_table').DataTable().draw();
    });
});
function userQNABulk(user_id) {
    var select_val = $("#qna_option").val();
    var send_url = base_url + '/admin/';
    if(select_val == 1){
        var items=$("input[name='qna_select[]']:checked").map(function () {
            return this.value;
        }).get();
        if(items == ''){
            $(".alert-checkbox").show();
            $(".missing-check").text('Please select alteast one row to apply first option.');
            $('.alert-checkbox').slideDown('slow').delay(3000).slideUp('slow');
        }else{
            $.ajax({
                url :  send_url + 'user-qna-select-ids',
                type : 'post',
                data : {"_token":csrf_token ,"ids":items, select_val: select_val},
                dataType:'json',
                success:function(data, textStatus, jqXHR) 
                { 
                    console.log(data);
                    if(data.status == 1){
                        window.location.href = send_url + 'view-user-qna/' + user_id;
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    //if fails      
                } 
            });     
        }
    }else{
        window.location.href = send_url + 'view-user-qna/' + user_id;
    }
}
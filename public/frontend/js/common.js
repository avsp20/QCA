$(function () {
    var url = base_url + '/user';
    if(window.location.href == url + '/dashboard'){
        table_url = qna_table;
    }else{
        table_url = window.location.href;
    }
    $('#qna_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: {
            url: table_url,
            data: function (d) {
                d.qna_answer_date = $('#qna_answer_date').val()
                d.is_favorite = $('#is_favorite').val()
            }
        },
        columns: [
            {data: 'check', name: 'check', orderable:false },
            {data: 'qna_question_date', name:'qna_question_date' },
            {data: 'qna_question', name:'qna_question' },
            {data: 'qna_jurisdiction', name: 'qna_jurisdiction' },
            {data: 'is_favorite', name:'is_favorite' },
            {data: 'qna_answer_date', name:'qna_answer_date' },
            {data: 'action', name: 'action' },
        ],
    });
    $('#search_jurisdiction').on('change', function(){
       $('#qna_table').DataTable().columns([3]).search(this.value).draw();
    });
    $('#qna_answer_date').change(function(){
        $('#qna_table').DataTable().draw();
    });
    $('#is_favorite').change(function(){
        $('#qna_table').DataTable().draw();
    });
    $('#reset_search').on('click', function(){
        $("#search_jurisdiction").val('');
        $("#qna_answer_date").val('');
        $("#is_favorite").val('');
        $('#qna_table').DataTable().search('').columns().search('').draw();
    });
});

$(".usr-qna input[type='checkbox'] ").click(function(e) {
    if($(this).prop("checked") == true){
        $(".user-qna-check").prop('checked', true);
    }
    else if($(this).prop("checked") == false){
        $(".user-qna-check").prop('checked', false);
    }
});
function userQNAOption(user_id) {
    var select_val = $("#qna_option").val();
    var send_url = base_url + '/user/';
    if(select_val == 1){
        var items=$("input[name='qna_select[]']:checked").map(function () {
            return this.value;
        }).get();
        if(items == ''){
            $.toast({
                text: 'Please select alteast one row to apply first option.',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3500,
                stack: 6
            });
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
                    $.toast({
                        text: 'Something went wrong, try again later.',
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        stack: 6
                    });    
                } 
            });     
        }
    }else{
        window.location.href = send_url + 'view-user-qna/' + user_id;
    }
}
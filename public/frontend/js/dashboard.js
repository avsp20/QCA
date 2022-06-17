$(function () {
    var qna_fav_table = $('#qna_fav_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: window.location.href,
        aLengthMenu: [[5, 15, 25, -1], [5, 15, 25, "All"]],
        aoColumnDefs: [
            {data: 'favorite', "aTargets":[0], "orderable": false },
            {data: 'qna_id', "aTargets":[1] }
        ],
    });
    $('#qna_others_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: {
            url: other_qna_table,
            data: function (d) {
                d.qna_others_answer_date = $('#qna_others_answer_date').val();
                d.is_others_favorite = $('#is_others_favorite').val();
            }
        },
        columns: [
            {data: 'check', name: 'check', orderable:false },
            {data: 'qna_question_date', name:'qna_question_date' },
            {data: 'qna_question', name:'qna_question' },
            {data: 'user_location', name:'user_location' },
            {data: 'qna_jurisdiction', name: 'qna_jurisdiction' },
            {data: 'is_favorite', name:'is_favorite' },
            {data: 'qna_answer_date', name:'qna_answer_date' },
            {data: 'action', name: 'action' },
        ],
    });
    $('#search_location').on('change', function(){
       $('#qna_others_table').DataTable().columns([3]).search(this.value).draw();   
    });
    $('#search_others_jurisdiction').on('change', function(){
        $('#qna_others_table').DataTable().columns([4]).search(this.value).draw();
    });
    $('#qna_others_answer_date').change(function(){
        $('#qna_others_table').DataTable().draw();
    });
    $('#is_others_favorite').change(function(){
        $('#qna_others_table').DataTable().draw();
    });
    $('#others_reset_search').on('click', function(){
        $("#search_others_jurisdiction").val('');
        $("#qna_others_answer_date").val('');
        $("#is_others_favorite").val('');
        $("#search_location").val('');
        $('#qna_others_table').DataTable().search('').columns().search('').draw();
    });
    $('#search_keyword').unbind().keyup(function(e) {
        var value = $(this).val();
        if (value.length >= 2) {
            $('#qna_others_table').DataTable().columns([2]).search(value).draw();
        } else {     
            $('#qna_others_table').DataTable().columns([2]).search('').draw();
        }        
    });
});
function userQNAOption() {
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
                url :  send_url + 'qna-select-ids',
                type : 'post',
                data : {"_token":csrf_token ,"ids":items, select_val: select_val},
                dataType:'json',
                success:function(data, textStatus, jqXHR) 
                { 
                    if(data.status == 1){
                        window.location.href = send_url + 'view-qna';
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
        window.location.href = send_url + 'view-qna';
    }
}
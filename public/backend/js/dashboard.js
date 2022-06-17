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
    $('#users_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: users_table,
        aLengthMenu: [[5, 15, 25, -1], [5, 15, 25, "All"]],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user_company', name: 'user_company' },
            {data: 'user_fname', name:'user_fname' },
            {data: 'user_location', name:'user_location' },
            {data: 'user_email', name: 'user_email' },
            {data: 'user_contact_main', name: 'user_contact_main' },
            {data: 'created_at', name:'created_at' },
        ]
    });
    $('#search_location').on('change', function(){
       $('#users_table').DataTable().search(this.value).draw();   
    });
    $('#users_table_two').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        aLengthMenu: [[5, 15, 25, -1], [5, 15, 25, "All"]],
        ajax: {
            url: all_users_table,
            data: function (d) {
                d.search_user_company = $('input[name=search_user_company]').val();
            }
        },
        columns: [
            {data: 'user_company', name: 'user_company' },
            {data: 'user_fname', name:'user_fname' },
            {data: 'user_location', name:'user_location' },
            {data: 'created_at', name:'created_at' },
            {data: 'user_contact_main', name: 'user_contact_main' },
            {data: 'user_qts', name: 'user_qts' },
            {data: 'user_ques_last', name: 'user_ques_last' },
            {data: 'user_ans_last', name: 'user_ans_last' },
        ]
    });
    $('#search_user_location').on('change', function(){
       $('#users_table_two').DataTable().search(this.value).draw();   
    });
    $('#reset_user_search').on('click', function(){
        $('#search_user_location').val('');
        $("#search_user_company").val('');
        $('#users_table_two').DataTable().search('').columns().search('').draw();
    });
    $('#qna_answered_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: qna_answered_table,
        aLengthMenu: [[5, 15, 25, -1], [5, 15, 25, "All"]],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user_company', name: 'user_company' },
            {data: 'user_fname', name:'user_fname' },
            {data: 'user_location', name:'user_location' },
            {data: 'qna_jurisdiction', name: 'qna_jurisdiction' },
            {data: 'created_at', name:'created_at' },
            {data: 'qna_question', name: 'qna_question' },
        ]
    });
    $('#qna_search_location').on('change', function(){
       $('#qna_answered_table').DataTable().search(this.value).draw();   
    });
    $('#search_jurisdiction').on('change', function(){
       $('#qna_answered_table').DataTable().columns([4]).search(this.value).draw();
    });
    $('#reset_search').on('click', function(){
        $('#search_jurisdiction').val('');
        $("#qna_search_location").val('');
        $('#qna_answered_table').DataTable().search('').columns().search('').draw();
    });
    var qnatable = $('#qna_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        ajax: {
            url: qna_datatables,
            data: function (d) {
                d.qna_answer_date = $('#qna_answer_date').val();
                d.is_favorite = $('#is_favorite').val();
                d.search_keyword = $('input[name=search_keyword]').val();
                d.search_company_fullname = $('input[name=search_company_fullname]').val();
            }
        },
        aLengthMenu: [[5, 15, 25, -1], [5, 15, 25, "All"]],
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
    $('#search_qna_location').on('change', function(){
        qnatable.columns([3]).search($(this).val()).draw();
    });
    $('#search_qna_jurisdiction').on('change', function(){
       qnatable.columns([4]).search(this.value).draw();
    });
    $('#qna_answer_date').change(function(){
        qnatable.draw();
    });
     $('#is_favorite').change(function(){
        qnatable.draw();
    });
    $('#reset_qna_search').on('click', function(){
        $('#search_qna_location').val('');
        $("#search_qna_jurisdiction").val('');
        $("#qna_answer_date").val('');
        $("#is_favorite").val('');
        $("#search_keyword").val('');
        $("#search_company_fullname").val('');
        qnatable.search('').columns().search('').draw();
    });
    $("#search_keyword").on('keyup',function(){
        qnatable.draw();
    });
    $("#search_company_fullname").on('keyup',function(){
        qnatable.draw();
    });
});
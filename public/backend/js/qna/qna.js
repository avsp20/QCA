$(function () {
    var qna_table = $('#qna_table').DataTable({
        destroy: true,  
        processing: true,
        serverSide: true,
        // ajax: window.location.href,
        ajax: {
            url: window.location.href,
            data: function (d) {
                d.qna_answer_date = $('#qna_answer_date').val()
                d.is_favorite = $('#is_favorite').val()
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'qna_question_date', name:'qna_question_date' },
            {data: 'qna_question', name:'qna_question' },
            {data: 'location', name: 'location' },
            {data: 'qna_jurisdiction', name: 'qna_jurisdiction' },
            {data: 'is_favorite', name:'is_favorite', orderable: false },
            {data: 'qna_answer_date', name:'qna_answer_date' },
            {data: 'action', name: 'action' },
        ],
    });
    $('#search_location').on('change', function(){
        qna_table.columns([3]).search($(this).val()).draw();
    });
    $('#search_jurisdiction').on('change', function(){
       qna_table.columns([4]).search(this.value).draw();
    });
    $('#qna_answer_date').change(function(){
        qna_table.draw();
    });
     $('#is_favorite').change(function(){
        qna_table.draw();
    });
});
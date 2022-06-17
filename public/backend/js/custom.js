var swalInit = swal.mixin({
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-primary',
    cancelButtonClass: 'btn btn-light'
});
 $(".select_all input[type='checkbox'] ").click(function(e) {
   	if($(this).prop("checked") == true){
      	$("input[type='checkbox']").attr('checked', true);
    }
    else if($(this).prop("checked") == false){
      	$("input[type='checkbox']").attr('checked', false);
    }
});
function QNABulk()
{   
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
                url :  send_url + 'qna-select-ids',
                type : 'post',
                data : {"_token":csrf_token ,"ids":items, select_val: select_val},
                dataType:'json',
                success:function(data, textStatus, jqXHR) 
                { 
                    console.log(data);
                    if(data.status == 1){
                        window.location.href = send_url + 'view-qna';
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    //if fails      
                } 
            });     
        }
    }else{
        window.location.href = send_url + 'view-qna';
    }
}
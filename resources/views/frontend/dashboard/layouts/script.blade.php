<script src="{{ asset('public/frontend/dashboard/js/jquery.min.js') }}"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="{{ asset('public/frontend/dashboard/js/bootstrap.min.js') }}"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="{{ asset('public/frontend/dashboard/js/jquery.slimscroll.js') }}"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="{{ asset('public/frontend/dashboard/js/waves.js') }}"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="{{ asset('public/frontend/dashboard/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('public/frontend/dashboard/js/jquery.dataTables.min.js') }}"></script>
<!-- ===== Custom JavaScript ===== -->
<script src="{{ asset('public/frontend/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/frontend/dashboard/js/jquery.toast.js') }}"></script>
<script src="{{ asset('public/frontend/dashboard/js/toastr.js') }}"></script>
<script src="{{ asset('public/frontend/dashboard/js/custom.js') }}"></script>
<script type="text/javascript">
    var base_url = '{{ url("/") }}';
    var csrf_token = '{{ csrf_token() }}';
    @if(Auth::check())
        var u_id = '{{ Auth::id() }}';
    @endif
</script>
<script type="text/javascript">
    @if(Session::has('success'))
        $.toast({
            text: '{{ session("success") }}',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        });
    @endif
    @if(Session::has('error'))
        $.toast({
            text: '{{ session("error") }}',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'danger',
            hideAfter: 3500,
            stack: 6
        });
    @endif
</script>
<script type="text/javascript">
    var ajax_call = function() {
        $.ajax({
            url :  base_url + '/user/notifications/' + u_id,
            type : 'get',
            async: false,
            success:function(data, textStatus, jqXHR)
            {
                if(data.status == 1){
                    console.log(data.data.notifications_count);
                    if(data.data.notifications != null){
                        $(".notify_count").text(data.data.notifications_count);
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            }
        });
    };

    var interval = 1000 * 60 * 1; // where X is your every X minutes

    setInterval(ajax_call, interval);
</script>

@extends('frontend.dashboard.master')
@section('content')
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="tc-header">
                <div class="tc-header-right">
                    <h3 class="box-title m-0">Notifications</h3>
                </div>
            </div>
            <p class="text-muted m-b-30"></p>
            <div class="table-responsive">
                <table id="notifications_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th data-orderable="false">Datetime</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $('#notifications_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: window.location.href,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'label', name:'label' },
                {data: 'message', name:'message' },
                {data: 'created_at', name: 'created_at' },
            ],
        });
    });
</script>
@endsection
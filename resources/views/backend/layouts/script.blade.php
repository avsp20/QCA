<!-- Core JS files -->
<script src="{{ asset('public/backend/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('public/backend/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('public/backend/js/plugins/visualization/d3/d3.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/ui/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/pickers/daterangepicker.js') }}"></script>

<script src="{{ asset('public/backend/js/plugins/forms/styling/uniform.min.js') }}"></script>

<script src="{{ asset('public/backend/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('public/backend/js/demo_pages/datatables_basic.js') }}"></script>

<script src="{{ asset('public/backend/js/plugins/forms/selects/select2.min.js') }}"></script>

<!-- Theme JS files -->
<script src="{{ asset('public/backend/js/plugins/uploaders/fileinput/purify.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/uploaders/fileinput/sortable.min.js') }}"></script>
<script src="{{ asset('public/backend/js/plugins/uploaders/fileinput.min.js') }}"></script>
<!-- /theme JS files -->
<script src="{{ asset('public/backend/js/plugins/notifications/sweet_alert.min.js') }}"></script>

<script src="{{ asset('public/backend/js/app.js') }}"></script>
<script src="{{ asset('public/backend/js/demo_pages/dashboard.js') }}"></script>
<script src="{{ asset('public/backend/js/demo_pages/form_layouts.js') }}"></script>
<script src="{{ asset('public/backend/js/demo_pages/uploader_bootstrap.js') }}"></script>
<script src="{{ asset('public/frontend/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/backend/js/custom.js') }}"></script>
<script type="text/javascript">
	var base_url = '{{ url("/") }}';
	var csrf_token = '{{ csrf_token() }}';
	var base_public_url = '{{ url("/") }}/public/backend/images/';
</script>
<h1>Forget Password Email</h1>

You can reset password from below link:
@if($role == 1)
	<a href="{{ route('admin.password.reset', $token) }}">Reset Password</a>
@else
	<a href="{{ route('user.password.reset', $token) }}">Reset Password</a>
@endif
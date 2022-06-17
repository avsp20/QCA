@php
  use App\Http\Controllers\Frontend\CommonController as Common;
  $notifications_count = Common::notifications_count(Auth::id());
  $notifications = Common::notifications(Auth::id());
@endphp
<!-- ===== Top-Navigation ===== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars"></i>
            </a>
            <div class="top-left-part">
                <a class="logo" href="index.html">
                        <img src="{{ asset('public/frontend/img/logo-footer.png') }}" alt="home" />
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li>
                    <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                        <i class="icon-speech"></i>
                        <span class="badge badge-xs badge-danger notify_count">{{ ($notifications_count > 0) ? $notifications_count : "" }}</span>
                    </a>
                    <ul class="dropdown-menu mailbox animated bounceInDown">
                        <li>
                            <div class="drop-title">You have <span class="notify_count">{{ ($notifications_count > 0) ? $notifications_count : "no any" }}</span> new messages</div>
                        </li>
                        @if(count($notifications) > 0)
                            <li>
                                <div class="message-center">
                                    @foreach($notifications as $notification)
                                        @if($notification->label == "QNA")
                                            @php
                                                $route = route('user.user-notifications');
                                            @endphp
                                        @else
                                            @php
                                                $route = route('user.alert-notifications');
                                            @endphp
                                        @endif
                                        <a href="{{ $route }}">
                                            <div class="mail-contnet">
                                                <h5>{{ $notification->label }}</h5>
                                                <span class="mail-desc">{{ $notification->message }}</span>
                                                <span class="time">{{ isset($notification->created_at) ? \Carbon\Carbon::parse($notification->created_at)->format('jS F, Y h:i A') : '-' }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                        <li>
                            <a class="text-center" href="{{ route('user.user-notifications') }}">
                                <strong>See all notifications</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
<!-- ===== Top-Navigation-End ===== -->
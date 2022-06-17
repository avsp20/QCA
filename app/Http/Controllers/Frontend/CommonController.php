<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CMS;
// use App\Models\PageSetting;
use App\Models\Notification;
use Exception;

// use Illuminate\Http\Request;

class CommonController extends Controller {
	public function frontBanners() {
		$front_settings = Banner::with('page')->get();
		return $front_settings;
	}

	public function cms() {
		try {
			$cms = CMS::get();
			return $cms;
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function notifications_count($id) {
		$user = Notification::where('user_id', $id)->where('status', 1)->count();
		return $user;
	}

	public function notifications($id) {
		$notifications = array();
		$user_data     = Notification::where('user_id', $id)->whereIn('status', [1, 2])->orderBy('created_at', 'DESC');
		$user          = $user_data->count();
		if ($user > 0) {
			$notifications = $user_data->take(4)->get();
		}
		return $notifications;
	}
}

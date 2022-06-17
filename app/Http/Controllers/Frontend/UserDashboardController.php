<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Frontpages;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Qna;
use App\Models\QnaFavorite;
use App\Models\User;
use Auth;
use DataTables;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

// use Illuminate\Support\Str;

class UserDashboardController extends Controller {
	public function dashboard(Request $request) {
		try {
			$locations     = Frontpages::locations();
			$jurisdictions = Frontpages::jurisdictions();
			Session::forget('user_qna_bulk');
			if ($request->ajax()) {
				$qna = QnaFavorite::with('qna')->where('user_id', Auth::id())->latest()->get();
				return DataTables::of($qna)
					->addColumn('qna_id', function ($row) {
						$question = '';
						if ($row->qna != null) {
							$question = isset($row->qna->qna_question) ? '<a href="' . url('/user') . '/qna/' . $row->qna_id . '" target="_blank">' . (strlen($row->qna->qna_question) > 75 ? substr(strip_tags($row->qna->qna_question), 0, 75) . "..." : strip_tags($row->qna->qna_question)) . '</a>' : '';
						}
						return $question;
					})
					->addColumn('favorite', function ($row) {
						$favorite = '';
						$favorite = '<i class="fa fa-star text-yellow"></i>';
						return $favorite;
					})
					->rawColumns(['qna_id', 'favorite'])
					->make(true);
			}
			return view('frontend.dashboard.dashboard', compact('jurisdictions', 'locations'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function userQNADataTables(Request $request) {
		if ($request->ajax()) {
			$qna = Qna::with('user')->with(['qna_favorites' => function ($query) {
				$query->where('user_id', Auth::id());
			}])->where('qna_user_id', Auth::id())->latest()->get();
			return DataTables::of($qna)
				->addIndexColumn()
				->addColumn('qna_question_date', function ($row) {
					$date = '';
					$date = isset($row->qna_question_date) ? \Carbon\Carbon::parse($row->qna_question_date)->format('d/m/y') : '';
					return $date;
				})
				->addColumn('qna_answer_date', function ($row) {
					$date = '';
					$date = isset($row->qna_answer_date) ? \Carbon\Carbon::parse($row->qna_answer_date)->format('d/m/y') : '';
					return $date;
				})
				->addColumn('qna_question', function ($row) {
					$question = '';
					$question = isset($row->qna_question) ? '<a href="' . url('/') . '/user/qna/' . $row->id . '" target="_blank">' . (strlen($row->qna_question) > 45 ? substr(strip_tags($row->qna_question), 0, 45) . "..." : strip_tags($row->qna_question)) . '</a>' : '-';
					return $question;
				})
				->addColumn('is_favorite', function ($row) {
					$fav = '';
					$fav = '<i class="fa fa-star-o"></i>';
					if ($row->qna_favorites != null) {
						$fav = '<i class="fa fa-star text-yellow"></i>';
					}
					return $fav;
				})
				->addColumn('check', function ($row) {
					$check = '';
					$check = '<div class="checkbox checkbox-primary"><input name="qna_select[]" type="checkbox" class="user-qna" id="check_qna' . $row->id . '" value="' . $row->id . '"><label for="check_qna' . $row->id . '"></label></div>';
					return $check;
				})
				->addColumn('action', function ($row) {
					$btn = '';
					$btn .= '<a href="' . url('/user/') . '/view-qna/' . $row->id . '" target="_new4" class="list-icons-item text-primary" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="icon-printer answer-icon"></i></a>';
					$btn .= '<a href="' . url('/user/') . '/view-qna/' . $row->id . '" target="_new3" class="list-icons-item text-teal ml-10" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="icon-cloud-download view-icon"></i></a>';
					return $btn;
				})
				->rawColumns(['action', 'qna_question_date', 'qna_answer_date', 'is_favorite', 'qna_question', 'check'])
				->filter(function ($instance) use ($request) {
					if ($request->get('qna_answer_date') == 1) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return ($row['qna_answer_date'] != '');
						});
					} else if ($request->get('qna_answer_date') == 2) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return ($row['qna_answer_date'] == '');
						});
					}
					if ($request->get('is_favorite') == 1) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return ($row['qna_favorites'] != null) ? true : false;
						});
					} else if ($request->get('is_favorite') == 2) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return ($row['qna_favorites'] == null) ? true : false;
						});
					}
				})
				->make(true);
		}
	}

	public function OtherUserQNADataTables(Request $request) {
		if ($request->ajax()) {
			$qna = Qna::with('user')->with(['qna_favorites' => function ($query) {
				$query->where('user_id', Auth::id());
			}])->where('qna_user_id', '!=', Auth::id())->where('qna_available_to_others', 1)->latest()->get();
			return DataTables::of($qna)
				->addIndexColumn()
				->addColumn('qna_question_date', function ($row) {
					$date = '';
					$date = isset($row->qna_question_date) ? \Carbon\Carbon::parse($row->qna_question_date)->format('d/m/y') : '';
					return $date;
				})
				->addColumn('qna_answer_date', function ($row) {
					$date = '';
					$date = isset($row->qna_answer_date) ? \Carbon\Carbon::parse($row->qna_answer_date)->format('d/m/y') : '';
					return $date;
				})
				->addColumn('user_location', function ($row) {
					$location = '';
					if ($row->user != null) {
						$location .= $row->user->user_location;
					}
					return $location;
				})
				->addColumn('qna_question', function ($row) {
					$question = '';
					$question = isset($row->qna_question) ? '<a href="' . url('/') . '/user/qna/' . $row->id . '" target="_blank">' . (strlen($row->qna_question) > 45 ? substr(strip_tags($row->qna_question), 0, 45) . "..." : strip_tags($row->qna_question)) . '</a>' : '-';
					return $question;
				})
				->addColumn('is_favorite', function ($row) {
					$fav = '';
					$fav = '<i class="fa fa-star-o"></i>';
					if ($row->qna_favorites != null) {
						$fav = '<i class="fa fa-star text-yellow"></i>';
					}
					return $fav;
				})
				->addColumn('check', function ($row) {
					$check = '';
					$check = '<div class="checkbox checkbox-primary"><input name="qna_select[]" class="other-user-qna" id="checkbox' . $row->id . '" type="checkbox" value="' . $row->id . '"><label for="checkbox' . $row->id . '"></label></div>';
					return $check;
				})
				->addColumn('action', function ($row) {
					$btn = '';
					$btn .= '<a href="' . url('/user/') . '/view-qna/' . $row->id . '" target="_new5" class="list-icons-item text-primary" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="icon-printer answer-icon"></i></a>';
					$btn .= '<a href="' . url('/user/') . '/view-qna/' . $row->id . '" target="_new6" class="list-icons-item text-teal ml-10" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="icon-cloud-download view-icon"></i></a>';
					return $btn;
				})
				->rawColumns(['action', 'qna_question_date', 'qna_answer_date', 'is_favorite', 'qna_question', 'check', 'user_location'])
				->filter(function ($instance) use ($request) {
					if ($request->get('qna_others_answer_date') == 1) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return ($row['qna_answer_date'] != '');
						});
					} else if ($request->get('qna_others_answer_date') == 2) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return ($row['qna_answer_date'] == '');
						});
					}
					if ($request->get('is_others_favorite') == 1) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return ($row['qna_favorites'] != null) ? true : false;
						});
					} else if ($request->get('is_others_favorite') == 2) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return ($row['qna_favorites'] == null) ? true : false;
						});
					}
					/*if ($request->has('search_keyword')) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							return Str::contains($row['qna_question'], $request->get('search_keyword')) ? true : false;
						});
					}*/
				})
				->make(true);
		}
	}

	public function profile() {
		try {
			return view('frontend.dashboard.profile');
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function editProfile() {
		try {
			if (!Auth::user()) {
				return redirect()->back()->with('error', 'First you need to login.');
			}
			$user = Auth::user();
			return view('frontend.dashboard.edit-profile', compact('user'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function updateProfile(Request $request) {
		$this->validate($request, [
			'main_phone' => 'required|numeric',
			'mobile'     => 'required|numeric',
			'password'   => 'nullable|min:6',
		]);
		if (!Auth::user()) {
			return redirect()->back()->with('error', 'First, You need to login');
		}
		$user                      = Auth::user();
		$user->user_contact_main   = $request->main_phone;
		$user->user_contact_mobile = $request->mobile;
		if ($request->password != null) {
			$user->user_password = Hash::make($request->password);
		}
		$user->save();
		return redirect()->back()->with('success', 'Your profile updated successfully.');
	}

	public function viewSelectedQNA($id, $qna_id = null) {
		$user = User::where('id', $id)->first();
		if ($qna_id) {
			$qna = Qna::where('qna_user_id', $id)->where('id', $qna_id)->get();
		} elseif (Session::get('user_qna_bulk') != null) {
			$qna = Qna::whereIn('id', Session::get('user_qna_bulk.qna_ids'))->get();
		} else {
			$qna = Qna::get();
		}
		return view('frontend.dashboard.qna.qna-bulk', compact('qna', 'user'));
	}

	public function downloadSelectedQNA($id, $qna_id = null) {
		$user = User::where('id', $id)->first();
		if ($qna_id) {
			$qna = Qna::where('qna_user_id', $id)->where('id', $qna_id)->get();
		} elseif (Session::get('user_qna_bulk') != null) {
			$qna = Qna::whereIn('id', Session::get('user_qna_bulk.qna_ids'))->get();
		} else {
			$qna = Qna::get();
		}
		$pdf = \PDF::loadView('frontend.dashboard.qna.user-qna-pdf', compact('qna', 'user'));
		return $pdf->download('qna.pdf');
	}

	public function getQNASelectedIds(Request $request) {
		try {
			Session::forget('user_qna_bulk');
			if ($request->select_val == 1) {
				$session = array(
					'qna_ids' => $request->ids,
				);
				Session::put('user_qna_bulk', $session);
				return response()->json(['status' => 1, 'responseMessage' => 'QNA bulk data.']);
			} else {
				return response()->json(['status' => 0, 'responseMessage' => 'Something went wrong, try again later.']);
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
		return response()->json(['status' => 1, 'responseMessage' => 'QNA data.']);
	}

	public function getUserNotifications($id) {
		$notify_arr = array();
		if ($id) {
			$notifications = Notification::where('user_id', $id)->where('status', 1)->orderBy('created_at', 'DESC')->get();
			if (count($notifications) > 0) {
				foreach ($notifications as $key => $value) {
					$notify_arr[]['id']          = $value->id;
					$notify_arr[$key]['date']    = \Carbon\Carbon::parse($value->created_at)->format('F j, Y, g:i a');
					$notify_arr[$key]['message'] = $value->message;
				}
				$notifications_count = Notification::whereIn('status', [1, 2])->count();
				$notifications_data  = [
					'notifications'       => $notify_arr,
					'notifications_count' => $notifications_count,
				];
				Notification::where('user_id', $id)->update([
					'status' => 2,
				]);
				return response()->json(['data' => $notify_arr, 'status' => 1, 'responseMessage' => 'QNA data.'], 200);
			} else {
				return response()->json(['data' => null, 'status' => 0, 'responseMessage' => 'No new notifications.'], 200);
			}
		} else {
			return response()->json(['data' => null, 'status' => 0, 'responseMessage' => 'No notifications.'], 400);
		}
	}

	public function userAllNotifications(Request $request) {
		$user_id = Auth::user()->id;
		if ($request->ajax()) {
			$notifications = Notification::where('user_id', $user_id)->where('label', 'QNA')->orderBy('created_at', 'DESC')->get();
			return DataTables::of($notifications)
				->addIndexColumn()
				->addColumn('created_at', function ($row) {
					$date = '';
					$date = isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('jS F, Y h:i A') : '-';
					return $date;
				})
				->addColumn('message', function ($row) {
					$message = '';
					$message = isset($row->message) ? '<a href="' . url('/') . '/user/qna/' . $row->qna_id . '" target="_blank">' . (strlen($row->message) > 50 ? substr(strip_tags($row->message), 0, 50) . "..." : strip_tags($row->message)) . '</a>' : '-';
					if ($row->label == 'QNA') {
						$message = isset($row->message) ? '<a href="' . url('/') . '/user/qna/' . $row->qna_id . '" target="_blank">' . (strlen($row->message) > 50 ? substr(strip_tags($row->message), 0, 50) . "..." : strip_tags($row->message)) . '</a>' : '-';
					}
					return $message;
				})
				->rawColumns(['created_at', 'message'])
				->make(true);
		}
		return view('frontend.dashboard.notifications');
	}

	public function userAlertNotifications() {
		$user_id       = Auth::user()->id;
		$notifications = Notification::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
		return view('frontend.dashboard.alert-notifications', compact('notifications'));
	}
}

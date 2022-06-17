<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Frontpages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminProfileRequest;
use App\Models\Qna;
use App\Models\QnaFavorite;
use App\Models\User;
use Auth;
use DataTables;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class AdminController extends Controller {
	public function dashboard(Request $request) {
		try {
			$jurisdictions = Frontpages::jurisdictions();
			$locations     = Frontpages::locations();
			Session::forget('qna_bulk');
			if ($request->ajax()) {
				$qna = QnaFavorite::with('qna')->where('user_id', Auth::guard('admin')->id())->latest()->get();
				return DataTables::of($qna)
				// ->addIndexColumn()
					->addColumn('qna_id', function ($row) {
						$question = '';
						if ($row->qna != null) {
							$question = isset($row->qna->qna_question) ? '<a href="' . url('/admin') . '/qna/' . $row->qna_id . '" target="_blank">' . (strlen($row->qna->qna_question) > 155 ? substr(strip_tags($row->qna->qna_question), 0, 155) . "..." : strip_tags($row->qna->qna_question)) . '</a>' : '';
						}
						return $question;
					})
					->addColumn('favorite', function ($row) {
						$favorite = '';
						$favorite = '<i class="icon-star-full2 text-yellow"></i>';
						return $favorite;
					})
					->rawColumns(['qna_id', 'favorite'])
					->make(true);
			}
			return view('backend.dashboard', compact('locations', 'jurisdictions'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function getUsersDataTables(Request $request) {
		if ($request->ajax()) {
			$users = User::whereHas('user_role', function ($query) {
				$query->where('role_id', 2);
			})->where('user_is_approved', 0)->latest()->get();
			return DataTables::of($users)
				->addIndexColumn()
				->addColumn('created_at', function ($row) {
					$date = '';
					$date = isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('d/m/y') : '-';
					return $date;
				})
				->addColumn('user_company', function ($row) {
					$company = '';
					$company .= '<a href="' . url('/admin/') . '/users/' . $row->id . '">' . $row->user_company . '</a>';
					return $company;
				})
				->addColumn('user_fname', function ($row) {
					$full_name = (isset($row->user_fname) && isset($row->user_lname)) ? ucfirst($row->user_fname) . ' ' . ucfirst($row->user_lname) : '';
					return $full_name;
				})
				->addColumn('user_contact_main', function ($row) {
					$contact = '';
					$contact .= $row->user_contact_main . '<br>' . $row->user_contact_mobile;
					return $contact;
				})
				->rawColumns(['created_at', 'user_fname', 'user_company', 'user_contact_main'])
			// ->toJson();
				->make(true);
		}
	}

	public function getAllUsersDataTables(Request $request) {
		if ($request->ajax()) {
			$users = User::with(['qna' => function ($query) {
				$query->orderBy('qna_question_date', 'DESC');
			}])->with(['user_qna' => function ($query) {
				$query->orderBy('qna_answer_date', 'DESC');
			}])->whereHas('user_role', function ($query) {
				$query->where('role_id', 2);
			})->where('user_is_approved', 1)->latest()->get();
			return DataTables::of($users)
				->addIndexColumn()
				->addColumn('created_at', function ($row) {
					$date = '';
					$date = isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('d/m/y') : '-';
					return $date;
				})
				->addColumn('user_company', function ($row) {
					$company = '';
					$company .= '<a href="' . url('/admin/') . '/users/' . $row->id . '">' . $row->user_company . '</a>';
					return $company;
				})
				->addColumn('user_fname', function ($row) {
					$full_name = (isset($row->user_fname) && isset($row->user_lname)) ? ucfirst($row->user_fname) . ' ' . ucfirst($row->user_lname) : '';
					return $full_name;
				})
				->addColumn('user_qts', function ($row) {
					$user_qts = 0;
					if (count($row->qna) > 0) {
						$user_qts = $row->qna->count();
					}
					return $user_qts;
				})
				->addColumn('user_ques_last', function ($row) {
					$user_ques_last = '';
					if (count($row->qna) > 0) {
						$user_ques_last = isset($row->qna->first()->qna_question_date) ? \Carbon\Carbon::parse($row->qna->first()->qna_question_date)->format('d/m/y') : '-';
					}
					return $user_ques_last;
				})
				->addColumn('user_ans_last', function ($row) {
					$user_ans_last = '';
					if (count($row->user_qna) > 0) {
						$user_ans_last = isset($row->user_qna->first()->qna_answer_date) ? \Carbon\Carbon::parse($row->user_qna->first()->qna_answer_date)->format('d/m/y') : '-';
					}
					return $user_ans_last;
				})
				->addColumn('user_contact_main', function ($row) {
					$contact = '';
					$contact .= $row->user_contact_main . '<br>' . $row->user_contact_mobile;
					return $contact;
				})
				->rawColumns(['created_at', 'user_fname', 'user_company', 'user_contact_main', 'user_qts'])
			// ->toJson();
				->make(true);
		}
	}

	public function QNAAnswerDataTables(Request $request) {
		if ($request->ajax()) {
			$qna = Qna::with('user')->where('qna_answer', null)->latest()->get();
			return DataTables::of($qna)
				->addIndexColumn()
				->addColumn('created_at', function ($row) {
					$date = '';
					$date = isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('d/m/y') : '-';
					return $date;
				})
				->addColumn('user_company', function ($row) {
					$company = '';
					if ($row->user != null) {
						$company = isset($row->user->user_company) ? $row->user->user_company : '';
					}
					return $company;
				})
				->addColumn('user_location', function ($row) {
					$location = '';
					if ($row->user != null) {
						$location .= '<a href="' . url('/admin/') . '/users/' . $row->id . '">' . $row->user->user_location . '</a>';
					}
					return $location;
				})
				->addColumn('user_fname', function ($row) {
					$full_name = '';
					if ($row->user != null) {
						$full_name = (isset($row->user->user_fname) && isset($row->user->user_lname)) ? ucfirst($row->user->user_fname) . ' ' . ucfirst($row->user->user_lname) : '';
					}
					return $full_name;
				})
				->addColumn('qna_question', function ($row) {
					$question = '';
					$question = isset($row->qna_question) ? '<a href="' . url('/admin/') . '/qna/' . $row->id . '" target="_blank">' . (strlen($row->qna_question) > 40 ? substr(strip_tags($row->qna_question), 0, 40) . "..." : strip_tags($row->qna_question)) . '</a>' : '-';
					return $question;
				})
				->rawColumns(['created_at', 'user_fname', 'user_company', 'user_location', 'qna_question'])
			// ->toJson();
				->make(true);
		}
	}

	public function getQNADataTables(Request $request) {
		if ($request->ajax()) {
			$qna = Qna::with('user')->with(['qna_favorites' => function ($query) {
				$query->where('user_id', Auth::guard('admin')->id());
			}])->latest()->get();
			return DataTables::of($qna)
				->addIndexColumn()
				->addColumn('check', function ($row) {
					$check = '';
					$check = '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" name="qna_select[]" id="check_qna' . $row->id . '" value="' . $row->id . '"><label class="custom-control-label" for="check_qna' . $row->id . '"></label></div>';
					return $check;
				})
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
					$question = isset($row->qna_question) ? '<a href="' . url('/admin/') . '/qna/' . $row->id . '" target="_blank">' . (strlen($row->qna_question) > 50 ? substr(strip_tags($row->qna_question), 0, 50) . "..." : strip_tags($row->qna_question)) . '</a>' : '-';
					return $question;
				})
				->addColumn('is_favorite', function ($row) {
					$fav = '';
					$fav = '<i class="icon-star-full2"></i>';
					if ($row->qna_favorites != null) {
						$fav = '<i class="icon-star-full2 text-yellow"></i>';
					}
					return $fav;
				})
				->addColumn('location', function ($row) {
					if ($row->user != null) {
						$location = isset($row->user->user_location) ? ucfirst($row->user->user_location) : '';
					}
					return $location;
				})
				->addColumn('action', function ($row) {
					$btn = '';
					$btn .= '<a href="' . url('/admin') . '/view-qna/' . $row->id . '" target="_new" class="list-icons-item text-primary" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="icon-printer2"></i></a>';
					$btn .= '<a href="' . url('/admin') . '/view-qna/' . $row->id . '" target="_new2" class="list-icons-item text-teal ml-1" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="icon-file-download2"></i></a>';
					return $btn;
				})
				->rawColumns(['action', 'qna_question_date', 'qna_answer_date', 'is_favorite', 'qna_question', 'location', 'check'])
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
					if (!empty($request->get('search_keyword'))) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							if (Str::contains(Str::lower($row['qna_question']), Str::lower($request->get('search_keyword')))) {
								return true;
							}
							return false;
						});
					}
					if (!empty($request->get('search_company_fullname'))) {
						$instance->collection = $instance->collection->filter(function ($row) use ($request) {
							if (Str::contains(Str::lower($row['user']['user_fname']), Str::lower($request->get('search_company_fullname')))) {
								return true;
							}
							if (Str::contains(Str::lower($row['user']['user_lname']), Str::lower($request->get('search_company_fullname')))) {
								return true;
							}
							if (Str::contains(Str::lower($row['user']['user_company']), Str::lower($request->get('search_company_fullname')))) {
								return true;
							}
							return false;
						});
					}
				})
				->make(true);
		}
	}

	public function profile(Request $request) {
		try {
			$user = Auth::guard('admin')->user();
			return view('backend.profile', compact('user'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function editProfile(AdminProfileRequest $request) {
		try {
			$user      = User::find(Auth::guard('admin')->user()->id);
			$imageName = $user->user_image;
			if ($request->file('user_image')) {
				$imageName = time() . '.' . $request->user_image->extension();
				$request->user_image->move(public_path('/backend/images/profiles/'), $imageName);
			}
			$user->user_fname          = $request->user_fname;
			$user->user_lname          = $request->user_lname;
			$user->user_email          = $request->user_email;
			$user->user_contact_main   = $request->user_contact_main;
			$user->user_contact_mobile = $request->user_contact_mobile;
			$user->user_location       = $request->user_location;
			$user->user_image          = $imageName;
			if ($user->save()) {
				return redirect()->back()->with('status', 'Profile Updated Successfully');
			} else {
				return redirect()->back()->with('error', 'Something went wrong, try again later.');
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}
}

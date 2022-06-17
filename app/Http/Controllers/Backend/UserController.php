<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Frontpages;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Qna;
use App\Models\User;
use DataTables;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Session;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		try {
			$locations = Frontpages::locations();
			Session::forget('qna_bulk');
			if ($request->ajax()) {
				$users = User::whereHas('user_role', function ($query) {
					$query->where('role_id', 2);
				})->latest()->get();

				return DataTables::of($users)
					->addIndexColumn()
					->addColumn('created_at', function ($row) {
						$date = '';
						$date = isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('jS F, Y') : '-';

						return $date;
					})
					->addColumn('user_fname', function ($row) {
						$fname = isset($row->user_fname) ? ucfirst($row->user_fname) : '';

						return $fname;
					})
					->addColumn('user_lname', function ($row) {
						$lname = isset($row->user_lname) ? ucfirst($row->user_lname) : '';

						return $lname;
					})
					->addColumn('action', function ($row) {
						$btn = '';
						$btn .= '<a href="' . url()->current() . '/' . $row->id . '" class="list-icons-item text-teal" data-toggle="tooltip" data-placement="bottom" title="View"><i class="icon-eye view-icon"></i></a>';

						return $btn;
					})
					->rawColumns(['action', 'created_at', 'user_fname', 'user_lname'])
					->make(true);
			}

			return view('backend.users.index', compact('locations'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id) {
		try {
			$locations = Frontpages::locations();
			$user      = User::findOrFail($id);

			if (!$user) {
				return redirect()->route('admin.users.index')->with('error', 'User Not Found.');
			}

			$jurisdictions = Frontpages::jurisdictions();

			if ($request->ajax()) {
				$qna = Qna::with('user')->with(['qna_favorites' => function ($query) use ($id) {
					$query->where('user_id', $id);
				},

				])->where('qna_user_id', $id)->latest()->get();

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
						$question = isset($row->qna_question) ? '<a href="' . url('/admin/') . '/qna/' . $row->id . '" target="_blank">' . (strlen($row->qna_question) > 50 ? substr(strip_tags($row->qna_question), 0, 50) . '...' : strip_tags($row->qna_question)) . '</a>' : '-';

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
						$btn .= '<a href="' . url('/admin/') . '/view-user-qna/' . $row->qna_user_id . '/' . $row->id . '" target="_new" class="list-icons-item text-primary" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="icon-printer2"></i></a>';
						$btn .= '<a href="' . url('/admin/') . '/view-user-qna/' . $row->qna_user_id . '/' . $row->id . '" target="_new2" class="list-icons-item text-teal ml-1" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="icon-file-download2"></i></a>';

						return $btn;
					})
					->rawColumns(['action', 'qna_question_date', 'qna_answer_date', 'is_favorite', 'qna_question', 'location', 'check'])
					->filter(function ($instance) use ($request) {
						if ($request->get('qna_answer_date') == 1) {
							$instance->collection = $instance->collection->filter(function ($row) use ($request) {
								return ($row['qna_answer_date'] != '');
							});
						} else

						if ($request->get('qna_answer_date') == 2) {
							$instance->collection = $instance->collection->filter(function ($row) use ($request) {
								return ($row['qna_answer_date'] == '');
							});
						}

						if ($request->get('is_favorite') == 1) {
							$instance->collection = $instance->collection->filter(function ($row) use ($request) {
								return ($row['qna_favorites'] != null) ? true : false;
							});
						} else

						if ($request->get('is_favorite') == 2) {
							$instance->collection = $instance->collection->filter(function ($row) use ($request) {
								return ($row['qna_favorites'] == null) ? true : false;
							});
						}
					})
					->make(true);
			}

			return view('backend.users.view', compact('user', 'jurisdictions'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function approveUser($id) {
		try {
			$user = User::findOrFail($id);

			if (!$user) {
				return redirect()->route('admin.users.index')->with('error', 'User Not Found.');
			}

			$data = array(
				'name' => ucfirst($user->user_fname) . ' ' . ucfirst($user->user_lname),
			);
			User::where('id', $id)->update([
				'user_is_approved' => 1,
			]);
			// Store notifications
			Notification::insert([
				'user_id'    => $id,
				'label'      => 'Approve User',
				'message'    => 'You account is verified and approved successfully.',
				'status'     => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			]);
			Mail::to($user->user_email)->send(new \App\Mail\ApproveUser($data));

			return redirect()->route('admin.users.index')->with('success', 'User approved successfully.');
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function rejectUser($id) {
		try {
			$user = User::findOrFail($id);

			if (!$user) {
				return redirect()->route('admin.users.index')->with('error', 'User Not Found.');
			}

			$data = array(
				'name' => ucfirst($user->user_fname) . ' ' . ucfirst($user->user_lname),
			);
			User::where('id', $id)->update([
				'user_is_approved' => 2,
			]);
			// Store notifications
			Notification::insert([
				'user_id'    => $id,
				'label'      => 'Reject User',
				'message'    => 'You account is rejected from administrator.',
				'status'     => 5,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			]);
			Mail::to($user->user_email)->send(new \App\Mail\RejectUser($data));

			return redirect()->route('admin.users.index')->with('success', 'User rejected successfully.');
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function resetPassword(Request $request, $id) {
		$this->validate($request, [
			'password'         => 'required|min:8',
			'confirm_password' => 'required|min:8|required_with:password|same:password',
		]);
		$user = User::findOrFail($id);

		if (!$user) {
			return redirect()->back()->with('error', 'Something went wrong, try again later.');
		}

		$user->user_password = Hash::make($request->password);
		$user->save();
		$data = array(
			'name'     => ucfirst($user->user_fname) . ' ' . ucfirst($user->user_lname),
			'email'    => $user->user_email,
			'password' => $request->password,
		);
		// Store notifications
		Notification::insert([
			'user_id'    => $id,
			'label'      => 'Reset Password',
			'message'    => 'You account password is reset successfully.',
			'status'     => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);
		Mail::to($user->user_email)->send(new \App\Mail\ResetPassword($data));

		return redirect()->route('admin.users.show', [$id])->with('success', 'Password changed successfully.');
	}

	public function viewSelectedQNA($id, $qna_id = null) {
		$user = User::where('id', $id)->first();
		if ($qna_id) {
			$qna = Qna::where('qna_user_id', $id)->where('id', $qna_id)->get();
		} elseif (Session::get('qna_bulk') != null) {
			$qna = Qna::whereIn('id', Session::get('qna_bulk.qna_ids'))->get();
		} else {
			$qna = Qna::get();
		}
		return view('backend.qna.qna-bulk', compact('qna', 'user'));
	}

	public function downloadSelectedQNA($id, $qna_id = null) {
		$user = User::where('id', $id)->first();
		if ($qna_id) {
			$qna = Qna::where('qna_user_id', $id)->where('id', $qna_id)->get();
		} elseif (Session::get('qna_bulk') != null) {
			$qna = Qna::whereIn('id', Session::get('qna_bulk.qna_ids'))->get();
		} else {
			$qna = Qna::get();
		}
		$pdf = \PDF::loadView('backend.qna.user-qna-pdf', compact('qna', 'user'));
		return $pdf->download('qna.pdf');
	}

	public function getQNASelectedIds(Request $request) {
		try {
			Session::forget('qna_bulk');
			if ($request->select_val == 1) {
				$session = array(
					'qna_ids' => $request->ids,
				);
				Session::put('qna_bulk', $session);
				return response()->json(['status' => 1, 'responseMessage' => 'QNA bulk data.']);
			} else {
				return response()->json(['status' => 0, 'responseMessage' => 'Something went wrong, try again later.']);
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
		return response()->json(['status' => 1, 'responseMessage' => 'QNA data.']);
	}
}

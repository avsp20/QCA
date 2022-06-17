<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Frontpages;
use App\Http\Controllers\Controller;
use App\Models\Qna;
use App\Models\QnaFavorite;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Session;

class UserQNAController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		try {
			$jurisdictions = Frontpages::jurisdictions();
			Session::forget('user_qna_bulk');
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
						$question = isset($row->qna_question) ? '<a href="' . url()->current() . '/' . $row->id . '" target="_blank">' . (strlen($row->qna_question) > 45 ? substr(strip_tags($row->qna_question), 0, 45) . "..." : strip_tags($row->qna_question)) . '</a>' : '-';
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
						$check = '<div class="checkbox checkbox-primary"><input name="qna_select[]" class="user-qna-check" id="checkbox' . $row->id . '" type="checkbox" name="user_qna[]" value="' . $row->id . '"><label for="checkbox' . $row->id . '"></label></div>';
						return $check;
					})
					->addColumn('action', function ($row) {
						$btn = '';
						$btn .= '<a href="' . url()->current() . '/' . $row->id . '" class="list-icons-item text-teal" data-toggle="tooltip" data-placement="bottom" title="View"><i class="icon-eye view-icon"></i></a>';
						$btn .= '<a href="' . url('/user/') . '/view-user-qna/' . $row->qna_user_id . '/' . $row->id . '" target="_new4" class="list-icons-item text-primary ml-10" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="icon-printer answer-icon"></i></a>';
						$btn .= '<a href="' . url('/user/') . '/view-user-qna/' . $row->qna_user_id . '/' . $row->id . '" target="_new3" class="list-icons-item text-teal ml-10" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="icon-cloud-download view-icon"></i></a>';
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
			return view('frontend.dashboard.qna.index', compact('jurisdictions'));
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
		try {
			$jurisdictions = Frontpages::jurisdictions();
			return view('frontend.dashboard.qna.create', compact('jurisdictions'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		try {
			$this->validate($request, [
				'subject'      => 'required',
				'jurisdiction' => 'required',
				'question'     => 'required|min:2|max:800',
			]);
			if (!Auth::user()) {
				return redirect()->back()->with('error', 'First, You need to login');
			}
			$user                        = Auth::user();
			$qna_user                    = new Qna();
			$qna_user->qna_user_id       = $user->id;
			$qna_user->qna_subject       = $request->subject;
			$qna_user->qna_jurisdiction  = $request->jurisdiction;
			$qna_user->qna_question_date = date('Y-m-d H:i:s');
			$qna_user->qna_question      = $request->question;
			if ($qna_user->save()) {
				return redirect()->route('user.qna.index')->with('success', 'Your Question added successfully.');
			} else {
				return redirect()->back()->with('error', 'Something went wrong, try again later.');
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		try {
			$qna = Qna::with(['qna_favorites' => function ($query) {
				$query->where('user_id', Auth::user()->id);
			}])->findOrFail($id);
			if (!$qna) {
				return redirect()->route('user.qna.index')->with('error', 'QNA Not Found.');
			}
			return view('frontend.dashboard.qna.view', compact('qna'));
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
		try {
			$this->validate($request, [
				'qna_favorite' => 'required|in:0,1',
			]);
			if (!Auth::user()) {
				return redirect()->back()->with('error', 'First, You need to login');
			}
			$user         = Auth::user();
			$qna_favorite = QnaFavorite::where('qna_id', $id)->where('user_id', $user->id)->first();
			if ($request->qna_favorite == 1) {
				if (!$qna_favorite) {
					$qna_favorite = QnaFavorite::create([
						'qna_id'  => $id,
						'user_id' => $user->id,
					]);
				}
				return redirect()->back()->with('success', 'QNA added as favorites.');
			} else {
				if ($qna_favorite) {
					$qna_favorite->delete();
					return redirect()->back()->with('success', 'QNA removed from favorites.');
				}
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
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

	public function viewSelectedQNA($id = null) {
		try {
			if ($id) {
				$qna = Qna::where('id', $id)->get();
			} elseif (Session::get('user_qna_bulk') != null) {
				$qna = Qna::whereIn('id', Session::get('user_qna_bulk.qna_ids'))->get();
			} else {
				$qna = Qna::get();
			}
			return view('frontend.dashboard.qna.qna-bulk-details', compact('qna'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
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

	public function downloadSelectedQNA($id = null) {
		if ($id) {
			$qna = Qna::where('id', $id)->get();
		} elseif (Session::get('user_qna_bulk') != null) {
			$qna = Qna::whereIn('id', Session::get('user_qna_bulk.qna_ids'))->get();
		} else {
			$qna = Qna::get();
		}
		$pdf = \PDF::loadView('frontend.dashboard.qna.qna-pdf', compact('qna'));
		return $pdf->download('qna.pdf');
	}
}

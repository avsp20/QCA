<?php

namespace App\Http\Controllers\Backend;

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
use Mail;
use Session;

class QNAController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		try {
			$locations     = Frontpages::locations();
			$jurisdictions = Frontpages::jurisdictions();
			Session::forget('qna_bulk');
			if ($request->ajax()) {
				$qna = Qna::with('user')->with(['qna_favorites' => function ($query) {
					$query->where('user_id', Auth::guard('admin')->id());
				}])->latest()->get();
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
						$question = isset($row->qna_question) ? '<a href="' . url()->current() . '/' . $row->id . '" target="_blank">' . (strlen($row->qna_question) > 50 ? substr(strip_tags($row->qna_question), 0, 50) . "..." : strip_tags($row->qna_question)) . '</a>' : '-';
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
				// ->addColumn('user_fname', function ($row) {
				// 	if ($row->user != null) {
				// 		$fname = (isset($row->user->user_fname) && isset($row->user->user_lname)) ? ucfirst($row->user->user_fname) . ' ' . ucfirst($row->user->user_lname) : '';
				// 	}
				// 	return $fname;
				// })
					->addColumn('location', function ($row) {
						if ($row->user != null) {
							$location = isset($row->user->user_location) ? ucfirst($row->user->user_location) : '';
						}
						return $location;
					})
					->addColumn('action', function ($row) {
						$btn = '';
						$btn .= '<a href="' . url()->current() . '/' . $row->id . '/edit" class="list-icons-item text-primary" data-toggle="tooltip" data-placement="bottom" title="Answer QNA"><i class="icon-text-color answer-icon"></i></a>';
						$btn .= '<a href="' . url()->current() . '/' . $row->id . '" class="list-icons-item text-teal ml-1" data-toggle="tooltip" data-placement="bottom" title="View"><i class="icon-eye view-icon"></i></a>';
						return $btn;
					})
					->rawColumns(['action', 'qna_question_date', 'qna_answer_date', 'is_favorite', 'qna_question', 'location'])
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
				// ->filter(function ($instance) use ($request) {
				// 	if ($request->get('is_favorite') == 1) {
				// 		$instance->collection = $instance->collection->filter(function ($row) use ($request) {
				// 			return ($row->qna_favorites != '');
				// 		});
				// 	} else if ($request->get('is_favorite') == 2) {
				// 		$instance->collection = $instance->collection->filter(function ($row) use ($request) {
				// 			return ($row->qna_favorites == '');
				// 		});
				// 	}
				// })
					->make(true);
			}
			return view('backend.qna.index', compact('locations', 'jurisdictions'));
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
	public function show($id) {
		try {
			$qna = Qna::with('user')->with(['qna_favorites' => function ($query) {
				$query->where('user_id', Auth::guard('admin')->id());
			}])->findOrFail($id);
			if (!$qna) {
				return redirect()->route('admin.qna.index')->with('error', 'QNA Not Found.');
			}
			return view('backend.qna.view', compact('qna'));
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
		try {
			$qna = Qna::with('user')->with(['qna_favorites' => function ($query) {
				$query->where('user_id', Auth::guard('admin')->id());
			}])->findOrFail($id);
			if (!$qna) {
				return redirect()->route('admin.qna.index')->with('error', 'QNA Not Found.');
			}
			return view('backend.qna.answer', compact('qna'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->validate($request, [
			'answer' => 'required|min:2',
		]);
		$qna_answer = Qna::find($id);
		if ($qna_answer) {
			$qna_answer->qna_answer      = $request->answer;
			$qna_answer->qna_answer_date = date('Y-m-d H:i:s');
			if ($qna_answer->save()) {
				if ($request->answer != null) {
					$user = User::where('id', $qna_answer->qna_user_id)->first();
					if ($user) {
						$data['email']         = $user->user_email;
						$data['name']          = $user->user_fname . ' ' . $user->user_lname;
						$data['subject']       = $qna_answer->qna_subject;
						$data['jurisdiction']  = $qna_answer->qna_jurisdiction;
						$data['question_date'] = $qna_answer->qna_question_date;
						$data['question']      = $qna_answer->qna_question;
						$data['answer']        = $qna_answer->qna_answer;
						// Store notifications
						Notification::insert([
							'user_id'    => $user->id,
							'qna_id'     => $id,
							'label'      => 'QNA',
							'message'    => 'Answer is given for your question.',
							'status'     => 1,
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
						]);
						Mail::to($user->user_email)->send(new \App\Mail\QNAAnswerEmail($data));
					}
				}
				return redirect()->route('admin.qna.index')->with('success', 'QNA saved successfully.');
			} else {
				return redirect()->route('admin.qna.index')->with('error', 'Something went wrong, try again later.');
			}
		} else {
			return redirect()->route('admin.qna.index')->with('error', 'QNA Not Found.');
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

	public function viewQNA(Request $request, $id) {
		$this->validate($request, [
			'contact_further' => 'required|in:0,1',
			'public_view'     => 'required|in:0,1',
			'qna_favorite'    => 'required|in:0,1',
		]);
		$qna_answer = Qna::find($id);
		if ($qna_answer) {
			$qna_answer->qna_can_discuss_further = $request->contact_further;
			$qna_answer->qna_available_to_others = $request->public_view;
			$qna_favorite                        = QnaFavorite::where('qna_id', $id)->where('user_id', Auth::guard('admin')->id())->first();
			if ($request->qna_favorite == 1) {
				if (!$qna_favorite) {
					$qna_favorite = QnaFavorite::create([
						'qna_id'  => $id,
						'user_id' => Auth::guard('admin')->id(),
					]);
				}
			} else {
				if ($qna_favorite) {
					$qna_favorite->delete();
				}
			}
			$qna_answer->save();
			return redirect()->route('admin.qna.index')->with('success', 'QNA saved successfully.');
		} else {
			return redirect()->route('admin.qna.index')->with('error', 'QNA Not Found.');
		}
	}

	public function editQNAOptions(Request $request, $id) {
		$this->validate($request, [
			'contact_further' => 'nullable|in:0,1',
			'public_view'     => 'required|in:0,1',
			'qna_favorite'    => 'required|in:0,1',
		]);
		$qna_answer = Qna::find($id);
		if ($qna_answer) {
			$qna_answer->qna_can_discuss_further = ($request->contact_further != null) ? $request->contact_further : 0;
			$qna_answer->qna_available_to_others = $request->public_view;
			$qna_favorite                        = QnaFavorite::where('qna_id', $id)->where('user_id', Auth::guard('admin')->user()->id)->first();
			if ($request->qna_favorite == 1) {
				if (!$qna_favorite) {
					$qna_favorite = QnaFavorite::create([
						'qna_id'  => $id,
						'user_id' => Auth::guard('admin')->id(),
					]);
				}
			} else {
				if ($qna_favorite) {
					$qna_favorite->delete();
				}
			}
			$qna_answer->save();
			return redirect()->route('admin.qna.index')->with('success', 'QNA saved successfully.');
		} else {
			return redirect()->route('admin.qna.index')->with('error', 'QNA Not Found.');
		}
	}

	public function viewSelectedQNA($id = null) {
		try {
			if ($id) {
				$qna = Qna::where('id', $id)->get();
			} elseif (Session::get('qna_bulk') != null) {
				$qna = Qna::whereIn('id', Session::get('qna_bulk.qna_ids'))->get();
			} else {
				$qna = Qna::get();
			}
			return view('backend.qna.qna-bulk-details', compact('qna'));
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	public function downloadSelectedQNA($id = null) {
		if ($id) {
			$qna = Qna::where('id', $id)->get();
		} elseif (Session::get('qna_bulk') != null) {
			$qna = Qna::whereIn('id', Session::get('qna_bulk.qna_ids'))->get();
		} else {
			$qna = Qna::get();
		}
		$pdf = \PDF::loadView('backend.qna.qna-pdf', compact('qna'));
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

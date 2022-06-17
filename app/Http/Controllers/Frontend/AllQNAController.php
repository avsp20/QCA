<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Frontpages;
use App\Http\Controllers\Controller;
use App\Models\Qna;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Session;

class AllQNAController extends Controller {
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
				}])->where('qna_user_id', Auth::id())->orWhere('qna_available_to_others', 1)->latest()->get();
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
						$check = '<div class="checkbox checkbox-primary"><input name="qna_select[]" class="user-qna-check" id="checkbox' . $row->id . '" type="checkbox" value="' . $row->id . '"><label for="checkbox' . $row->id . '"></label></div>';
						return $check;
					})
					->addColumn('action', function ($row) {
						$btn = '';
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
			return view('frontend.dashboard.qna_all.index', compact('jurisdictions'));
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
		//
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
}

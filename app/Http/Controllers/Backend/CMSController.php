<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CMSRequest;
use App\Models\CMS;
use DataTables;
use Illuminate\Http\Request;

class CMSController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		try {
			if ($request->ajax()) {
				$cms = CMS::latest()->get();
				return DataTables::of($cms)
					->addIndexColumn()
					->addColumn('created_at', function ($row) {
						$date = '';
						$date = isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('jS F, Y') : '-';
						return $date;
					})
					->addColumn('status', function ($row) {
						$status = '';
						if ($row->status == 1) {
							$status = '<span class="badge badge-success">Enabled</span>';
						} else {
							$status = '<span class="badge badge-danger">Disabled</span>';
						}
						return $status;
					})
					->addColumn('action', function ($row) {
						$btn = '';
						$btn .= '<a href="' . url()->current() . '/' . $row->id . '/edit' . '" class="list-icons-item text-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="icon-pencil7 edt-icn"></i></a>';
						$btn .= '<a href="javascript:void(0)" onclick="return deleteCMS(' . $row->id . ',this)" class="list-icons-item text-danger ml-1" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="icon-bin trsh-icn"></i></a>';
						return $btn;
					})
					->rawColumns(['action', 'created_at', 'status'])
					->make(true);
			}
			return view('backend.cms.index');
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
			return view('backend.cms.create');
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
	public function store(CMSRequest $request) {
		try {
			$cms = new CMS();
			$cms->name = $request->name;
			$cms->slug = $request->slug;
			$cms->content = $request->content;
			$cms->status = $request->status;
			if ($cms->save()) {
				return redirect()->route('admin.cms.index')->with('success', 'CMS added successfully.');
			} else {
				return redirect()->route('admin.cms.index')->with('error', 'Something went wrong, try again later.');
			}
		} catch (Exception $e) {
			return redirect()->route('admin.cms.index')->with('error', $e->getMessage());
		}
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
		try {
			$cms = CMS::findOrFail($id);
			if (!$cms) {
				return redirect()->route('admin.cms.index')->with('error', 'CMS Not Found.');
			}
			return view('backend.cms.edit', compact('cms'));
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
		try {
			$this->validate($request, [
				'name' => 'required',
				'slug' => 'required|max:255|min:2|alpha_dash|unique:cms,slug,' . $id . ',id,deleted_at,NULL',
				'content' => 'required',
				'status' => 'required|in:0,1',
			]);
			$cms = CMS::find($id);
			if ($cms) {
				$cms->name = $request->name;
				$cms->slug = $request->slug;
				$cms->content = $request->content;
				$cms->status = $request->status;
				if ($cms->save()) {
					return redirect()->route('admin.cms.index')->with('success', 'CMS added successfully.');
				} else {
					return redirect()->route('admin.cms.index')->with('error', 'Something went wrong, try again later.');
				}
			} else {
				return redirect()->route('admin.cms.index')->with('error', 'CMS not found.');
			}
		} catch (Exception $e) {
			return redirect()->route('admin.cms.index')->with('error', $e->getMessage());
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

	public function deleteCMS($id) {
		try {
			if ($id) {
				$cms = CMS::find($id);
				$cms->delete();
				return response()->json(['success' => 'CMS deleted successfully.', 'status' => 1], 200);
			} else {
				return response()->json(['error' => 'CMS not found.', 'status' => 0], 400);
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Frontpages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EmploymentRequest;
use App\Models\AboutUs;
use App\Models\AlternativeCostsResolution;
use App\Models\Banner;
use App\Models\CMS;
use App\Models\CommonSetting;
use App\Models\ContactUs;
use App\Models\CostDrafting;
use App\Models\CostManagementSetting;
use App\Models\Employment;
use App\Models\HomePageSetting;
use App\Models\Page;
use App\Models\SettlementConferenceTeam;
use Exception;
use Illuminate\Http\Request;

class FrontendController extends Controller {

	public function test() {
	}

	public function home(Request $request) {
		try {
			$main_page = Page::where('name', 'home')->first();
			if (!$main_page) {
				return view('frontend.home');
			}
			$home_page_settings = HomePageSetting::first();
			$banners            = Banner::where('page_id', $main_page->id)->get();
			return view('frontend.home', compact('main_page', 'home_page_settings', 'banners'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function aboutUs(Request $request) {
		try {
			$main_page = Page::where('name', 'about-us')->first();
			if (!$main_page) {
				return view('frontend.about-us');
			}
			$about_us = AboutUs::first();
			$banners  = Banner::where('page_id', $main_page->id)->first();
			return view('frontend.about-us', compact('main_page', 'about_us', 'banners'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function qcaLegal(Request $request) {
		try {
			$main_page = Page::where('name', 'qca-legal')->first();
			if (!$main_page) {
				return view('frontend.qca-legal');
			}
			$qca_legal = CommonSetting::where('page_id', $main_page->id)->first();
			return view('frontend.qca-legal', compact('main_page', 'qca_legal'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function costManagement() {
		try {
			$main_page = Page::where('name', 'cost-management')->first();
			if (!$main_page) {
				return view('frontend.cost-management');
			}
			$cost_management = CostManagementSetting::first();
			$banners         = Banner::where('page_id', $main_page->id)->first();
			return view('frontend.cost-management', compact('main_page', 'cost_management', 'banners'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function costDrafting() {
		try {
			$main_page = Page::where('name', 'costs-drafting')->first();
			if (!$main_page) {
				return view('frontend.costs-drafting');
			}
			$cost_drafting = CostDrafting::first();
			$banners       = Banner::where('page_id', $main_page->id)->first();
			return view('frontend.costs-drafting', compact('main_page', 'cost_drafting', 'banners'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function settlementConferenceTeam() {
		try {
			$main_page = Page::where('name', 'settlement-conference-team')->first();
			if (!$main_page) {
				return view('frontend.settlement-conference-team');
			}
			$settlement_conference_team = SettlementConferenceTeam::first();
			$banners                    = Banner::where('page_id', $main_page->id)->first();
			return view('frontend.settlement-conference-team', compact('main_page', 'settlement_conference_team', 'banners'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function alternativeCostsResolution() {
		try {
			$main_page = Page::where('name', 'alternative-costs-resolution')->first();
			if (!$main_page) {
				return view('frontend.alternative-costs-resolution');
			}
			$alternative_costs_resolution = AlternativeCostsResolution::first();
			$banners                      = Banner::where('page_id', $main_page->id)->first();
			return view('frontend.alternative-costs-resolution', compact('main_page', 'alternative_costs_resolution', 'banners'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function contactUs() {
		try {
			$contact_us = ContactUs::first();
			return view('frontend.contact-us', compact('contact_us'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function advices(Request $request) {
		try {
			$main_page = Page::where('name', 'advices')->first();
			if (!$main_page) {
				return view('frontend.advices');
			}
			$advices = CommonSetting::where('page_id', $main_page->id)->first();
			return view('frontend.advices', compact('main_page', 'advices'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function courtAppearances(Request $request) {
		try {
			$main_page = Page::where('name', 'court-appearances')->first();
			if (!$main_page) {
				return view('frontend.court-appearances');
			}
			$court_appearances = CommonSetting::where('page_id', $main_page->id)->first();
			return view('frontend.court-appearances', compact('main_page', 'court_appearances'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function expertReports(Request $request) {
		try {
			$main_page = Page::where('name', 'expert-reports')->first();
			if (!$main_page) {
				return view('frontend.expert-reports');
			}
			$expert_reports = CommonSetting::where('page_id', $main_page->id)->first();
			return view('frontend.expert-reports', compact('main_page', 'expert_reports'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function cleSeminars(Request $request) {
		try {
			$main_page = Page::where('name', 'cle-seminars')->first();
			if (!$main_page) {
				return view('frontend.cle-seminars');
			}
			$cle_seminars = CommonSetting::where('page_id', $main_page->id)->first();
			return view('frontend.cle-seminars', compact('main_page', 'cle_seminars'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function instructionForms(Request $request) {
		try {
			$main_page = Page::where('name', 'instruction-forms')->first();
			if (!$main_page) {
				return view('frontend.instruction-forms');
			}
			$instruction_forms = CommonSetting::where('page_id', $main_page->id)->first();
			return view('frontend.instruction-forms', compact('main_page', 'instruction_forms'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function rates(Request $request) {
		try {
			return view('frontend.rates');
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function termsAndConditions(Request $request) {
		try {
			$cms = CMS::where('slug', 'terms-and-conditions')->first();
			return view('frontend.terms-and-conditions', compact('cms'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function securityPolicy(Request $request) {
		try {
			$cms = CMS::where('slug', 'security-policy')->first();
			return view('frontend.security-policy', compact('cms'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function privacyPolicy(Request $request) {
		try {
			$cms = CMS::where('slug', 'privacy-policy')->first();
			return view('frontend.privacy-policy', compact('cms'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function employmentForm(Request $request) {
		try {
			$states = Frontpages::states();
			return view('frontend.employment', compact('states'));
		} catch (Exception $e) {
			return redirect()->route('front.home')->with('error', $e->getMessage());
		}
	}

	public function generateCaptcha() {
		return response()->json(['captcha' => captcha_img()]);
	}

	public function storeEmployment(EmploymentRequest $request) {
		$employment                               = new Employment();
		$employment->first_name                   = $request->first_name;
		$employment->last_name                    = $request->last_name;
		$employment->address                      = $request->address;
		$employment->suburb                       = $request->suburb;
		$employment->state                        = $request->state;
		$employment->postcode                     = $request->postcode;
		$employment->contact_no                   = $request->contact_no;
		$employment->email                        = $request->email;
		$employment->is_solicitor                 = $request->is_solicitor;
		$employment->year_admitted                = $request->year_admitted;
		$employment->having_cost_draft_experience = $request->having_cost_draft_experience;
		$employment->cost_draft_experience        = $request->cost_draft_experience;
		if ($request->jurisdiction != null) {
			$jurisdictions            = implode(",", $request->jurisdiction);
			$employment->jurisdiction = $jurisdictions;
		}
		if ($request->file('upload_file')) {
			$file_name = $request->upload_file->getClientOriginalName();
			$request->upload_file->move(public_path('/frontend/files/employment/'), $file_name);
			$employment->upload_file = $file_name;
		}
		$employment->additional_comments = $request->additional_comments;
		if ($employment->save()) {
			return redirect()->route('front.employment')->with('success', 'Your data saved successfully. we will right back to you shortly.');
		} else {
			return redirect()->route('front.employment')->with('error', 'Something went wrong, try again later.');
		}
	}
}

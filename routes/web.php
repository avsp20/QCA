<?php

use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\VerificationController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserQNAController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

/*Route::get('/test', function () {
// Mail::raw('Hi, welcome user!', function ($message) {
// 	$message->to('tet@gpasd.com')
// 		->subject('uasd');
// });
// echo 'ji';
$user = \App\Models\User::find(2);
\Mail::queue('fronend.verification.user_verify', $user, function ($message) use ($user) {
$message->from('web.qa.test29@gmail.com', 'Your Application');
$message->to($user->user_email)->subject('Your Reminder!');
});
// return $user->sendEmailVerificationNotification();

});*/
Route::get('test', [FrontendController::class, 'test']);

Auth::routes(['verify' => true]);
Route::group(['namespace' => 'Frontend'], function () {
	Route::get('/', [FrontendController::class, 'home'])->name('front.home');
	Route::get('home', [FrontendController::class, 'home']);
	Route::get('cost-management', [FrontendController::class, 'costManagement'])->name('front.cost-management');
	Route::get('costs-drafting', [FrontendController::class, 'costDrafting'])->name('front.cost-drafting');
	Route::get('settlement-conference-team', [FrontendController::class, 'settlementConferenceTeam'])->name('front.settlement-conference-team');
	Route::get('alternative-costs-resolution', [FrontendController::class, 'alternativeCostsResolution'])->name('front.alternative-costs-resolution');
	Route::get('qca-legal', [FrontendController::class, 'qcaLegal'])->name('front.qca-legal');
	Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('front.contact-us');
	Route::get('rates', [FrontendController::class, 'rates'])->name('front.rates');
	Route::get('terms-and-conditions', [FrontendController::class, 'termsAndConditions'])->name('front.terms-and-conditions');
	Route::get('security-policy', [FrontendController::class, 'securityPolicy'])->name('front.security-policy');
	Route::get('privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('front.privacy-policy');
	Route::get('about-us', [FrontendController::class, 'aboutUs'])->name('front.about-us');
	Route::get('advices', [FrontendController::class, 'advices'])->name('front.advices');
	Route::get('court-appearances', [FrontendController::class, 'courtAppearances'])->name('front.court-appearances');
	Route::get('expert-reports', [FrontendController::class, 'expertReports'])->name('front.expert-reports');
	Route::get('cle-seminars', [FrontendController::class, 'cleSeminars'])->name('front.cle-seminars');
	Route::get('instruction-forms', [FrontendController::class, 'instructionForms'])->name('front.instruction-forms');
	Route::get('employment', [FrontendController::class, 'employmentForm'])->name('front.employment');
	Route::get('refresh_captcha', [FrontendController::class, 'generateCaptcha'])->name('refresh_captcha');
	Route::post('save-employment', [FrontendController::class, 'storeEmployment'])->name('save-employment');

	Route::group(['namespace' => 'Auth', 'as' => 'user.'], function () {
		Route::get('login', [LoginController::class, 'frontendShowLoginForm'])->name('login');
		Route::post('login', [LoginController::class, 'login'])->name('login.submit');
		Route::post('logout', [LoginController::class, 'logout'])->name('logout');
		Route::get('register', [RegisterController::class, 'frontendShowRegisterForm'])->name('register');
		Route::post('register/submit', [RegisterController::class, 'register'])->name('register.submit');

		// Password Reset Routes
		Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
		Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

		Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
		Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
	});

	// Route::group(['namespace' => 'Auth'], function () {
	Route::group(['middleware' => ['auth']], function () {
		Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
		Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify') /*->middleware(['signed'])*/;
		Route::get('/resend-email', [VerificationController::class, 'resendEmail'])->name('verification.resend-email');
		Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
		Route::get('/verification', [VerificationController::class, 'adminVerification'])->name('verification.admin-verification');
	});

	Route::group(['prefix' => 'user', 'middleware' => ['verified', 'Dashboard'], 'as' => 'user.'], function () {
		Route::get('verify-user', [RegisterController::class, 'verifyUser'])->name('verify-user');
		Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
		Route::get('profile', [UserDashboardController::class, 'profile'])->name('profile');
		Route::get('edit-profile', [UserDashboardController::class, 'editProfile'])->name('edit-profile');
		Route::post('update-profile', [UserDashboardController::class, 'updateProfile'])->name('update-profile');
		Route::resource('qna', '\App\Http\Controllers\Frontend\UserQNAController');
		Route::resource('qna-all', '\App\Http\Controllers\Frontend\AllQNAController');
		Route::get('qna-datatables', [UserDashboardController::class, 'userQNADataTables'])->name('qna-datatables');
		Route::get('other-qna-datatables', [UserDashboardController::class, 'OtherUserQNADataTables'])->name('other-qna-datatables');

		// QNA print and download routes
		Route::get('view-qna/{id?}', [UserQNAController::class, 'viewSelectedQNA'])->name('view-qna');
		Route::post('qna-select-ids', [UserQNAController::class, 'getQNASelectedIds'])->name('qna-select-ids');
		Route::get('qna-download/{id?}', [UserQNAController::class, 'downloadSelectedQNA'])->name('qna-download');

		// User wise QNA print and download routes
		Route::get('view-user-qna/{id}/{qna_id?}', [UserDashboardController::class, 'viewSelectedQNA'])->name('view-user-qna');
		Route::get('user-qna-download/{id}/{qna_id?}', [UserDashboardController::class, 'downloadSelectedQNA'])->name('user-qna-download');
		Route::post('user-qna-select-ids', [UserDashboardController::class, 'getQNASelectedIds'])->name('user-qna-select-ids');

		// Notifications
		Route::get('notifications/{id}', [UserDashboardController::class, 'getUserNotifications'])->name('notifications');

		Route::get('notifications', [UserDashboardController::class, 'userAllNotifications'])->name('user-notifications');
		Route::get('alert-notifications', [UserDashboardController::class, 'userAlertNotifications'])->name('alert-notifications');
	});
});

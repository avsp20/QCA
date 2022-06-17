<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\CMSController;
use App\Http\Controllers\Backend\PageSettingsController;
use App\Http\Controllers\Backend\QNAController;
use App\Http\Controllers\Backend\UserController;
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

Route::group(['namespace' => 'Backend'], function () {
	/* Admin Authentication */
	Route::group(['namespace' => 'Auth'], function () {
		Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
		Route::post('login', [LoginController::class, 'login'])->name('admin.login');
		Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

		// Password Reset Routes
		Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
		Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

		Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
		Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
	});
	Route::group(['middleware' => 'is_admin', 'as' => 'admin.'], function () {
		Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
		Route::get('profile', [AdminController::class, 'profile'])->name('profile');
		Route::post('edit-profile', [AdminController::class, 'editProfile'])->name('edit-profile');

		Route::resource('home-page-settings', '\App\Http\Controllers\Backend\PageSettingsController');
		Route::get('delete-page-settings/{id}', [PageSettingsController::class, 'deletePageSettings'])->name('delete-page-settings');
		Route::get('delete-page-settings-image', [PageSettingsController::class, 'deletePageSettingImage'])->name('delete-page-settings-image');

		// Users Module
		Route::resource('users', '\App\Http\Controllers\Backend\UserController');
		Route::get('approve-user/{id}', [UserController::class, 'approveUser'])->name('approve-user');
		Route::get('reject-user/{id}', [UserController::class, 'rejectUser'])->name('reject-user');
		Route::post('reset-password/{id}', [UserController::class, 'resetPassword'])->name('reset-password');

		// Print and Download routes
		Route::get('view-qna/{id?}', [QNAController::class, 'viewSelectedQNA'])->name('view-qna');
		Route::get('qna-download/{id?}', [QNAController::class, 'downloadSelectedQNA'])->name('qna-download');
		Route::post('qna-select-ids', [QNAController::class, 'getQNASelectedIds'])->name('qna-select-ids');

		// Use wise Print and Download routes
		Route::get('view-user-qna/{id}/{qna_id?}', [UserController::class, 'viewSelectedQNA'])->name('view-user-qna');
		Route::get('user-qna-download/{id}/{qna_id?}', [UserController::class, 'downloadSelectedQNA'])->name('user-qna-download');
		Route::post('user-qna-select-ids', [UserController::class, 'getQNASelectedIds'])->name('user-qna-select-ids');

		// QNA Module
		Route::resource('qna', '\App\Http\Controllers\Backend\QNAController');
		Route::post('update-qna/{id}', [QNAController::class, 'viewQNA'])->name('update-qna');
		Route::post('edit-qna-options/{id}', [QNAController::class, 'editQNAOptions'])->name('edit-qna-options');

		// Dashboard Module
		Route::get('users-datatables', [AdminController::class, 'getUsersDataTables'])->name('users-datatables');
		Route::get('qna-answered-datatables', [AdminController::class, 'QNAAnswerDataTables'])->name('qna-answered-datatables');
		Route::get('qna-datatables', [AdminController::class, 'getQNADataTables'])->name('qna-datatables');
		Route::get('all-users-datatables', [AdminController::class, 'getAllUsersDataTables'])->name('all-users-datatables');

		// CMS Module
		Route::resource('cms', '\App\Http\Controllers\Backend\CMSController');
		Route::get('delete-cms/{id}', [CMSController::class, 'deleteCMS'])->name('delete-cms');

		// Contact us
		Route::resource('contact-us', '\App\Http\Controllers\Backend\ContactUsController');

		// CMS Home Page
		Route::get('home', [PageSettingsController::class, 'homePageSettings'])->name('home');
		Route::post('store-page-settings/{id?}', [PageSettingsController::class, 'storePageSettings'])->name('store-page-settings');
		Route::get('delete-banner', [PageSettingsController::class, 'deleteBanners'])->name('delete-banner');

		// CMS Advices Page
		Route::get('advices', [PageSettingsController::class, 'commonPageSettings'])->name('advices');
		Route::post('common-page-settings', [PageSettingsController::class, 'storeCommonPageSettings'])->name('common-page-settings');

		// CMS Court Appearances
		Route::get('court-appearances', [PageSettingsController::class, 'commonPageSettings'])->name('court-appearances');

		// CMS Expert Reports
		Route::get('expert-reports', [PageSettingsController::class, 'commonPageSettings'])->name('expert-reports');

		// CMS CLE Seminars
		Route::get('cle-seminars', [PageSettingsController::class, 'commonPageSettings'])->name('cle-seminars');

		// CMS Instruction Forms
		Route::get('instruction-forms', [PageSettingsController::class, 'commonPageSettings'])->name('instruction-forms');

		// CMS QCA Legal
		Route::get('qca-legal', [PageSettingsController::class, 'commonPageSettings'])->name('qca-legal');

		// CMS Cost Management
		Route::get('cost-management', [PageSettingsController::class, 'costManagementPageSettings'])->name('cost-management');
		Route::post('store-cost-management-page-settings/{id?}', [PageSettingsController::class, 'storeCostManagementPageSettings'])->name('store-cost-management-page-settings');

		// CMS Cost Drafting
		Route::get('costs-drafting', [PageSettingsController::class, 'costDraftingPageSettings'])->name('cost-drafting');
		Route::post('store-cost-drafting-page-settings/{id?}', [PageSettingsController::class, 'storeCostDraftingPageSettings'])->name('store-cost-drafting-page-settings');

		// CMS Settlement Conference Team
		Route::get('settlement-conference-team', [PageSettingsController::class, 'settlementConferenceTeamPageSettings'])->name('settlement-conference-team');
		Route::post('store-settlement-conference-team-page-settings/{id?}', [PageSettingsController::class, 'storeSettlementConferenceTeamPageSettings'])->name('store-settlement-conference-team-page-settings');

		// CMS Alternative Costs Resolution
		Route::get('alternative-costs-resolution', [PageSettingsController::class, 'alternativeCostsResolutionPageSettings'])->name('alternative-costs-resolution');
		Route::post('store-alternative-costs-resolution-page-settings/{id?}', [PageSettingsController::class, 'storeAlternativeCostsResolutionPageSettings'])->name('store-alternative-costs-resolution-page-settings');

		// CMS About Us
		Route::get('about-us', [PageSettingsController::class, 'aboutUsPageSettings'])->name('about-us');
		Route::post('store-about-us-page-settings/{id?}', [PageSettingsController::class, 'storeAboutUsPageSettings'])->name('store-about-us-page-settings');
	});
});

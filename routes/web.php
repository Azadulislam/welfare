<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AllMemberController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\HelpProvidedController;
use App\Http\Controllers\KhairatMembersController;
use App\Http\Controllers\Langcontroller;
use App\Http\Controllers\MemorialServicesController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\WelfareServiceController;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Auth::routes();

Route::get('/', [HomeController::class, 'summary'])->name('home');
Route::get('member/family/{member:id}', [AllMemberController::class, 'family'])->name('member.family');
//Route::get('/khairat-member/{member:id}', [AllMemberController::class, 'khairatMember'])->name('khairat.member');
//Route::get('/death', [AllMemberController::class, 'deaths'])->name('death.index');
Route::post('/search-member', [AllMemberController::class, 'searchMember']);
Route::post('/search-member-unique', [AllMemberController::class, 'searchMemberUnique']);
Route::get('/type/{category:id?}', [WelfareServiceController::class, 'typeByCategory']);
Route::resource('/member', AllMemberController::class);
Route::get('/member-data/{member:id?}', [AllMemberController::class, 'member'])->name('member.data');
Route::resource('/relation', RelationshipController::class);
Route::get('/burial-payment', [DeathController::class, 'burialPayments'])->name('burial.payment.index');
Route::get('/burial-payment/{death:id}', [DeathController::class, 'burialPaymentCreate'])->name('burial.payment.create');
Route::post('/burial-payment/{death:id}', [DeathController::class, 'burialPaymentUpdate'])->name('burial.payment.update');
Route::resource('/khairat', KhairatMembersController::class);
Route::resource('/death', DeathController::class);

Route::get('/welfare-payment/{welfare_service:id}/{category:id?}', [WelfareServiceController::class, 'payment'])->name('welfare.payment');
Route::delete('/welfare-delete/{id}', [WelfareServiceController::class, 'welfareDelete'])->name('welfare.delete');

Route::put('/welfare-payment/{welfare_service:id}', [WelfareServiceController::class, 'paymentUpdate'])->name('payment.update');
Route::get('/service/create/{id?}', [WelfareServiceController::class, 'welfareCreate'])->name('service.create');
Route::get('/service/{category?}', [WelfareServiceController::class, 'welfare'])->name('service');

Route::get('/welfare-export', [ActivityLogController::class, 'export'])->name('export.welfare');
Route::post('/welfare-export', [ActivityLogController::class, 'exportWelfare'])->name('export.welfare');

Route::get('/khairat-export', [ActivityLogController::class, 'exportTwo'])->name('export.khairat');
Route::post('/khairat-export', [ActivityLogController::class, 'exportKhairat'])->name('export.khairat');

Route::resource('/welfare', WelfareServiceController::class);
Route::resource('/help-provided', HelpProvidedController::class);
Route::resource('/audit', ActivityLogController::class);
Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::get('/summary', [HomeController::class, 'summary'])->name('summary');
Route::post('/summary', [HomeController::class, 'summaryData'])->name('summary');
Route::get('/setting', [HomeController::class, 'setting'])->name('setting');
Route::post('/setting/{user:id}', [HomeController::class, 'updateUser'])->name('user.update');
Route::post('/password/{user:id}', [HomeController::class, 'changePassword'])->name('change.password');
Route::post('/data-list', [HomeController::class, 'dataList']);

Route::get('lang/change',[Langcontroller::class,'langChange'])->name('lang.langChange');

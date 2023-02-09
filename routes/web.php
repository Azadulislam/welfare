<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AllMemberController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\HelpProvidedController;
use App\Http\Controllers\KhairatMembersController;
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

Route::get('/', [AllMemberController::class, 'index'])->name('home');
Route::get('member/family/{member:id}', [AllMemberController::class, 'family'])->name('member.family');
//Route::get('/khairat-member/{member:id}', [AllMemberController::class, 'khairatMember'])->name('khairat.member');
//Route::get('/death', [AllMemberController::class, 'deaths'])->name('death.index');
Route::post('/search-member', [AllMemberController::class, 'searchMember']);
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
Route::put('/welfare-payment/{welfare_service:id}', [WelfareServiceController::class, 'paymentUpdate'])->name('payment.update');
Route::get('/service/create/{id?}', [WelfareServiceController::class, 'welfareCreate'])->name('service.create');
Route::get('/service/{category?}', [WelfareServiceController::class, 'welfare'])->name('service');
Route::get('/welfare/import', [ActivityLogController::class, 'import'])->name('import.welfare');
Route::post('/welfare/import', [ActivityLogController::class, 'importWelfare'])->name('import.welfare');
Route::resource('/welfare', WelfareServiceController::class);
Route::resource('/help-provided', HelpProvidedController::class);
Route::resource('/audit', ActivityLogController::class);
Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::get('/summary', [HomeController::class, 'summary'])->name('summary');

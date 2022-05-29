<?php

use App\Http\Controllers\BenefitsPlanOneController;
use App\Http\Controllers\BenefitsPlanTwoController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSettingController;
use App\Http\Controllers\CustomerDashboard;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\StaticPages;
use App\Http\Controllers\Stripe\PaymentController;
use App\Http\Controllers\UserController;
use Database\Seeders\CourseSettingSeeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

/* Route::get('/', [HomeController::class, 'index']);
 */


Route::get('/memberships', function () {
    return view('pages/memberships');
});
Route::get('/trainers', function () {
    return view('pages/trainers');
});
Route::get('/nutrition', function () {
    return view('pages/nutrition');
});
Route::get('/classes', function () {
    return view('pages/classes');
});
Route::get('/pages/login', function () {
    return view('pages/login');
});
Route::get('/pages/register', function () {
    return view('pages/register');
});

Route::get('/pages/planOne', [PaymentController::class, 'index'])->name('/pages/planOne');
Route::post('//pages/planOne', [PaymentController::class, 'store'])->name('/pages/planOne');


Route::get('/pages/planTwo', [PaymentController::class, 'index'])->name('/pages/planTwo');
Route::post('//pages/planTwo', [PaymentController::class, 'store'])->name('/pages/planTwo');




Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/pages/classes', 'index');
    Route::get('/layouts/main', 'index');
    Route::post('/admin/home-page', 'saveHome');
    Route::get('/admin/home-page', 'general')->middleware(['auth', 'is_admin'])->name('home-page');
});

Route::controller(CardController::class)->group(function () {
    Route::get('/admin/card', 'card')->middleware(['auth', 'is_admin'])->name('card');
    Route::post('/admin/card', 'saveCard');
});

Route::controller(ContentController::class)->group(function () {
    Route::get('/admin/home-content', 'homeContent')->middleware(['auth', 'is_admin'])->name('home-content');
    Route::post('/admin/home-content', 'update');
});

Route::controller(NutritionController::class)->group(function () {
    Route::get('/admin/nutrition', 'nutritionContent')->middleware(['auth', 'is_admin'])->name('nutrition');
    Route::post('/admin/nutrition', 'update');
});

Route::controller(SocialController::class)->group(function () {
    Route::get('/admin/social', 'socialContent')->middleware(['auth', 'is_admin'])->name('social');
    Route::post('/admin/social', 'update');
});

Route::controller(CourseController::class)->group(function () {
    Route::get('admin/all-classes', 'index')->middleware(['auth', 'is_admin'])->name('all-classes');
    Route::get('admin/new-class', 'create');
    Route::post('admin/all-classes', 'store');
    Route::get('admin/all-classes/{id}/class-edit', 'edit');
    Route::post('admin/all-classes/{id}', 'update');
    Route::delete('admin/all-classes/{id}/delete', 'delete');
});

Route::controller(CourseSettingController::class)->group(function () {
    Route::get('admin/classes-settings', 'index');
    Route::post('admin/classes-settings', 'update');
});

Route::controller(TrainerController::class)->group(function () {
    Route::get('admin/all-trainers', 'index');
    Route::get('admin/new-trainer', 'create');
    Route::post('admin/all-trainers', 'store');
    Route::get('admin/all-trainers/{id}/edit-trainer', 'edit');
    Route::post('admin/all-trainers/{id}', 'update');
    Route::delete('admin/all-trainers/{id}/delete', 'delete');
});

Route::controller(FooterController::class)->group(function () {
    Route::get('admin/footer', 'index');
    Route::post('admin/footer', 'update');
});

Route::controller(MembershipController::class)->group(function () {
    Route::get('admin/membership-settings', 'index');
    /*  Route::get('admin/membership-pro', 'indexPro'); */
    Route::post('admin/membership-settings', 'update');
});


Route::controller(BenefitsPlanOneController::class)->group(function () {
    Route::get('admin/all-plan-one', 'index')->middleware(['auth', 'is_admin'])->name('all-plan-one');
    Route::get('admin/create-benefits-plan-one', 'create');
    Route::post('admin/all-plan-one', 'store');
    Route::get('admin/all-plan-one/{id}/plan-one-edit', 'edit');
    Route::post('admin/all-plan-one/{id}', 'update');
    Route::delete('admin/all-plan-one/{id}/delete', 'delete');
});

Route::controller(BenefitsPlanTwoController::class)->group(function () {
    Route::get('admin/all-plan-two', 'index')->middleware(['auth', 'is_admin'])->name('all-plan-two');
    Route::get('admin/create-benefits-plan-two', 'create');
    Route::post('admin/all-plan-two', 'store');
    Route::get('admin/all-plan-two/{id}/plan-two-edit', 'edit');
    Route::post('admin/all-plan-two/{id}', 'update');
    Route::delete('admin/all-plan-two/{id}/delete', 'delete');
});

Route::controller(UserController::class)->group(function () {
    Route::get('admin/all-users', 'index')->middleware(['auth', 'is_admin'])->name('all-users');
    Route::get('admin/create-user', 'create');
    Route::post('admin/all-users', 'store');
    Route::get('admin/all-users/{id}/user-edit', 'edit');
    Route::post('admin/all-users/{id}', 'update');
    Route::delete('admin/all-users/{id}/delete', 'delete');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'is_admin'])->name('dashboard');

Route::controller(CustomerDashboard::class)->group(function () {
    Route::get('/user-dashboard/welcome', 'index');
});


require __DIR__ . '/auth.php';

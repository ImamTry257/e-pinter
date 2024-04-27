<?php

use App\Http\Controllers\console\SainsInfoController as ConsoleSainsInfoController;
use App\Http\Controllers\console\DashboardController;
use App\Http\Controllers\console\LearningActivityController as ConsoleLearningActivityController;
use App\Http\Controllers\console\LoginController as ConsoleLoginController;
use App\Http\Controllers\console\PotentialLocalGudegController as ConsolePotentialLocalGudegController;
use App\Http\Controllers\console\RegisterController as ConsoleRegisterController;
use App\Http\Controllers\console\ResultLearningActivityController;
use App\Http\Controllers\console\UserController;
use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\front\BerandaController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\DashboardController as FrontDashboardController;
use App\Http\Controllers\front\EvaluationController;
use App\Http\Controllers\front\ForgotPasswordController;
use App\Http\Controllers\front\LearningActivityController;
use App\Http\Controllers\front\LearningController;
use App\Http\Controllers\front\LearningInfoController;
use App\Http\Controllers\front\LoginController;
use App\Http\Controllers\front\PotentialLocalGudegController;
use App\Http\Controllers\front\ProfileController;
use App\Http\Controllers\front\ReflectionController;
use App\Http\Controllers\front\RegisterController;
use App\Http\Controllers\front\SainsInfoController;
use App\Http\Controllers\front\TopicController;
use App\Http\Controllers\PhysicsInfoController;
use App\Http\Middleware\AuthConsoleMiddleware;
use App\Http\Middleware\AuthFrontMiddleware;
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

Route::get('/', function () {
    return redirect(route('beranda'));
});

Route::get('/home', [BerandaController::class, 'index'])->name('home');

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

Route::get('/about-us', [AboutController::class, 'index'])->name('about');

Route::get('/petunjuk', [BerandaController::class, 'information'])->name('information');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/reflection', [ReflectionController::class, 'index'])->name('reflection');

# Register
Route::match(['get'], 'register', [RegisterController::class, 'index'])->name('register');
Route::post('/store', [RegisterController::class, 'store'])->name('register.store');
Route::get('/success', [RegisterController::class, 'success'])->name('register.success');

# Login
Route::match(['get'], 'login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');

# Forgot Password Front Page
Route::get('/forgot-password-student', [ForgotPasswordController::class, 'index'])->name('forgot-password-student');
Route::get('/send-link-password', [ForgotPasswordController::class, 'success_send_link'])->name('send-link-password');

# Learning
Route::get('/learning', [LearningController::class, 'index'])->name('learning');

# Dashboard
Route::middleware([AuthFrontMiddleware::class])->group(function () {

    Route::prefix('/dashboard')->group(function(){
        Route::get('/', [FrontDashboardController::class, 'index'])->name('front.dashboard');
        Route::get('/activity/{slug}', [LearningActivityController::class, 'activity'])->name('front.activity');
        Route::get('/activity/introduction/{slug}', [LearningActivityController::class, 'introduction'])->name('front.activity.introduction');
        Route::get('/activity/{slug}/{step}', [LearningActivityController::class, 'step'])->name('front.activity.step');
    });

    Route::get('/learning-info', [LearningInfoController::class, 'index'])->name('front.learning-info');
});

# Learning activity
Route::middleware([AuthFrontMiddleware::class])->group(function () {
    Route::get('/learning-activity', [LearningActivityController::class, 'index'])->name('learning-activity.index');
    Route::post('/learning-activity/store', [LearningActivityController::class, 'store'])->name('learning-activity.store');
    Route::post('/learning-activity/get_answer', [LearningActivityController::class, 'get_answer'])->name('learning-activity.get_answer');
    Route::get('/evaluation', [EvaluationController::class, 'index'])->name('evaluation');
});

Route::get('/learning-activity/success', [LearningActivityController::class, 'success'])->name('learning-activity.success');

# Potential Local Gudeg
Route::get('/potential', [PotentialLocalGudegController::class, 'index'])->name('potential.index');
Route::get('/potential/detail/{slug}', [PotentialLocalGudegController::class, 'detail'])->name('potential.detail');

# Sains Info
Route::get('/sains-info', [SainsInfoController::class, 'index'])->name('sains-info.index');
Route::get('/sains-info/detail/{slug}', [SainsInfoController::class, 'detail'])->name('sains-info.detail');

# Physics Info
Route::get('/physics-info', [PhysicsInfoController::class, 'index'])->name('physics-info.index');

# Topic
Route::get('/topic', [TopicController::class, 'index'])->name('topic.index');


# Console
# show login and register page
# Register
Route::get('/register-admin', [ConsoleRegisterController::class, 'index'])->name('register.admin.index');
Route::post('/register-admin-store', [ConsoleRegisterController::class, 'store'])->name('register.admin.store');

# Login
Route::get('/login-admin', [ConsoleLoginController::class, 'index'])->name('login.admin.index');
Route::post('/login-admin-store', [ConsoleLoginController::class, 'store'])->name('login.admin.store');

Route::middleware([AuthConsoleMiddleware::class])->group(function () {
    # Logout
    Route::match(['get', 'post'], '/logout-admin', [ConsoleLoginController::class, 'logout'])->name('logout.admin');

    # Dashboard
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    # Sains Info
    Route::get('/admin/sains-info', [ConsoleSainsInfoController::class, 'index'])->name('admin.sains-info');
    Route::get('/admin/sains-info/add', [ConsoleSainsInfoController::class, 'create'])->name('admin.sains-info.add');
    Route::post('/admin/sains-info/add', [ConsoleSainsInfoController::class, 'store'])->name('admin.sains-info.store');
    Route::get('/admin/sains-info/import', [ConsoleSainsInfoController::class, 'import'])->name('admin.sains-info.import');
    Route::post('/admin/sains-info/import', [ConsoleSainsInfoController::class, 'storeImport'])->name('admin.sains-info.store.import');
    Route::get('/admin/sains-info/edit/{id}', [ConsoleSainsInfoController::class, 'edit'])->name('admin.sains-info.edit');
    Route::post('/admin/sains-info/update/{id}', [ConsoleSainsInfoController::class, 'update'])->name('admin.sains-info.update');
    Route::get('/admin/sains-info/delete/{id}', [ConsoleSainsInfoController::class, 'destroy'])->name('admin.sains-info.destroy');
    Route::get('/getSainsInfo', [ConsoleSainsInfoController::class, 'getSainsInfo'])->name('admin.get.sains-info');

    # Potential Local Gudeg
    Route::get('/admin/potential', [ConsolePotentialLocalGudegController::class, 'index'])->name('admin.potential');
    Route::get('/admin/potential/add', [ConsolePotentialLocalGudegController::class, 'create'])->name('admin.potential.add');
    Route::post('/admin/potential/add', [ConsolePotentialLocalGudegController::class, 'store'])->name('admin.potential.store');
    Route::get('/admin/potential/import', [ConsolePotentialLocalGudegController::class, 'import'])->name('admin.potential.import');
    Route::post('/admin/potential/import', [ConsolePotentialLocalGudegController::class, 'storeImport'])->name('admin.potential.store.import');
    Route::get('/admin/potential/edit/{id}', [ConsolePotentialLocalGudegController::class, 'edit'])->name('admin.potential.edit');
    Route::post('/admin/potential/update/{id}', [ConsolePotentialLocalGudegController::class, 'update'])->name('admin.potential.update');
    Route::get('/admin/potential/delete/{id}', [ConsolePotentialLocalGudegController::class, 'destroy'])->name('admin.potential.destroy');
    Route::get('/getPotential', [ConsolePotentialLocalGudegController::class, 'getPotential'])->name('admin.get.potential');

    # Learning Activity
    Route::get('/admin/learning-activity', [ConsoleLearningActivityController::class, 'index'])->name('admin.learning.activity');
    Route::get('/admin/learning-activity/add', [ConsoleLearningActivityController::class, 'create'])->name('admin.learning.activity.add');
    Route::post('/admin/learning-activity/add', [ConsoleLearningActivityController::class, 'store'])->name('admin.learning.activity.store');
    Route::get('/admin/learning-activity/show/{id}', [ConsoleLearningActivityController::class, 'show'])->name('admin.learning.activity.show');
    Route::get('/admin/learning-activity/import', [ConsoleLearningActivityController::class, 'import'])->name('admin.learning.activity.import');
    Route::post('/admin/learning-activity/import', [ConsoleLearningActivityController::class, 'storeImport'])->name('admin.learning.activity.store.import');
    Route::get('/admin/learning-activity/edit/{id}', [ConsoleLearningActivityController::class, 'edit'])->name('admin.learning.activity.edit');
    Route::post('/admin/learning-activity/update/{id}', [ConsoleLearningActivityController::class, 'update'])->name('admin.learning.activity.update');
    Route::get('/admin/learning-activity/delete/{id}', [ConsoleLearningActivityController::class, 'destroy'])->name('admin.learning.activity.destroy');
    Route::get('/getLearningActivity', [ConsoleLearningActivityController::class, 'getLearningActivity'])->name('admin.get.learning.activity');

    # Learning Activity
    Route::get('/admin/result-learning-activity', [ResultLearningActivityController::class, 'index'])->name('admin.result.learning.activity');
    Route::get('/admin/result-learning-activity/add', [ResultLearningActivityController::class, 'create'])->name('admin.result.learning.activity.add');
    Route::post('/admin/result-learning-activity/add', [ResultLearningActivityController::class, 'store'])->name('admin.result.learning.activity.store');
    Route::get('/admin/result-learning-activity/show/{user_id}', [ResultLearningActivityController::class, 'show'])->name('admin.result.learning.activity.show');
    Route::get('/admin/detail-result-learning-activity/show/{result_id}', [ResultLearningActivityController::class, 'detail_result'])->name('admin.detail.result.learning.activity.show');
    Route::get('/admin/result-learning-activity/import', [ResultLearningActivityController::class, 'import'])->name('admin.result.learning.activity.import');
    Route::post('/admin/result-learning-activity/import', [ResultLearningActivityController::class, 'storeImport'])->name('admin.result.learning.activity.store.import');
    Route::get('/admin/result-learning-activity/edit/{id}', [ResultLearningActivityController::class, 'edit'])->name('admin.result.learning.activity.edit');
    Route::post('/admin/result-learning-activity/update/{id}', [ResultLearningActivityController::class, 'update'])->name('admin.result.learning.activity.update');
    Route::get('/admin/result-learning-activity/delete/{id}', [ResultLearningActivityController::class, 'destroy'])->name('admin.result.learning.activity.destroy');
    Route::get('/getStudentLearningActivity', [ResultLearningActivityController::class, 'getStudentLearningActivity'])->name('admin.get.student.learning.activity');
    Route::get('/getResultLearningActivity', [ResultLearningActivityController::class, 'getResultLearningActivity'])->name('admin.get.result.learning.activity');

    # User
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/admin/user/add', [UserController::class, 'create'])->name('admin.user.add');
    Route::post('/admin/user/add', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/show/{id}', [UserController::class, 'show'])->name('admin.user.show');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    Route::get('/getUsers', [UserController::class, 'getUsers'])->name('admin.get.user');
});

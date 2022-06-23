<?php

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

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);

Route::get('/about-us',[App\Http\Controllers\Frontend\PageController::class,'aboutUs']);
Route::get('/policy',[App\Http\Controllers\Frontend\PageController::class,'policy']);
Route::get('/management',[App\Http\Controllers\Frontend\PageController::class,'management']);
Route::get('/faculty',[App\Http\Controllers\Frontend\PageController::class,'faculty']);
Route::get('/facilities',[App\Http\Controllers\Frontend\PageController::class,'facilities']);
Route::get('/gallery',[App\Http\Controllers\Frontend\PageController::class,'gallery']);
Route::get('/overviews',[App\Http\Controllers\Frontend\PageController::class,'overviews']);
Route::get('/school-fees',[App\Http\Controllers\Frontend\PageController::class,'schoolFee']);
Route::get('/regulations',[App\Http\Controllers\Frontend\PageController::class,'regulations']);
Route::get('/calendar',[App\Http\Controllers\Frontend\PageController::class,'calendar']);
Route::get('/faqs',[App\Http\Controllers\Frontend\PageController::class,'faq']);

Route::get('/contact-us',[App\Http\Controllers\Frontend\FormController::class,'contactUs']);
Route::post('/send',[App\Http\Controllers\Frontend\FormController::class,'send']);

Route::get('/admissions',[App\Http\Controllers\Frontend\FormController::class,'admission']);
Route::post('/student-form',[App\Http\Controllers\Frontend\FormController::class,'studentForm']);

Route::get('/all-events',[App\Http\Controllers\Frontend\PageController::class,'allEvent']);

Route::get('/event/{slug}',[App\Http\Controllers\Frontend\PageController::class,'singleEvent']);

Route::get('/kindergarten',[App\Http\Controllers\Frontend\PageController::class,'kinder']);

Route::get('/course/{slug}',[App\Http\Controllers\Frontend\PageController::class,'course']);

Route::get('/{slug}',[App\Http\Controllers\Frontend\PageController::class,'school']);



Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/****admin auth section ***/
Route::group(['prefix'=>'admin'],function(){

    Route::get('/login',[App\Http\Controllers\Auth\Admin\LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login',[App\Http\Controllers\Auth\Admin\LoginController::class,'login'])->name('admin.login.post');
    Route::get('/logout',[App\Http\Controllers\Auth\Admin\LoginController::class,'logout'])->name('admin.logout');

});
/* dashboard all route */
Route::group(['prefix'=>'/school','middleware' => ['admin']], function() {
    /* dashboard */
    Route::get('/back-end', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('about','App\Http\Controllers\Admin\AboutController');
    Route::resource('logo','App\Http\Controllers\Admin\LogoController');
    Route::resource('contact','App\Http\Controllers\Admin\ContactController');
    Route::resource('event','App\Http\Controllers\Admin\EventController');
    Route::resource('faq','App\Http\Controllers\Admin\FaqController');
    Route::resource('gallery','App\Http\Controllers\Admin\GalleryController');


    Route::resource('slider','App\Http\Controllers\Admin\SliderController');
    Route::get('slider/enable/{id}','App\Http\Controllers\Admin\SliderController@enable');
    Route::get('slider/disable/{id}','App\Http\Controllers\Admin\SliderController@disable');


    Route::resource('message','App\Http\Controllers\Admin\MessageController');
    Route::get('message/enable/{id}','App\Http\Controllers\Admin\MessageController@enable');
    Route::get('message/disable/{id}','App\Http\Controllers\Admin\MessageController@disable');

    Route::resource('link','App\Http\Controllers\Admin\LinkController');
    Route::get('link/enable/{id}','App\Http\Controllers\Admin\LinkController@enable');
    Route::get('link/disable/{id}','App\Http\Controllers\Admin\LinkController@disable');

    Route::resource('partner','App\Http\Controllers\Admin\PartnerController');
    Route::get('partner/enable/{id}','App\Http\Controllers\Admin\PartnerController@enable');
    Route::get('partner/disable/{id}','App\Http\Controllers\Admin\PartnerController@disable');

    Route::resource('policy','App\Http\Controllers\Admin\PolicyController');

    Route::resource('management','App\Http\Controllers\Admin\ManagementController');

    Route::resource('facility','App\Http\Controllers\Admin\FacilityController');

    Route::resource('course','App\Http\Controllers\Admin\CourseController');

    Route::resource('school','App\Http\Controllers\Admin\SchoolController');
    Route::resource('level','App\Http\Controllers\Admin\LevelController');

    Route::resource('why','App\Http\Controllers\Admin\WhyController');

    Route::resource('admission','App\Http\Controllers\Admin\AdmissionController');

    Route::resource('onlineform','App\Http\Controllers\Admin\OnlineformController');

    Route::resource('send','App\Http\Controllers\Admin\SendController');
    Route::get('sends/enable/{id}','App\Http\Controllers\Admin\SendController@enable');
    Route::get('sends/disable/{id}','App\Http\Controllers\Admin\SendController@disable');

    Route::resource('calendar','App\Http\Controllers\Admin\CalendarController');

    Route::resource('kindergarten','App\Http\Controllers\Admin\KindergartenController');
    
     Route::resource('tab','App\Http\Controllers\Admin\TabController');
    Route::resource('tabimage','App\Http\Controllers\Admin\TabimageController');


});

<?php

use Illuminate\Support\Facades\Route;

/*BACK*/
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;
//blog
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\PageController;
//settings
use App\Http\Controllers\Back\ConfigController;
//estate
use App\Http\Controllers\Back\EstateController;
use App\Http\Controllers\Back\EstateCategoryController;
use App\Http\Controllers\Back\EstateFeatureController;
use App\Http\Controllers\Back\EstateInfoController;
//reservation
use App\Http\Controllers\Back\ReservationController;

/*FRONT*/
use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Front\RoomController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\CalendarController;
use App\Http\Controllers\Front\RoomCalendarController;
/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin', [AuthController::class, 'login'])->name('admin.login');

Route::post('/admin', [AuthController::class, 'loginpost'])->name('admin.login.post');

Route::prefix('admin')->middleware('isAdmin')->group(function(){

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('admin.dashboard');

    //ESTATE

    Route::get('/estate/switch', [EstateController::class, 'SwitchStatus'])->name('admin.estate.switch');

    Route::get('/estate/recover/{id}', [EstateController::class, 'recover'])->name('admin.estate.recover');

    Route::post('/estate/update', [EstateController::class, 'update'])->name('admin.estate.update');

    Route::get('/estate/delete/{id}', [EstateControllerr::class, 'delete'])->name('admin.estate.delete');

    Route::get('/estate/harddelete/{id}', [EstateController::class, 'hardDelete'])->name('admin.estate.harddelete');

    Route::get('/estate/deleted', [EstateController::class, 'trashed'])->name('admin.estate.trashed');

    Route::resource('/estates', 'App\Http\Controllers\Back\EstateController');

    //ESTATE_CATEGORY

    Route::get('/estatecategories', [EstateCategoryController::class, 'index'])->name('admin.estatecategory.index');

    Route::get('/estatecategories/switch', [EstateCategoryController::class, 'SwitchStatus'])->name('admin.estatecategory.switch');

    Route::post('/estatecategories/create', [EstateCategoryController::class, 'create'])->name('admin.estatecategory.create');

    Route::get('/estatecategories/updatedata', [EstateCategoryController::class, 'updatedata'])->name('admin.estatecategory.updatedata');

    Route::post('/estatecategories/update', [EstateCategoryController::class, 'update'])->name('admin.estatecategory.update');

    Route::post('/estatecategories/delete', [EstateCategoryController::class, 'delete'])->name('admin.estatecategory.delete');

    //ESTATE_FEATURE

    Route::get('/estatefeatures', [EstateFeatureController::class, 'index'])->name('admin.estatefeature.index');

    Route::get('/estatefeatures/switch', [EstateFeatureController::class, 'SwitchStatus'])->name('admin.estatefeature.switch');

    Route::post('/estatefeatures/create', [EstateFeatureController::class, 'create'])->name('admin.estatefeature.create');

    Route::get('/estatefeatures/updatedata', [EstateFeatureController::class, 'updatedata'])->name('admin.estatefeature.updatedata');

    Route::post('/estatefeatures/update', [EstateFeatureController::class, 'update'])->name('admin.estatefeature.update');

    Route::post('/estatefeatures/delete', [EstateFeatureController::class, 'delete'])->name('admin.estatefeature.delete');

    /**/

    Route::post('/estatefeatures/delete',[\App\Http\Controllers\Back\EstateFeatureController::class,'delete'])->name("estatefeatures.delete");

    Route::get('/estatefeatures/updateInfo',[\App\Http\Controllers\Back\EstateFeatureController::class,'updateInfo'])->name('estatefeatures.updateInfo');

    Route::post('/estatefeatures/updateData',[\App\Http\Controllers\Back\EstateFeatureController::class,'updateData'])->name("estatefeatures.updateData");

    Route::resource('estatefeatures','App\Http\Controllers\Back\EstateFeatureController');

    //ESTATE_INFO

    Route::get('/estateinfos', [EstateInfoController::class, 'index'])->name('admin.estateinfo.index');

    Route::get('/estateinfos/switch', [EstateInfoController::class, 'SwitchStatus'])->name('admin.estateinfo.switch');

    Route::post('/estateinfos/create', [EstateInfoController::class, 'create'])->name('admin.estateinfo.create');

    Route::get('/estateinfos/updatedata', [EstateInfoController::class, 'updatedata'])->name('admin.estateinfo.updatedata');

    Route::post('/estateinfos/update', [EstateInfoController::class, 'update'])->name('admin.estateinfo.update');

    Route::post('/estateinfos/delete', [EstateInfoController::class, 'delete'])->name('admin.estateinfo.delete');

    //Blog_ARTICLE

    Route::get('/switch', [ArticleController::class, 'SwitchStatus'])->name('admin.switch');

    Route::get('/deletearticle/{id}', [ArticleController::class, 'delete'])->name('admin.delete.article');

    Route::get('/recoverarticle/{id}', [ArticleController::class, 'recover'])->name('admin.recover.article');

    Route::get('/harddeletearticle/{id}', [ArticleController::class, 'hardDelete'])->name('admin.harddelete.article');

    Route::get('/articles/deleted', [ArticleController::class, 'trashed'])->name('admin.trashed.article');

    Route::resource('/articles', 'App\Http\Controllers\Back\ArticleController');

    //Blog_CATEGORY

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.category.index');

    Route::get('/categories/switch', [CategoryController::class, 'SwitchStatus'])->name('admin.category.switch');

    Route::post('/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');

    Route::get('/categories/updatedata', [CategoryController::class, 'updatedata'])->name('admin.category.updatedata');

    Route::post('/categories/update', [CategoryController::class, 'update'])->name('admin.category.update');

    Route::post('/categories/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');


    //PAGES

    Route::get('/pages', [PageController::class, 'index'])->name('admin.page.index');

    Route::get('/pages/create', [PageController::class, 'create'])->name('admin.page.create');

    Route::post('/pages/create', [PageController::class, 'createpost'])->name('admin.page.create.post');

    Route::get('/pages/update/{id}', [PageController::class, 'update'])->name('admin.page.update');

    Route::post('/pages/update/{id}', [PageController::class, 'updatepost'])->name('admin.page.update.post');

    Route::get('/pages/delete/{id}', [PageController::class, 'delete'])->name('admin.page.delete');

    Route::get('/page/switch', [PageController::class, 'SwitchStatus'])->name('admin.page.switch');

    Route::get('/page/order', [PageController::class, 'Orders'])->name('admin.page.orders');

    //CONFIG

    Route::get('/settings', [ConfigController::class, 'index'])->name('admin.config.index');
    Route::post('/settings/update', [ConfigController::class, 'update'])->name('admin.config.update');

    //USERPROFILE

    Route::get('/userprofile', [AuthController::class, 'index'])->name('admin.userprofile.index');

    Route::post('/userprofile/create', [AuthController::class, 'create'])->name('admin.userprofile.create');

    Route::get('/userprofile/updatedata', [AuthController::class, 'updatedata'])->name('admin.userprofile.updatedata');

    Route::post('/userprofile/update', [AuthController::class, 'update'])->name('admin.userprofile.update');

    Route::post('/userprofile/delete', [AuthController::class, 'delete'])->name('admin.userprofile.delete');

    //RESERVATION

    Route::get('/reservation', [ReservationController::class, 'index'])->name('admin.reservation.index');
    Route::get('/reservation/switch', [ReservationController::class, 'SwitchStatus'])->name('admin.reservation.switch');
    Route::get('/reservation/harddelete/{id}', [ReservationController::class, 'delete'])->name('admin.reservation.delete');

    //CONTACTFORM
    Route::get('/contactform', [ContactController::class, 'contactform'])->name('admin.contact.index');

    //
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contactpost'])->name('contact.post');
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');

Route::get('blog/{category}/{slug}', [HomePageController::class, 'blogsinglepage'])->name('blogsinglepage');
Route::get('rooms/{category}/{slug}', [RoomController::class, 'roomsinglepage'])->name('roomsinglepage');
Route::post('/rooms', [RoomController::class, 'ReservationPost'])->name('reservation.post');

<?php 

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;





 
  
 
 
    Route::middleware('auth.admin')->group(function () {

    Route::get('admins/dashborad', [App\Http\Controllers\Dashborad\HomeController::class, 'index1'])->name('admin.index');
    Route::get('admins/partners/view', [App\Http\Controllers\Dashborad\PartnersController::class, 'view'])->name('partners.view');
    Route::post('admins/partners/add', [App\Http\Controllers\Dashborad\PartnersController::class, 'store'])->name('partners.add');
    Route::delete('admins/partners/delete/{id}',[App\Http\Controllers\Dashborad\PartnersController::class,'delete'])->name('partners.delete');
    Route::post('admins/partners/update',[App\Http\Controllers\Dashborad\PartnersController::class,'update'])->name('partners.update');

    Route::get('admins/services/view', [App\Http\Controllers\Dashborad\ServiceController::class, 'view'])->name('services.view');
    Route::post('admins/services/add', [App\Http\Controllers\Dashborad\ServiceController::class, 'store'])->name('services.add');
    Route::delete('admins/services/delete/{id}',[App\Http\Controllers\Dashborad\ServiceController::class,'delete'])->name('services.delete');
    Route::post('admins/services/update',[App\Http\Controllers\Dashborad\ServiceController::class,'update'])->name('services.update');

    Route::get('admins/setting/view',[App\Http\Controllers\Dashborad\SettingController::class,'view'])->name('setting.view');
    Route::post('admins/setting/add',[App\Http\Controllers\Dashborad\SettingController::class,'store'])->name('setting.add');

    Route::get('admins/blogs/view', [App\Http\Controllers\Dashborad\BlogsController::class, 'view'])->name('blogs.view');
    Route::post('admins/blogs/add', [App\Http\Controllers\Dashborad\BlogsController::class, 'store'])->name('blogs.add');
    Route::delete('admins/blogs/delete/{id}',[App\Http\Controllers\Dashborad\BlogsController::class,'delete'])->name('blogs.delete');
    Route::post('admins/blogs/update',[App\Http\Controllers\Dashborad\BlogsController::class,'update'])->name('blogs.update');

    
    Route::get('admins/advertisement/view', [App\Http\Controllers\Dashborad\AdvertisementsController::class, 'view'])->name('advertisement.view');
    Route::post('admins/advertisement/add', [App\Http\Controllers\Dashborad\AdvertisementsController::class, 'store'])->name('advertisement.add');
    Route::delete('admins/advertisement/delete/{id}',[App\Http\Controllers\Dashborad\AdvertisementsController::class,'delete'])->name('advertisement.delete');
    Route::post('admins/advertisement/update',[App\Http\Controllers\Dashborad\AdvertisementsController::class,'update'])->name('advertisement.update');

    Route::get('admins/rating/view', [App\Http\Controllers\Dashborad\RatingController::class, 'view'])->name('rating.view');
    Route::post('admins/rating/add', [App\Http\Controllers\Dashborad\RatingController::class, 'store'])->name('rating.add');
 
    Route::get('admins/setting/view', [App\Http\Controllers\Dashborad\SettingController::class, 'view'])->name('setting.view');
    Route::post('admins/setting/update',[App\Http\Controllers\Dashborad\SettingController::class,'updateImageSetting'])->name('setting.update');
    Route::post('admins/setting/add', [App\Http\Controllers\Dashborad\SettingController::class, 'store'])->name('setting.add');
 
    Route::get('admins/order/view', [App\Http\Controllers\OrdersController::class, 'view'])->name('order.view');
    Route::delete('admins/order/delete/{id}',[App\Http\Controllers\OrdersController::class,'delete'])->name('order.delete');
 
});
     
<?php

Route::get('/', function () {
    return view('index');
})->name('homepage');

Auth::routes();

Route::get('/user-home', 'UserController@index')->name('user.home');
Route::get('/admin-home', 'AdminController@index')->name('admin.home');

// Super Admins Profile
Route::post('/admin-profile-pic-update', 'AdminController@profile_pic_update')->name('admin.profile.pic.update');
Route::post('/admin-profile-password-update', 'AdminController@profile_password_update')->name('admin.profile.password.update');
Route::post('/admin-profile-info-update', 'AdminController@profile_info_update')->name('admin.profile.info.update');

Route::get('/file-mgt', 'AdminController@file_mgt')->name('file.mgt');
Route::get('/user-mgt', 'AdminController@user_mgt')->name('user.mgt');
Route::post('/delete-db-file', 'AdminController@del_db_file')->name('del.db.file');
Route::post('/delete-user', 'AdminController@del_user')->name('del.user');

// User Profile
Route::post('/user-profile-pic-update', 'UserController@profile_pic_update')->name('user.profile.pic.update');
Route::post('/user-profile-password-update', 'UserController@profile_password_update')->name('user.profile.password.update');
Route::post('/user-profile-info-update', 'UserController@profile_info_update')->name('user.profile.info.update');

Route::post('/payment-verify', 'UserController@payment_verification')->name('payment.verify');
Route::get('/user-download', 'UserController@download_file')->name('user.download');
// Route::get('/file-download', 'UserController@download_file')->name('file.download');

Route::group(['middleware' => ['checkRole:admin']], function () {
    Route::get('/site-settings', function(){ return view('admin.site-settings'); })->name('site.settings');
    Route::get('/cloud-settings', function(){ return view('admin.cloud-settings'); })->name('cloud.settings');
    Route::get('/admin-profile', function(){ return view('admin.profile'); })->name('admin.profile');
});
Route::group(['middleware' => ['checkRole:user']], function () {
    Route::get('/user-profile', function(){ return view('user.profile'); })->name('user.profile');
    Route::get('/user-file', function(){ return view('user.convert'); })->name('user.convert');
    Route::get('/user-payment', function(){ return view('user.pay-for-it'); })->name('user.payment');
});


// Route::get('/panel', 'HomeController@index')->name('panel');

// Cloud Uploading
Route::post('/processFile', 'UserController@processFile')->name('processFile');

Route::get('/test', 'UserController@test')->name('test');
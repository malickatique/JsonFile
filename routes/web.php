<?php
Route::get('/', 'Controller@index')->name('homepage');
//Clear Cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    // return 'DONE'; //Return anything
    session()->flush();
    return redirect ('/');
});
Auth::routes(['verify' => true]);

Route::get('/user-home', 'UserController@index')->name('user.home');
Route::get('/user-profile', 'UserController@user_profile')->name('user.profile');
Route::get('/admin-home', 'AdminController@index')->name('admin.home');

// Site Content Settings
Route::get('/site-mgt', 'ContentController@index')->name('site.mgt');


Route::get('/user-view/{id}', 'AdminController@user_view')->name('user.view');
Route::get('/file-view/{id}', 'AdminController@file_view')->name('file.view');
Route::get('/admin-edit/{id}', 'AdminController@admin_edit')->name('admin.edit');
Route::get('/file-info/{id}', 'UserController@file_invoice')->name('file.invoice');

// Super Admins Profile
Route::post('/admin-profile-pic-update', 'AdminController@profile_pic_update')->name('admin.profile.pic.update');
Route::post('/admin-profile-password-update', 'AdminController@profile_password_update')->name('admin.profile.password.update');
Route::post('/admin-profile-info-update', 'AdminController@profile_info_update')->name('admin.profile.info.update');

Route::get('/file-mgt', 'AdminController@file_mgt')->name('file.mgt');
Route::get('/user-mgt', 'AdminController@user_mgt')->name('user.mgt');
Route::post('/delete-db-file', 'AdminController@del_db_file')->name('del.db.file');
Route::post('/delete-user', 'AdminController@del_user')->name('del.user');


Route::get('/cloud-settings', 'AdminController@cloud_index')->name('cloud.settings');
Route::post('/cloud-token', 'AdminController@cloud_token')->name('cloud.token');
Route::post('/cloud-folder', 'AdminController@cloud_folder')->name('cloud.folder');
Route::post('/cloud-price', 'AdminController@cloud_price')->name('cloud.price');

Route::get('/site-settings', 'AdminController@site_settings')->name('site.settings');
Route::post('/site-name', 'AdminController@site_name')->name('site.name');
Route::post('/site-logo-text', 'AdminController@site_logo_text')->name('site_logo_text');
Route::post('/site-header-text', 'AdminController@site_header_text')->name('site_header_text');
Route::post('/site-aboutus-text', 'AdminController@site_about_us')->name('site_about_us');
Route::post('/site-adderss', 'AdminController@site_address')->name('site_address');
Route::post('/site-facebook', 'AdminController@site_facebook')->name('site_facebook');
Route::post('/site-twitter', 'AdminController@site_twitter')->name('site_twitter');
Route::post('/site-instagram', 'AdminController@site_instagram')->name('site_instagram');
Route::post('/site-linkedin', 'AdminController@site_linkedin')->name('site_linkedin');
Route::post('/site-email', 'AdminController@site_email')->name('site_email');
Route::post('/site-phone', 'AdminController@site_phone')->name('site_phone');
Route::post('/site-header-pic', 'AdminController@site_header_pic')->name('site_header_pic');
Route::get('/user-payment', 'UserController@user_payment_index')->name('user.payment');

// User Profile
Route::post('/user-profile-pic-update', 'UserController@profile_pic_update')->name('user.profile.pic.update');
Route::post('/user-profile-password-update', 'UserController@profile_password_update')->name('user.profile.password.update');
Route::post('/user-profile-info-update', 'UserController@profile_info_update')->name('user.profile.info.update');

Route::post('/payment-verify', 'UserController@payment_verification')->name('payment.verify');
Route::get('/user-download', 'UserController@download_file')->name('user.download');

Route::group(['middleware' => ['checkRole:admin']], function () {
    Route::get('/admin-profile', function(){ return view('admin.profile'); })->name('admin.profile');
});
Route::group(['middleware' => ['checkRole:user']], function () {
    Route::get('/user-file', function(){ return view('user.convert'); })->name('user.convert');
});


// Route::get('/panel', 'HomeController@index')->name('panel');

// Cloud Uploading
Route::post('/processFile', 'UserController@processFile')->name('processFile');

Route::get('/test', 'UserController@test')->name('test');

// Route::get('/getCountries','Controller@getCountries');
Route::get('/getStates/{id}','Controller@geStates');
Route::get('/getCities/{id}','Controller@geCities');

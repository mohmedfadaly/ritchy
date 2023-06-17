<?php


Route::group(['middleware' => ['web']], function() {

    # home
    Route::get('/','front\HomeController@Home')->name('welcome');
    
    Route::get('logout-acuant','front\AuthController@Logout')->name('acuant_Logout');
    Route::post('update-profile-doctor','front\AuthController@complate')->name('update_profile_complate');
    Route::post('update-profile-info','front\AuthController@update')->name('update_profile_info')->middleware('customer');
    Route::get('profile-acuant','front\AuthController@info')->name('info_profile')->middleware('customer');

    Route::get('info-complate-provider','front\AuthController@infoprovider')->name('info_provider')->middleware('provider');

});

Route::group(['middleware' => ['web','customer_guest']], function() {
    
    
    # change type
    Route::get('login-account','front\AuthController@login')->name('login_doctor');
    
    Route::post('login-account','front\AuthController@logincustomer')->name('login_doctor_complate');


});



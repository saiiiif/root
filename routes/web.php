<?php

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
//Route::match(['get','post'],'/perPost','AdminController@Post_Permission' ); ////
//Route::match(['get','post'],'/admin/role','AdminController@roles_aff'); ////
Route::match(['get','post'],'/instructor/session/Modif','EventsController@ModifOM');
Route::match(['get','post'],'instructor/session/validDRAFT','EventsController@ValideDRAFT');
Route::post('instructor/session/saveModif','EventsController@storeModif');
Route::match(['get','post'],'/instructor/session/valideMof','EventsController@planned_missionmodif');
Route::post('instructor/session/','EventsController@store');
Route::match(['get','post'],'/instructor/session/save','EventsController@planned_mission');
Route::get('/daf','DafController@showtrips' );
Route::get('/dafpdc','DafController@showpdcs');
//Route::get('/managerpdc','ManagerController@validepdcs' );


Route::get('/managerpdc','ManagerController@showpdcs' );
Route::match(['get','post'],'/managerpdcvalide','ManagerController@validepdcs' );

Route::match(['get','post'],'/dafpdcvalide','DafController@validepdcs');
Route::get('/manager','ManagerController@showtrips' );
Route::match(['get','post'],'/managervalide','ManagerController@ValideManager');

//Route::match(['get','post'],'/manager','ManagerController@ValideManager');

Route::match(['get','post'],'/DafValide','DafController@ValideDaf');

Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

//Admin routes//

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'],function() {
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
    Route::match(['get','post'],'/admin/profile','AdminController@adminProfile');
    Route::match(['get','post'],'/admin/profile','AdminController@index');
    Route::match(['get','post'],'/admin/profile/update-profile','AdminController@updateProfile');



    Route::match(['get','post'],'/admin/instructor','InstructorController@indexInstructor');
    Route::match(['get','post'],'/admin/instructor/create','InstructorController@createInstructor');
    Route::post('/admin/instructor/store','InstructorController@storeInstructor');
    Route::get('/admin/instructor/{id}/edit','InstructorController@editInstructor');
    Route::put('/admin/instructor/update/{id}','InstructorController@updateInstructor');
    Route::get('/admin/instructor/{id}','InstructorController@destroyInstructor');


});

//Instructor routes//

// Route::group(['middleware' => 'App\Http\Middleware\InstructorMiddleware'],function() {

    Route::get('/instructor','EventsController@calendar');
    Route::match(['get','post'],'/instructor/profile','InstructorController@InsProfile');
    Route::match(['get','post'],'/instructor/profile/update-profile','instructorController@updateProfile');
    Route::get('/settings', 'instructorController@settings');
    Route::get('/settings/check-pwd','instructorController@chkPassword');
    Route::match(['get','post'],'/settings/update-pwd','instructorController@updatePassword');
    Route::get('instructor/om/generate/{id}', 'EventsController@generate_om');
    Route::get('instructor/pdc/generate/{id}', 'EventsController@generate_pdc');
    Route::get('instructor/facture/generate/{id}', 'EventsController@generate_facture');
    Route::post('instructor/excel/generate', 'EventsController@generate_excel');

    Route::post('instructor/pdc/uploads/', 'EventsController@imagesUploadPost')->name('ajaxupload.action');;
    Route::get('instructor/pdc/
    ', 'EventsController@validatePdc');

    //Oder Mission Routes
    Route::get('/instructor/create','OmController@create');
    Route::post('instructor/om/store','OmController@store');
    Route::match(['get','post'],'/instructor/om','OmController@index');
    Route::get('instructor/{id}/edit_om','OmController@edit');
    Route::put('instructor/update/{id}','OmController@update');
    Route::get('instructor/delete/{id}','OmController@destroy');

    //Manage Session Routes

    Route::match(['get','post'],'/instructor/sessions','EventsController@index');
    Route::get('/instructor/session/create','EventsController@create');
    Route::post('instructor/session/','EventsController@store');
    Route::get('instructor/session/{id}/edit_session','EventsController@edit');
    Route::put('instructor/session/{id}','EventsController@update');
    Route::get('instructor/session/delete/{id}','EventsController@destroy');
    Route::get('instructor/session/{id}/view_session','EventsController@view');
    Route::get('instructor/session/delivery','EventsController@deliveryDay');
    Route::match(['get','post'],'instructor/session/validateStatus','EventsController@validateStatus');



    //Manage pdc request

    Route::match(['get','post'],'/instructor/pdc','PdcsController@index');
    Route::match(['get','post'],'/instructor/pdc/generate','PdcsController@generate_pdc');

    //Route::get('/instructor/pdc/create','PdcsController@create');
    //Route::post('instructor/pdc/','PdcsController@store');
    //Route::get('instructor/pdc/{id}/edit_pdc','PdcsController@edit');
    //Route::put('instructor/pdc/{id}','PdcsController@update');
   Route::get('instructor/pdc/delete/{id}','PdcsController@destroy');



//Manage Reciept
Route::get('instructor/pdc/create_pdc/{id}','PdcsController@create_pdc');
Route::post('instructor/pdc/add','PdcsController@store_pdc');
//Manage Missing Reciept
Route::get('instructor/pdc/create_missing_pdc/{id}','PdcsController@create_missing_pdc');
Route::post('instructor/pdc/','PdcsController@store_missing_pdc');


//Manage Dashboard

Route::get('instructor/dashboard','dashboardController@index');

//});

//Manage Trips
Route::get('instructor/trips','TripController@index');
Route::get('instructor/trips/create','TripController@create');
Route::post('instructor/trips/store','TripController@store');
Route::get('instructor/trips/delete/{id}','TripController@destroy');
Route::get('instructor/trips/{id}/edit_trip','TripController@edit');
Route::put('instructor/trips/{id}','TripController@update');









Route::post('/admin/forgetpassword','AdminController@forgotPassword');
Route::get('/admin/reset','AdminController@resetPassword');
Route::post('/admin/reset', 'AdminController@forgot_password_post');
Route::post('/admin/reset/{token}', 'AdminController@reset_password_post');
Route::get('/admin/reset/{token}', 'AdminController@reset_password');



Route::get('/logout', 'AdminController@logout');


Route::get('/{provider}','AdminController@redirectToProvider');
Route::get('/{provider}/callback','AdminController@handleProviderCallback');


//Daf Routes

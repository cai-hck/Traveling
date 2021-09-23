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

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Auth::routes();

Route::get('/resetpassword/{token}', 'HomeController@resetpassword');
Route::post('/resetnewpassword', 'HomeController@resetnewpassword');

Route::post('/packagesearch', 'HomeController@packagesearch');
Route::post('/followcompany', 'HomeController@followcompany');

Route::post('/addappointment', 'HomeController@addappointment');
Route::post('/sendsms1', 'HomeController@sendsms1');
Route::post('/addvisitor', 'HomeController@addvisitor');
Route::post('/addappointmentall', 'HomeController@addappointmentall');

Route::get('/listofcompany', 'HomeController@listofcompany');
Route::post('/getlocationbyip', 'HomeController@getlocationbyip');
Route::post('/getareabyip', 'HomeController@getareabyip');
Route::post('/getvisitorarea1', 'HomeController@getvisitorarea1');
Route::get('/checkcompanypackage/{id}', 'HomeController@checkcompanypackage');

Route::post('/contactcompany', 'HomeController@contactcompany');

/* register */
Route::post('/createaccount', 'HomeController@createaccount');
Route::post('/emailcheck', 'HomeController@emailcheck');
Route::post('/getvisitorarea', 'HomeController@getvisitorarea');

/*login */
Route::post('/accountlogin', 'HomeController@accountlogin');
Route::post('/loginstatus', 'HomeController@loginstatus');
Route::post('/forgotstatus', 'HomeController@forgotstatus');

/* visitor */
Route::post('/contactus', 'HomeController@contactus');

/* company */
Route::get('/logout', 'CompanyController@logout');
Route::get('/profile', 'CompanyController@index');
Route::post('/getadminarea', 'CompanyController@getadminarea');
Route::post('/updatecompanyprofile', 'CompanyController@updatecompanyprofile');

Route::get('/addpackage', 'CompanyController@addpackage');
Route::post('/getoffercity', 'CompanyController@getoffercity');
Route::post('/addnewpackage', 'CompanyController@addnewpackage');

Route::get('/editpackage', 'CompanyController@editpackage');
Route::get('/deletepackageone/{id}', 'CompanyController@deletepackageone');

Route::get('/editpackageone/{id}', 'CompanyController@editpackageone');
Route::post('/updatepackage', 'CompanyController@updatepackage');


Route::get('/booked', 'CompanyController@booked');
Route::get('/viewbookedone/{id}', 'CompanyController@viewbookedone');
Route::get('/deleteappointment/{id}', 'CompanyController@deleteappointment');
Route::get('/paidappointment/{id}', 'CompanyController@paidappointment');
Route::get('/contact', 'CompanyController@contact');
Route::post('/contactadmin', 'CompanyController@contactadmin');


Route::get('/addpackagenew', 'CompanyController@addpackagenew');
Route::post('/addnewpackagenew', 'CompanyController@addnewpackagenew');

Route::get('/editpackagenew', 'CompanyController@editpackagenew');
Route::get('/editpackagenewone/{id}', 'CompanyController@editpackagenewone');
Route::get('/deletepackagenewone/{id}', 'CompanyController@deletepackagenewone');
Route::post('/updatepackagenew', 'CompanyController@updatepackagenew');

Route::get('/addcheck', 'CompanyController@addcheck');
Route::get('/bookednew', 'CompanyController@bookednew');
Route::get('/companyoffer', 'CompanyController@companyoffer');
Route::post('/packagesearchnew', 'CompanyController@packagesearchnew');

Route::post('/addappointmentnew', 'CompanyController@addappointmentnew');
Route::post('/addvisitornew', 'CompanyController@addvisitornew');
Route::post('/addappointmentallnew', 'CompanyController@addappointmentallnew');
Route::get('/viewbookednewone/{id}', 'CompanyController@viewbookednewone');
Route::post('/approvecheck', 'CompanyController@approvecheck');
Route::post('/addmoney', 'CompanyController@addmoney');
Route::post('/clearmoney', 'CompanyController@clearmoney');
Route::post('/print', 'CompanyController@print');


Route::get('/addflightnew', 'CompanyController@addflightnew');
Route::post('/addnewflightnew', 'CompanyController@addnewflightnew');
Route::get('/editflightnew', 'CompanyController@editflightnew');
Route::get('/editflightnewone/{id}', 'CompanyController@editflightnewone');
Route::get('/deleteflightnew/{id}', 'CompanyController@deleteflightnew');
Route::get('/bookedflightnew', 'CompanyController@bookedflightnew');
Route::post('/updateflightnew', 'CompanyController@updateflightnew');
Route::get('/companyofferflight', 'CompanyController@companyofferflight');
Route::post('/addappointmentflightnew', 'CompanyController@addappointmentflightnew');
Route::post('/addappointmentallflightnew', 'CompanyController@addappointmentallflightnew');
Route::get('/viewbookedflightnewone/{id}', 'CompanyController@viewbookedflightnewone');

Route::post('/flightsearchnew', 'CompanyController@flightsearchnew');

Route::get('/addcheckflight', 'CompanyController@addcheckflight');
Route::post('/addmoneyflight', 'CompanyController@addmoneyflight');
Route::post('/clearmoneyflight', 'CompanyController@clearmoneyflight');
Route::post('/approvecheckflight', 'CompanyController@approvecheckflight');
Route::post('/printflight', 'CompanyController@printflight');
Route::get('/viewbookednew', 'CompanyController@viewbookednew');
Route::get('/viewbookedflightnew', 'CompanyController@viewbookedflightnew');

Route::post('/deletemoney', 'CompanyController@deletemoney');
Route::post('/deletemoneyflight', 'CompanyController@deletemoneyflight');

Route::get('/checkbookednewone/{id}', 'CompanyController@checkbookednewone');
Route::get('/checkbookedflightnewone/{id}', 'CompanyController@checkbookedflightnewone');

Route::get('/printreport', 'CompanyController@printreport');
Route::post('/expert_excel', 'CompanyController@expert_excel');


Route::get('/visaoffer', 'CompanyController@visaoffer');
Route::get('/bookedvisa', 'CompanyController@bookedvisa');
Route::get('/editvisa', 'CompanyController@editvisa');
Route::get('/editvisaone/{string}', 'CompanyController@editvisaone');
Route::get('/printvisa', 'CompanyController@printvisa');
Route::get('/viewbookedvisa', 'CompanyController@viewbookedvisa');
Route::post('/updatevisa', 'CompanyController@updatevisa');
Route::post('/checkvisa', 'CompanyController@checkvisa');
Route::get('/addcheckvisa', 'CompanyController@addcheckvisa');
Route::post('/addmoneyvisa', 'CompanyController@addmoneyvisa');
Route::post('/clearmoneyvisa', 'CompanyController@clearmoneyvisa');
Route::post('/approvecheckvisa', 'CompanyController@approvecheckvisa');
Route::post('/addappointmentvisa', 'CompanyController@addappointmentvisa');
Route::post('/addvisitorvisa', 'CompanyController@addvisitorvisa');
Route::post('/addappointmentallvisa', 'CompanyController@addappointmentallvisa');
Route::get('/viewbookedvisaone/{id}', 'CompanyController@viewbookedvisaone');
Route::post('/updatevisaon', 'CompanyController@updatevisaon');
Route::post('/updatevisaone', 'CompanyController@updatevisaone');
Route::post('/updatevisaoff', 'CompanyController@updatevisaoff');
Route::post('/clickcurrent', 'CompanyController@clickcurrent');
Route::get('/viewbookedmyvisaone/{id}', 'CompanyController@viewbookedmyvisaone');
Route::post('/getoffercity_id', 'CompanyController@getoffercity_id');

Route::get('/deletebookedone/{id}', 'CompanyController@deletebookedone');

Route::get('/changeconfirm/{id}', 'CompanyController@changeconfirm');

<?php

Route::get('/home', 'Admin\HomeController@index')->name('home');

/**
 * ROLES
 */
 Route::get('/role/{role}/permissions','Admin\RoleController@permissions');
 Route::get('/rolePermissions','Admin\RoleController@rolePermissions')->name('myrolepermission');
 Route::get('/roles/all','Admin\RoleController@all');
 Route::post('/assignPermission','Admin\RoleController@attachPermission');
 Route::post('/detachPermission','Admin\RoleController@detachPermission');
 Route::resource('/roles','Admin\RoleController');

 /**
  * PERMISSIONs
  */
 Route::get('/permissions/all','Admin\PermissionController@all');
 Route::resource('/permissions','Admin\PermissionController');


 /**
 * ADMINs
 */
Route::get('/profile','Admin\AdminController@profileEdit');
Route::put('/profile/{admin}','Admin\AdminController@profileUpdate');
Route::put('/changepassword/{admin}','Admin\AdminController@changePassword');
Route::put('/administrator/status','Admin\AdminController@switchStatus');
Route::post('/administrator/removeBulk','Admin\AdminController@destroyBulk');
Route::put('/administrator/statusBulk','Admin\AdminController@switchStatusBulk');
Route::resource('/administrator','Admin\AdminController');

/**
 * USERS
 */
Route::put('/user/status','Admin\UserController@switchStatus');
Route::post('/user/removeBulk','Admin\UserController@destroyBulk');
Route::put('/user/statusBulk','Admin\UserController@switchStatusBulk');
Route::get('/user/{id}/cellar','Admin\UserController@showUserCellar');
Route::resource('/user','Admin\UserController');

/*add by me */
Route::get('/addnewcompany', 'Admin\HomeController@addnewcompany');
Route::post('/approvecompnay', 'Admin\HomeController@approvecompnay');
Route::post('/declinecompnay', 'Admin\HomeController@declinecompnay');
Route::post('/suspendcompnay', 'Admin\HomeController@suspendcompnay');
Route::post('/unsuspendcompnay', 'Admin\HomeController@unsuspendcompnay');
Route::post('/setcompanystatus', 'Admin\HomeController@setcompanystatus');
Route::post('/setcompanynumber', 'Admin\HomeController@setcompanynumber');

Route::get('/listofcompany', 'Admin\HomeController@listofcompany');


Route::get('/addcity', 'Admin\HomeController@addcity');
Route::post('/newcity', 'Admin\HomeController@newcity');
Route::post('/editcity', 'Admin\HomeController@editcity');
Route::get('/deletecity/{id}', 'Admin\HomeController@deletecity');

Route::get('/addarea', 'Admin\HomeController@addarea');
Route::post('/newarea', 'Admin\HomeController@newarea');
Route::post('/editarea', 'Admin\HomeController@editarea');
Route::get('/deletearea/{id}', 'Admin\HomeController@deletearea');


Route::get('/aftercompanysignup', 'Admin\HomeController@aftercompanysignup');
Route::post('/edit_aftercompanysignup', 'Admin\HomeController@edit_aftercompanysignup');

Route::get('/contactus', 'Admin\HomeController@contactus');
Route::post('/editcontactus', 'Admin\HomeController@editcontactus');
Route::get('/deletecontactus/{id}', 'Admin\HomeController@deletecontactus');

Route::get('/contactcompany', 'Admin\HomeController@contactcompany');
Route::post('/editcontactcompany', 'Admin\HomeController@editcontactcompany');
Route::get('/deletecontactcompany/{id}', 'Admin\HomeController@deletecontactcompany');
Route::get('/clear/{id}', 'Admin\HomeController@clear');
Route::get('/turkey/{id}', 'Admin\HomeController@turkey');

Route::get('/package', 'Admin\HomeController@package');
Route::get('/booked', 'Admin\HomeController@booked');
Route::get('/bookedflight', 'Admin\HomeController@bookedflight');
Route::get('/bookedvisa', 'Admin\HomeController@bookedvisa');

Route::get('/contactturkey', 'Admin\HomeController@contactturkey');
Route::post('/edit_contact', 'Admin\HomeController@edit_contact');
Route::get('/delete_contact/{id}', 'Admin\HomeController@delete_contact');


Route::get('/addadmin', 'Admin\HomeController@addadmin');
Route::post('/subprofile', 'Admin\AdminController@subprofile');

Route::post('/approvecheck', 'Admin\HomeController@approvecheck');
Route::post('/addmoney', 'Admin\HomeController@addmoney');
Route::post('/clearmoney', 'Admin\HomeController@clearmoney');
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

Route::get('/','Welcome\WelcomeController@welcome'); // main page
Route::get('/welcome','Welcome\WelcomeController@welcome'); // main page

Auth::routes(); // auth page

Route::get('/home', 'Welcome\WelcomeController@welcome')->name('home'); // main page after login
//Route::group('')
Route::get('/admin/users','Admin\UsersController@ViewUsers'); // users page for admin
Route::get('/admin/user/activate/{id}','Admin\UsersController@ActivateUser'); //  function for activate user
Route::get('/not','Admin\UsersController@not'); // if user not activated
Route::get('/news/add','News\DaeeNews@create'); // add news to slider
Route::post('/news/add','News\DaeeNews@store');// save news to slider
Route::get('/news/edit/{id}','News\DaeeNews@edit'); // add news to slider
Route::post('/news/edit/{id}','News\DaeeNews@update');// save news to slider
Route::get('/news','News\DaeeNews@index');// show all newsw in slider
Route::get('/news/remove/{id}','News\DaeeNews@delete');// show all newsw in slider

Route::get('/sermon','Sermon\SermonController@index');// page all friday sermon
Route::post('/sermon','Sermon\SermonController@store');// store friday sermon
Route::get('/sermon/add','Sermon\SermonController@create');// page add friday sermon
Route::post('/sermon/add','Sermon\SermonController@store');// store friday sermon
Route::get('/sermon/edit/{id}','Sermon\SermonController@update');// show edit add friday sermon
Route::post('/sermon/edit/{id}','Sermon\SermonController@edit');// edit sermon
Route::post('/sermon/delete/{id}','Sermon\SermonController@delete');// delete friday sermon
Route::get('/city/all','CityController@all');// page show all cities
Route::get('/city/add','CityController@create');// page to add city
Route::post('/city/add','CityController@store');// page to store city


Route::get('/neighborhood/all','NeighborhoodController@all');// page to show all neighborhoods
Route::get('/neighborhood/add','NeighborhoodController@create');// page to  add neighborhood
Route::post('/neighborhood/add','NeighborhoodController@store');// store neighborhood

//Route::post('/neighorhood/mosque/{id}','NeighborhoodController@allMosques');
Route::get('/mosque/all','MosqueController@all');// show all mosques
Route::get('/mosque/add','MosqueController@create');// add new mosque
Route::post('/mosque/add','MosqueController@store');// store new mosque
Route::post('/mosque/addImam/{id}','MosqueController@addImam');// add imam mosque from imams list
Route::get('/mosque/imam/{id}/{name}','MosqueController@addNewImamShow');//show page add new imam / user
Route::post('/mosque/imam/add','MosqueController@addNewImam');//store imam / user and add it mosque

Route::get('/location/all','LocationController@all');//show all locations
Route::get('/location/add','LocationController@create');//show page to add new location
Route::post('/location/add','LocationController@store');//store new location

//Route::post('/complement/add','Complaint\ComplaintController@store');


Route::get('/notification','Notification\NotificationController@index');//show All user compliment notification
Route::get('/notification/{id}','Notification\NotificationController@show');// show complement notification
Route::get('/notification/markAsRead/{id}','Notification\NotificationController@markAsRed');//make complement notification as reed
Route::get('/notificationSuggestion/{id}','SuggestionController@notification');//show suggestion notification
Route::get('/notificationSuggestion','SuggestionController@index');//show All user suggestion notification
Route::get('/notificationSuggestion/markAsRead/{id}','SuggestionController@markAsRed');//make suggestion notification as reed

Route::get('/notificationActivity/{id}','Notification\ActivityController@show');//show suggestion notification
Route::get('/notificationActivity','Notification\ActivityController@index');//show All user suggestion notification
Route::get('/notificationActivity/markAsRead/{id}','Notification\ActivityController@markAsRed');//make suggestion notification as reed

Route::get('/imam/activities','Imam\ImamActivities@index')->middleware('auth');//show all imam week activities

Route::get('/week','Week@index');//show all activites in week
Route::get('/week/add','Week@updateActivityNumber');//show change week activites count
Route::post('/week/add','Week@add');//add or change week activites count
Route::get('/week/accept/{id}','Week@accept');//accept imam activity
Route::get('/week/deny/{id}','Week@deny');//DENY imam activity
Route::get('/activity/accept/{id}','Imam\ImamActivities@accept');//accept guest activity
Route::get('/activity/deny/{id}','Imam\ImamActivities@deny');//accept guest activity
Route::get('/activity','Imam\ImamActivities@index');//show all imam week activities
Route::get('/activity/add','Imam\ImamActivities@create');//show page to add activity
Route::post('/activity/add','Imam\ImamActivities@add');//store new activity



//Route::get('/ register','Auth\Register@showRegister');


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

 

// Route::get('/test', function () {
//     return App\Type::find(1)->tickets;
// });
Route::get('/test', 'AdminController@test')->name('test');
Route::get('/index', 'SendTicketController@index')->name('index');
Route::get('/re_send/{id}', 'SendTicketController@re_send')->name('re_send');
Route::get('/re_send_auto', 'SendTicketController@re_send_auto')->name('re_send_auto');
   
   
Route::group([ 'middleware'=>['admin']], function (){


// Chart route
Route::get('/chart', 'ChartContoller@index')->name('chart');


Route::get('/administrator', 'AdminController@main')->name('administrator');
Route::get('/administrator/ticket', 'AdminController@ticket')->name('administrator.ticket');
Route::get('/administrator/user', 'AdminController@user')->name('administrator.user');
Route::post('/administrator/user/update/{id}', 'AdminController@update_user')->name('admin.user');


// Site Route
Route::get('/administrator/item', 'AdminController@item')->name('administrator.item');
Route::post('/administrator/site/update/{id}', 'AdminController@update_site')->name('update.site');
Route::post('/administrator/site/remove/{id}', 'AdminController@remove_site')->name('remove.site');
Route::post('/administrator/site/create', 'AdminController@site_create')->name('site.create');


// department Route
Route::get('/administrator/item', 'AdminController@item')->name('administrator.item');
Route::post('/administrator/department/update/{id}', 'AdminController@update_department')->name('update.department');
Route::post('/administrator/department/remove/{id}', 'AdminController@remove_department')->name('remove.department');
Route::post('/administrator/department/create', 'AdminController@department_create')->name('department.create');

// position Route
Route::get('/administrator/item', 'AdminController@item')->name('administrator.item');
Route::post('/administrator/position/update/{id}', 'AdminController@update_position')->name('update.position');
Route::post('/administrator/position/remove/{id}', 'AdminController@remove_position')->name('remove.position');
Route::post('/administrator/position/create', 'AdminController@position_create')->name('position.create');


// priority Route
Route::get('/administrator/item', 'AdminController@item')->name('administrator.item');
Route::post('/administrator/priority/update/{id}', 'AdminController@update_priority')->name('update.priority');
Route::post('/administrator/priority/remove/{id}', 'AdminController@remove_priority')->name('remove.priority');
Route::post('/administrator/priority/create', 'AdminController@priority_create')->name('priority.create');

// privilege Route
Route::get('/administrator/item', 'AdminController@item')->name('administrator.item');
Route::post('/administrator/privilege/update/{id}', 'AdminController@update_privilege')->name('update.privilege');
Route::post('/administrator/privilege/remove/{id}', 'AdminController@remove_privilege')->name('remove.privilege');
Route::post('/administrator/privilege/create', 'AdminController@privilege_create')->name('privilege.create');

// status Route
Route::get('/administrator/item', 'AdminController@item')->name('administrator.item');
Route::post('/administrator/status/update/{id}', 'AdminController@update_status')->name('update.status');
Route::post('/administrator/status/remove/{id}', 'AdminController@remove_status')->name('remove.status');
Route::post('/administrator/status/create', 'AdminController@status_create')->name('status.create');

// type Route
Route::get('/administrator/item', 'AdminController@item')->name('administrator.item');
Route::post('/administrator/type/update/{id}', 'AdminController@update_type')->name('update.type');
Route::post('/administrator/type/remove/{id}', 'AdminController@remove_type')->name('remove.type');
Route::post('/administrator/type/create', 'AdminController@type_create')->name('type.create');


Route::get('/report', 'ReportController@report')->name('report');
Route::get('/home', 'HomeController@index')->name('home');
});




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([ 'middleware'=>['auth']], function (){
Route::get('/userpage', 'UserController@user_page')->name('pages.user');
Route::post('/profile/update/{id}', 'UserController@profile_update')->name('profile.update');
Route::get('/ticket/{id}', 'TicketController@show')->name('show');
});
Route::group([ 'middleware'=>['newuser']], function (){
    Route::get('/allticket', 'TicketController@allticket')->name('allticket');
    Route::post('/ticket/create', 'TicketController@create')->name('ticket.create');
    Route::post('/ticket/update/{id}', 'TicketController@update')->name('ticket.update');
    Route::post('/ticket/update/it/{id}', 'TicketController@update_it_user')->name('it.update');


});



Route::group([ 'middleware'=>['profile']], function (){
Route::post('/profile/create', 'UserController@profile_create')->name('profile.create');

Route::get('/profile', 'UserController@profile')->name('profile');
});

// Ticket Route






// Replacement Route

Route::get('demo-generate-pdf','ReplacementController@demoGeneratePDF');

Route::get('/replacement', 'ReplacementController@replacement')->name('replacement');
Route::get('/replacement/show', 'ReplacementController@show')->name('replacement.show');
Route::post('/replacement/create', 'ReplacementController@create')->name('replacement.create');
Route::post('/replacement/update/{id}', 'ReplacementController@update')->name('replacement.update');


Route::get('/administrator/replacement/part', 'ReplacementController@part')->name('replacement.part');
Route::post('/administrator/replacement/part/create', 'ReplacementController@part_create')->name('part.create');
Route::post('/administrator/replacement/part/update/{id}', 'ReplacementController@update_part')->name('update.part');
Route::post('/administrator/replacement/part/remove/{id}', 'ReplacementController@remove_part')->name('remove.part');




// it user route 
Route::get('/it_user', 'ItController@it_show')->name('it.show');







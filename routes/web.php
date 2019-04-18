<?php
// route for the index page
Route::get('/','PagesController@home')->name('homePage');

Route::get('/geo',function(){
    return view('geocode');
});

Route::get('/test',function(){
    return view('test');
});
Route::post('/states/{id}',function($id){
    return App\State::where('country_id',$id)->get();
});

Route::post('/eventSubtopic/{id}', function($id){
    return App\EventSubTopic::where('event_topic_id',$id)->get();
});



Route::post('/upload',function(){
    return "image uploaded";
});

Route::get('/registerEvent','RegisterEventController@index');
Route::post('/registerEvent','RegisterEventController@storeEvent')->name("saveEvent");

//auth routes
Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/adminDashboard/login','Auth\AdminLoginController@showAdminDashboard')->name('admin.login');
Route::post('/adminDashboard/login','Auth\AdminLoginController@login')->name('admin.route.submit');
Route::get('/adminDashboard','AdminController@index')->name('adminDashboard');

Route::get("/eventList", 'AdminController@eventList');


Route::get("/ip",function(){
    return view('ip');
});


Route::get("/country/{id}",function($id){
  return  \App\Country::find($id);
});

Route::get('/eventDetails/{id}','PagesController@single');


// admin 

// Route::get('/adminDashboard','AdminController@index')->name('adminDashboard');

Route::get('/pages-search-results',function(){
    return view('admin.pages-search-results');
});



Route::get("/adminSignUp",function(){
    return view('admin.pages-signup');
});

// Route::get("/eventList", 'PagesController@eventList');
// edit event

Route::get('/editEvent/{id}','AdminController@edit');

Route::post('/updateEvent/{id}','AdminController@update');


Route::get('/deleteEvent/{id}','AdminController@destroy');

Route::get('uploadEvent/{id}','AdminController@uploadEvent');


// end of admin dashboard

// Route::get('/time',  'PagesController@getTime');

Route::get("/time",'PagesController@get_min_date');
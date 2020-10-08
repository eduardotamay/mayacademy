<?php

Route::get('/', 'MainController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/teacher/profile','MainController@profile')->name('teacher');

Route::get('/contact','MainController@contact')->name('contact');

Route::get('courses/list','MainController@courseslist')->name('courseslist');

Route::get('/mycart','ShoppingCartsController@index');

Route::get('/mycart/checkout','ShoppingCartsController@paymentmethod');

Route::post('/mycart','ShoppingCartsController@checkout');

Route::post('/mycart/checkout/confirmation','ShoppingCartsController@paymentConfirmation')->name('confirmation');

Route::get('/payments/store','PaymentsController@store');

Route::resource('courses','CoursesController');

Route::resource('in_shopping_carts','InShoppingCartsController',[
    'only'=>['store','destroy']
]);

Route::resource('buy','ShoppingCartsController',[
    'only'=>['show']
]);

Route::resource('orders','OrdersController',[
    'only' => ['index','update']
]);

Route::get('courses/imgcourses/{filename}',function($filename){
    $path = storage_path("app/img_courses/$filename");

    if (!\File::exists($path)) abort(4040);

    $file = \File::get($path);

    $type = \File::mimetype($path);

    $response = Response::make($file,200);

    $response->header("Content-Type",$type);

    return $response;
});
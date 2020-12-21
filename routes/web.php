<?php
Route::get('/', 'PostsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::get('login/guest', 'Auth\LoginController@guestLogin')->name('login.guest');


// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('posts', 'PostsController');
    Route::get('searchs', 'PostsController@search')->name('search');
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    //お気に入り機能
    Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('unfavorite');
        Route::get('ranks', 'FavoritesController@ranks')->name('ranks');
    });    

});




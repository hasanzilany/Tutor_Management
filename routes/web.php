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

/*Route::group(['middleware'=>['web']], function{

});*/

Route::get('/', function () {
    return view('welcome');
});
/*send the routes to conrollers which routes it to their pages*/
/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('home', 'PostController@getDashboard')->name('home');

Route::get('profile','userController@profile');
Route::get('help','userController@help');
Route::get('ttsearch','userController@search');
Route::get('setting','userController@setting');
Route::get('allinfo','userController@allinfo');
Route::get('generalsetting','userController@generalsetting');
Route::get('accountsetting','userController@accountsetting');
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


/*route to update avatar*/
Route::post('profile','userController@update_avatar');
/*creates post*/
Route::post('/createpost',[
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create'
]);
/*route to save all the info for the user*/
Route::post('/updateaccount', [
        'uses' => 'userController@postSaveAccount',
        'as' => 'account.save'
    ]);
/*route to save all the info for the user*/
 Route::post('/signup',[
        'uses'=>'userController@postSignUp',
        'as'=>'signup.save'
    ]);


/*deletes post*/
Route::get('/delete-post/{post_id}',[
    'uses'=>'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware'=> 'auth'
]);

/*edit post*/
Route::post('/edit',[
   'uses'=> 'PostController@postEditPost',
   'as'=>'edit'
]);


Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




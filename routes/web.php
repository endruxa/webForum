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

Route::get('/', function () {
    $threads = App\Thread::with('user')->paginate(10);
    return view('main', compact('threads'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/thread/mark-as-solution','ThreadController@markAsSolution')->name('markAsSolution');

Route::resource('/thread', 'ThreadController');

Route::resource('comment', 'CommentController', ['only' => ['update', 'destroy']]);

Route::post('comment/create/{thread}', 'CommentController@addThreadComment')->name('threadcomment.store');

Route::post('reply/create/{comment}', 'CommentController@addReplyComment')->name('replycomment.store');
Route::post('comment/like', 'LikeController@toggleLike')->name('toggleLike');



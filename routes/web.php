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

Route::get('/','HelloControler@index');

//pass variable
// Route::get('about', function(){
//     return view('about', ['channel' => 'Cricket is so poweful']);
// });

//for group page
// Route::prefix('sports')->group(function(){
//     Route::get('/', function () {
//         return view('welcome');
//     });

//     Route::get('about', function(){
//         echo"hello about";
//     });
// });

// //middleware cricket

// Route::get('/contact', function(){
//     return view('contact');
// })->middleware('cricket');

//group middleware
// Route::group(['middleware' => ['cricket']], function(){


//     Route::get('about', function () {
//         return view('welcome');
//     });
//     Route::get('contact', function () {
//         return view('welcome');
//     });


// });

//Contoller function call
Route::get('contactus', 'HelloControler@cotactfun')->name('contact');
Route::get('aboutus', 'HelloControler@aboutfun')->name('about');
//write post page ===================
Route::get('write/post', 'PostControler@writePost')->name('write.post');
Route::post('store/post','PostControler@storePost')->name('store.post');
Route::get('all/post','PostControler@allPost')->name('all.post');
Route::get('view/post/{id}','PostControler@viewPost')->name('view.post');
Route::get('delete/post/{id}','PostControler@deletePost')->name('delete.post');
Route::get('edit/post/{id}','PostControler@editPost')->name('edit.post');
Route::post('update/post/{id}','PostControler@updatePost');

//add catagory page==================
Route::get('add/category', 'BoloControler@addCategory')->name('add.category');
Route::get('all/category', 'BoloControler@allCategory')->name('all.category');

//category insert, view, edit, update, delete
Route::post('store/category', 'BoloControler@StoreCategory')->name('store.category');
Route::get('view/category/{id}', 'BoloControler@viewCategory');
Route::get('delete/category/{id}', 'BoloControler@deleteCategory');
Route::get('edit/category/{id}', 'BoloControler@editCategory');
Route::post('update/category{id}', 'BoloControler@updateCategory');

//for student field
// Route::get('students', 'StudentController@index')->name('student');
// Route::post('store/student', 'StudentController@store')->name('store.student');
// Route::get('all/student', 'StudentController@create')->name('all.student');
// Route::get('delete/student/{id}', 'StudentController@destroy')->name('delete.student');
// Route::get('view/student/{id}', 'StudentController@show');
// Route::get('edit/student/{id}', 'StudentController@edit');
// Route::post('update/student/{id}', 'StudentController@update')->name('update.student');


//resourse model make==========================================
Route::resource('student','StudentController');

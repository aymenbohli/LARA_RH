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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionsController');
});



Route::get('/start', function()
{
    
    $subscriber = new App\Role();
    $subscriber->name = 'Subscriber';
    $subscriber->save();

    $author = new App\Role();
    $author->name = 'Author';
    $author->save();

    $read = new App\Permission();
    $read->name = 'can_read';
    $read->display_name = 'Can Read Posts';
    $read->save();

    $edit = new App\Permission();
    $edit->name = 'can_edit';
    $edit->display_name = 'Can Edit Posts';
    $edit->save();

    $subscriber->attachPermission($read);
    $author->attachPermission($read);
    $author->attachPermission($edit);

    $user1 = new App\User;
    $user1->name = 'can_edit';
    $user1->email = 'bohliaymen5@gmail.com';
    $user1->password = '123456';
    $user1->save();
    
    $user1->attachRole($subscriber);

    return 'Woohoo!';
});
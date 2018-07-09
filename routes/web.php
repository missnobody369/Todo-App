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

// /new based on the new view created
Route::get('/new', [
    'uses' => 'PagesController@new'
]);


// When the user visits the todos routes
// Take user to the TodosController
// And take user to index method on the TodosController
// And create index inside todos controller
Route::get('/todos', [
    'uses' => 'TodosController@index',
    'as' => 'todos'
]);


// Create new route for delete
// Define route for delete
Route::get('/todo/delete/{id}',[
    'uses' => 'TodosController@delete',
    'as' => 'todo.delete' // Name of the route
]);


// Define route for update
// Create new route for delete
Route::get('/todo/update/{id}',[
    'uses' => 'TodosController@update',
    'as' => 'todo.update' // Name of the route
]);


// Define the save route
// Create new route for save
Route::post('/todo/save/{id}', [
    'uses' => 'TodosController@save',
    'as' => 'todos.save'
]);


// Create a new route
// Incoming post request from todos.blade.php
Route::post('/create/todo', [
    'uses' => 'TodosController@store' //For storing new todos in the db
]);


// Define completed route
Route::get('/todos/compeleted/{id}', [
    'uses' => 'TodosController@completed',
    'as' => 'todos.completed'
]);
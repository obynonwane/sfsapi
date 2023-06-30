<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return ["name" =>"SFS Finace", "message"=> "this the api doc", "Auth"=>["Login"=>["URL"=>"https://sfsapi-f7a49b940304.herokuapp.com/api/login", "method"=>"POST", "Payload"=>["email"=>"youremail@youremail.com", "password"=>"yourPassword"]], "Signup"=>["URL"=>"https://sfsapi-f7a49b940304.herokuapp.com/api/register", "method"=>"POST", "Payload"=>["name"=>"your fullname","email"=>"youremail@youremail.com", "password"=>"yourPassword"]]], "Task"=>["Note"=>"Requires Auth User","Create"=>["URL"=>"https://sfsapi-f7a49b940304.herokuapp.com/api/tasks", "method"=>"POST", "Payload"=>["title"=>"task title", "description"=>"task description"]], "getAllTask"=>["URL"=>"https://sfsapi-f7a49b940304.herokuapp.com/api/tasks", "method"=>"GET"], "delete"=>["URL"=>"https://sfsapi-f7a49b940304.herokuapp.com/api/tasks/{id}", "method"=>"DELETE"], "getSingleTask"=>["URL"=>"https://sfsapi-f7a49b940304.herokuapp.com/api/tasks/{id}", "method"=>"GET"]]];
});

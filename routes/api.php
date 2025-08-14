<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function (){
    return ['msg' => 'welcome menna'];
});

//* to create a resource (posts) in laravel
//? 1. create the DB and migrations
//? 2. create a model
//? 2.1. create a service ? Eloquent ORM
//? 3. create a controller to go get info from the DB
//? 4. return info


//* CRUD on posts
//* 1. get all (GET) /api/posts
// Route::get('/posts',[PostController::class, 'index']);
//* 2. create a post (POST) /api/posts
// Route::post('/posts', [PostController::class, 'store']);
//* 3. get one post (GET) /api/posts/{id}
// Route::get('/posts/{id}', [PostController::class, 'show']);
//* 4. update a post (PUT/PATCH) /api/posts/{id}
// Route::put('/posts/{id}', [PostController::class, 'update']);
//* 5. delete a post (DELETE) /api/posts/{id}
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);

//* shorthand for the previous routes
Route::apiResource('/posts', PostController::class);
//* Add route for search
Route::get('/posts/search/{title}', [PostController::class, 'search']);

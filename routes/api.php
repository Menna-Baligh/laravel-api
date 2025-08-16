<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/test', function (){
//     return ['msg' => 'welcome menna'];
// });

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
// Route::apiResource('/posts', PostController::class);


//? public routes
//* 1. Auth (register and get token)
//Route::post('/register',[AuthController::class, 'register']);
//* 2. Auth(login and get token)
//Route::post('/login', [AuthController::class, 'login']);
//* all
Route::get('/posts',[PostController::class, 'index']);
//* show
Route::get('/posts/{id}', [PostController::class, 'show']);
//* Add route for search
Route::get('/posts/search/{title}', [PostController::class, 'search']);

//? protected routes
Route::middleware('auth:sanctum')->group(function () {
    //* store
    Route::post('/posts', [PostController::class, 'store']);
    //* update
    Route::put('/posts/{id}', [PostController::class, 'update']);
    //* delete
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
    //* 3. Auth (logout and delete token)
    //Route::post('/logout', [AuthController::class, 'logout']);
});

require __DIR__.'/auth.php';
require __DIR__.'/guest.php';

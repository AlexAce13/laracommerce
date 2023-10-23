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

/*Route::get('/', function () {
    return view('welcome');
});*/

//
//Route::get('/', function (){
//    return '<h1>Hello world!</h1>';
//});

Route::get('/',function (){
    $res = 2 + 3;
    $name = 'Valet';
    return view('home', compact('res','name'));
//    return view('home', ['res' => $res, 'name' => $name]);
});

Route::get('/about', function(){
    return '<h1>About page</h1>';
});

/*Route::get('/contact', function(){
    return view('contact');
});

Route::post('/send-email',function (){
    if(!empty($_POST)){
        dump($_POST);
    }
    return 'Send email';
});*/

Route::match(['post','get'],'/contact', function (){
    if(!empty($_POST)){
        dump($_POST);
    }
   return view('contact');
})->name('contact');


Route::view('/test','test',['test'=>'Test data']);

//Route::redirect('/test','/contact');
//Route::redirect('/test','/contact', 301);

//Route::permanentRedirect('/test','/contact');

/*Route::get('/post/{id}/{slug}', function ($id, $slug){
    return "post $id | $slug";
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z0-9-]+' ]);*/

Route::prefix('admin')->group(function (){
    Route::get('/posts', function (){
        return "Posts List";
    });
    Route::get('/post/create', function (){
        return "Post create";
    });

    Route::get('/post/{id}/edit', function ($id){
        return "Post $id edit";
    });
});

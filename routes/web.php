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

Route::get('/AP', 'ImageUploadController@home');

Route::post('/upload/images', [
  'uses'   =>  'ImageUploadController@uploadImages',
  'as'     =>  'uploadImage'
]);
Route::get('/show_p', 'ProductController@show');


Route::get('/', function () {
    return view('welcome');
});



Route::resource('commandes','CommandeController');
Route::resource('tailles','TailleController');



Route::get('test', function () {
    return view('test');
});
Route::get('/AP', function () {
    return view('add_products');
});

Route::post('/AP','ProductController@store');
Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Route::get('/commandes', 'CommandeController@show');
Route::get('/commande/{fb}', 'CommandeController@single');
Route::get('storage/images/avatar/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


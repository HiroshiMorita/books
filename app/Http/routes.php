<?php

use App\Book;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('books');
});
*/


Route::group(['middleware' => ['web']], function() {

    Route::get('/', function() {
        $books = Book::all();
    });

    Route::post('/book', function(Request $request) {
        //
    });

    Route::delete('/book{book}', function(Book $book) {
        //
    });
    //
});
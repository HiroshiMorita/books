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


Route::group(['middlewareGroups' => ['web']], function() {

    Route::get('/', function() {
        $books = Book::all();
        //↓第一引数はbooks.blade.phpの意味。第二引数は連想配列で、books変数に$booksを代入している
        return view('books', [
            'books' => $books
        ]);
    });

    Route::post('/book',function(Request $request) {
        $validator  = Validator::make($request->all(), [
        'name' => 'required|max:255',
        ]);

        if($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
        }

        $book = new Book;
        $book->title = $request->name;
        $book->save();

        return redirect('/');
    });

    Route::delete('/book/{book}', function(Book $book) {
        $book->delete();

        return redirect('/');
    });
    //
});
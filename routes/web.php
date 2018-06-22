<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	//C1
    //return view('cats/show')->with('number',10);
    //----------



    //list => chuyển mảng thành biến
    //compact=> chuyển biến thành mảng
    // $data = array(1,2);
    // list($a,$b)=$data;
    //dd($b);

    //C2
    // $number = 10;
    //return view('cats/show', compact('number'));
    //-----------------
    //C3
    // return view('cats/show', array('number'=>10));
    // 
    // return view('cats/index')->with('cats','title');
    return redirect('cats');
});
//list cat
Route::get('/cats',function(){
    //return view('cats/index')->with('cats','<h1>title</h1>');   
    echo 'list cat';
});
//Display list cats of breed name
Route::get('/cats/breeds/{name}',function($name){
    echo $name;
});
//create a new cats
Route::get('/cats/create', function(){
    return view('cats.create');
});

Route::post('/cats',function(){
    echo ' du lieu moi da dc tai len';
});
//Display info cat
Route::get('/cats/{id}', function($id){
    echo sprintf('cat #'.$id);
});
//Update cat
Route::get('/cats/{id}/edit',function($id){
    echo sprintf('edit cat #'.$id);
});

Route::post('/cats/{id}',function(){
    echo ' du lieu moi da dc tai len';
});
//delete cat
Route::get('/cats/{id}/delete',function($id){
    echo sprintf('delete cat #'.$id);
});

Route::delete('/cats/{id}',function($id){
    echo sprintf('delete Cat #:'.$id);
});


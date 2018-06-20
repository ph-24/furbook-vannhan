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
    return view('cats/index')->with('cats','title');
});

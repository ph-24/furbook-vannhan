<?php
use Illuminate\Support\Facades\Input;
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
    $cats= Furbook\Cat::All();//select * form cats
    // dd($cats[0]->breed);
    return view('cats/index')->with('cats',$cats);   
});

//Display list cats of breed name
Route::get('/cats/breeds/{name}',function($name){
    $breed=Furbook\breed::with('cats')->where('name',$name)->first();//lay ra 1 phan tu duy nhat
    return view('cats.index')->with('breed',$breed)->with('cats', $breed->cats);
});

//Display info cat
DB::enableQueryLog();//kiem tra cau lenh sql
//Route Model Binding
Route::get('/cats/{id}', function(/*Furbook\Cat*/ $id){
    //dd($cat);
    //dd(DB::getQueryLog());//kiem tra cau lenh sql
    $cat = Furbook\Cat::find(/*$cat->*/$id);
    return view('cats.show')->with('cat',$cat);
})->where('id', '[0-9]+');

//create a new cats
Route::get('/cats/create', function(){
    return view('cats.create');
});

Route::post('/cats',function(){
    //dd(Request::all());
    //dd(Input::all());
    $cat = Furbook\Cat::create(Input::all());//insert into
    return redirect('cats/'.$cat->id)->with('cat',$cat)->withSuccess('Creat cat success');
});

//Update cat
Route::get('/cats/{id}/edit',function($id){
    $cat = Furbook\Cat::find($id);
    return view('cats.edit')->with('cat', $cat);
    // echo sprintf('edit cat #'.$id);
});

Route::put('/cats/{id}',function($id){
    //dd(Input::all());
    $cat = Furbook\Cat::find($id);
    $cat->update(Input::all());
    return redirect('cats/'.$cat->id)->withSuccess('Update cat success');
});
//delete cat
Route::get('/cats/{id}/delete',function($id){
    $cat = Furbook\Cat::find($id);
    $cat->delete();
    return redirect('cats/')->withSuccess('Delete cat success');
});

Route::delete('/cats/{id}',function($id){
    //$id=Input::post('id');
    //dd($id);
    $cat = Furbook\Cat::find($id);
    $cat->delete();
    return redirect('cats/')->withSuccess('Delete cat success');
});


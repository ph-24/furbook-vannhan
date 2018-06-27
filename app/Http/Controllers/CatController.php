<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;
use Furbook\Cat;
use Validator;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::all();//select * form cats
    // dd($cats[0]->breed);
        return view('cats/index')->with('cats',$cats); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = $request->validate(
            [
                'name'=>'required|size:255',
                'date_of_birth' => 'required|date_format:"Y/m/d"',
                'breed_id'=>'required|numeric'
            ],
            [
             'required' => 'Cột :attribute là bắt buộc.',
             'size' => 'Cột :attribute độ dài phải nhỏ hơn:size .',
             'date_format' => 'Cột :attribute định dạng phải là "Y/m/d".',
             'numeric' => 'Cột :attribute phải là kiểu số.',
         ]
        );
       // $validator = Validator::make($request->all(), [
       //     'name'=>'required|size:255',
       //     'date_of_birth' => 'required|date_format:"Y/m/d"',
       //     'breed_id'=>'required|numeric'
       // ]);
       // 
        if ($validator->fails()) {
            return redirect('cat.create')
            ->withErrors($validator)
            ->withInput();
        }
        //insert cat
        $cat = Cat::create($request->all());
        //Redirect back show cat
        return redirect()
        ->route('cat.show',$cat->id)
        ->with('cat',$cat)
        ->withSuccess('Creat cat success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {
        return view('cats.show')->with('cat',$cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Cat::find($id);
        return view('cats.edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cat $cat)
    {
     $cat->update($request->all());
     return redirect()
     ->route('cat.show', $cat->id)
     ->withSuccess('Update cat success');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        $cat->delete();
        return redirect()
        ->route('cat.index')
        ->withSuccess('Delete cat success');
    }
}
<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;
use Furbook\Cat;
use Auth;
use Validator;
use Furbook\Http\Requests\CatRequest;


class CatController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::User());
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
        //C1: 
      $validator = $request->validate(
        [
          'name'=>'required|max:255',
          'date_of_birth' => 'required|date_format:"Y/m/d"',
          'breed_id'=>'required|numeric'
        ],
        [
         'required' => 'Cột :attribute là bắt buộc.',
         'max' => 'Cột :attribute độ dài phải nhỏ hơn :max .',
         'date_format' => 'Cột :attribute định dạng phải là "Y/m/d".',
         'numeric' => 'Cột :attribute phải là kiểu số.',
       ]
     );
       // 
       // C2: 
       //  $validator = Validator::make($request->all(), [
       //      'name'=>'required|max:255',
       //      'date_of_birth' => 'required|date_format:"Y/m/d"',
       //      'breed_id'=>'required|numeric'
       //  ],
       //  [
       //     'required' => 'Cột :attribute là bắt buộc.',
       //     'max' => 'Cột :attribute độ dài phải nhỏ hơn:size .',
       //     'date_format' => 'Cột :attribute định dạng phải là "Y/m/d".',
       //     'numeric' => 'Cột :attribute phải là kiểu số.',
       // ]);

       //  if ($validator->fails()) {
       //      return redirect('cat.create')
       //      ->withErrors($validator)
       //      ->withInput();
       //  }
       //  
       //  get user_id
      $user_id=Auth::user()->id;
      $request->request->add(['user_id'=>$user_id]);
       //dd($request->all());
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
    public function edit(Cat $cat)
    {
      if (!Auth::user()->canEdit($cat)) {
        return redirect()
        ->route('cat.index')
        ->withErrors('Permission denied');
      }
      return view('cats.edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CatRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatRequest $request,Cat $cat)
    {
      //  get user_id
      $user_id=Auth::user()->id;
      $request->request->add(['user_id'=>$user_id]);
       //dd($request->all());
      
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

<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:191',
            'slug'=>'max:191',
            'image'=>'image|max:2048',
            'description'=>'max:255',
            'is_featured'=>'max:191',

        ]);
        $data = [
            'name'=>$request->name,
            'slug'=>Str::of($request->name)->slug('-'),
            'image'=>'',
            'description'=>$request->description,
            'is_featured'=>$request->is_featured,
        ];
        if($request->hasFile('image')){
            $data['image'] = date('Ymd-His').rand(000000000,999999999).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('hamropasal/category/'),$data['image']);
        }
        Category::firstOrCreate($data);
        return redirect()->route('categories.index')->with('toast_success', 'Category Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validate($request,[
            'name'=>'max:191',
            'slug'=>'max:191',
            'image'=>'image|max:2048',
            'description'=>'max:255',
            'is_featured'=>'max:191',

        ]);
        $data = [
            'name'=>$request->name,
            'slug'=>Str::of($request->name)->slug('-'),
            'image'=>$category->image,
            'description'=>$request->description,
            'is_featured'=>$category->is_featured,

        ];
        if($request->hasFile('image')){
            $data['image'] = date('Ymd-His').rand(000000000,999999999).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('hamropasal/category/'),$data['image']);
            file::delete(public_path('hamropasal/category/'.$category->image));
        }
        $category->update($data);
        return redirect()->route('categories.index')->with('toast_success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if(empty($category)){return redirect()->route('categories.index');}
        file::delete(public_path('hamropasal/category/'.$category->image));
        $category->delete();
        return redirect()->route('categories.index')->with('toast_error', 'Category Deleted Successfully!');
    }
}

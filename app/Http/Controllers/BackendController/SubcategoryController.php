<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('backend.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name','id');
        return view('backend.subcategory.create',compact('categories'));
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
            'category_id'=>'required|max:191',
            'name'=>'required|max:191',
            'slug'=>'max:191',
            'description'=>'max:255',

        ]);
        $data = [
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>Str::of($request->name)->slug('-'),
            'description'=>$request->description,
        ];
        Subcategory::firstOrCreate($data);
        return redirect()->route('subcategories.index')->with('toast_success', 'Subcategory Created Successfully!');
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
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all()->pluck('name','id');
        return view('backend.subcategory.edit',compact('subcategory','categories'));
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
        $subcategory =Subcategory::findOrFail($id);
        $this->validate($request,[
            'category_id'=>'max:191',
            'name'=>'max:191',
            'slug'=>'max:191',
            'description'=>'max:255',

        ]);
        $data = [
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>Str::of($request->name)->slug('-'),
            'description'=>$request->description,

        ];
        $subcategory->update($data);
        return redirect()->route('subcategories.index')->with('toast_success', 'Subcategory Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::findOrFail($id)->delete();
        return redirect()->route('subcategories.index')
        ->with('toast_error', 'Subcategory Deleted Successfully!');
    }
}

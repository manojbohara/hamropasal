<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Banner;
use App\Model\Category;
use App\Model\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::where('status' ,'active')->get();
        return view('backend.banner.index',compact('banners'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name','id');
        $subcategories = Subcategory::all()->pluck('name','id');
        return view('backend.banner.create',compact('categories','subcategories'));
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
            'title'=>'required|max:191',
            'image'=>'image|max:2048',
            'category_id'=>'max:191',
            'subcategory_id'=>'max:191',
            'url'=>'max:255',
            'status'=>'max:191',

        ]);
        $data = [
            'title'=>$request->title,
            'image'=>'',
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'url'=>$request->url,
            'status'=>$request->status,
        ];
        if($request->hasFile('image')){
            $data['image'] = date('Ymd-His').rand(000000000,999999999).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('hamropasal/banner/'),$data['image']);
        }
        Banner::firstOrCreate($data);
        return redirect()->route('banners.index')->with('toast_success', 'Banner Created Successfully!');
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
        $banner = Banner::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('backend.banner',compact('banner','categories','subcategories'));
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
        $banner = Banner::findOrFail($id);
        $this->validate($request,[
            'title'=>'max:191',
            'image'=>'image|max:2048',
            'category_id' =>'max:191',
            'subcategory_id' =>'max:191',
            'url'=>'max:255',

        ]);
        $data = [
            'title'=>$request->title,
            'image'=>$banner->image,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'url'=>$request->url,
        ];
        if($request->hasFile('image')){
            $data['image'] = date('Ymd-His').rand(000000000,999999999).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('hamropasal/banner/'),$data['image']);
            file::delete(public_path('hamropasal/banner/'.$banner->image));
        }
        
       $banner->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $banner = Banner::findOrFail($id);
        if(empty($banner)){return redirect()->route('banners.index');}
        file::delete(public_path('hamropasal/banner/'.$banner->image));
        $banner->delete();
        return redirect()->route('banners.index')->with('toast_error', 'Banner Deleted Successfully!');
    }
}

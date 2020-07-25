<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
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
            'title'=>'required|max:255',
            'slug'=>'max:255',
            'image'=>'image|max:2048',
            'description'=>'required',

        ]);
        $data = [
            'title'=>$request->title,
            'slug'=>Str::of($request->title)->slug('-'),
            'image'=>'',
            'description'=>$request->description,
        ];
        if($request->hasFile('image')){
            $data['image'] = date('Ymd-His').rand(000000000,999999999).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('hamropasal/blog/'),$data['image']);
        }
        Blog::firstOrCreate($data);
        return redirect()->route('blogs.index')->with('toast_success', 'Blog Created Successfully!');
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
        $blog  = Blog::findOrFail($id);
        return view('backend.blogs.edit',compact('blog'));
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
        $blog = Blog::findOrFail($id);
        $this->validate($request,[
            'title'=>'max:191',
            'slug'=>'max:191',
            'image'=>'image|max:2048',
            'description'=>'max:255',
        ]);
        $data = [
            'title'=>$request->title,
            'slug'=>Str::of($request->title)->slug('-'),
            'image'=>$blog->image,
            'description'=>$request->description,

        ];
        if($request->hasFile('image')){
            $data['image'] = date('Ymd-His').rand(000000000,999999999).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('hamropasal/blog/'),$data['image']);
            file::delete(public_path('hamropasal/blog/'.$blog->image));
        }
        $blog->update($data);
        return redirect()->route('blogs.index')->with('toast_success', 'Blog Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if(empty($blog)){return redirect()->route('blogs.index');}
        file::delete(public_path('hamropasal/blog/'.$blog->image));
        $blog->delete();
        return redirect()->route('blogs.index')->with('toast_error', 'Blog Deleted Successfully!');

    }
}

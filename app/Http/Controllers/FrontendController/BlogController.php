<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Blog;
use App\Model\BlogComment;
use Illuminate\Support\Str;
use Auth;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(8);
        return view('frontend.blog.index',compact('blogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $blogs = Blog::latest()->take(3)->get();
        return view('frontend.blog.show',compact('blog','blogs'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $blogs = Blog::search($query)->paginate(8);
        return view('frontend.blog.search',compact('blogs'));
    }


    public function blogComment(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'message'=>'max:255',

        ]);
        $data = [
            'user_id'=>Auth::user() ? Auth::user()->id : Null,
            'blog_id'=>$request->blog_id,
            'name'=>Auth::user() ? Auth::user()->name : $request->name,
            'email'=>Auth::user() ? Auth::user()->email : $request->email,
            'message'=>$request->message,
        ];

        BlogComment::firstOrCreate($data);
        return redirect()->back()->with('success', 'Commented Successfully!');
    }

    
}

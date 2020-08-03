<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Product;
use App\Model\Size;
use App\Model\Color;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        $sizes = Size::all()->pluck('name','id');
        $colors = Color::all()->pluck('color_name','id');
        if (request()->category) {
            
            $products = Product::with('categories')->whereHas('categories',function($query){
            $query->where('slug',request()->category);
            })->get();
            $subcat = Subcategory::with('categories')->whereHas('categories',function($query){
            $query->where('slug',request()->category);
            })->get();
            $categoryName = $categories->where('slug',request()->category)->first()->name;

        }
        elseif (request()->subcategory) {
            
            $products = Product::with('subcategories')->whereHas('subcategories',function($query){
            $query->where('slug',request()->subcategory);
            })->get();
            $subcat = Subcategory::with('categories')->whereHas('categories',function($query){
            $query->where('slug',request()->category);
            })->get();
            $categoryName = $subcategories->where('slug',request()->subcategory)->first()->name;
        } else{
        
        $products = Product::inRandomOrder()->get();
        $subcategoryName = "Featued Products";
        }
        if (request()->sort =="low_high") {
            $products = $products->sortBy('discount_price');
        } elseif (request()->sort =="high_low") {
            $products = $products->sortByDesc('discount_price');
        }
        elseif(request()->sort =="sort_by_default") {
            $products = $products->sortBy('discount_price');
        }
        $maxprice = DB::table('products')->max('discount_price');
        $minprice = DB::table('products')->min('discount_price');
        return view('frontend.product.index',compact('products','subcategories','subcategoryName','categories','subcat','categoryName','maxprice','minprice','sizes'));
    }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $reletedProducts = Product::where('category_id', '=', $product->categories->id)->where('slug', '!=', $slug)->inRandomOrder()->take(8)->get();
        $subcat = Subcategory::with('categories')->whereHas('categories',function($query){
            $query->where('slug',request()->category);
            })->get();
         session()->push('products.recently_viewed', $product->getKey());
        return view('frontend.product.show',compact('product','categories','subcategories','reletedProducts','subcat'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::search($query)->paginate(12);
        return view('frontend.search-result',compact('products'));
    }


}

<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Banner;
use App\Model\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\Blog;
use App\Model\OrderProduct;
use DB;
class WelcomeController extends Controller
{
    public function __invoke()
    {
    	$categories = Category::where('is_featured', 0)->get();
    	$featuredcategories = Category::where('is_featured', 1)->take(7)->latest()->get();
        $featurecategories = Category::where('is_featured', 0)->take(6)->latest()->get();
    	$sliders = Slider::orderBy('created_at', 'asc')->take(4)->get();
    	$banners = Banner::orderBy('created_at', 'asc')->where('status', 0)->take(3)->get();
    	$featuredProduct = Product::where('hotdeal', 0)->take('8')->get();
    	$hotdeals = Product::where('hotdeal' ,'1')->latest()->take('2')->get();
        $onsale = Product::where('onsale', 1)->take('4')->latest()->get();
        $special = Product::where('special', 1)->take('4')->latest()->get();
        $contacts = Contact::first();
        $blogs = Blog::latest()->take(8)->latest()->get();
        $items = DB::table('order_product')
            ->leftJoin('products', 'products.id', '=', 'order_product.product_id')
            ->orderBy('order_product.created_at', 'desc')
            ->get();
        $populars = $items->take(3)->unique('product_id');
        $unique = OrderProduct::where('created_at','>=',Carbon::now()->subdays(7))->get();
        $topselling = $unique->unique('product_id')->take(5);
    	return view('welcome',compact('categories','banners','sliders','featuredProduct','hotdeals','featuredcategories','featurecategories','contacts','blogs','onsale','special','topselling','populars'));
    }


    public function location()
    {
        $contacts = Contact::first();
        return view('frontend.location',compact('contacts'));
    }

   
}

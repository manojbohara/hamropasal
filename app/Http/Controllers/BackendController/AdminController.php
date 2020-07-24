<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Merchant;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\Product;
use App\Model\Blog;
use App\User;
use DB;
class AdminController extends Controller
{
    public function index()
    {
    	$orders = Order::distinct('email')->get();
        $merchants = Merchant::all();
        $amount = DB::table('orders')->where(DB::raw('MONTH(created_at)'), '=', date('n'))->sum('billing_total');
         $customers = User::where( DB::raw('MONTH(created_at)'), '=', date('n') )->get();
         $products = Product::where( DB::raw('MONTH(created_at)'), '=', date('n') )->get();
         $blogs = Blog::where( DB::raw('MONTH(created_at)'), '=', date('n') )->get();
        return view('backend.admin.home',compact('merchants','orders','amount','customers','products','blogs'));
    }
}

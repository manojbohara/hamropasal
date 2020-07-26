<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Model\Product;
use App\User;
use App\Model\WishList;
use Auth;
class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $wishlists = WishList::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
      return view('frontend.wishlist.index', compact('user', 'wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
         'product_id' =>'required',
        ));

        $status=Wishlist::where('user_id',Auth::user()->id)
        ->where('product_id',$request->product_id)
        ->first();

        if(isset($status->user_id) and isset($request->product_id))
           {
               return redirect()->back()->with('toast_success', 'This item is already in your
               wishlist!');
           }
           else
           {
               $wishlist = new WishList;

               $wishlist->user_id = Auth::user()->id;
               $wishlist->product_id = $request->product_id;
               $wishlist->save();

               return redirect()->back()->with('toast_success',
                             'Item, '. $wishlist->product->product_name.' Added to your wishlist.');
           }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $wishlist = WishList::findOrFail($id);
         $wishlist->delete();
         return redirect()->back()
                ->with('toast_error','Product  successfully deleted');
    }
}

<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Darryldecode\Cart\Cart;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Coupon;
use App\Model\Product;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $cartCollection = \Cart::getContent();
        $discount = session()->get('coupon')['discount'] ?? 0 ;
        $newTotal = (\Cart::getSubtotal() - $discount);
        return view('frontend.cart',compact('categories','subcategories','cartCollection','discount','newTotal'));
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
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'slug' => $request->slug
            ),
          'associatedModel' => 'App\Model\Product'
        ));
        return redirect()->back()->with('toast_success', 'Item is Added to Cart!');
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
    public function update(Request $request)
    {
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('toast_success', 'Cart is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('toast_success', 'Cart is cleared!');
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->back()->with('toast_error', 'Item is removed!');
    }

    public function wishlist($id)
    {
        $item =Product::where('id',$id)->get();
        \Cart::add(array(
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => $item->quantity,
            'attributes' => array(
                'image' => $item->image,
                'slug' => $item->slug
            )
        ));
        return redirect()->back()->with('toast_success', 'Item was saved For Later!');

    }
}

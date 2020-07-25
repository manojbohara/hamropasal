<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Model\Coupon;
use Darryldecode\Cart\Cart;
class CouponController extends Controller
{
  
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $coupon = Coupon::where('code', $request->coupon_code)->first();
        if (!$coupon) {
            return redirect()->back()->with('toast_error','Invalid Coupon Code Please Try Later');
        }

        session()->put(
        'coupon',[
            'name'=>$coupon->code,
            'discount' =>$coupon->discount(\Cart::getSubTotal()),
            ]);
         return redirect()->route('cart.index')->with('toast_success','Coupon has been applied !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->route('cart.index')->with('toast_success','Coupon removed !'); 
    }
}

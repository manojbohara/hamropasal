<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Model\Coupon;
use Darryldecode\Cart\Cart;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();

        return view('backend.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
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
            'code'=>'required|max:191',
            'type'=>'max:191',
            'value'=>'max:191',
            'percent_off'=>'max:191',

        ]);
        $data = [
            'code'=>$request->code,
            'type'=>$request->type,
            'value'=>$request->value,
            'percent_off'=>$request->percent_off,
        ];
        Coupon::firstOrCreate($data);
        return redirect()->route('coupons.index')->with('toast_success', 'Coupon Created Successfully!');
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
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit',compact('coupon'));
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
        $coupon = Coupon::findOrFail($id);
        $this->validate($request,[
            'code'=>'required|max:191',
            'type'=>'max:191',
            'value'=>'max:191',
            'percent_off'=>'max:191',

        ]);
        $data = [
            'code'=>$request->code,
            'type'=>$request->type,
            'value'=>$request->value,
            'percent_off'=>$request->percent_off,
        ];
        $coupon->update($data);
        return redirect()->route('coupons.index')->with('toast_success', 'Coupon Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupons.index')->with('toast_error', 'Coupon Deleted Successfully!');   
     }
}

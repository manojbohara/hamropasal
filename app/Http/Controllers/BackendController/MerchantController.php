<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Merchant;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class MerchantController extends Controller
{

    public function dashboard()
    {
        if (Auth::guard('merchant')->user()->is_active ==1 ) {
        
        return view('backend.merchant.home');
        } else{
            return view('backend.merchant.default');
        }
    }
    //index
    public function index()
    {
        return view('backend.merchant.home');
    }

    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);
        return view('backend.admin.merchant.edit',compact('merchant'));
    }

    public function update(Request $request, $id)
    {
        $merchant = Merchant::findOrFail($id);
        $this->validate($request,[
            'name'=>'max:191',
            'email'=>'max:191',
            'is_active'=>'max:191',

        ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'is_active'=>$request->is_active,

        ];
        $merchant->update($data);
        return redirect('admin/dashboard')->with('toast_success', 'Merchant Updated Successfully!');
    }

    public function show($id)
    {
        $merchant = Merchant::findOrFail($id);
        return $merchant;
    }

    public function destroy($id)
    {
        Merchant::findOrFail($id)->delete();
        return redirect()->back()
        ->with('toast_error', 'Merchant Deleted Successfully!');
    }

}

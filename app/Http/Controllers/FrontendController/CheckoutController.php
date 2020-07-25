<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Stripe;
use Session;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderProduct;
use App\User;
use App\Model\Khalti;
use App\Model\Esewa;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Auth;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $this->validate($request,[
            'name'=>'required|max:191',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'email'=>'required|email|max:191',
            'location'=>'required|max:255',
            'address'=>'required|max:255',

        ]);
        $product_id = Str::random(6).date('Y').Str::random(4).date('md').Str::random(4).date('His');
        $order = Order::firstOrCreate([
            'user_id' => Auth::user() ?Auth::user()->id : Null,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'location' => $request->location,
            'address' => $request->address,
            'product_id' =>$product_id,
            'billing_discount' =>$this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' =>$this->getNumbers()->get('subtotal'),
            'billing_total' =>$this->getNumbers()->get('total'),
        ]);

        foreach (\Cart::getContent() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->quantity,
            ]);
        }
        $this->decreaseQuantities();
        session()->forget('coupon');
        session()->put(
        'payment',[
            'amount'=>$order->billing_total,
            'totalAmount'=>$order->billing_total,
            'pid' =>$product_id
            ]);
        // \Cart::clear(); 
        return view('frontend.confirmation',compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function paymentStore(Request $request)
   {
       try {

        if($request->payment_type === 'esewa'){
            $data = [
                'amt'=>session()->get('payment')['amount'],
                'pdc'=> 0,
                'psc'=> 0,
                'txAmt'=> 0,
                'tAmt'=> session()->get('payment')['totalAmount'],
                'pid'=>session()->get('payment')['pid'],
            ];
            Esewa::create($data);
            session()->forget('payment');
            \Cart::clear(); 
            return view('frontend.esewa',compact('data'));
          } elseif ($request->payment_type === "khalti") {
            $data = [
            'user_id'   => $request->input('user_id'),
            'mobile'    => $request->input('mobile'),
            'amount'    => ($request->input('amount')/100.00),
            'pre_token' => $request->input('token')
           ];
            $khalti = Khalti::create($data);;

            $output = $this->verification($khalti);

            if ($output) 
            {
                return response()->json([
                    'success' => '  Your Account is succesfully credited'
                ],200);
            }

          }else {

             Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                Stripe\Charge::create ([
                        "amount" =>session()->get('payment')['totalAmount']/100,
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => "Order Payment" 
                ]);
        \Cart::clear();  
        return redirect()->back()->with('toast_success','Your payment was successfully Paided');

          }
           
       } catch (Exception $e) {
           
       }
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
        //
    }

    public function payment()
    {
        return view('frontend.payment');
    }

    public function delivery()
    {
        return view('frontend.delivery');
    }

    public function confirmation()
    {
        $cartCollection = \Cart::getContent();
        return route('checkout.confirmation',compact('cartCollection'));
    }

    protected function decreaseQuantities()
    {
        foreach (\Cart::getContent() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->quantity]);
        }
    }

    private function getNumbers()
    {
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newsubtotal = (\Cart::getTotal() - $discount);
        $code = !empty(session()->get('coupon')['name']) ?session()->get('coupon')['name'] : Null;
        $newtotal =$newsubtotal;

        return collect([
            'discount' => $discount,
            'subtotal' => $newsubtotal,
            'total' =>$newsubtotal,
            'code' =>$code,

        ]);
    }
}

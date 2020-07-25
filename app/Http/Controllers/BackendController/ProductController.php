<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Product;
use App\Model\Size;
use App\Model\Color;
use App\Model\ProductSize;
use App\Model\ProductColor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name','id');
        $subcategories = Subcategory::all()->pluck('name','id');
        $sizes = Size::all()->pluck('name','id');
        $colors = Color::all()->pluck('color_name','id');
        return view('backend.product.create',compact('categories','subcategories','sizes','colors'));
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
            'category_id'=>'required|max:191',
            'subcategory_id'=>'max:191',
            'product_name'=>'required|max:191',
            'slug'=>'max:191',
            'quantity'=>'required|max:191',
            'original_price'=>'required|max:191',
            'discount_price'=>'required|max:191',
            'image'=>'image|max:2048',
            'detail'=>'max:255',
            'description'=>'max:255',
            'hotdeal' =>'max:191',
            'special' =>'max:191',
            'onsale' =>'max:191',
            'expire_date'=>'max:191',
            'meta_title'=>'max:191',
            'meta_keyword'=>'max:191',
            'meta_description'=>'max:191',
            'status'=>'required|max:191',

        ]);
        $data = [
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'slug'=>Str::of($request->product_name)->slug('-'),
            'quantity'=>$request->quantity,
            'original_price'=>$request->original_price,
            'discount_price'=>$request->discount_price,
            'image'=>'',
            'detail'=>$request->detail,
            'description'=>$request->description,
            'hotdeal'=>$request->hotdeal,
            'special'=>$request->special,
            'onsale'=>$request->onsale,
            'expire_date'=>$request->expire_date,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'status'=>$request->status,
        ];
        $size_id = $request->size_id;
        $color_id = $request->color_id;
        if($request->hasFile('image')){
            $data['image'] = date('Ymd-His').rand(000000000,999999999).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('hamropasal/product/'),$data['image']);
        }
        $product = Product::firstOrCreate($data);
          if (!empty($request->size_id)) {
                foreach ($request->size_id as $key => $item) {
                    if ($item != "" && $request->size_id[$key] != "") {
                        $productsize = new ProductSize();
                        $productsize->size_id = $request->size_id[$key];
                        $productsize->product_id = $product->id;
                        $productsize->save();
                         
                    }
                }
            }
           if (!empty($request->color_id)) {
                foreach ($request->color_id as $key => $item) {
                    if ($item != "" && $request->color_id[$key] != "") {
                        $productcolor = new ProductColor();
                        $productcolor->color_id = $request->color_id[$key];
                        $productcolor->product_id = $product->id;
                        $productcolor->save();
                         
                    }
                }
            }    
        return redirect()->route('products.index')->with('toast_success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all()->pluck('name','id');
        $subcategories = Subcategory::all()->pluck('name','id');
        $sizes = Size::all()->pluck('name','id');
        $colors = Color::all()->pluck('color_name','id');
        return view('backend.product.edit',compact('categories','subcategories','product','sizes','colors'));
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
        $product = Product::findOrFail($id);
        $this->validate($request,[
            'category_id'=>'max:191',
            'subcategory_id'=>'max:191',
            'product_name'=>'max:191',
            'slug'=>'max:191',
            'quantity'=>'max:191',
            'original_price'=>'max:191',
            'discount_price'=>'max:191',
            'image'=>'image|max:2048',
            'detail'=>'max:255',
            'description'=>'max:255',
            'meta_title'=>'max:191',
            'meta_keyword'=>'max:191',
            'meta_description'=>'max:191',
            'status'=>'max:191',

        ]);
        $data = [
             'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'slug'=>Str::of($request->product_name)->slug('-'),
            'quantity'=>$request->quantity,
            'original_price'=>$request->original_price,
            'discount_price'=>$request->discount_price,
            'image'=>$product->image,
            'detail'=>$request->detail,
            'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'status'=>$request->status,
        ];
        if($request->hasFile('image')){
            $data['image'] = date('Ymd-His').rand(000000000,999999999).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('hamropasal/product/'),$data['image']);
            file::delete(public_path('hamropasal/product/'.$product->image));
        }
        $product->update($data);
        if (!empty($request->size_id)) {
                foreach ($request->size_id as $key => $item) {
                    if ($item != "" && $request->size_id[$key] != "") {
                        $productsize = new ProductSize();
                        $productsize->size_id = $request->size_id[$key];
                        $productsize->product_id = $product->id;
                        $productsize->save();
                         
                    }
                }
            }
           if (!empty($request->color_id)) {
                foreach ($request->color_id as $key => $item) {
                    if ($item != "" && $request->color_id[$key] != "") {
                        $productcolor = new ProductColor();
                        $productcolor->color_id = $request->color_id[$key];
                        $productcolor->product_id = $product->id;
                        $productcolor->save();
                         
                    }
                }
            } 
        return redirect()->route('products.index')->with('toast_success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(empty($product)){return redirect()->route('products.index');}
        file::delete(public_path('hamropasal/product/'.$product->image));
        $product->delete();
        return redirect()->route('products.index')->with('toast_error', 'Product Deleted Successfully!');
    }

   public function productsizestore(Request $request)
    {
        $size_id = $request->size_id;
        $product_id = $this->store()->get($product->id);
        
        $data = [];
        foreach($size_id as $size_id) {
            $data[] = [
                'size_id' => $size_id,
                'product_id' => $product_id
            ];
        }
        ProductSize::insert($data);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class Product_Controller extends Controller
{
    //
    public function readProducts()
    {
    // Fetch table contents, then
    // pass to the web page
    $salon = Product::all();
    // In the with statement below, the array name 
    // 'products' is being passed to the web page (view),
    // where we shall use it in the foreach loop there.
    return view ("product/read")
    ->with(['products' => $salon]);}
    public function create() {
        
        return view ("product.create");
    }
    public function store(Request $request) {
        $product = new Product; 
        $product->product_name = $request->get('product_name');
        $product->weight = $request->get('weight');
        $product->price = $request->get('price');
        $product->save();
        return redirect('product/create')->with('status', 'Product ' . $product->product_name . ' added successfully!');
   }
   public function destroy(Request $request, $id)
   {
       $product = Product::where('id',$id);
       $product->delete();
       return redirect('product/read');
   }
   public function edit(Request $request, $id) { 
    $products = Product::where('id',$id)->first();// Load products using the model 'Product' 
    // Pass the $products to the view, 'product/update'
    // so that user can update.
    return view('product/update')
    ->with(['product' => $products]);
    }
    public function update(Request $request, $id) {
        $product = Product::where('id',$id)->first();
        $product->product_name = $request->input('P_N');
        $product->weight = $request->input('weight');
        $product->price = $request->input('Pr');
        $product->save(); 
        return redirect('product/read')
        ->with('status', 'Product updated Successfully!');
    }  
}

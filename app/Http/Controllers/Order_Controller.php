<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Clients;
use App\Models\includes; 

class Order_Controller extends Controller
{
    
    public function order(){
        $o=null;
        return view("order.read")->with(['orders'=>$o]);
    }
    public function read(Request $request)
    {
        $customer = Clients::where('email', $request->email)->first();

        if (!$customer) {
            return redirect('order/read')->with('status', 'Wrong email or Email does not exist');
        }
        $p=includes::all();  
    // Fetch table contents, then
    // pass to the web page
        $salon = Order::where('client_id',$customer->id)->get();
    // In the with statement below, the array name 
    // 'orders' is being passed to the web page (view),
    // where we shall use it in the foreach loop there.

    return view ("order/read")
    ->with(['orders' => $salon,'per'=>$p,'client'=>$customer->id]);}
    public function create() 
    {
        
        $pro = Product::all();
        return view ("order.create")->with(['pro' => $pro]);
   
    }
    public function store(Request $request) 
    {
        $customer = Clients::where('email', $request->email)->first();

        if (!$customer) {
            return redirect('order/create')->with('status', 'Wrong email or Email does not exist');
        }
        $order = new Order; 
        
        $order->client_id=$customer->id;
        $order->purchase_date = $request->get('P_date');
        $order->payment_method = $request->get('P_method');
        $order->save();

        $product = $request->get('prod');
        foreach ($product as $pro) {
            $data = new includes();
            $data->order_id = $order->id;
            $data->product_id = $pro;
            $data->save();
        }

        return redirect('order/create')->with('status',  'order detail added successfully!');
    }
   public function destroy(Request $request, $id)
   {
       $order = Order::where('id',$id);
       $order->delete();
       $products=includes::where('order_id',$id);
       $products->delete();
       return redirect('order/read');

   }
   public function edit(Request $request, $id) { 
    $orders = Order::where('id',$id)->first();
    $pro = Product::all();
    // Load orders using the model 'Order'
    // Pass the $orders to the view, 'order/update'
    // so that user can update.
    return view('order/update')
    ->with(['order' => $orders, 'pro'=>$pro]);
    }
    public function update(Request $request, $id) {
        
        $data = includes::where('order_id', $id);
        $data->delete();

        $order = Order::where('id', $id)->first();
        $order->purchase_date  = $request->input('P_date');
        $order->payment_method  = $request->input('P_method');

        $productIds = $request->get('products');

        // Associate selected products with the order
        foreach ($productIds as $productId) {
            $data = new includes();
            $data->order_id = $order->id;
            $data->product_id = $productId;
            $data->save();
        }

        $order->save();
        return redirect('order/read')
        ->with('status', 'updated Successfully! ',$order->purchase_date,' updated Successfully!');
    }
}

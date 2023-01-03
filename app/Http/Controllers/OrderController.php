<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Log;
use DB;
use Carbon;

class OrderController extends Controller
{
    public function postCheckout(Request $request){

         $products = json_decode($request->getContent(),true);
         Log::info(print_r($products, true));
           try {
               DB::beginTransaction();

               $order = new Order();
               $order->date_placed = now();
               $customer =  Customer::find(1);
               $order->customer_id = $customer->id;
             $customer->orders()->save($order);

             foreach($products as $product) {
                $id = $product['id'];
                $order->products()->attach($order->orderinfo_id,['quantity'=> $product['quantity'],'product_id'=>$id]);
                $stock = Stock::find($id);
                $stock->quantity = $stock->quantity - $product['quantity'];
                $stock->save();
             }
             
           }
           catch (\Exception $e) {
               DB::rollback();
               return response()->json(array('status' => 'Order failed','code'=>409,'error'=>$e->getMessage()));
               }
       
           DB::commit();
           return response()->json(array('status' => 'Order Success','code'=>200,'order id'=>$order->orderinfo_id));
       
           }//end postcheckout

}

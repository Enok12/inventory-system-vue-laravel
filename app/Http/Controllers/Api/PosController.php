<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
    public function GetProduct($id){
        $product = DB::table('products')
        ->where('category_id',$id)
        ->get();

        return response()->json($product);
    }

    public function orderdone(Request $request){
        $validateddata = $request->validate([
            'customer_id' => 'required',
            'payby' => 'required',
        ]);

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['qty'] = $request->qty;
        $data['subtotal'] = $request->subtotal;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        $data['payby'] = $request->payby;
        $data['order_date'] = date('d/m/y');
        $data['order_month'] = date('F');
        $data['order_year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        $contents = DB::table('pos')->get();

        $orderdata = array();

        foreach ($contents as $content) {
            $orderdata['order_id'] = $order_id; 
            $orderdata['product_id'] = $contents->pro_id; 
            $orderdata['pro_quantity'] = $contents->pro_quantity; 
            $orderdata['product_price'] = $contents->product_price; 
            $orderdata['subtotal'] = $contents->subtotal;
            DB::table('order_details')->insert($orderdata); 
        }
    }

    
        
}

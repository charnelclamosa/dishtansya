<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Get data
    public function index(Request $request) {
        return Product::all();
    }

    // Place an order
    public function order(Request $request) {
        $order = Product::where('id', $request->product_id)->first();
        if($request->quantity < $order->available_stock) {
            // Deduct order quantity to available stock
            $stock = $order->available_stock - $request->quantity;
            // Query
            Product::where('id', $order->id)->update([
                'available_stock' => $stock,
            ]);
            return response()->json(['message' => 'You have successfully ordered this product'])->setStatusCode(201);
        } else {
            // Insufficient stock
            return response()->json(['message' => 'Failed to order this product due to unavailability of the stock'])->setStatusCode(400);
        }
        
    }
}

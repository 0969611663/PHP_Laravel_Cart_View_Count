<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart (Request $request, $id)
    {
        $request->session()->push('cart', $id);
        return redirect()->route('product_index');
    }

    public function cart (Request $request)
    {
        $productId = $request->session()->get('cart');

        $products = [];
        foreach ($productId as $item) {
            $products[] = Product::where('id', $item)->get();
        }
        return view('cart', compact(['products', 'productId']));
    }
}

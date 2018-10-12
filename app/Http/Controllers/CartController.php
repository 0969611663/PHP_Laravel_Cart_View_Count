<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart (Request $request, $id)
    {
        $product = Product::find($id);

        $cart = $request->session()->get('cart');
        $cart[$product->id] = ["id" => $product->id, "name" => $product->name, "image" => $product->image, "price" => $product->price, "quantity" => 1,];
        $request->session()->put('cart', $cart);


        return redirect()->route('product_index');
    }

    public function cart ()
    {
        return view('cart');
    }

    /** XOA PRODUCT THEO ID
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct (Request $request, $id)
    {
        $request->session()->get('cart');

        $request->session()->forget("cart.$id");

        return redirect()->route('cart');
    }
}

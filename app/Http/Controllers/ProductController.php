<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::all();
        return view('products.index', compact('products'));
    }

    public function buy($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('products.buy', compact('product'));
    }

    public function charge(Request $request, $id)
        {
            $product = \App\Models\Product::findOrFail($id);
            $amount = $product->price * 100; // Stripe processes amounts in cents
            $secret = config('services.stripe.secret_key');

        try {
            $charge = \Stripe\Stripe::setApiKey($secret);
            Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => "Payment for {$product->name}",
            ]);
            return redirect()->route('products.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
        }


}

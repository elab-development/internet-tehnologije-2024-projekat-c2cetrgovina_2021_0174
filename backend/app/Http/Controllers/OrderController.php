<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class OrderController extends Controller
{
    public function purchase(Request $request, $product_id)
{
    $user = auth()->user();

    //da li proizvod postoji
    $product = Product::findOrFail($product_id);

    //veza između korisnika i kupljenog proizvoda
    $user->purchases()->attach($product_id, ['purchased_at' => now()]);

    return response()->json(['message' => 'Uspešno kupljeno.']);
}

}

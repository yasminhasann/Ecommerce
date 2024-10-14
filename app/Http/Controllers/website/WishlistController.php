<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    public function addToWishlist($productId)
    {
        $userId = auth()->id(); //

        $exists = Wishlist::where('user_id', $userId)
                          ->where('product_id', $productId)
                          ->exists();

        if (!$exists) {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            return response()->json(['message' => 'Product added to wishlist'], 200);
        }

        return response()->json(['message' => 'Product is already in wishlist'], 400);
    }

    public function removeFromWishlist($productId)
    {
        $userId = auth()->id();

        Wishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->delete();

        return response()->json(['message' => 'Product removed from wishlist'], 200);
    }

    public function showWishlist()
    {
        $userId = auth()->id();
        $wishlist = Wishlist::where('user_id', $userId)->with('product')->get();

        return view('wishlist.index', compact('wishlist'));
    }

    public function showProduct($id) {
        $product = Product::findOrFail($id);
        return view('website.shop-single', compact('product'));
    }
}

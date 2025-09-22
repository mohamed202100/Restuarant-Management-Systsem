<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('home', compact('foods'));
    }

    public function addToCart(Request $request)
    {
        $food = Food::findOrFail($request->food_id);

        $cart = new FoodCart();

        $cart->userID = Auth::id();
        $cart->food_id = $food->id;
        $cart->food_name = $food->food_name;
        $cart->food_details = $food->food_details;
        $cart->food_image = $food->food_image;
        $cart->food_quantity = $request->food_quantity;

        $price = $cart->food_quantity * $food->food_price;

        $cart->food_price = $price;
        $cart->save();
        if ($cart->save()) {
            return redirect()->back()->with('cart_message', 'food added to the cart');
        }
    }

    public function foodCart()
    {
        $current_auth = Auth::id();
        $cart_food_info = FoodCart::where('userID', '=', $current_auth)->get();
        return view('showCart', compact('cart_food_info'));
    }

    public function removeCart($id)
    {
        $remove_food = FoodCart::findOrFail($id);
        $remove_food->delete();
        return redirect()->back()->with('danger', 'Removed Successfully');
    }

    public function goFile()
    {
        return view('admin.adminFile');
    }

    public function home()
    {
        if (Auth::id() && Auth::user()->user_type == 'admin') {
            return view('admin.dashboard');
        } elseif (Auth::id() && Auth::user()->user_type == 'user') {
            return view('dashboard');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BookTable;
use App\Models\Food;
use App\Models\FoodCart;
use App\Models\Order;
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
        $current_user = Auth::id();
        $cart_food_info = FoodCart::where('userID', '=', $current_user)->get();
        return view('showCart', compact('cart_food_info'));
    }

    public function removeCart($id)
    {
        $remove_food = FoodCart::findOrFail($id);
        $remove_food->delete();
        return redirect()->back()->with('danger', 'Removed Successfully');
    }

    public function ConfirmOrder(Request $request)
    {
        $current_user = Auth::id();

        $cart_food = FoodCart::where('userID', '=', $current_user)->get();

        foreach ($cart_food as $cart_food) {
            $single_order = new Order();
            $single_order->customer_name = Auth::user()->name;
            $single_order->customer_email = Auth::user()->email;
            $single_order->customer_address = Auth::user()->address;
            $single_order->customer_phone = Auth::user()->phone;
            $single_order->food_name = $cart_food->food_name;
            $single_order->food_image = $cart_food->food_image;
            $single_order->food_quantity = $cart_food->food_quantity;
            $single_order->food_price = $cart_food->food_price;
            $single_order->save();
        }
        return redirect()->back()->with('success', 'Order Added Successfully');
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

    public function findATable(Request $request)
    {
        $book = new BookTable();
        $book->email = $request->email;
        $book->number_of_guest = $request->number_of_guest;
        $book->time = $request->time;
        $book->date = $request->date;
        $book->save();
        return redirect()->back()->with('booktable', 'Book Table Request Sent');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addFood()
    {
        return view('admin.addFood');
    }

    public function createFood(Request $request)
    {
        $food = new Food();

        $food->food_name = $request->food_name;

        $food->food_details = $request->food_details;

        $food->food_price = $request->food_price;

        $image = $request->food_image;

        if ($image = $request->food_image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $food->food_image = $imagename;
        }

        $food->save();

        if ($image = $request->food_image && $food->save()) {
            $request->food_image->move('food_img', $imagename);
        }

        return redirect()->back()->with('success', 'Added Successfully!');
    }

    public function showFood()
    {
        $foods = Food::all();

        return view('admin.showFood', compact('foods'));
    }

    public function deleteFood($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully!');
    }

    public function updateFood($id)
    {
        $food = Food::findOrFail($id);
        return view('admin.updateFood', compact('food'));
    }

    public function postUpdateFood(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        $food->food_name = $request->food_name;

        $food->food_details = $request->food_details;

        $food->food_price = $request->food_price;

        $image = $request->food_image;

        if ($image = $request->food_image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $food->food_image = $imagename;
        }

        $food->save();

        if ($image = $request->food_image && $food->save()) {
            $request->food_image->move('food_img', $imagename);
        }

        return redirect()->back()->with('update', 'Updated Successfully!');
    }

    public function viewOrders()
    {
        $orders = Order::all();
        return view('admin.viewOrders', compact('orders'));
    }

    public function foodStatusDelivered($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = "Delivered";
        $order->save();
        return redirect()->back();
    }

    public function foodStatusCancel($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = "Cancel";
        $order->save();
        return redirect()->back();
    }
}

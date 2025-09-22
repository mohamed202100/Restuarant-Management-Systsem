@extends('main')

@section('show-cart')
    <table style="border-collapse:collapse; width:100%; font-family: Arial, sans-serif; margin: 10px 0">
        @if (session('danger'))
            <div style="background-color: rgb(240,16,0); color:white; text-align:center;">
                {{ session('danger') }}
            </div>
        @endif

        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="border:1px solid #ddd; padding:12px; ">Food Name</th>
                <th style="border:1px solid #ddd; padding:12px; ">Food Description</th>
                <th style="border:1px solid #ddd; padding:12px; ">Food Image</th>
                <th style="border:1px solid #ddd; padding:12px; ">Food Quantity</th>
                <th style="border:1px solid #ddd; padding:12px; ">Food Price</th>
                <th style="border:1px solid #ddd; padding:12px; " colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_price = 0;
            @endphp
            @foreach ($cart_food_info as $user_cart)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="border:1px solid #ddd; padding:8px; ">{{ $user_cart->food_name }}</td>
                    <td style="border:1px solid #ddd; padding:8px; ">{{ $user_cart->food_details }}</td>
                    <td style="border:1px solid #ddd; padding:8px; "><img
                            src="{{ asset('food_img/' . $user_cart->food_image) }}" style="width:150px; height:100px"></td>
                    <td style="border:1px solid #ddd; padding:8px; ">{{ $user_cart->food_quantity }}</td>
                    <td style="border:1px solid #ddd; padding:8px; ">${{ $user_cart->food_price }}</td>
                    <td style="border:1px solid #ddd; padding:8px;">
                        <a href="{{ route('delete.cart', $user_cart->id) }}" onclick="return confirm('Are You sure?')"
                            style="color:#f44336; text-decoration:none; padding: 4px 8px; border-radius: 4px;
                        background-color:#ffebee">Remove</a>
                    </td>
                </tr>
                @php
                    $total_price += $user_cart->food_price;
                @endphp
            @endforeach
        </tbody>
    </table>
    <h1>Total Price is : ${{ $total_price }}</h1>
@endsection

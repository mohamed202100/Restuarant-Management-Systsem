<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Dashboard') }}
        </h2>
    </x-slot>
    @section('my-order')
        <table style="border-collapse:collapse; width:100%; font-family: Arial, sans-serif; margin: 10px 0">

            <thead>
                <tr style="background-color: #f2f2f2">
                    <th style="border:1px solid #ddd; padding:12px; ">Your Name</th>
                    <th style="border:1px solid #ddd; padding:12px; ">Your Email</th>
                    <th style="border:1px solid #ddd; padding:12px; ">Food Image</th>
                    <th style="border:1px solid #ddd; padding:12px; ">Food Quantity</th>
                    <th style="border:1px solid #ddd; padding:12px; ">Food Price</th>
                    <th style="border:1px solid #ddd; padding:12px; ">Order Current Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($my_order as $my_order)
                    <tr style="border-bottom: 1px solid #ddd">
                        <td style="border:1px solid #ddd; padding:8px; ">{{ $my_order->customer_name }}</td>
                        <td style="border:1px solid #ddd; padding:8px; ">{{ $my_order->customer_email }}</td>
                        <td style="border:1px solid #ddd; padding:8px; ">
                            <img src="{{ asset('food_img/' . $my_order->food_image) }}" style="width:150px; height:100px">
                        </td>
                        <td style="border:1px solid #ddd; padding:8px; ">{{ $my_order->food_quantity }}</td>
                        <td style="border:1px solid #ddd; padding:8px; ">${{ $my_order->food_price }}</td>
                        <td style="border:1px solid #ddd; padding:8px; ">{{ $my_order->order_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
</x-app-layout>

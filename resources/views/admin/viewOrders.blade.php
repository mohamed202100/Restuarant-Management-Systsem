@extends('admin.mainDesign')

@section('show-orders')
    <table style="border-collapse:collapse; width:100%; font-family: Arial, sans-serif; margin: 10px 0">
        @if (session('danger'))
            <div style="background-color: red; color:white; text-align:center;">
                {{ session('danger') }}
            </div>
        @endif

        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Customer Name</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Customer Email</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Customer Address</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Customer Phone </th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Name</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Description</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Image</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Price</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Order Status</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $order->customer_name }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $order->customer_email }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $order->customer_address }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $order->customer_phone }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:center;"><img
                            src="{{ asset('food_img/' . $order->food_image) }}" style="width:150px; height:100px"></td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $order->food_name }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $order->food_quantity }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $order->food_price }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $order->order_status }}</td>
                    <td style="border:1px solid #ddd; padding:8px;">
                        <a href="{{ route('admin.delivered', $order->id) }}"
                            style="color:#2196F3; text-decoration:none; padding: 4px 8px; border-radius: 4px;
                        background-color:#e7f3ff">Delivered</a>
                        <a href="{{ route('admin.cancel', $order->id) }}"
                            style="color:#f44336; text-decoration:none; padding: 4px 8px; border-radius: 4px;
                        background-color:#ffebee">Cancel</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

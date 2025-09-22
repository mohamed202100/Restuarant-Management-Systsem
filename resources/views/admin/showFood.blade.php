@extends('admin.mainDesign')

@section('show-food')
    <table style="border-collapse:collapse; width:100%; font-family: Arial, sans-serif; margin: 10px 0">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Name</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Description</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Image</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
                <tr style="border-bottom: 1px solid #ddd">
                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $food->food_name }}</th>
                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $food->food_details }}</th>
                    <th style="border:1px solid #ddd; padding:8px; text-align:center;"><img
                            src="{{ asset('food_img/' . $food->food_image) }}" style="width:150px; height:100px"></th>
                    <th style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $food->food_price }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('admin.mainDesign')

@section('show-food')
    <table style="border-collapse:collapse; width:100%; font-family: Arial, sans-serif; margin: 10px 0">
        @if (session('danger'))
            <div class="background-color: rgb(240,16,0); color:white; text-align:center;">
                {{ session('danger') }}
            </div>
        @endif

        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Name</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Description</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Image</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Food Price</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $food->food_name }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $food->food_details }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:center;"><img
                            src="{{ asset('food_img/' . $food->food_image) }}" style="width:150px; height:100px"></td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $food->food_price }}</td>
                    <td style="border:1px solid #ddd; padding:8px;">
                        <a href="{{ route('admin.updatefood', $food->id) }}"
                            style="color:#2196F3; text-decoration:none; padding: 4px 8px; border-radius: 4px;
                        background-color:#e7f3ff">Update</a>
                        <a href="{{ route('admin.deletefood', $food->id) }}" onclick="return confirm('Are You sure?')"
                            style="color:#f44336; text-decoration:none; padding: 4px 8px; border-radius: 4px;
                        background-color:#ffebee">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('admin.mainDesign')
<base href="/public">
@section('update-food')
    <!--Form Header-->
    <div class="bg-blue-600 px-6 py-4" style="text-align: center;">
        <h2 class="text-xl font-semibold text-white">Update Food Item</h2>
    </div>
    <!--Form Content-->
    <div class="p-2">
        @if (session('update'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('update') }}
            </div>
        @endif
        <form action="{{ route('admin.postupdatefood', $food->id) }}" method="POST" enctype="multipart/form-data"
            style="display:flex; flex-direction:column; margin:auto;
        gap:10px; height:100vh; width:400px;">
            @csrf
            <input type="text" name="food_name" id="title" value="{{ $food->food_name }}"
                style="padding:8px; border:1px solid #ccc;
            border-radius:4px"><br>
            <textarea name="food_details" id="description"
                style="padding:8px; border:1px solid #ccc; border-radius:4px;
                min-height:200px;">{{ $food->food_details }}</textarea><br>
            <input type="number" name="food_price" id="price" value="{{ $food->food_price }}" min="0"
                step="1" style="padding:8px; border:1px solid #ccc;
            border-radius:4px">

            <div>
                <h3>Old Image</h3>
                <img style="width:100px;height:100px" src="{{ asset('food_img/' . $food->food_image) }}">
            </div>

            <label style="background-color: greenyellow;" for="updateimage">Update Image</label>
            <input type="file" name="food_image" id="updateimage" accept="image/*" style="padding: 8px">
            <button type="submit"
                style="padding:8px 16px; background:#4CAF50;
            color:white; border:none; border-radius:4px; cursor:pointer">
                Update Food</button>

        </form>
    </div>
@endsection

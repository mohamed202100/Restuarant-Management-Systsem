@extends('admin.mainDesign')

@section('add-food')
    <!--Form Header-->
    <div class="bg-blue-600 px-6 py-4" style="text-align: center;">
        <h2 class="text-xl font-semibold text-white">Add New Food Item</h2>
    </div>
    <!--Form Content-->
    <div class="p-2">
        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('admin.createfood') }}" method="POST" enctype="multipart/form-data"
            style="display:flex; flex-direction:column; margin:auto;
        gap:10px; height:100vh; width:400px;">
            @csrf
            <input type="text" name="food_name" id="title" placeholder="Food Title" required
                style="padding:8px; border:1px solid #ccc;
            border-radius:4px"><br><br>
            <textarea name="food_details" id="description" placeholder="Description" required
                style="padding:8px; border:1px solid #ccc; border-radius:4px;
                min-height:200px;"></textarea><br><br>
            <input type="number" name="food_price" id="price" placeholder="Price" required min="0"
                step="1" style="padding:8px; border:1px solid #ccc;
            border-radius:4px"><br><br>
            <input type="file" name="food_image" id="image" accept="image/*" required style="padding: 8px">
            <button type="submit"
                style="padding:8px 16px; background:#4CAF50;
            color:white; border:none; border-radius:4px; cursor:pointer">Add
                Food</button>

        </form>
    </div>
@endsection

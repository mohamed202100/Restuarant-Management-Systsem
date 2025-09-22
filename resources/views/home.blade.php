@extends('main')

@section('home')
    @if (session('cart_message'))
        <div style="background-color: lightgreen;color:black !important">
            {{ session('cart_message') }}
        </div>
    @endif
    <div class="row">
        @foreach ($foods as $food)
            <div class="col-md-4">
                <div class="card bg-transparent border my-3 my-md-0">
                    <img src="{{ asset('food_img/' . $food->food_image) }}" alt="{{ $food->food_image }}"
                        class="rounded-0 card-img-top mg-responsive">
                    <div class="card-body">
                        <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">{{ $food->food_price }}</a>
                        </h1>
                        <h4 class="pt20 pb20">{{ $food->food_name }}</h4>
                        <p class="text-white">{{ $food->food_details }}</p>
                    </div>
                    <form action="{{ route('addtocart') }}" method="post">
                        @csrf
                        <input type="hidden" name="food_id" value="{{ $food->id }}">
                        <div class="form-group">
                            <label for="quantity" class="text-white">Quantity:</label>
                            <input type="number" class="form-control" value="1" min="1"
                                style="background-color:
                             rgba(255,255,255,0.1); color:white;"
                                name="food_quantity" id="quantity">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-shopping-cart"></i>
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

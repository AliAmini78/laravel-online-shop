@extends('Common::layouts.home.index')

@section('content')
    <div class="mt-3">
        <h2>
           سبد خرید
        </h2>
        <hr>
        <div class="row">
            @empty($cart)
                <div class="d-flex justify-content-center align-items-center fw-bolder">
                    سبد خرید شما خالی میباشد
                </div>
            @endempty
            @foreach($cart as $key => $product)
                <div class=" col-3 my-3">
                    <div class="card">
                        <div class="card-body d-flex flex-wrap align-items-center justify-content-center flex-column">
                            <h5 class="card-title">{{$product['title']}}</h5>
                            <ul>
                                <li>
                                    قیمت :
                                    {{$product['price']}}
                                    تومان
                                </li>
                            </ul>
                            <form action="{{route('cart.remove' , ['product' => $key])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger ">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@extends('Common::layouts.home.index')

@section('content')
    <div class="mt-3">
        <h2>
            لیست محصولات
        </h2>
    <hr>
        <div class="row">
            @empty($cart)
                <div class="d-flex justify-content-center align-items-center fw-bolder">
                    لست محصولات خالی می باشد
                </div>
            @endempty
            @foreach($products as $product)
            <div class=" col-3 my-3">
                <div class="card">
                    <div class="card-body d-flex flex-wrap align-items-center justify-content-center flex-column">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <ul>
                            <li>
                                قیمت :
                                {{$product->price}}
                                تومان
                            </li>
                            <li>
                                تعداد :
                                {{$product->count}}
                                عدد
                            </li>
                        </ul>
                        <form action="{{route('cart.add' , ['product' => $product])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary ">اضافه به سبد خرید</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>

@endsection

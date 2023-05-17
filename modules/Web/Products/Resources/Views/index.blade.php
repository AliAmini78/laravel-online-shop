@extends('Common::layouts.panel.index')

@section('content')
    <div class="mt-5 flex flex-wrap ">
        <div class=" px-4 py-2 d-flex justify-content-between align-items-center">
                <span class=" fw-bold">
                      لیست محصولات
                </span>
            <a href="{{route('product.create')}}" class="btn btn-primary">
                ساخت محصول جدید
            </a>
        </div>
        <hr>
        @if(!empty($products) && $products->count())
            <div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ایدی</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">قیمت</th>
                        <th scope="col">تعداد</th>
                        <th scope="col">تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->title}}</td>
                            <td>
                                {{$product->price}}
                                تومان
                            </td>
                            <td>
                                {{$product->count}}
                                عدد
                            </td>
                            <td class="d-flex">
                                <a href="{{route('product.edit' , ['product' => $product])}}" class="btn btn-warning">ویرایش</a>
                                <a href="{{route('product.show' , ['product' => $product])}}"
                                   class="btn btn-secondary mx-1">نمایش</a>
                                <div>
                                    <form method="POST" action="{{route('product.destroy' , ['product' => $product])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            {{ $products->links() }}
        @else
            <div class="d-flex align-items-center justify-content-center">
                <span class="fw-bold">
                    دیتایی وجود ندارد
                </span>
            </div>
        @endif
    </div>
@endsection

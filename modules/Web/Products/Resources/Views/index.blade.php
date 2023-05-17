@extends('Common::layouts.panel.index')

@section('content')
    <div class="mt-5 flex flex-wrap ">
        <div class=" px-4 py-2 d-flex justify-content-between align-items-center">
                <span class=" fw-bold">
                      لیست محصولات
                </span>
            <a href="#" class="btn btn-primary">
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
                            <td>
                                <a href="#" class="btn btn-warning">ویرایش</a>
                                <a href="#" class="btn btn-secondary mx-1">نمایش</a>
                                <a href="#" class="btn btn-danger">حذف</a>
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

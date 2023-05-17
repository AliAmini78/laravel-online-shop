@extends('Common::layouts.panel.index')

@section('content')
    <div class="mt-5">
        <div class="fw-bold">
            ساخت محصول جدید
        </div>
        <hr/>
        <div>
            <div class="mb-3">
                <label for="title" class="form-label">نام محصول</label>
                <input type="text" readonly class="form-control"
                       value="{{$product->title}}" id="title">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">قیمت</label>
                <input type="number" readonly class="form-control " value="{{$product->price}}" id="price">
            </div>
            <div class="mb-3">
                <label for="count" class="form-label">تعداد</label>
                <input type="number" readonly class="form-control "
                       value="{{$product->count}}" id="count">
            </div>
        </div>
    </div>
@endsection

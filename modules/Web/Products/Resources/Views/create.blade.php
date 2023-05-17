@extends('Common::layouts.panel.index')

@section('content')
    <div class="mt-5">
        <div class="fw-bold">
            ساخت محصول جدید
        </div>
        <hr/>
        <div>
            <form method="POST" action="{{route("product.store")}}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">نام محصول</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}" id="title" placeholder="عنوان را وارد کنید">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">قیمت</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" id="price">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="count" class="form-label">تعداد</label>
                    <input type="number" name="count" class="form-control @error('count') is-invalid @enderror" value="{{ old('count') }}" id="count">
                    @error('count')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3">ساخت</button>
                </div>
            </form>
        </div>
    </div>
@endsection

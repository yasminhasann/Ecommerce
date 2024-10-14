@extends('website.layout')
@section('title', 'Shop Single')
@section('content')
@include('website.components.breadcrumb', ['pageName' => 'Shop Single'])
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/cloth_1.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="text-black"> <h2 class="text-black">{{ $product->title }}</h2> <!-- استبدلي 'title' بحقل المنتج الصحيح -->
                {{ __('shop.tank_top_title') }}</h2>
                <p>{{ __('shop.product_description') }}</p>
                <p class="mb-4">{{ __('shop.product_details') }}</p>
                <p><strong class="text-primary h4">$50.00</strong></p>
                <!-- إضافة نموذج زر الإضافة إلى الـ Wishlist هنا -->
                <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Add to Wishlist</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="site-section block-3 site-blocks-2 bg-light">
    @include('website.components.feature-products')
</div>
@endsection

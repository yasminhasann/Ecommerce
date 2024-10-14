@extends('website.layout')
@section('title', 'Shop')
@section('content')
@include('website.components.breadcrumb', ['pageName' => 'shop'])

<div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">{{ __('shop.shop_all') }}</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('shop.latest') }}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="#">{{ __('shop.men') }}</a>
                    <a class="dropdown-item" href="#">{{ __('shop.women') }}</a>
                    <a class="dropdown-item" href="#">{{ __('shop.children') }}</a>
                  </div>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">{{ __('shop.reference') }}</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">{{ __('shop.relevance') }}</a>
                    <a class="dropdown-item" href="#">{{ __('shop.name_a_to_z') }}</a>
                    <a class="dropdown-item" href="#">{{ __('shop.name_z_to_a') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">{{ __('shop.price_low_to_high') }}</a>
                    <a class="dropdown-item" href="#">{{ __('shop.price_high_to_low') }}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            @foreach ($products as $product)
                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                        <figure class="block-4-image">
                            <a href="{{url("shops/$product->id")}}"><img src="{{asset('assets/images/cloth_1.jpg')}}" alt="{{ __('shop.image_placeholder') }}" class="img-fluid"></a>
                        </figure>
                        <div class="block-4-text p-4">
                            <h3><a href="{{url('shop-single')}}">{{ __('shop.tank_top') }}</a></h3>
                            <p class="mb-0">{{ __('shop.finding_perfect', ['item' => __('shop.t_shirt')]) }}</p>
                            <p class="text-primary font-weight-bold">{{ __('shop.price_format', ['price' => 50]) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.categories') }}</h3>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a href="#" class="d-flex"><span>{{ __('shop.men') }}</span> <span class="text-black ml-auto">(2,220)</span></a></li>
              <li class="mb-1"><a href="#" class="d-flex"><span>{{ __('shop.women') }}</span> <span class="text-black ml-auto">(2,550)</span></a></li>
              <li class="mb-1"><a href="#" class="d-flex"><span>{{ __('shop.children') }}</span> <span class="text-black ml-auto">(2,124)</span></a></li>
            </ul>
          </div>

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.filter_by_price') }}</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.size') }}</h3>
              <label for="s_sm" class="d-flex">
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">{{ __('shop.small') }} (2,319)</span>
              </label>
              <label for="s_md" class="d-flex">
                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">{{ __('shop.medium') }} (1,282)</span>
              </label>
              <label for="s_lg" class="d-flex">
                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">{{ __('shop.large') }} (1,392)</span>
              </label>
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.color') }}</h3>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">{{ __('shop.red') }} (2,429)</span>
              </a>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">{{ __('shop.green') }} (2,298)</span>
              </a>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">{{ __('shop.blue') }} (1,075)</span>
              </a>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">{{ __('shop.purple') }} (1,075)</span>
              </a>
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 site-section-heading pt-4">
                  <h2>{{ __('shop.categories') }}</h2>
                </div>
              </div>

                @include('website.components.categories')

          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

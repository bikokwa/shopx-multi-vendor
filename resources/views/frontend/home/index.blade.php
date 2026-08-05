@extends('frontend.layouts.app')

@section('contents')
    <!-- Start of hero slider -->
        @include('frontend.home.sections.hero-section')
        <!--End hero slider-->
        <!-- Start of category section -->
        @include('frontend.home.sections.category-section')
        <!--End category slider-->
        <!-- Start of banners -->
        @include('frontend.home.sections.banner-section')
        <!--End banners-->
        <!-- Start of product tabs -->
        @include('frontend.home.sections.products-tab-section')
        <!--Products Tabs-->
        <!-- Start of banners -->
        @include('frontend.home.sections.banner-section-two')
        <!--End 4 banners-->
        <!-- Start of Best Sales -->
        @include('frontend.home.sections.flash-sale-section')
        <!--End Best Sales-->
        <!-- Start of New Arrivals -->
        @include('frontend.home.sections.new-arrival-section')
        <!-- new arrival end -->
        <section class="wsus__ctg mt-40">
            <div class="container">
                <a href="#" class="wsus__ctg_area">
                    <img src="{{ asset('assets/frontend/dist/imgs/cta_bg.png') }}" alt="cta" class="img-fluid w-100" />
                </a>
            </div>
        </section>
        <!--CTA section end-->
        <!-- Start of Special Products -->
        @include('frontend.home.sections.special-products-section')
        <!-- special products end -->
        <!-- Start of Four columns section -->
        @include('frontend.home.sections.four-col-products-section')
        <!--End 4 columns-->
@endsection

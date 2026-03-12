@extends('frontend.homepage.layout')
@section('header-class', 'header-inner')
@section('content')
    <div id="scroll-progress"></div>

    <section class="antila-inner-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="antila-inner-header__content">
            <div class="uk-container uk-container-center">
                <h1 class="antila-inner-header__title" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    Tiện nghi
                </h1>
                <div class="inner-breadcrumb" data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                    <span class="separator">/</span>
                    <span class="current">Tiện nghi</span>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-section bg-white hp-section-padding hp-border-top">
        <div class="uk-container uk-container-center">

            @php
                $defaultFeatures = [
                    [
                        'name' => 'Vị Trí Trung Tâm',
                        'description' =>
                            'Tất cả những gì bạn cần đều ở ngay cạnh — vị trí trung tâm với đầy đủ tiện ích hạ tầng.',
                        'icon' => 'fa-map-marker',
                    ],
                    [
                        'name' => 'Thiết Kế Đạt Giải',
                        'description' =>
                            'Căn hộ được thiết kế bởi kiến trúc sư hàng đầu với sự chú ý đến từng chi tiết nhỏ nhất.',
                        'icon' => 'fa-trophy',
                    ],
                    [
                        'name' => 'Tầm Nhìn Tuyệt Đẹp',
                        'description' => 'Căn hộ sáng sủa và rộng rãi với tầm nhìn ấn tượng ra hướng sông thành phố.',
                        'icon' => 'fa-sun-o',
                    ],
                    [
                        'name' => 'Nhà Thông Minh',
                        'description' => 'Công nghệ nhà thông minh cho phép điều khiển mọi thiết bị từ xa dễ dàng.',
                        'icon' => 'fa-wifi',
                    ],
                    [
                        'name' => 'Năng Lượng Xanh',
                        'description' => 'Hệ thống pin năng lượng mặt trời giảm chi phí sinh hoạt hàng tháng hiệu quả.',
                        'icon' => 'fa-leaf',
                    ],
                    [
                        'name' => 'Hồ Bơi Riêng',
                        'description' => 'Hồ bơi riêng thiết kế phong cách resort, bao quanh bởi sân vườn xanh mát.',
                        'icon' => 'fa-tint',
                    ],
                    [
                        'name' => 'An Ninh 24/7',
                        'description' =>
                            'Hệ thống an ninh thông minh với camera HD và khóa vân tay hoạt động liên tục.',
                        'icon' => 'fa-shield',
                    ],
                    [
                        'name' => 'Sân Vườn Xanh',
                        'description' =>
                            'Sân vườn thoáng đãng với cây xanh phủ bóng, tạo không gian sống gần gũi thiên nhiên.',
                        'icon' => 'fa-tree',
                    ],
                ];
                $displayFeatures =
                    $facilities->count() > 0 ? $facilities : collect($defaultFeatures)->map(fn($f) => (object) $f);
            @endphp

            <div class="hp-amenity-grid" data-reveal-group>
                @foreach ($displayFeatures as $feature)
                    @php
                        $featureImage = !empty($feature->image)
                            ? $feature->image
                            : $property->image ?? asset('frontend/resources/img/homely/slider/1.webp');
                    @endphp
                    <div class="hp-amenity-item" data-reveal="up">
                        <img src="{{ $featureImage }}" alt="{{ $feature->name }}" class="hp-amenity-item__img"
                            loading="lazy">
                        <div class="hp-amenity-item__btn">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                        <div class="hp-amenity-item__overlay">
                            <span class="hp-amenity-item__title">{{ $feature->name }}</span>
                            <span class="hp-amenity-item__desc">{{ $feature->description ?? ($feature->desc ?? '') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

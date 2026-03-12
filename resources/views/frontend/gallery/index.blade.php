@extends('frontend.homepage.layout')
@section('header-class', 'header-inner')
@section('content')
    <div id="scroll-progress"></div>

    <section class="antila-inner-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="antila-inner-header__content">
            <div class="uk-container uk-container-center">
                <h1 class="antila-inner-header__title" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    Thư viện ảnh
                </h1>
                <div class="inner-breadcrumb" data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                    <span class="separator">/</span>
                    <span class="current">Thư viện ảnh</span>
                </div>
            </div>
        </div>
    </section>


    <section class="antila-gallery-page">
        <div class="uk-container uk-container-center">
            @php
                $allImages = collect();

                if (isset($galleryCatalogues) && $galleryCatalogues->count() > 0) {
                    foreach ($galleryCatalogues as $catalogue) {
                        $catName = $catalogue->languages->first()->pivot->name ?? 'Không tên';
                        if ($catalogue->galleries->count() > 0) {
                            foreach ($catalogue->galleries as $gallery) {
                                if (is_array($gallery->album)) {
                                    foreach ($gallery->album as $img) {
                                        $allImages->push(['url' => $img, 'name' => $catName]);
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if (isset($galleries) && $galleries->count() > 0) {
                        foreach ($galleries as $gallery) {
                            if (is_array($gallery->album)) {
                                foreach ($gallery->album as $img) {
                                    $allImages->push(['url' => $img, 'name' => 'Tất Cả']);
                                }
                            }
                        }
                    }
                }
            @endphp

            <div class="hp-gallery-grid" data-reveal-group>
                @if ($allImages->count() > 0)
                    @foreach ($allImages as $img)
                        <a href="{{ $img['url'] }}" class="hp-gallery-grid__item" data-fancybox="gallery"
                            data-caption="{{ $img['name'] }}" data-reveal="up">
                            <img src="{{ $img['url'] }}" alt="{{ $img['name'] }}" loading="lazy">
                            <div class="hp-gallery-grid__overlay">
                                <i class="fa fa-expand"></i>
                            </div>
                        </a>
                    @endforeach
                @else
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="hp-gallery-grid__item" data-fancybox="gallery" data-reveal="up">
                            <img src="{{ asset('frontend/resources/img/homely/gallery/' . ($i > 4 ? $i - 4 : $i) . '.webp') }}"
                                alt="Gallery {{ $i }}" loading="lazy">
                            <div class="hp-gallery-grid__overlay">
                                <i class="fa fa-expand"></i>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>

@endsection

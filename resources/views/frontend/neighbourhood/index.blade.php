@extends('frontend.homepage.layout')
@section('header-class', 'header-inner')
@section('content')
    <div id="scroll-progress"></div>

    <section class="antila-inner-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="antila-inner-header__content">
            <div class="uk-container uk-container-center">
                <h1 class="antila-inner-header__title" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    Xung quanh
                </h1>
                <div class="inner-breadcrumb" data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                    <span class="separator">/</span>
                    <span class="current">Xung quanh</span>
                </div>
            </div>
        </div>
    </section>

    <section class="antila-location hp-section-padding">
        <div class="uk-container uk-container-center">

            @php
                $locItems = collect();
                if ($locationHighlights->count() > 0) {
                    $locItems = $locationHighlights;
                } else {
                    $defaults = [
                        [
                            'name' => 'Siêu Thị Vinmart',
                            'distance_text' => '15 phút đi bộ',
                            'description' => 'Siêu thị tiện lợi với đa dạng sản phẩm chất lượng cao.',
                            'icon' => 'fa-shopping-cart',
                        ],
                        [
                            'name' => 'Phúc Long Coffee',
                            'distance_text' => '7 phút đi bộ',
                            'description' => 'Quán cà phê nổi tiếng with đồ uống thủ công và bánh ngọt.',
                            'icon' => 'fa-coffee',
                        ],
                        [
                            'name' => 'Trường QT Việt Úc',
                            'distance_text' => '7 phút đi bộ',
                            'description' => 'Trường quốc tế K-12 nổi tiếng with chất lượng giảng dạy.',
                            'icon' => 'fa-graduation-cap',
                        ],
                        [
                            'name' => 'AEON Mall',
                            'distance_text' => '6 phút lái xe',
                            'description' => 'Trung tâm thương mại lớn with đầy đủ dịch vụ giải trí.',
                            'icon' => 'fa-building',
                        ],
                        [
                            'name' => 'Bệnh Viện FV',
                            'distance_text' => '10 phút lái xe',
                            'description' => 'Bệnh viện quốc tế with đội ngũ bác sĩ giàu kinh nghiệm.',
                            'icon' => 'fa-hospital-o',
                        ],
                        [
                            'name' => 'Metro Line 1',
                            'distance_text' => '10 phút đi bộ',
                            'description' => 'Tuyến metro đầu tiên kết nối Quận 1 - Quận 9.',
                            'icon' => 'fa-train',
                        ],
                    ];
                    $locItems = collect($defaults)->map(fn($d) => (object) $d);
                }
                $hoverImg = !empty($property->image)
                    ? asset($property->image)
                    : asset('frontend/resources/img/homely/slider/1.webp');
            @endphp

            <div class="hp-nb-grid">
                @foreach ($locItems as $item)
                    <div class="hp-nb-item"
                        data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay: {{ $loop->index * 100 }}}">
                        <div class="hp-nb-item__hover-bg" style="background-image: url('{{ $hoverImg }}')"></div>

                        <div class="hp-nb-item__icon">
                            <i class="fa {{ $item->icon ?? 'fa-map-marker' }}"></i>
                        </div>

                        <div class="hp-nb-item__content">
                            <h3 class="hp-nb-item__title">{{ $item->name ?? '' }}</h3>
                            <p class="hp-nb-item__desc">{{ $item->description ?? ($item->distance_text ?? '') }}</p>
                        </div>

                        <div class="hp-nb-item__footer">
                            <div class="hp-nb-item__link-btn">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="hp-section uk-position-relative uk-margin-large-top uk-margin-large-bottom"
        style="height: 600px; border-radius: 20px; overflow: hidden; background-color: var(--clr-green-pale); margin-left: 15px; margin-right: 15px;">
        <div class="uk-cover-background uk-position-cover"
            style="background-image: url('{{ isset($property) && !empty($property->image) ? $property->image : asset('frontend/resources/img/homely/slider/1.webp') }}'); opacity: 0.9;">
        </div>
        <div class="uk-position-relative uk-flex uk-flex-middle uk-flex-center uk-height-1-1 uk-text-center"
            data-uk-scrollspy="{cls:'uk-animation-scale-up', delay:300}">
            <div class="uk-container uk-container-center hp-z-10">
                <div class="hp-btn-play-wrap">
                    <a href="{{ $property->video_tour_url ?? 'https://www.youtube.com/watch?v=dQw4w9WgXcQ' }}" data-fancybox
                        class="hp-btn-play-pulse">
                        <i class="fa fa-play" style="color: white; font-size: 24px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-section hp-bg-light hp-section-padding">
        <div class="uk-container uk-container-center uk-text-center">
            <div class="hero-badge hero-badge-dark" data-reveal="fade">
                <i class="fa fa-circle"></i> Quan tâm?
            </div>
            <h2 class="display-title" data-reveal="up">Đặt lịch tham quan ngay</h2>
            <p class="hp-text-desc uk-margin-large-bottom" style="margin-left: auto; margin-right:auto; max-width: 600px;"
                data-reveal="up">
                Hãy trực tiếp đến xem và cảm nhận không gian sống tuyệt vời tại
                {{ $property->title ?? 'Linden Residence' }}.
            </p>
            <div data-reveal="up">
                <a href="/lien-he.html" class="btn-antila">
                    LIÊN HỆ NGAY <i class="fa fa-arrow-right" style="margin-left: 10px;"></i>
                </a>
            </div>
        </div>
    </section>

@endsection

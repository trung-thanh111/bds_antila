@extends('frontend.homepage.layout')
@section('header-class', 'header-inner')
@section('content')
    <div id="scroll-progress"></div>

    <section class="antila-inner-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="antila-inner-header__content">
            <div class="uk-container uk-container-center">
                <h1 class="antila-inner-header__title" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    Về dự án
                </h1>
                <div class="inner-breadcrumb" data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                    <span class="separator">/</span>
                    <span class="current">Giới thiệu</span>
                </div>
            </div>
        </div>
    </section>

    @php
        $sliderImages = collect();
        if (isset($galleries) && $galleries->count() > 0) {
            foreach ($galleries as $g) {
                if (is_array($g->album)) {
                    foreach ($g->album as $img) {
                        $sliderImages->push($img);
                    }
                }
            }
        }
        $img1 = $sliderImages->get(0) ?? asset('frontend/resources/img/homely/gallery/1.webp');
        $img2 = $sliderImages->get(1) ?? asset('frontend/resources/img/homely/gallery/2.webp');
    @endphp

    <section class="antila-about-project hp-section-padding">
        <div class="uk-container uk-container-center">
            <div class="uk-text-center uk-margin-large-bottom">
                <div class="hero-badge hero-badge-dark" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:200}">
                    <i class="fa fa-circle"></i> Bất động sản
                </div>
                <h2 class="display-title about-main-title" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:400}">
                    {{ $property->title ?? 'Dự án' }}
                </h2>
            </div>

            <div class="uk-grid uk-grid-large uk-flex-middle" data-uk-grid-margin>
                <div class="uk-width-large-1-2" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:600}">
                    <div class="about-content-wrap">
                        <div class="hp-text-desc about-full-desc">
                            {!! $property->description ?? 'Đang cập nhật mô tả chi tiết cho dự án...' !!}
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-1-2" data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:800}">
                    <div class="about-image-wrap">
                        <img src="{{ !empty($property->image) ? asset($property->image) : asset('frontend/resources/img/homely/hero-house.png') }}"
                            alt="{{ $property->title ?? 'Project Image' }}" class="about-img-main img-streak-effect">
                    </div>
                </div>
            </div>

            <div class="uk-grid uk-grid-divider uk-margin-large-top about-stats-grid" data-uk-grid-margin
                data-uk-scrollspy="{cls:'uk-animation-fade', delay:1000}">
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="about-stat-item">
                        <div class="about-stat-num">{{ $property->area_sqm ?? 0 }}+</div>
                        <h4 class="about-stat-title">Diện tích (m²)</h4>
                        <p class="about-stat-desc">Không gian sống rộng rãi, tối ưu công năng.</p>
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="about-stat-item">
                        <div class="about-stat-num">
                            {{ !empty($property->price) ? $property->price . ' ' . $property->price_unit : 'Liên hệ' }}
                        </div>
                        <h4 class="about-stat-title">Giá bán</h4>
                        <p class="about-stat-desc">Thiết kế thông minh, đón sáng tự nhiên.</p>
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="about-stat-item">
                        <div class="about-stat-num">{{ count($facilities) }}+</div>
                        <h4 class="about-stat-title">Tiện nghi</h4>
                        <p class="about-stat-desc">Đầy đủ tiện ích nội khu đẳng cấp quốc tế.</p>
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="about-stat-item">
                        <div class="about-stat-num">{{ count($locationHighlights) }}+</div>
                        <h4 class="about-stat-title">Xung quanh</h4>
                        <p class="about-stat-desc">Kết nối thuận tiện đến các điểm trọng yếu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-section hp-bg-light hp-section-padding hp-border-top">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-large" data-uk-grid-margin>
                @php $firstFacility = $facilities->first(); @endphp
                <div class="uk-width-large-4-10" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:200}">
                    <div class="about-amenity-tall img-streak-effect">
                        <img src="{{ !empty($firstFacility->image) ? asset($firstFacility->image) : $sliderImages->get(0) ?? asset('frontend/resources/img/homely/slider/1.webp') }}"
                            alt="{{ $firstFacility->name ?? 'Giao thoa nghệ thuật' }}">

                        <div class="amenity-glass-box">
                            <div class="amenity-glass-title">Thông tin dịch vụ</div>
                            <div class="amenity-glass-row">
                                <span class="amenity-glass-label">Tiện ích:</span>
                                <span class="amenity-glass-value">{{ $firstFacility->name ?? 'Dịch vụ cao cấp' }}</span>
                            </div>
                            <div class="amenity-glass-row">
                                <span class="amenity-glass-label">Trạng thái:</span>
                                <span class="amenity-glass-value">Sẵn sàng 24/7</span>
                            </div>
                            <div class="amenity-glass-row">
                                <span class="amenity-glass-label">Vị trí:</span>
                                <span class="amenity-glass-value">Nội khu dự án</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-large-6-10 ameniti_info"
                    data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:400}">
                    <div class="about-amenity-badge">
                        <span></span> {{ $property->label ?? 'Tiêu chuẩn quốc tế' }}
                    </div>
                    <h2 class="about-amenity-main-title">
                        Quy hoạch thông minh <br> Nâng tầm giá trị sống
                    </h2>
                    <div class="hp-text-desc uk-margin-bottom">
                        {!! $property->description_short ??
                            'Mọi khía cạnh của ngôi nhà đều được thiết kế cẩn thận để nâng cao sự thoải mái, tiện nghi và chức năng.' !!}
                    </div>

                    <div class="amenity-feature-list">
                        @php
                            $remainingFacilities = $facilities->slice(1);
                            if ($remainingFacilities->isEmpty()) {
                                $remainingFacilities = collect([
                                    (object) [
                                        'name' => 'Bảo Mật Nhà Ở',
                                        'icon' => 'fa fa-shield',
                                        'description' =>
                                            'Hệ thống an ninh đa lớp và camera giám sát 24/7 đảm bảo an toàn tuyệt đối cho gia chủ.',
                                    ],
                                    (object) [
                                        'name' => 'Hồ Bơi Riêng Tư',
                                        'icon' => 'fa fa-tint',
                                        'description' =>
                                            'Tận hưởng làn nước mát và không gian thư giãn riêng tư ngay tại tổ ấm của bạn.',
                                    ],
                                    (object) [
                                        'name' => 'Năng Lượng Mặt Trời',
                                        'icon' => 'fa fa-sun-o',
                                        'description' =>
                                            'Giải pháp năng lượng xanh bền vững, giúp tiết kiệm chi phí và bảo vệ môi trường.',
                                    ],
                                    (object) [
                                        'name' => 'Nhà Thông Minh',
                                        'icon' => 'fa fa-plug',
                                        'description' =>
                                            'Điều khiển mọi thiết bị trong nhà chỉ với một chạm, nâng tầm trải nghiệm sống hiện đại.',
                                    ],
                                ]);
                            }
                        @endphp
                        @foreach ($remainingFacilities as $facility)
                            <div class="amenity-feature-item">
                                <div class="amenity-feature-icon">
                                    <i class="{{ !empty($facility->icon) ? $facility->icon : 'fa fa-check' }}"></i>
                                </div>
                                <div class="amenity-feature-content">
                                    <h3 class="amenity-feature-title">{{ $facility->name }}</h3>
                                    <div class="amenity-feature-desc">
                                        {{ $facility->description ?? 'Không gian được thiết kế với bố cục được quy hoạch cẩn thận, không gian chức năng và nội thất hiện đại.' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="around-project-wrapper"
        style="background-image: url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="uk-container uk-container-center">
            <div class="around-split-container" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:300}">
                <div class="around-contact-side">
                    <div class="contact-form-card" style="box-shadow: none; padding: 0; background: transparent;">
                        <h3 style="text-align: left; margin-bottom: 30px;">Gửi lời nhắn cho chúng tôi</h3>
                        <form id="visit-request-form" method="post" action="{{ route('visit-request.store') }}">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->id ?? '' }}">

                            <div class="hp-form-v2-grid">
                                <div class="hp-form-v2-group full-width">
                                    <label class="hp-form-v2-label">Họ và tên:</label>
                                    <input type="text" name="full_name" placeholder="Ví dụ: Nguyễn Văn A"
                                        class="hp-form-v2-input" required>
                                </div>
                                <div class="hp-form-v2-group">
                                    <label class="hp-form-v2-label">Địa chỉ Email:</label>
                                    <input type="email" name="email" placeholder="email@example.com"
                                        class="hp-form-v2-input" required>
                                </div>
                                <div class="hp-form-v2-group">
                                    <label class="hp-form-v2-label">Số điện thoại:</label>
                                    <input type="text" name="phone" placeholder="090 xxx xxxx"
                                        class="hp-form-v2-input" required>
                                </div>

                                <div class="hp-form-v2-group">
                                    <label class="hp-form-v2-label">Ngày tham quan</label>
                                    <input type="date" name="preferred_date" class="hp-form-v2-input">
                                </div>
                                <div class="hp-form-v2-group">
                                    <label class="hp-form-v2-label">Giờ tham quan</label>
                                    <input type="time" name="preferred_time" class="hp-form-v2-input">
                                </div>

                                <div class="hp-form-v2-group full-width">
                                    <label class="hp-form-v2-label">Lời nhắn:</label>
                                    <textarea name="message" placeholder="Nhập thêm yêu cầu của bạn tại đây..."
                                        class="hp-form-v2-input hp-form-v2-textarea"></textarea>
                                </div>
                            </div>

                            <div class="uk-margin-top uk-flex uk-flex-end">
                                <button type="submit" class="btn-contact-v2">
                                    Gửi lời nhắn <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>

                            <div class="visit-form-success"
                                style="display:none; margin-top:30px; padding:25px; background:#f2f3ee; border-radius:15px; color:#1a1a1a; text-align:center;">
                                <h4 style="margin:0; font-weight: 700;">Yêu cầu của bạn đã được gửi thành công!</h4>
                                <p style="margin: 10px 0 0; opacity: 0.7;">Chúng tôi sẽ liên hệ lại với bạn trong thời gian
                                    sớm
                                    nhất.</p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Cột phải: Slider vị trí -->
                <div class="around-slider-side">
                    <div class="about-amenity-badge">
                        <span></span> Vị trí & Kết nối
                    </div>
                    <h2 class="about-amenity-main-title">
                        Tâm điểm giao thoa <br> Khởi đầu sự thịnh vượng
                    </h2>

                    <div class="around-slider-container">
                        <div class="swiper swiper-around">
                            <div class="swiper-wrapper">
                                @php
                                    $locItems = collect();
                                    if (isset($locationHighlights) && $locationHighlights->count() > 0) {
                                        $locItems = $locationHighlights;
                                    } else {
                                        $defaults = [
                                            [
                                                'name' => 'Siêu Thị Vinmart',
                                                'distance_text' => '15 phút đi bộ',
                                                'description' =>
                                                    'Siêu thị tiện lợi với đa dạng sản phẩm chất lượng cao.',
                                            ],
                                            [
                                                'name' => 'Phúc Long Coffee',
                                                'distance_text' => '7 phút đi bộ',
                                                'description' =>
                                                    'Quán cà phê nổi tiếng với đồ uống thủ công và bánh ngọt.',
                                            ],
                                            [
                                                'name' => 'Trường QT Việt Úc',
                                                'distance_text' => '7 phút đi bộ',
                                                'description' =>
                                                    'Trường quốc tế K-12 nổi tiếng với chất lượng giảng dạy.',
                                            ],
                                        ];
                                        $locItems = collect($defaults)->map(fn($d) => (object) $d);
                                    }
                                @endphp

                                @foreach ($locItems as $item)
                                    <div class="swiper-slide">
                                        <div class="around-item-distance">
                                            <i class="fa fa-map-marker"></i> {{ $item->distance_text ?? '' }}
                                        </div>
                                        <h3 class="around-item-title">{{ $item->name ?? '' }}</h3>
                                        <p class="around-item-desc">
                                            {{ $item->description ?? '' }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Grouped Navigation -->
                        <div class="around-nav-group">
                            <div class="swiper-button-around swiper-button-around-prev"></div>
                            <div class="swiper-button-around swiper-button-around-next"></div>
                        </div>
                    </div>
                </div>
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
                    <a href="{{ $property->video_tour_url ?? 'https://www.youtube.com/watch?v=dQw4w9WgXcQ' }}"
                        data-fancybox class="hp-btn-play-pulse">
                        <i class="fa fa-play" style="color: white; font-size: 24px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="antila-floorplan" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:200}">
        <div class="uk-container uk-container-center">
            <div class="floorplan-header">
                <div class="hero-badge hero-badge-dark" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    <i class="fa fa-circle"></i> Sơ đồ căn hộ
                </div>
                <h2 class="display-title">Thiết kế tối ưu</h2>
            </div>

            <div class="fp-grid" data-count="{{ $floorplans->count() }}">
                @foreach ($floorplans as $plan)
                    <div class="fp-item"
                        data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:{{ 300 + $loop->index * 100 }}}">
                        <h3 class="fp-card-title">{{ $plan->floor_label }}</h3>
                        <div class="fp-img-wrap">
                            <a href="{{ asset($plan->plan_image) }}" data-fancybox="floorplans-about">
                                <img src="{{ asset($plan->plan_image) }}" alt="{{ $plan->floor_label }}">
                            </a>
                        </div>
                        <ul class="fp-room-list">
                            @foreach ($plan->rooms as $room)
                                <li class="fp-room-item">
                                    <span class="fp-room-name">{{ $room->room_name }}</span>
                                    <span class="fp-room-area">{{ $room->area_sqm }} m²</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="antila-gallery hp-section-padding hp-border-bottom"
        data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:200}">
        <div class="uk-container uk-container-center">
            <div class="gallery-header">
                <div class="hero-badge hero-badge-dark" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    <i class="fa fa-circle"></i> Thư viện ảnh
                </div>
                <h2 class="display-title uk-text-center">Không gian sống qua ống kính</h2>
            </div>

            <div class="gallery-slider-wrap uk-position-relative">
                <div class="swiper-container antilaGallerySwiper">
                    <div class="swiper-wrapper">
                        @php
                            $allGalleryImages = [];
                            if (isset($galleries) && $galleries->count() > 0) {
                                foreach ($galleries as $galleryItem) {
                                    $album = $galleryItem->album;
                                    if (is_string($album)) {
                                        $album = json_decode($album, true);
                                    }
                                    if (is_array($album)) {
                                        foreach ($album as $img) {
                                            if (!empty($img)) {
                                                $allGalleryImages[] = [
                                                    'url' => asset($img),
                                                    'caption' => $galleryItem->name ?? 'Gallery Image',
                                                ];
                                            }
                                        }
                                    }
                                }
                            }
                        @endphp

                        @if (!empty($allGalleryImages))
                            @foreach ($allGalleryImages as $imgData)
                                <div class="swiper-slide">
                                    <div class="gallery-item">
                                        <a href="{{ $imgData['url'] }}" data-fancybox="gallery-about"
                                            data-caption="{{ $imgData['caption'] }}">
                                            <div class="gallery-img-wrap">
                                                <img src="{{ $imgData['url'] }}" alt="{{ $imgData['caption'] }}">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @for ($i = 1; $i <= 8; $i++)
                                <div class="swiper-slide">
                                    <div class="gallery-item">
                                        <a href="https://picsum.photos/800/800?random={{ $i }}"
                                            data-fancybox="gallery-mock-about">
                                            <div class="gallery-img-wrap">
                                                <img src="https://picsum.photos/800/800?random={{ $i }}"
                                                    alt="Gallery Mock">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-prev gallery-nav-btn"></div>
                <div class="swiper-button-next gallery-nav-btn"></div>
            </div>

            <div class="gallery-footer-link">
                Bạn muốn xem nhiều hơn? <a href="/thu-vien-anh.html">Thư viện ảnh</a>
            </div>
        </div>
    </section>
@endsection

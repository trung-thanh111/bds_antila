@extends('frontend.homepage.layout')
@section('content')
    @php
        $allImages = collect();
        if (isset($galleries) && $galleries->count() > 0) {
            foreach ($galleries as $gallery) {
                if (is_array($gallery->album)) {
                    foreach ($gallery->album as $img) {
                        $allImages->push(['url' => $img, 'name' => $gallery->name ?? 'Không gian sống']);
                    }
                }
            }
        }
    @endphp
    <section class="antila-hero">
        <div class="hero-bg-dark"></div>
        <div class="hero-bg-grid"></div>
        <div class="hero-watermark">Đang bán</div>

        <div class="uk-container uk-container-center">
            <div class="hero-content">
                <div class="hero-badge" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    <i class="fa fa-circle"></i> Không gian sống lý tưởng
                </div>

                <h1 class="display-title hero-title" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:500}">
                    {!! $property->title ?? 'Căn hộ đẳng cấp cho cuộc sống đô thị hiện đại' !!}
                </h1>

                <p class="hero-desc" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:700}">
                    {{ $property->description_short ?? 'Trải nghiệm những căn hộ hiện đại với bố cục thông minh, hoàn thiện cao cấp và tiện nghi hàng đầu.' }}
                </p>
                <div class="hero-property-img" data-uk-scrollspy="{cls:'uk-animation-scale-up', delay:900}">
                    <img src="{{ !empty($property->image) ? asset($property->image) : asset('frontend/resources/img/homely/hero-house.png') }}"
                        alt="{{ $property->title ?? 'Project Image' }}">
                </div>
            </div>
        </div>
    </section>

    <section class="antila-about-project hp-section-padding">
        <div class="uk-container uk-container-center">
            <div class="uk-text-center uk-margin-large-bottom">
                <div class="hero-badge hero-badge-dark" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:200}">
                    <i class="fa fa-circle"></i> Giới thiệu
                </div>
                <h2 class="display-title about-main-title" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:400}">
                    Tổng Quan Dự Án
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
                            alt="{{ $property->title ?? 'Project Image' }}" class="about-img-main">
                    </div>
                </div>
            </div>

            <div class="uk-grid uk-grid-divider uk-margin-large-top about-stats-grid" data-uk-grid-margin
                data-uk-scrollspy="{cls:'uk-animation-fade', delay:1000}">
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
                            <a href="{{ asset($plan->plan_image) }}" data-fancybox="floorplans-main">
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

    <section class="antila-gallery" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:200}">
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
                                        <a href="{{ $imgData['url'] }}" data-fancybox="gallery-main"
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
                                            data-fancybox="gallery-mock">
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

    <section class="antila-why-choose" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:200}">
        <div class="uk-container uk-container-center">
            <div class="why-header">
                <div class="why-header-top">
                    <div class="why-header-left">
                        <div class="hero-badge hero-badge-dark"
                            data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                            <i class="fa fa-circle"></i> Tại sao chọn dự án
                        </div>
                        <h2 class="display-title">Kiến tạo chuẩn mực sống mới</h2>
                    </div>
                    <div class="why-header-right">
                        <p class="why-header-desc">
                            {{ $property->description_short ?? 'Mỗi chi tiết tại dự án được chăm chút tỉ mỉ để mang đến cho cư dân một không gian sống hoàn hảo, tiện nghi và sang trọng bậc nhất.' }}
                        </p>
                        <a href="/bat-dong-san.html" class="btn-antila">
                            Xem thêm <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="why-grid">
                <div class="why-card-info" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:400}">
                    @php
                        $firstImg = asset('frontend/resources/img/homely/gallery/1.webp');
                        if (isset($galleries) && $galleries->count() > 0) {
                            $album = $galleries[0]->album;
                            if (is_string($album)) {
                                $album = json_decode($album, true);
                            }
                            if (is_array($album) && !empty($album[0])) {
                                $firstImg = asset($album[0]);
                            }
                        }
                    @endphp
                    <img src="{{ $firstImg }}" alt="Project View" class="bg-img">
                    <div class="overlay"></div>
                    <div class="why-info-content">
                        <ul class="why-info-list" data-uk-scrollspy="{cls:'uk-animation-scale-up', delay:600}">
                            <li class="why-info-item">
                                <span class="why-info-label">Giá bán từ:</span>
                                <span class="why-info-value">{{ $property->price ?? '3.5' }}
                                    {{ $property->price_unit ?? 'Tỷ' }}</span>
                            </li>
                            <li class="why-info-item">
                                <span class="why-info-label">Diện tích:</span>
                                <span class="why-info-value">{{ $property->area_sqm ?? '75' }} m²</span>
                            </li>
                            <li class="why-info-item">
                                <span class="why-info-label">Phòng ngủ:</span>
                                <span class="why-info-value">{{ $property->bedrooms ?? '2' }} PN</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Cột 2: Dark BG -->
                <div class="why-card-dark" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:500}">
                    <div class="why-logo">
                        <a href="/" class="antila-logo">
                            <img src="{{ $system['homepage_logo'] ?? asset('frontend/resources/img/homely/logo.webp') }}"
                                alt="logo">
                        </a>
                    </div>
                    <h3 class="why-dark-title">Kiến trúc hiện đại & <br> Tiện ích đẳng cấp</h3>
                    <p>
                        {!! Str::limit(
                            $property->description ??
                                'Không gian sống được thiết kế tinh tế, kết hợp hài hòa giữa kiến trúc hiện đại và mảng xanh thiên nhiên rộng lớn cho cư dân.',
                            150,
                        ) !!}
                    </p>
                    <img src="{{ !empty($property->image) ? asset($property->image) : asset('frontend/resources/img/homely/hero-house.png') }}"
                        alt="{{ $property->title }}" class="why-dark-img">
                </div>

                <div class="why-card-stats" data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:400}">
                    <div class="stat-box white">
                        <div class="stat-num">
                            {{ isset($locationHighlights) ? $locationHighlights->count() : '20' }}+
                        </div>
                        <h4 class="stat-title">Tiện ích ngoại khu</h4>
                        <p class="stat-desc">Hệ thống trường học, bệnh viện và trung tâm thương mại chỉ trong vài
                            bước
                            chân.</p>
                    </div>
                    <div class="stat-box green">
                        <div class="stat-num">100%</div>
                        <h4 class="stat-title">An ninh bảo mật</h4>
                        <p class="stat-desc">Hệ thống an ninh đa lớp cùng đội ngũ bảo vệ chuyên nghiệp đảm bảo an
                            toàn
                            tuyệt đối.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="antila-contact" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:200}">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-large uk-flex-middle" data-uk-grid-margin>
                <div class="uk-width-large-1-2">
                    <div data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:300}">
                        <div class="hero-badge hero-badge-dark">
                            <i class="fa fa-circle"></i> Kết nối
                        </div>
                        <h2 class="display-title">Kiến tạo chuẩn mực sống mới.</h2>
                        <p class="uk-margin-large-bottom" style="max-width: 500px; color: var(--clr-text-body);">
                            Đội ngũ chuyên gia của chúng tôi luôn sẵn sàng hỗ trợ bạn tìm kiếm căn hộ lý tưởng, giải đáp
                            thắc mắc về pháp lý và quy trình bàn giao. Hãy để chúng tôi đồng hành cùng bạn.
                        </p>


                        @php
                            $displayAgent = $primaryAgent ?? ($agents[0] ?? null);
                        @endphp
                        @if ($displayAgent)
                            <div class="contact-broker-card">
                                <img src="{{ !empty($displayAgent->avatar) ? asset($displayAgent->avatar) : asset('frontend/resources/img/pa_nha-san-xuat.svg') }}"
                                    alt="{{ $displayAgent->full_name }}" class="broker-avatar">
                                <div class="broker-info">
                                    <h4>{{ $displayAgent->full_name }}</h4>
                                    <p>{{ $displayAgent->position ?? 'Chuyên viên Tư vấn Cấp cao' }}</p>
                                    <div class="broker-contact-items">
                                        @if (!empty($displayAgent->phone))
                                            <a href="tel:{{ $displayAgent->phone }}" class="broker-contact-link"><i
                                                    class="fa fa-phone"></i></a>
                                        @endif
                                        @if (!empty($displayAgent->email))
                                            <a href="mailto:{{ $displayAgent->email }}" class="broker-contact-link"><i
                                                    class="fa fa-envelope"></i></a>
                                        @endif
                                        @if (!empty($displayAgent->facebook))
                                            <a href="{{ $displayAgent->facebook }}" class="broker-contact-link"><i
                                                    class="fa fa-facebook"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="contact-broker-card">
                                <img src="{{ asset('frontend/resources/img/pa_nha-san-xuat.svg') }}" alt="Broker Avatar"
                                    class="broker-avatar">
                                <div class="broker-info">
                                    <h4>Trần Phương Nam</h4>
                                    <p>Chuyên viên Tư vấn Cấp cao</p>
                                    <div class="broker-contact-items">
                                        <a href="tel:{{ $system['contact_phone'] ?? '' }}" class="broker-contact-link"><i
                                                class="fa fa-phone"></i></a>
                                        <a href="mailto:{{ $system['contact_email'] ?? '' }}"
                                            class="broker-contact-link"><i class="fa fa-envelope"></i></a>
                                        <a href="#" class="broker-contact-link"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="uk-width-large-1-2">
                    <div class="contact-form-card" data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:500}">
                        <h3 style="text-align: center;">Gửi lời nhắn cho chúng tôi</h3>
                        <form action="{{ route('visit-request.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->id ?? '' }}">

                            <div class="antila-field-group">
                                <label>Họ và tên</label>
                                <input type="text" name="full_name" placeholder="Ví dụ: Nguyễn Văn A"
                                    class="antila-input" required>
                            </div>

                            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin>
                                <div class="uk-width-1-2">
                                    <div class="antila-field-group">
                                        <label>Địa chỉ Email</label>
                                        <input type="email" name="email" placeholder="email@example.com"
                                            class="antila-input" required>
                                    </div>
                                </div>
                                <div class="uk-width-1-2">
                                    <div class="antila-field-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone" placeholder="090 xxx xxxx"
                                            class="antila-input" required>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin>
                                <div class="uk-width-1-2">
                                    <div class="antila-field-group">
                                        <label>Ngày tham quan</label>
                                        <input type="date" name="preferred_date" class="antila-input">
                                    </div>
                                </div>
                                <div class="uk-width-1-2">
                                    <div class="antila-field-group">
                                        <label>Giờ tham quan</label>
                                        <input type="time" name="preferred_time" class="antila-input">
                                    </div>
                                </div>
                            </div>

                            <div class="antila-field-group">
                                <label>Lời nhắn</label>
                                <textarea name="message" placeholder="Tôi muốn hỏi về..." class="antila-input"></textarea>
                            </div>

                            <button type="submit" class="btn-antila uk-width-1-1">
                                Gửi yêu cầu ngay <i class="fa fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="antila-blog" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:200}">
        <div class="uk-container uk-container-center">
            <div class="blog-header">
                <div class="hero-badge hero-badge-dark" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    <i class="fa fa-circle"></i> Tin tức
                </div>
                <h2 class="display-title">Thị trường Bất động sản</h2>
            </div>

            <div class="uk-grid uk-grid-large" data-uk-grid-margin>
                @if (isset($posts) && count($posts) > 0)
                    @foreach ($posts->take(3) as $post)
                        @php
                            $postImage = !empty($post->image)
                                ? asset($post->image)
                                : asset('images/placeholder-news.jpg');
                            $postUrl = !empty($post->canonical)
                                ? url(
                                    rtrim($post->canonical, '/') .
                                        (str_ends_with($post->canonical, '.html') ? '' : '.html'),
                                )
                                : '#';
                            $publishedAt = !empty($post->released_at)
                                ? \Carbon\Carbon::parse($post->released_at)
                                : \Carbon\Carbon::parse($post->created_at);
                        @endphp
                        <div class="uk-width-large-1-3 uk-width-medium-1-2">
                            <article class="blog-card"
                                data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:{{ 300 + $loop->index * 100 }}}">
                                <div class="blog-img-wrap">
                                    <a href="{{ $postUrl }}">
                                        <img src="{{ $postImage }}" alt="{{ $post->name }}">
                                    </a>
                                </div>
                                <div class="blog-date">
                                    <i class="fa fa-calendar-o"></i> {{ $publishedAt->format('d/m/Y') }}
                                </div>
                                <h3 class="blog-title">
                                    <a href="{{ $postUrl }}">{{ Str::limit($post->name, 65) }}</a>
                                </h3>
                                <a href="{{ $postUrl }}" class="blog-link">
                                    Đọc thêm <span class="blog-link-icon"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </article>
                        </div>
                    @endforeach
                @else
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="uk-width-large-1-3 uk-width-medium-1-2">
                            <article class="blog-card"
                                data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:{{ 300 + $i * 100 }}}">
                                <div class="blog-img-wrap">
                                    <a href="#">
                                        <img src="{{ asset('frontend/resources/img/homely/gallery/' . $i . '.webp') }}"
                                            alt="Mock Blog">
                                    </a>
                                </div>
                                <div class="blog-date">
                                    <i class="fa fa-calendar-o"></i> {{ date('d M, Y') }}
                                </div>
                                <h3 class="blog-title">
                                    <a href="#">Bí quyết thiết kế căn hộ hiện đại tối ưu không gian</a>
                                </h3>
                                <a href="#" class="blog-link">
                                    Đọc thêm <span class="blog-link-icon"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </article>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>
@endsection

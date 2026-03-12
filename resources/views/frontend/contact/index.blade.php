@extends('frontend.homepage.layout')
@section('header-class', 'header-inner')
@section('content')
    <div id="scroll-progress"></div>

    <section class="antila-inner-header"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}');">
        <div class="antila-inner-header__content">
            <div class="uk-container uk-container-center">
                <h1 class="antila-inner-header__title" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:300}">
                    Liên hệ
                </h1>
                <div class="inner-breadcrumb" data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                    <span class="separator">/</span>
                    <span class="current">Liên hệ</span>
                </div>
            </div>
        </div>
    </section>

    <section class="hp-section bg-white">
        <div class="uk-container uk-container-center">
            <div class="hp-contact-v2">
                <!-- Info Side (Dark) -->
                <div class="hp-contact-v2__info" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:200}">
                    <h2 class="hp-contact-v2__title">{{ $property->title ?? 'Dự án Antila' }}</h2>
                    <p class="hp-contact-v2__desc">
                        {{ $property->description_short ?? 'Liên hệ với đội ngũ của chúng tôi để nhận thông tin chi tiết về căn hộ, tiện ích, chính sách giá và các dự án đang triển khai.' }}
                    </p>

                    <div class="hp-contact-v2__list">
                        <div class="hp-contact-v2__item">
                            <div class="hp-contact-v2__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hp-contact-v2__text">
                                <span class="hp-contact-v2__label">Số điện thoại</span>
                                <span class="hp-contact-v2__val">{{ $system['contact_hotline'] ?? '(+123) 456-789' }}</span>
                            </div>
                        </div>

                        <div class="hp-contact-v2__item">
                            <div class="hp-contact-v2__icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="hp-contact-v2__text">
                                <span class="hp-contact-v2__label">Địa chỉ E-mail</span>
                                <span class="hp-contact-v2__val">{{ $system['contact_email'] ?? 'info@domain.com' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="hp-contact-v2__img uk-margin-large-top">
                        <img src="{{ $property->image ?? asset('frontend/resources/img/homely/slider/1.webp') }}"
                            alt="{{ $property->name ?? '' }}">
                    </div>
                </div>

                <!-- Form Side (White) -->
                <div class="hp-contact-v2__form-wrap" data-uk-scrollspy="{cls:'uk-animation-slide-right', delay:400}">
                    <div class="hero-badge hero-badge-dark uk-margin-small-bottom">
                        <i class="fa fa-circle"></i> Liên hệ ngay hôm nay!
                    </div>
                    <h2 class="display-title uk-margin-small-bottom">Gửi lời nhắn</h2>

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
                                <input type="text" name="phone" placeholder="090 xxx xxxx" class="hp-form-v2-input"
                                    required>
                            </div>

                            <div class="hp-form-v2-group">
                                <label class="hp-form-v2-label">Ngày tham quan</label>
                                <input type="date" name="preferred_date" class="antila-input">
                            </div>
                            <div class="hp-form-v2-group">
                                <label class="hp-form-v2-label">Giờ tham quan</label>
                                <input type="time" name="preferred_time" class="antila-input">
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
                            <p style="margin: 10px 0 0; opacity: 0.7;">Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm
                                nhất.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="hp-contact-map-section">
        <div class="uk-container uk-container-center">
            <div class="hp-contact-map-header">
                <div class="hero-badge hero-badge-dark uk-margin-small-bottom"
                    data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:200}">
                    <i class="fa fa-circle"></i> Vị trí dự án
                </div>
                <h2 class="display-title" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:400}">Khám phá vị trí
                    đắc địa</h2>
            </div>

            <div class="hp-contact-map-wrap" data-uk-scrollspy="{cls:'uk-animation-fade', delay:600}">
                <div class="hp-contact-map-info">
                    <h3 class="hp-contact-map-info__title">{{ $property->name ?? 'Dự án Antila' }}</h3>
                    <p class="hp-contact-map-info__address">
                        <i class="fa fa-map-marker" style="margin-right: 5px;"></i>
                        {{ $property->address ?? 'Manchester, Kentucky 39495' }}
                    </p>
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($property->address ?? 'Manchester, Kentucky 39495') }}"
                        target="_blank" class="hp-contact-map-info__link">
                        Xem trên Google Maps <i class="fa fa-external-link"></i>
                    </a>
                </div>
                <iframe
                    src="https://maps.google.com/maps?q={{ urlencode($property->address ?? 'Manchester, Kentucky 39495') }}&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

@endsection

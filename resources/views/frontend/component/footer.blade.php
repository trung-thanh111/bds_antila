<footer class="antila-footer">
    <div class="uk-container uk-container-center">
        <!-- Footer CTA -->
        <div class="footer-cta-wrap" data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:100}">
            <h2 class="footer-cta-title">
                Hãy để chúng tôi giúp bạn tìm kiếm không gian sống phù hợp với phong cách của bạn
            </h2>
            <div class="footer-stamp">
                <div class="footer-stamp-text">
                    <svg viewBox="0 0 100 100" width="100" height="100">
                        <path id="circlePath" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"
                            fill="transparent" />
                        <text font-family="var(--font-label)" font-size="9" fill="var(--clr-white)" letter-spacing="2">
                            <textPath xlink:href="#circlePath">
                                LIÊN HỆ VỚI CHÚNG TÔI • CONTACT US • COMPASS •
                            </textPath>
                        </text>
                    </svg>
                </div>
                <div class="footer-stamp-icon">
                    <i class="fa fa-compass"></i>
                </div>
            </div>
        </div>

        <div class="footer-main">
            <div class="uk-grid uk-grid-large" data-uk-grid-margin>
                <div class="uk-width-large-1-3">
                    <div class="footer-card" data-uk-scrollspy="{cls:'uk-animation-slide-left', delay:300}">
                        <div class="footer-logo-small">
                            <img src="{{ $system['homepage_logo'] ?? asset('frontend/resources/img/homely/logo.webp') }}"
                                alt="Antila Logo">
                        </div>
                        <p class="footer-card-desc">
                            {{ Str::limit($system['homepage_slogan'], 50) ?? 'Trải nghiệm không gian sống hiện đại tại trung tâm thành phố với những căn hộ được thiết kế tinh tế, tiện nghi cao cấp và cộng đồng tinh hoa.' }}
                        </p>
                        <span class="footer-social-label">Theo dõi chúng tôi:</span>
                        <div class="footer-social-links">
                            @if (!empty($system['social_facebook']))
                                <a href="{{ $system['social_facebook'] }}" class="footer-social-link"><i
                                        class="fa fa-facebook"></i></a>
                            @endif
                            @if (!empty($system['social_instagram']))
                                <a href="{{ $system['social_instagram'] }}" class="footer-social-link"><i
                                        class="fa fa-instagram"></i></a>
                            @endif
                            @if (!empty($system['social_youtube']))
                                <a href="{{ $system['social_youtube'] }}" class="footer-social-link"><i
                                        class="fa fa-youtube-play"></i></a>
                            @endif
                            @if (!empty($system['social_tiktok']))
                                <a href="{{ $system['social_tiktok'] }}" class="footer-social-link"><i
                                        class="fa fa-tiktok"></i></a>
                            @endif
                            @if (!empty($system['social_twitter']))
                                <a href="{{ $system['social_twitter'] }}" class="footer-social-link"><i
                                        class="fa fa-twitter"></i></a>
                            @endif
                            @if (!empty($system['social_zalo']))
                                <a href="{{ $system['social_zalo'] }}" class="footer-zalo"><i
                                        class="fa fa-zalo"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="uk-width-large-1-5 uk-width-medium-1-2 uk-margin-left">
                    <div data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:400}">
                        @if (isset($menu['footer-menu'][0]))
                            <h4 class="footer-column-title">
                                {{ $menu['footer-menu'][0]['item']->languages->first()->pivot->name }}
                            </h4>
                            <ul class="footer-list">
                                @foreach ($menu['footer-menu'][0]['children'] as $child)
                                    <li>
                                        <a href="{{ write_url($child['item']->languages->first()->pivot->canonical) }}">
                                            {{ $child['item']->languages->first()->pivot->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h4 class="footer-column-title">Liên Kết Nhanh</h4>
                            <ul class="footer-list">
                                <li><a href="/">Trang chủ</a></li>
                                <li><a href="/bat-dong-san.html">Bất động sản</a></li>
                                <li><a href="/bai-viet.html">Bài viết</a></li>
                                <li><a href="/thu-vien.html">Thư viện ảnh</a></li>
                                <li><a href="/lien-he.html">Liên hệ</a></li>
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="uk-width-large-1-5 uk-width-medium-1-2">
                    <div data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:500}">
                        @if (isset($menu['footer-menu'][2]))
                            <h4 class="footer-column-title">
                                {{ $menu['footer-menu'][2]['item']->languages->first()->pivot->name }}
                            </h4>
                            <ul class="footer-list">
                                @foreach ($menu['footer-menu'][2]['children'] as $child)
                                    <li>
                                        <a
                                            href="{{ write_url($child['item']->languages->first()->pivot->canonical) }}">
                                            {{ $child['item']->languages->first()->pivot->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h4 class="footer-column-title">Tiện ích Nội khu</h4>
                            <ul class="footer-list">
                                <li><a href="#">Khu Yoga & Thiền</a></li>
                                <li><a href="#">Hầm đỗ xe an ninh</a></li>
                                <li><a href="#">Khu vui chơi trẻ em</a></li>
                                <li><a href="#">Trung tâm Gym & Fitness</a></li>
                                <li><a href="#">Đường chạy bộ trên cao</a></li>
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="uk-width-large-1-4">
                    <div data-uk-scrollspy="{cls:'uk-animation-slide-bottom', delay:600}">
                        <h4 class="footer-column-title">Thông Tin Liên Hệ</h4>

                        <div class="contact-info-block">
                            <div class="contact-info-icon"><i class="fa fa-phone"></i></div>
                            <div class="contact-info-content">
                                <label>Số điện thoại</label>
                                <span>{{ $system['contact_hotline'] ?? '(+84) 123 456 789' }}</span>
                            </div>
                        </div>

                        <div class="contact-info-block">
                            <div class="contact-info-icon"><i class="fa fa-envelope-o"></i></div>
                            <div class="contact-info-content">
                                <label>Địa chỉ Email</label>
                                <span>{{ $system['contact_email'] ?? 'info@antila.vn' }}</span>
                            </div>
                        </div>

                        <div class="contact-info-block">
                            <div class="contact-info-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="contact-info-content">
                                <label>Vị trí dự án</label>
                                <span>{{ $property->address ?? '742 Evergreen Terrace, Quận 7, TP. HCM' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-wrap">
            <div class="footer-copyright">
                {!! $system['homepage_copyright'] ?? 'Copyright © ' . date('Y') . ' Antila. All Rights Reserved.' !!}
            </div>
            <div class="footer-legals">
                <a href="#">Chính sách bảo mật</a>
                <a href="#">Điều khoản sử dụng</a>
            </div>
        </div>
    </div>
</footer>

@include('frontend.component.floating-social')

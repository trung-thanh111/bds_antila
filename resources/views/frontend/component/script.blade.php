<script src="{{ asset('vendor/backend/js/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('vendor/frontend/uikit/js/uikit.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/sticky.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/accordion.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/lightbox.min.js') }}"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="{{ asset('frontend/resources/plugins/wow/dist/wow.min.js') }}"></script>
<script src="{{ asset('frontend/resources/function.js') }}"></script>
<script src="{{ asset('frontend/resources/js/antila.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof Fancybox !== 'undefined') {
            Fancybox.bind("[data-fancybox]", {});
        }

        if (document.querySelector('.antilaGallerySwiper')) {
            new Swiper(".antilaGallerySwiper", {
                slidesPerView: 1,
                spaceBetween: 20,
                slidesPerGroup: 1,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    960: {
                        slidesPerView: 3,
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 24,
                    },
                },
            });
        }

        if (document.querySelector('.swiper-around')) {
            new Swiper(".swiper-around", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-around-next",
                    prevEl: ".swiper-button-around-prev",
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
            });
        }

        const backToTop = document.getElementById('hp-back-to-top');
        if (backToTop) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('active');
                } else {
                    backToTop.classList.remove('active');
                }
            });

            backToTop.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>

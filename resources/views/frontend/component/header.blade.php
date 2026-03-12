<header class="antila-header" id="antila-header">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-grid-collapse uk-flex-middle">
            <div class="uk-width-1-2 uk-width-large-1-5">
                <a href="/" class="antila-logo">
                    <img src="{{ $system['homepage_logo'] ?? asset('frontend/resources/img/homely/logo.webp') }}"
                        alt="logo">
                </a>
            </div>

            <div class="uk-width-large-3-5 uk-visible-large">
                <nav class="uk-flex uk-flex-center">
                    <ul class="uk-navbar-nav uk-flex uk-flex-middle">
                        {!! $menu['main-menu'] ?? '' !!}
                    </ul>
                </nav>
            </div>

            <div class="uk-width-1-2 uk-width-large-1-5 uk-text-right">
                <div class="uk-flex uk-flex-middle uk-flex-right">
                    <a href="/lien-he.html" class="btn-antila uk-visible-large">
                        Liên hệ ngay <i class="fa fa-arrow-right"></i>
                    </a>

                    <a class="hp-hamburger uk-hidden-large" href="#offcanvas-mobile"
                        data-uk-offcanvas="{target:'#offcanvas-mobile'}"
                        style="color: var(--clr-white); display: flex; align-items: center; justify-content: flex-end;">
                        <i class="fa fa-bars" style="font-size: 26px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    window.addEventListener('scroll', function() {
        const header = document.getElementById('antila-header');
        if (window.scrollY > 50) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    });
</script>

@include('frontend.component.sidebar')
